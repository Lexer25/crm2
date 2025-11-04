<?php defined('SYSPATH') or die('No direct script access.');

class Scheduler {
    
    protected $_config;
    protected $_tasks = array();
    protected $_lock_file = NULL;
    
    public static function factory()
    {
        return new Scheduler();
    }
    
    public function __construct()
    {
        $this->_config = Kohana::$config->load('scheduler');
        $this->_load_tasks();
    }
    
    /**
     * Загрузка задач из конфигурации
     */
    protected function _load_tasks()
    {
        $tasks = Arr::get($this->_config, 'tasks', array());
        
        foreach ($tasks as $name => $task_config)
        {
            if (Arr::get($task_config, 'enabled', FALSE))
            {
                $class = Arr::get($task_config, 'class');
                $schedule = Arr::get($task_config, 'schedule');
                
                if (class_exists($class))
                {
                    $this->_tasks[$name] = array(
                        'instance' => new $class($name),
                        'schedule' => $schedule,
                        'last_run' => NULL,
                        'next_run' => NULL,
                    );
                }
            }
        }
    }
    
    /**
     * Запуск планировщика
     */
    public function run()
    {
        if ( ! $this->_acquire_lock())
        {
            $this->_log('Scheduler is already running');
            return FALSE;
        }
        
        try
        {
            $this->_log('Scheduler started');
            
            foreach ($this->_tasks as $name => &$task)
            {
                if ($this->_should_run($task['schedule']))
                {
                    $this->_execute_task($name, $task);
                }
            }
            
            $this->_log('Scheduler completed');
        }
        catch (Exception $e)
        {
            $this->_log('Scheduler error: '.$e->getMessage());
        }
        
        $this->_release_lock();
        return TRUE;
    }
    
    /**
     * Проверка, нужно ли запускать задачу
     */
    protected function _should_run($schedule)
    {
        return $this->_is_cron_time($schedule);
    }
    
    /**
     * Парсинг cron-выражения
     */
    protected function _is_cron_time($schedule)
    {
        $current_time = time();
        $time = getdate($current_time);
        
        list($minute, $hour, $day, $month, $weekday) = explode(' ', $schedule);
        
        return $this->_match_cron_field($minute, $time['minutes']) &&
               $this->_match_cron_field($hour, $time['hours']) &&
               $this->_match_cron_field($day, $time['mday']) &&
               $this->_match_cron_field($month, $time['mon']) &&
               $this->_match_cron_field($weekday, $time['wday']);
    }
    
    /**
     * Сравнение поля cron-выражения
     */
    protected function _match_cron_field($field, $value)
    {
        if ($field == '*')
            return TRUE;
            
        // Обработка списков
        if (strpos($field, ',') !== FALSE)
        {
            $parts = explode(',', $field);
            foreach ($parts as $part)
            {
                if ($this->_match_cron_field($part, $value))
                    return TRUE;
            }
            return FALSE;
        }
        
        // Обработка диапазонов
        if (strpos($field, '-') !== FALSE)
        {
            list($start, $end) = explode('-', $field);
            return ($value >= $start && $value <= $end);
        }
        
        // Обработка шага
        if (strpos($field, '/') !== FALSE)
        {
            list($range, $step) = explode('/', $field);
            if ($range == '*')
            {
                return ($value % $step == 0);
            }
        }
        
        // Простое сравнение
        return ($field == $value);
    }
    
    /**
     * Выполнение задачи
     */
    protected function _execute_task($name, &$task)
    {
        try
        {
            $this->_log("Starting task: {$name}");
            
            $start_time = microtime(TRUE);
            $task['instance']->execute();
            $execution_time = round(microtime(TRUE) - $start_time, 2);
            
            $task['last_run'] = time();
            $task['next_run'] = $this->_calculate_next_run($task['schedule']);
            
            $this->_log("Task completed: {$name} (time: {$execution_time}s)");
        }
        catch (Exception $e)
        {
            $this->_log("Task failed: {$name} - ".$e->getMessage());
        }
    }
    
    /**
     * Расчет времени следующего запуска
     */
    protected function _calculate_next_run($schedule)
    {
        // Упрощенная реализация - следующий запуск через минуту
        // Для полной реализации нужно парсить cron-выражение
        return time() + 60;
    }
    
    /**
     * Блокировка планировщика
     */
    protected function _acquire_lock()
    {
        if ( ! Arr::get($this->_config, 'lock.enabled', TRUE))
            return TRUE;
            
        $lock_file = Arr::get($this->_config, 'lock.file', APPPATH.'cache/scheduler.lock');
        
        // Проверка существующей блокировки
        if (file_exists($lock_file))
        {
            $lock_time = filemtime($lock_file);
            $timeout = Arr::get($this->_config, 'lock.timeout', 300);
            
            if (time() - $lock_time < $timeout)
            {
                return FALSE; // Блокировка активна
            }
            else
            {
                // Устаревшая блокировка - удаляем
                unlink($lock_file);
            }
        }
        
        // Создаем новую блокировку
        $this->_lock_file = fopen($lock_file, 'w');
        return fwrite($this->_lock_file, time()) !== FALSE;
    }
    
    /**
     * Снятие блокировки
     */
    protected function _release_lock()
    {
        if ($this->_lock_file)
        {
            fclose($this->_lock_file);
        }
        
        $lock_file = Arr::get($this->_config, 'lock.file', APPPATH.'cache/scheduler.lock');
        if (file_exists($lock_file))
        {
            unlink($lock_file);
        }
    }
    
    /**
     * Логгирование
     */
    protected function _log($message)
    {
        if (Arr::get($this->_config, 'log.enabled', TRUE))
        {
            $log_path = Arr::get($this->_config, 'log.path', APPPATH.'logs/scheduler.log');
            $timestamp = date('Y-m-d H:i:s');
            $message = "[{$timestamp}] {$message}" . PHP_EOL;
            
            file_put_contents($log_path, $message, FILE_APPEND | LOCK_EX);
        }
        
        // Также выводим в консоль при CLI выполнении
        if (PHP_SAPI == 'cli')
        {
            echo $message;
        }
    }
    
    /**
     * Получение статуса задач
     */
    public function get_status()
    {
        $status = array();
        
        foreach ($this->_tasks as $name => $task)
        {
            $status[$name] = array(
                'schedule' => $task['schedule'],
                'last_run' => $task['last_run'],
                'next_run' => $task['next_run'],
                'is_due' => $this->_should_run($task['schedule']),
            );
        }
        
        return $status;
    }
}
