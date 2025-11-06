<?php defined('SYSPATH') or die('No direct script access.');

abstract class Task_Base extends Task {
    
    protected $_parameters = array();
    protected $_db_task = NULL;
    protected $_execution_start_time = NULL;
    protected $_execution_memory_start = NULL;
    
    public function __construct($name)
    {
        parent::__construct($name);
        $this->_load_parameters_from_database();
    }
    
    /**
     * Загрузка параметров из базы данных
     */
    protected function _load_parameters_from_database()
    {
        try
        {
            // Получаем задачу из базы данных по имени
            $db_task = DB::select()
                ->from('scheduler_tasks')
                ->where('name', '=', $this->_name)
                ->execute()
                ->current();
            
            if ($db_task)
            {
                $this->_db_task = $db_task;
                
                // Загружаем основные параметры
                if (!empty($db_task['parameters']))
                {
                    $this->_parameters = json_decode($db_task['parameters'], TRUE);
                    if (!is_array($this->_parameters))
                    {
                        $this->_parameters = array();
                    }
                }
                
                $this->log("Loaded parameters from database: " . count($this->_parameters) . " parameters");
            }
        }
        catch (Exception $e)
        {
            $this->log('Error loading parameters from database: '.$e->getMessage());
        }
    }
    
    /**
     * Получить параметр
     */
    public function get_parameter($name, $default = NULL)
    {
        return isset($this->_parameters[$name]) ? $this->_parameters[$name] : $default;
    }
    
    /**
     * Получить все параметры
     */
    public function get_parameters()
    {
        return $this->_parameters;
    }
    
    /**
     * Установить параметр (только для текущего выполнения)
     */
    public function set_parameter($name, $value)
    {
        $this->_parameters[$name] = $value;
        return $this;
    }
    
    /**
     * Сохранить параметры в базу данных
     */
    protected function save_parameters()
    {
        if ($this->_db_task && !empty($this->_db_task['id']))
        {
            try
            {
                DB::update('scheduler_tasks')
                    ->set(array(
                        'parameters' => json_encode($this->_parameters),
                        'updated_at' => date('Y-m-d H:i:s')
                    ))
                    ->where('id', '=', $this->_db_task['id'])
                    ->execute();
                
                $this->log("Parameters saved to database");
                return TRUE;
            }
            catch (Exception $e)
            {
                $this->log("Error saving parameters: " . $e->getMessage());
                return FALSE;
            }
        }
        return FALSE;
    }
    
