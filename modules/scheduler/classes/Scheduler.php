<?php defined('SYSPATH') or die('No direct script access.');

class Scheduler {
    
    protected $_config;
    protected $_tasks = array();
    protected $_lock_file = NULL;
    protected $_state_file;
    
    public static function factory()
    {
        return new Scheduler();
    }
    
    public function __construct()
    {
        $this->_config = Kohana::$config->load('scheduler');
        $this->_state_file = APPPATH.'cache/scheduler_state.php';
        $this->_load_tasks();
    }
    
    /**
     * Загрузка задач и их состояния
     */
    protected function _load_tasks()
    {
        $tasks = Arr::get($this->_config, 'tasks', array());
        $state = $this->_load_state();
        
        foreach ($tasks as $name => $task_config)
        {
            if (Arr::get($task_config, 'enabled', FALSE))
            {
                $class = Arr::get($task_config, 'class');
                $schedule = Arr::get($task_config, 'schedule');
                
                if (class_exists($class))
                {
                    $task_state = isset($state[$name]) ? $state[$name] : array();
                    
                    $this->_tasks[$name] = array(
                        'instance' => new $class($name),
                        'schedule' => $schedule,
                        'last_run' => isset($task_state['last_run']) ? $task_state['last_run'] : NULL,
                        'next_run' => isset($task_state['next_run']) ? $task_state['next_run'] : NULL,
                        'last_duration' => isset($task_state['last_duration']) ? $task_state['last_duration'] : NULL,
                        'run_count' => isset($task_state['run_count']) ? $task_state['run_count'] : 0,
                        'last_status' => isset($task_state['last_status']) ? $task_state['last_status'] : NULL,
                    );
                }
            }
        }
    }
    
    /**
     * Загрузка состояния из файла
     */
    protected function _load_state()
    {
        if (file_exists($this->_state_file))
        {
            try
            {
                $state = include $this->_state_file;
                if (is_array($state))
                {
                    return $state;
                }
            }
            catch (Exception $e)
            {
                $this->_log('Error loading state: '.$e->getMessage());
            }
        }
        
        return array();
    }
    
