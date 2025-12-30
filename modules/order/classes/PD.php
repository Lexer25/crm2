<?php defined('SYSPATH') OR die('No direct access allowed.');

class PD {
    private $id_pep;

    public function __construct($id_pep) {
        $this->id_pep = $id_pep;
    }

    /**
     * Получить список всех файлов подписей с учетом кодировки
     * Возвращает массив с информацией о всех найденных файлах подписей
     * 
     * @param int|null $id_pep Если указан, то ищет файлы только для этого ID
     * @return array Массив файлов подписей
     */
    public function checkSignature($id_pep = null)
    {
        $settings = $this->getSettings();
        $upload_dir = $this->normalizePath($settings['upload_dir']);
        
        if (!is_dir($upload_dir) || !is_readable($upload_dir)) {
            Log::instance()->add(Log::DEBUG, 'Upload directory not accessible: ' . $upload_dir);
            return array();
        }

        $files = $this->scanDirectorySafe($upload_dir);
        if ($files === false) {
            Log::instance()->add(Log::DEBUG, 'Cannot scan directory: ' . $upload_dir);
            return array();
        }

        $result = array();
        
        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || empty(trim($file))) {
                continue;
            }

            // Получаем системное имя файла для проверки существования
            $file_system = $this->convertToSystemEncoding($file);
            $full_path_system = $upload_dir . DIRECTORY_SEPARATOR . $file_system;
            
            // Также пробуем оригинальное имя файла на случай если конвертация не нужна
            $full_path_orig = $upload_dir . DIRECTORY_SEPARATOR . $file;
            
            $file_exists = false;
            $actual_path = '';
            
            if (file_exists($full_path_system) && is_readable($full_path_system)) {
                $file_exists = true;
                $actual_path = $full_path_system;
            } elseif (file_exists($full_path_orig) && is_readable($full_path_orig)) {
                $file_exists = true;
                $actual_path = $full_path_orig;
            }
            
            if (!$file_exists) {
                Log::instance()->add(Log::DEBUG, 'File not accessible: ' . $file . ' (tried: ' . $full_path_system . ' and ' . $full_path_orig . ')');
                continue;
            }

            // Проверяем расширение файла (подписи должны быть jpg)
            $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if ($file_extension !== 'jpg') {
                continue;
            }

            // Извлекаем ID из имени файла
            $file_id_pep = null;
            if (preg_match('/^(\d+)_/', $file, $matches)) {
                $file_id_pep = (int)$matches[1];
            }

            // Если указан конкретный ID, фильтруем по нему
            if ($id_pep !== null && $file_id_pep !== $id_pep) {
                continue;
            }

            // Получаем информацию о файле
            $file_info = array(
                'filename_utf8' => $file,
                'filename_system' => $file_system,
                'full_path' => $actual_path,
                'id_pep' => $file_id_pep,
                'size' => filesize($actual_path),
                'modified' => filemtime($actual_path),
                'url' => $this->getSignatureUrlFromPath($actual_path)
            );

            // Пытаемся извлечь имя из файла
            if ($file_id_pep !== null) {
                $name_part = preg_replace('/^\d+_/', '', pathinfo($file, PATHINFO_FILENAME));
                $name_part = preg_replace('/\.jpg$/i', '', $name_part);
                $file_info['extracted_name'] = $this->parseNameFromFilename($name_part);
            }