    /**
 * Логгирование с автоматическим добавлением имени задачи
 */
protected function log($message, $level = 'INFO')
{
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[{$timestamp}] [{$level}] [{$this->_name}] {$message}";
    
    // Запись в файл лога
    $config = Kohana::$config->load('scheduler');
    $log_path = Arr::get($config, 'log.path', APPPATH.'logs/scheduler.log');
    
    if (Arr::get($config, 'log.enabled', TRUE))
    {
        file_put_contents($log_path, $log_message . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
    
    // Вывод в консоль при CLI выполнении
    if (PHP_SAPI == 'cli' && class_exists('Minion_CLI'))
    {
        $color = $this->_get_log_color($level);
        Minion_CLI::write($log_message, $color);
    }
    
    // Дополнительное логирование в системный лог Kohana
    // Используем только существующие константы Log
    $kohana_log_level = Log::INFO; // по умолчанию
    
    switch (strtoupper($level))
    {
        case 'ERROR':
        case 'CRITICAL':
            $kohana_log_level = Log::ERROR;
            break;
        case 'WARNING':
            $kohana_log_level = Log::WARNING;
            break;
        case 'DEBUG':
            $kohana_log_level = Log::DEBUG;
            break;
        case 'INFO':
        default:
            $kohana_log_level = Log::INFO;
            break;
    }
    
    Kohana::$log->add($kohana_log_level, "[Scheduler:{$this->_name}] {$message}");
}
    
    /**
     * Получение цвета для уровня логгирования
     */
    protected function _get_log_color($level)
    {
        switch (strtoupper($level))
        {
            case 'ERROR':
            case 'CRITICAL':
                return 'red';
            case 'WARNING':
                return 'yellow';
            case 'DEBUG':
                return 'gray';
            case 'SUCCESS':
                return 'green';
            case 'INFO':
            default:
                return 'light_blue';
        }
    }
    
    /**
     * Начало выполнения задачи (вызывать в начале execute)
     */
    protected function _start_execution()
    {
        $this->_execution_start_time = microtime(TRUE);
        $this->_execution_memory_start = memory_get_usage(TRUE);
        
        $this->log("Task execution started", 'INFO');
        $this->log("Parameters: " . json_encode($this->_parameters), 'DEBUG');
    }
    
    /**
 * Завершение выполнения задачи (вызывать в конце execute)
 */
protected function _end_execution()
{
    if ($this->_execution_start_time)
    {
        $execution_time = round(microtime(TRUE) - $this->_execution_start_time, 4);
        $memory_used = memory_get_usage(TRUE) - $this->_execution_memory_start;
        $peak_memory = memory_get_peak_usage(TRUE);
        
        $this->log("Task execution completed", 'INFO'); // Изменено с 'SUCCESS' на 'INFO'
        $this->log("Execution time: {$execution_time}s", 'DEBUG');
        $this->log("Memory used: " . $this->_format_memory($memory_used), 'DEBUG');
        $this->log("Peak memory: " . $this->_format_memory($peak_memory), 'DEBUG');
    }
}
    
    /**
     * Форматирование размера памяти
     */
    protected function _format_memory($bytes)
    {
        $units = array('B', 'KB', 'MB', 'GB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        
        return round($bytes, 2) . ' ' . $units[$pow];
    }
    
    /**
     * Проверка существования файла/директории
     */
    protected function _check_path($path, $is_directory = FALSE)
    {
        if ($is_directory)
        {
            if (!is_dir($path))
            {
                throw new Exception("Directory does not exist: {$path}");
            }
            if (!is_writable($path))
            {
                throw new Exception("Directory is not writable: {$path}");
            }
        }
        else
        {
            $dir = dirname($path);
            if (!is_dir($dir))
            {
                throw new Exception("Directory does not exist: {$dir}");
            }
            if (!is_writable($dir))
            {
                throw new Exception("Directory is not writable: {$dir}");
            }
        }
        return TRUE;
    }
    
    /**
     * Создание директории если не существует
     */
    protected function _create_directory($path)
    {
        if (!is_dir($path))
        {
            if (!mkdir($path, 0755, TRUE))
            {
                throw new Exception("Failed to create directory: {$path}");
            }
            $this->log("Created directory: {$path}", 'DEBUG');
        }
        return TRUE;
    }
    
    /**
     * Очистка старых файлов в директории
     */
    protected function _cleanup_old_files($directory, $max_age_days = 30, $pattern = '*')
    {
        $this->_check_path($directory, TRUE);
        
        $files = glob($directory . '/' . $pattern);
        $now = time();
        $max_age = $max_age_days * 24 * 3600;
        $deleted_count = 0;
        
        foreach ($files as $file)
        {
            if (is_file($file))
            {
                $file_age = $now - filemtime($file);
                if ($file_age > $max_age)
                {
                    if (unlink($file))
                    {
                        $deleted_count++;
                        $this->log("Deleted old file: " . basename($file), 'DEBUG');
                    }
                    else
                    {
                        $this->log("Failed to delete file: " . basename($file), 'WARNING');
                    }
                }
            }
        }
        
        $this->log("Cleanup completed: deleted {$deleted_count} files older than {$max_age_days} days");
        return $deleted_count;
    }
    
    /**
     * Выполнение SQL запроса с логированием
     */
    protected function _execute_query($sql, $params = array())
    {
        try
        {
            $start_time = microtime(TRUE);
            $result = DB::query(Database::SELECT, $sql)->parameters($params)->execute();
            $execution_time = round(microtime(TRUE) - $start_time, 4);
            
            $this->log("SQL executed: {$sql} (time: {$execution_time}s, rows: " . count($result) . ")", 'DEBUG');
            
            return $result;
        }
        catch (Exception $e)
        {
            $this->log("SQL error: {$sql} - " . $e->getMessage(), 'ERROR');
            throw $e;
        }
    }
    
    /**
     * Получить конфигурацию задачи из базы данных
     */
    protected function get_task_config()
    {
        if ($this->_db_task)
        {
            return $this->_db_task;
        }
        
        return array();
    }
    
    /**
     * Тестовый метод для проверки конфигурации задачи
     */
    public function test_configuration()
    {
        $this->log("Testing task configuration...", 'INFO');
        
        // Проверяем параметры
        $parameters = $this->get_parameters();
        $this->log("Current parameters: " . json_encode($parameters), 'DEBUG');
        
        // Проверяем Minion параметры
        $minion_params = $this->get_minion_parameters();
        $this->log("Available Minion parameters: " . count($minion_params), 'DEBUG');
        
        // Проверяем валидацию
        try
        {
            $this->validate_parameters($parameters);
            $this->log("Parameters validation: PASSED", 'SUCCESS');
        }
        catch (Exception $e)
        {
            $this->log("Parameters validation: FAILED - " . $e->getMessage(), 'ERROR');
        }
        
        $this->log("Configuration test completed", 'INFO');
        return TRUE;
    }
}