    /**
     * Сохранение состояния в файл
     */
    protected function _save_state()
    {
        $state = array();
        
        foreach ($this->_tasks as $name => $task)
        {
            $state[$name] = array(
                'last_run' => $task['last_run'],
                'next_run' => $task['next_run'],
                'last_duration' => $task['last_duration'],
                'run_count' => $task['run_count'],
                'last_status' => $task['last_status'],
                'updated' => time(),
            );
        }
        
        $content = "<?php defined('SYSPATH') or die('No direct access');\n";
        $content .= "// Scheduler state - auto-generated\n";
        $content .= "return ".var_export($state, TRUE).";\n";
        
        try
        {
            file_put_contents($this->_state_file, $content, LOCK_EX);
            return TRUE;
        }
        catch (Exception $e)
        {
            $this->_log('Error saving state: '.$e->getMessage());
            return FALSE;
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
            $executed_tasks = 0;
            
            foreach ($this->_tasks as $name => &$task)
            {
                if ($this->_should_run($task['schedule'], $task['last_run']))
                {
                    $this->_execute_task($name, $task);
                    $executed_tasks++;
                }
            }
            
            // Сохраняем состояние после выполнения всех задач
            $this->_save_state();
            
            $this->_log("Scheduler completed. Executed tasks: {$executed_tasks}");
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
    protected function _should_run($schedule, $last_run)
    {
        // Если задача никогда не запускалась - запускаем
        if (empty($last_run))
        {
            return TRUE;
        }
        
        return $this->_is_cron_time($schedule);
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
            
            // Обновляем информацию о задаче
            $task['last_run'] = time();
            $task['next_run'] = $this->_calculate_next_run($task['schedule']);
            $task['last_duration'] = $execution_time;
            $task['run_count']++;
            $task['last_status'] = 'success';
            
            $this->_log("Task completed: {$name} (time: {$execution_time}s, total runs: {$task['run_count']})");
        }
        catch (Exception $e)
        {
            $task['last_status'] = 'error';
            $task['last_run'] = time(); // Все равно сохраняем время попытки запуска
            $this->_log("Task failed: {$name} - ".$e->getMessage());
        }
    }
    
    /**
     * Парсинг cron-выражения
     */
    protected function _is_cron_time($schedule)
    {
        $current_time = time();
        $time = getdate($current_time);
        
        // Разбиваем выражение на компоненты
        $parts = preg_split('/\s+/', trim($schedule));
        
        if (count($parts) != 5) {
            $this->_log("Invalid cron schedule: {$schedule}");
            return FALSE;
        }
        
        list($minute, $hour, $day, $month, $weekday) = $parts;
        
        return $this->_match_cron_field($minute, $time['minutes']) &&
               $this->_match_cron_field($hour, $time['hours']) &&
               $this->_match_cron_field($day, $time['mday']) &&
               $this->_match_cron_field($month, $time['mon']) &&
               $this->_match_cron_field($weekday, $time['wday']);
    }
    
    /**
     * Сравнение поля cron-выражения с текущим значением
     */
    protected function _match_cron_field($field, $value)
    {
        // Все значения
        if ($field === '*') {
            return TRUE;
        }
        
        // Список значений
        if (strpos($field, ',') !== FALSE) {
            $parts = explode(',', $field);
            foreach ($parts as $part) {
                if ($this->_match_single_cron_value($part, $value)) {
                    return TRUE;
                }
            }
            return FALSE;
        }
        
        // Диапазон с шагом
        if (strpos($field, '/') !== FALSE) {
            return $this->_match_cron_step($field, $value);
        }
        
        // Диапазон
        if (strpos($field, '-') !== FALSE) {
            return $this->_match_cron_range($field, $value);
        }
        
        // Одно значение
        return $this->_match_single_cron_value($field, $value);
    }
    
    /**
     * Проверка одиночного значения
     */
    protected function _match_single_cron_value($field, $value)
    {
        // Поддержка символов дня недели (0-6 или SUN-SAT)
        if (in_array(strtoupper($field), ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'])) {
            $weekday_map = [
                'SUN' => 0, 'MON' => 1, 'TUE' => 2, 'WED' => 3,
                'THU' => 4, 'FRI' => 5, 'SAT' => 6
            ];
            $field = $weekday_map[strtoupper($field)];
        }
        
        // Поддержка символов месяцев (1-12 или JAN-DEC)
        if (in_array(strtoupper($field), ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 
                                         'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'])) {
            $month_map = [
                'JAN' => 1, 'FEB' => 2, 'MAR' => 3, 'APR' => 4,
                'MAY' => 5, 'JUN' => 6, 'JUL' => 7, 'AUG' => 8,
                'SEP' => 9, 'OCT' => 10, 'NOV' => 11, 'DEC' => 12
            ];
            $field = $month_map[strtoupper($field)];
        }
        
        return (int)$field === (int)$value;
    }
    
    /**
     * Проверка диапазона
     */
    protected function _match_cron_range($field, $value)
    {
        list($start, $end) = explode('-', $field);
        
        // Конвертируем символьные значения
        $start = $this->_convert_cron_symbol($start);
        $end = $this->_convert_cron_symbol($end);
        
        return ($value >= (int)$start && $value <= (int)$end);
    }
    
    /**
     * Проверка шага
     */
    protected function _match_cron_step($field, $value)
    {
        list($range, $step) = explode('/', $field);
        $step = (int)$step;
        
        if ($range === '*') {
            // Каждые step единиц времени
            return ($value % $step === 0);
        }
        
        // Шаг в диапазоне
        if (strpos($range, '-') !== FALSE) {
            list($start, $end) = explode('-', $range);
            $start = $this->_convert_cron_symbol($start);
            $end = $this->_convert_cron_symbol($end);
            
            if ($value >= (int)$start && $value <= (int)$end) {
                return (($value - (int)$start) % $step === 0);
            }
            return FALSE;
        }
        
        // Шаг от конкретного значения
        $start = $this->_convert_cron_symbol($range);
        return ($value >= (int)$start && ($value - (int)$start) % $step === 0);
    }
    
    /**
     * Конвертация символьных значений в числовые
     */
    protected function _convert_cron_symbol($value)
    {
        // Дни недели
        $weekday_map = [
            'SUN' => 0, 'MON' => 1, 'TUE' => 2, 'WED' => 3,
            'THU' => 4, 'FRI' => 5, 'SAT' => 6
        ];
        
        if (isset($weekday_map[strtoupper($value)])) {
            return $weekday_map[strtoupper($value)];
        }
        
        // Месяцы
        $month_map = [
            'JAN' => 1, 'FEB' => 2, 'MAR' => 3, 'APR' => 4,
            'MAY' => 5, 'JUN' => 6, 'JUL' => 7, 'AUG' => 8,
            'SEP' => 9, 'OCT' => 10, 'NOV' => 11, 'DEC' => 12
        ];
        
        if (isset($month_map[strtoupper($value)])) {
            return $month_map[strtoupper($value)];
        }
        
        return $value;
    }
    
    /**
     * Расчет времени следующего запуска
     */
    protected function _calculate_next_run($schedule)
    {
        $current_time = time();
        
        // Пытаемся найти точное время следующего запуска в пределах 1 года
        for ($i = 1; $i <= 525600; $i++) { // Максимум на год вперед (525600 минут)
            $check_time = $current_time + ($i * 60);
            $time = getdate($check_time);
            
            $parts = preg_split('/\s+/', trim($schedule));
            if (count($parts) != 5) break;
            
            list($minute, $hour, $day, $month, $weekday) = $parts;
            
            if ($this->_match_cron_field($minute, $time['minutes']) &&
                $this->_match_cron_field($hour, $time['hours']) &&
                $this->_match_cron_field($day, $time['mday']) &&
                $this->_match_cron_field($month, $time['mon']) &&
                $this->_match_cron_field($weekday, $time['wday'])) {
                
                return $check_time;
            }
        }
        
        // Если не нашли, возвращаем время через день
        return $current_time + 86400;
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
            $this->_lock_file = NULL;
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
        if (PHP_SAPI == 'cli' && class_exists('Minion_CLI'))
        {
            Minion_CLI::write($message, 'light_blue');
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
                'last_duration' => $task['last_duration'],
                'run_count' => $task['run_count'],
                'last_status' => $task['last_status'],
                'is_due' => $this->_should_run($task['schedule'], $task['last_run']),
                'class' => get_class($task['instance']),
            );
        }
        
        return $status;
    }
    
