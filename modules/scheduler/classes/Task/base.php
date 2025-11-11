<?php defined('SYSPATH') or die('No direct script access.');

abstract class Task_Base extends Task {
    
    protected $_parameters = array();
    protected $_db_task = NULL;
    protected $_execution_start_time = NULL;
    protected $_execution_memory_start = NULL;
    protected $_db_connection = 'scheduler_db'; // имя соединения
    
    public function __construct($name)
    {
        parent::__construct($name);
        $this->_load_parameters_from_database();
    }
    
    /**
     * Получить соединение с БД планировщика
     */
    protected function _get_db()
    {
        try
        {
            // Пробуем использовать соединение 'scheduler'
            return Database::instance($this->_db_connection);
        }
        catch (Exception $e)
        {
            // Если соединение 'scheduler' не настроено, используем 'default'
            $this->log("Scheduler database connection not found, using default", 'WARNING');
            return Database::instance();
        }
    }
    
    /**
     * Загрузка параметров из базы данных
     */
    protected function _load_parameters_from_database()
    {
        try
        {
            $db = $this->_get_db();
            
            // Получаем задачу из базы данных по имени
            // $db_task = $db->query(Database::SELECT, "
                // SELECT * FROM `scheduler_tasks` 
                // WHERE name = :name
            // ", array(':name' => $this->_name))->current();
			
			$sql=__( "
                SELECT * FROM `scheduler_tasks` 
                WHERE name = ':name'
            ", array(':name' => $this->_name));
			 $db_task = $db->query(Database::SELECT, $sql)
			 ->current();
			
   // echo Debug::vars('49',$db, $db_task);exit;        
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
                
               // $this->log("Loaded parameters from database: " . count($this->_parameters) . " parameters");
            }
            else
            {
                $this->log("Task not found in database: {$this->_name}", 'WARNING');
            }
        }
        catch (Exception $e)
        {
            $this->log('Error loading parameters from database: '.$e->getMessage(), 'ERROR');
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
                $db = $this->_get_db();
                
                $db->query(Database::UPDATE, "
                    UPDATE `scheduler_tasks` 
                    SET parameters = :parameters, updated_at = :updated_at 
                    WHERE id = :task_id
                ", array(
                    ':parameters' => json_encode($this->_parameters),
                    ':updated_at' => date('Y-m-d H:i:s'),
                    ':task_id' => $this->_db_task['id']
                ));
                
                $this->log("Parameters saved to database");
                return TRUE;
            }
            catch (Exception $e)
            {
                $this->log("Error saving parameters: " . $e->getMessage(), 'ERROR');
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
            
            $this->log("Task execution completed", 'INFO');
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
            $db = $this->_get_db();
            $start_time = microtime(TRUE);
            $result = $db->query(Database::SELECT, $sql, $params);
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
     * Проверка доступности внешнего сервиса
     */
    protected function _check_service_availability($url, $timeout = 10)
    {
        $start_time = microtime(TRUE);
        
        try
        {
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => $timeout,
                CURLOPT_CONNECTTIMEOUT => $timeout,
                CURLOPT_NOBODY => TRUE,
                CURLOPT_FOLLOWLOCATION => TRUE,
                CURLOPT_MAXREDIRS => 5
            ));
            
            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $total_time = round(curl_getinfo($ch, CURLINFO_TOTAL_TIME), 4);
            
            curl_close($ch);
            
            $is_available = ($http_code >= 200 && $http_code < 400);
            
            $this->log("Service check: {$url} - HTTP {$http_code} (time: {$total_time}s) - " . 
                      ($is_available ? 'AVAILABLE' : 'UNAVAILABLE'), 
                      $is_available ? 'DEBUG' : 'WARNING');
            
            return $is_available;
        }
        catch (Exception $e)
        {
            $this->log("Service check failed: {$url} - " . $e->getMessage(), 'ERROR');
            return FALSE;
        }
    }
    
    /**
     * Отправка email уведомления (заглушка)
     */
    protected function _send_notification($subject, $message, $to = NULL)
    {
        $log_message = "Notification: {$subject} - {$message}";
        if ($to)
        {
            $log_message .= " (to: {$to})";
        }
        
        $this->log($log_message, 'INFO');
        
        // Здесь можно добавить реальную отправку email
        // Email::factory($subject, $message)->to($to)->send();
        
        return TRUE;
    }
    
    /**
     * Получить параметры для Minion (должен быть переопределен в дочерних классах)
     */
    public function get_minion_parameters()
    {
        return array();
    }
    
    /**
     * Валидация параметров (должен быть переопределен в дочерних классах)
     */
    public function validate_parameters(array $parameters)
    {
        return TRUE;
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
            $this->log("Parameters validation: PASSED", 'INFO');
        }
        catch (Exception $e)
        {
            $this->log("Parameters validation: FAILED - " . $e->getMessage(), 'ERROR');
        }
        
        $this->log("Configuration test completed", 'INFO');
        return TRUE;
    }
    
    /**
     * Получить статистику выполнения задачи
     */
    public function get_execution_stats()
    {
        if (!$this->_execution_start_time)
        {
            return array(
                'status' => 'not_started',
                'message' => 'Task has not been executed yet'
            );
        }
        
        $current_time = microtime(TRUE);
        $execution_time = round($current_time - $this->_execution_start_time, 4);
        $current_memory = memory_get_usage(TRUE);
        $peak_memory = memory_get_peak_usage(TRUE);
        
        return array(
            'status' => 'running',
            'execution_time' => $execution_time,
            'current_memory' => $this->_format_memory($current_memory),
            'peak_memory' => $this->_format_memory($peak_memory),
            'parameters' => $this->_parameters,
            'task_name' => $this->_name
        );
    }
    
    /**
     * Получить информацию о задаче из базы данных
     */
    public function get_db_task_info()
    {
        return $this->_db_task;
    }
    
    /**
     * Проверка, существует ли задача в базе данных
     */
    public function exists_in_database()
    {
        return !empty($this->_db_task);
    }
    
    /**
     * Получить ID задачи из базы данных
     */
    public function get_task_id()
    {
        return $this->_db_task ? $this->_db_task['id'] : NULL;
    }
}