            $result[] = $file_info;
        }

        // Сортируем по ID и времени модификации
        usort($result, function($a, $b) {
            if ($a['id_pep'] === $b['id_pep']) {
                return $b['modified'] - $a['modified']; // Новые файлы сначала
            }
            return $a['id_pep'] - $b['id_pep'];
        });

        return $result;
    }

    public function checkSignatureSingle($id_pep) {

        $guest = new Guest2();
        $person = $guest->getPersonDetails($id_pep);

        if (empty($person)) {
            return false;
        }

        $settings = $this->getSettings();
        $upload_dir = $this->normalizePath($settings['upload_dir']);
        
        if (!is_dir($upload_dir) || !is_readable($upload_dir)) {
            return false;
        }

        $file_safe_name = $this->createFileSafeName($person);
        $filename_utf8 = $id_pep . '_' . $file_safe_name . '.jpg';
    
        $filename_system = $this->convertToSystemEncoding($filename_utf8);
        $filepath_system = $upload_dir . DIRECTORY_SEPARATOR . $filename_system;

        if (file_exists($filepath_system) && is_readable($filepath_system)) {
            return $filepath_system;
        }

        $counter = 1;
        $base_filename_system = pathinfo($filename_system, PATHINFO_FILENAME);
        $extension = pathinfo($filename_system, PATHINFO_EXTENSION);

        while ($counter <= 100) {
            $numbered_filename_system = $base_filename_system . '_' . $counter . '.' . $extension;
            $numbered_filepath_system = $upload_dir . DIRECTORY_SEPARATOR . $numbered_filename_system;

            if (file_exists($numbered_filepath_system) && is_readable($numbered_filepath_system)) {
                return $numbered_filepath_system;
            }
            $counter++;
        }

        $found_by_pattern = $this->searchByPattern($upload_dir, $id_pep, $file_safe_name);
        if ($found_by_pattern) {
            return $found_by_pattern;
        }

        return false;
    }

    /**
     * Нормализует путь для корректной работы на разных ОС
     * @param string $path
     * @return string
     */
    public function normalizePath($path)
    {
        if (DIRECTORY_SEPARATOR === '\\') {
            // Windows
            $path = str_replace('/', '\\', $path);
            $path = rtrim($path, '\\');
            // Не убираем завершающий слэш для корня диска
            if (preg_match('/^[A-Za-z]:$/', $path)) {
                $path .= '\\';
            }
        } else {
            // Unix/Linux
            $path = str_replace('\\', '/', $path);
            $path = rtrim($path, '/');
            if (empty($path)) {
                $path = '/';
            }
        }
        return $path;
    }

    /**
     * Конвертирует строку в кодировку файловой системы
     * @param string $string
     * @return string
     */
    public function convertToSystemEncoding($string)
    {
        if (DIRECTORY_SEPARATOR === '\\') {
            // Windows использует CP1251 для кириллицы в файловой системе
            if (function_exists('iconv')) {
                return iconv('UTF-8', 'CP1251//IGNORE', $string);
            } elseif (function_exists('mb_convert_encoding')) {
                return mb_convert_encoding($string, 'CP1251', 'UTF-8');
            }
        }
        // Unix/Linux обычно использует UTF-8
        return $string;
    }

    /**
     * Конвертирует строку из кодировки файловой системы в UTF-8
     * @param string $string
     * @return string
     */
    public function convertFromSystemEncoding($string)
    {
        if (DIRECTORY_SEPARATOR === '\\') {
            // Windows - пробуем разные кодировки
            if (mb_check_encoding($string, 'UTF-8')) {
                return $string; // Уже UTF-8
            }
            
            $encodings = array('CP1251', 'CP866', 'KOI8-R', 'ISO-8859-5');
            foreach ($encodings as $encoding) {
                if (function_exists('iconv')) {
                    $converted = @iconv($encoding, 'UTF-8//IGNORE', $string);
                    if ($converted !== false && mb_check_encoding($converted, 'UTF-8')) {
                        return $converted;
                    }
                } elseif (function_exists('mb_convert_encoding')) {
                    $converted = @mb_convert_encoding($string, 'UTF-8', $encoding);
                    if ($converted !== false && mb_check_encoding($converted, 'UTF-8')) {
                        return $converted;
                    }
                }
            }
        }
        return $string;
    }

    /**
     * Безопасное сканирование директории с обработкой кодировок
     * @param string $directory
     * @return array|false
     */
    public function scanDirectorySafe($directory)
    {
        $files = array();
        
        // Пробуем разные способы сканирования директории
        if (DIRECTORY_SEPARATOR === '\\') {
            // Windows - используем DirectoryIterator для лучшей поддержки кириллицы
            try {
                $iterator = new DirectoryIterator($directory);
                foreach ($iterator as $fileInfo) {
                    if ($fileInfo->isDot()) {
                        continue;
                    }
                    $filename = $fileInfo->getFilename();
                    // Конвертируем из системной кодировки в UTF-8
                    $filename_utf8 = $this->convertFromSystemEncoding($filename);
                    $files[] = $filename_utf8;
                }
            } catch (Exception $e) {
                // Если DirectoryIterator не работает, пробуем glob
                $pattern = $directory . DIRECTORY_SEPARATOR . '*';
                $glob_files = glob($pattern);
                if ($glob_files !== false) {
                    foreach ($glob_files as $file_path) {
                        $filename = basename($file_path);
                        $filename_utf8 = $this->convertFromSystemEncoding($filename);
                        $files[] = $filename_utf8;
                    }
                } else {
                    // В крайнем случае используем scandir
                    $scan_files = @scandir($directory);
                    if ($scan_files !== false) {
                        foreach ($scan_files as $file) {
                            if ($file !== '.' && $file !== '..') {
                                $files[] = $this->convertFromSystemEncoding($file);
                            }
                        }
                    }
                }
            }
        } else {
            // Unix/Linux - обычно UTF-8, используем scandir
            $scan_files = @scandir($directory);
            if ($scan_files === false) {
                return false;
            }
            
            foreach ($scan_files as $file) {
                if ($file !== '.' && $file !== '..') {
                    // Проверяем кодировку и при необходимости конвертируем
                    if (mb_check_encoding($file, 'UTF-8')) {
                        $files[] = $file;
                    } else {
                        // Пробуем разные кодировки
                        $encodings = array('CP1251', 'KOI8-R', 'ISO-8859-5');
                        $converted = false;
                        foreach ($encodings as $encoding) {
                            $test = @iconv($encoding, 'UTF-8//IGNORE', $file);
                            if ($test !== false && mb_check_encoding($test, 'UTF-8')) {
                                $files[] = $test;
                                $converted = true;
                                break;
                            }
                        }
                        if (!$converted) {
                            $files[] = $file; // Оставляем как есть
                        }
                    }
                }
            }
        }
        
        Log::instance()->add(Log::DEBUG, 'Found ' . count($files) . ' files in directory: ' . $directory);
        
        return $files;
    }

    /**
     * Получает URL для файла подписи по полному пути
     * @param string $full_path
     * @return string|false
     */
    public function getSignatureUrlFromPath($full_path)
    {
        $settings = $this->getSettings();
        $upload_dir = $this->normalizePath($settings['upload_dir']);
        
        $docroot = $this->normalizePath(DOCROOT);
        $relative_path = str_replace($docroot, '', $full_path);
        $relative_path = str_replace(DIRECTORY_SEPARATOR, '/', $relative_path);
        $relative_path = ltrim($relative_path, '/');
        
        $filename_system = basename($full_path);
        $filename_utf8 = $this->convertFromSystemEncoding($filename_system);
        
        $relative_path_utf8 = dirname($relative_path) . '/' . $filename_utf8;
        
        $path_parts = explode('/', $relative_path_utf8);
        $encoded_parts = array_map('rawurlencode', $path_parts);
        $encoded_path = implode('/', $encoded_parts);
        
        return URL::base() . $encoded_path;
    }

    /**
     * Парсит имя из части имени файла
     * @param string $name_part
     * @return array
     */
    public function parseNameFromFilename($name_part)
    {
        $parts = explode('_', $name_part);
        
        $parsed = array(
            'surname' => isset($parts[0]) ? $parts[0] : '',
            'name' => isset($parts[1]) ? $parts[1] : '',
            'patronymic' => isset($parts[2]) ? $parts[2] : '',
            'full_name' => implode(' ', array_filter($parts))
        );
        
        return $parsed;
    }

    // Остальные методы остаются без изменений...
    
    public function searchByPattern($upload_dir, $id_pep, $file_safe_name_utf8) {
        
        $files = $this->scanDirectorySafe($upload_dir);
        if ($files === false) {
            return false;
        }
        
        $file_safe_name_system = $this->convertToSystemEncoding($file_safe_name_utf8);
        
        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || !is_file($upload_dir . DIRECTORY_SEPARATOR . $file)) {
                continue;
            }
            
            if (strpos($file, $id_pep . '_') === 0) {
                
                $name_parts_system = explode('_', pathinfo($file, PATHINFO_FILENAME));
                $found_parts = 0;
                
                $safe_parts_system = explode('_', $file_safe_name_system);
                
                foreach ($safe_parts_system as $part) {
                    if (strlen($part) >= 3) {
                        foreach ($name_parts_system as $file_part) {
                            if (strpos($file_part, $part) !== false) {
                                $found_parts++;
                                break;
                            }
                        }
                    }
                }
                
                if ($found_parts >= 2) {
                    $full_path = $upload_dir . DIRECTORY_SEPARATOR . $file;
                    return $full_path;
                }
            }
        }
        
        return false;
    }

    public function getSignatureUrl($id_pep) {
        $signaturePath = $this->checkSignatureSingle($id_pep);
        if ($signaturePath) {
            return $this->getSignatureUrlFromPath($signaturePath);
        }
        return false;
    }

    public function deleteSignature($id_pep) {
        $signaturePath = $this->checkSignatureSingle($id_pep);
        if ($signaturePath && file_exists($signaturePath)) {
            if (unlink($signaturePath)) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function createSignatureLink($id_pep) {
        return URL::site('order/PersonalData/' . $id_pep);
    }

    public function getFullName($person) {
        $surname = !empty($person['SURNAME']) ? trim($person['SURNAME']) : 'Unknown';
        $name = !empty($person['NAME']) ? trim($person['NAME']) : 'Unknown';
        $patronymic = !empty($person['PATRONYMIC']) ? trim($person['PATRONYMIC']) : 'Unknown';

        if (!mb_check_encoding($surname, 'UTF-8')) {
            $surname = $this->convertFromSystemEncoding($surname);
        }
        if (!mb_check_encoding($name, 'UTF-8')) {
            $name = $this->convertFromSystemEncoding($name);
        }
        if (!mb_check_encoding($patronymic, 'UTF-8')) {
            $patronymic = $this->convertFromSystemEncoding($patronymic);
        }

        $full_name = trim($surname . '_' . $name . '_' . $patronymic);
        $full_name = preg_replace('/\s+/', '_', $full_name);
        
        
        return $full_name;
    }

    public function createFileSafeName($person) {
        $full_name = $this->getFullName($person);
        
        
        $safe_name = preg_replace('/[\/:*?"<>|]/u', '', $full_name);  
        $safe_name = preg_replace('/_+/', '_', $safe_name);
        $safe_name = trim($safe_name, '_');
        
        if (empty($safe_name) || mb_strlen($safe_name, 'UTF-8') < 3) {
            $safe_name = 'Unknown_' . substr(md5($full_name), 0, 8);
        }
        
        
        return $safe_name;  
    }

    public function generateFileName($id_pep, $person) {
        $file_safe_name = $this->createFileSafeName($person);
        return $id_pep . '_' . $file_safe_name . '.jpg';
    }

    private function getSettings() {
        $settings_file = APPPATH . 'config' . DIRECTORY_SEPARATOR . 'app_settings.php';
        $default_settings = array(
            'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']) . DIRECTORY_SEPARATOR . 'signatures',
            'consent_text' => 'Я даю согласие на обработку персональных данных...',
            'require_consent_for_card' => false,
            'archive_visibility' => 'all'
        );
        
        if (file_exists($settings_file)) {
            $saved_settings = include $settings_file;
            return array_merge($default_settings, $saved_settings);
        }
        
        return $default_settings;
    }

    private function getDefaultSettings() {
        return array(
            'upload_dir' => DOCROOT . 'downloads',
            'consent_text' => 'Я, {full_name}, подтверждаю, что я предоставляю свое согласие на обработку персональных данных в соответствии с Федеральным законом №152-ФЗ "О персональных данных". Согласие распространяется на сбор, систематизацию, накопление, хранение, уточнение, использование, распространение и иные действия с моими персональными данными в рамках целей, связанных с заключением и исполнением договоров, а также предоставлением услуг. Я знаю о праве отозвать согласие в любой момент путем направления письменного уведомления. Данное согласие действует до момента его отзыва или истечения срока, установленного законодательством Российской Федерации.'
        );
    }

    /**
     * Проверяет доступность пути с учетом разных дисков
     */
    public function isPathAccessible($path) {
        $normalized_path = $this->normalizePath($path);
        
        // Для Windows проверяем доступность диска
        if (DIRECTORY_SEPARATOR === '\\') {
            $drive = substr($normalized_path, 0, 2);
            if (preg_match('/^[A-Za-z]:$/', $drive)) {
                if (!is_dir($drive . '\\')) {
                    return false;
                }
            }
        }

        return is_dir($normalized_path) && is_readable($normalized_path);
    }
}
?>