    /**
     * Получение детальной статистики
     */
    public function get_statistics()
    {
        $stats = array(
            'total_tasks' => count($this->_tasks),
            'enabled_tasks' => 0,
            'due_tasks' => 0,
            'total_runs' => 0,
            'last_execution' => NULL,
        );
        
        foreach ($this->_tasks as $task)
        {
            if (!empty($task['last_run']))
            {
                $stats['enabled_tasks']++;
                $stats['total_runs'] += $task['run_count'];
                
                if ($task['last_run'] > $stats['last_execution'] || $stats['last_execution'] === NULL)
                {
                    $stats['last_execution'] = $task['last_run'];
                }
            }
            
            if ($this->_should_run($task['schedule'], $task['last_run']))
            {
                $stats['due_tasks']++;
            }
        }
        
        return $stats;
    }
    
    /**
     * Получение всех задач
     */
    public function get_tasks()
    {
        return $this->_tasks;
    }
    
    /**
     * Получение конкретной задачи
     */
    public function get_task($name)
    {
        return isset($this->_tasks[$name]) ? $this->_tasks[$name] : NULL;
    }
    
    /**
     * Сброс статистики для задачи
     */
    public function reset_task($task_name)
    {
        if (isset($this->_tasks[$task_name]))
        {
            $this->_tasks[$task_name]['last_run'] = NULL;
            $this->_tasks[$task_name]['next_run'] = NULL;
            $this->_tasks[$task_name]['last_duration'] = NULL;
            $this->_tasks[$task_name]['run_count'] = 0;
            $this->_tasks[$task_name]['last_status'] = NULL;
            
            $this->_save_state();
            return TRUE;
        }
        
        return FALSE;
    }
}