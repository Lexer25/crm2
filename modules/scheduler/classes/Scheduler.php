<?php defined('SYSPATH') or die('No direct script access.');

class Scheduler {
    
    protected $_config;
    protected $_tasks = array();
    protected $_lock_file = NULL;
    protected $_db = NULL;
    
    public static function factory()
    {
        return new Scheduler();
    }
    
    public function __construct()
    {
        $this->_config = Kohana::$config->load('scheduler');
        
        // Получаем соединение с БД
        try
        {
            $this->_db = Database::instance('scheduler_db');
			
        }
        catch (Exception $e)
        {
            // Если соединение 'scheduler' не найдено, используем 'default'
            $this->_db = Database::instance();
        }
       
        // Проверяем установку базы данных
        if (!$this->_is_database_installed())
        {
            throw new Exception('Scheduler database tables are not installed. Run: php minion schedulerinstall --install');
        }
        
        $this->_load_tasks_from_database();//получаю список задач
    }
    
    /**
     * Проверка установлены ли таблицы базы данных
     */
    protected function _is_database_installed()
    {
      
		try
        {
            // Проверяем существование основной таблицы
            $result = $this->_db->query(Database::SELECT, "SELECT 1 FROM `scheduler_tasks` LIMIT 1");
			
            return TRUE;
        }
        catch (Exception $e)
        {
            return FALSE;
        }
    }
    
    /**
     * Загрузка задач из базы данных
     */
    protected function _load_tasks_from_database()
    {
  
	   try
        {
	        // Авторегистрация задач при первом запуске
            $this->_auto_register_tasks();

            // Загружаем задачи из базы данных
        /*     $db_tasks = $this->_db->query(Database::SELECT, "
                SELECT * FROM `scheduler_tasks` 
                WHERE `enabled` = 1
            ")->as_array(); */
 
            $db_tasks = $this->_db->query(Database::SELECT, "
                SELECT * FROM `scheduler_tasks` 
                
            ")->as_array();
 
 
 
 
            foreach ($db_tasks as $db_task)
            {
				$name = $db_task['name'];
               
                if (class_exists($db_task['class']))
                {

                    // Загружаем состояние задачи
					$sql=__('SELECT * FROM `scheduler_state` 
                        WHERE `task_id` = :task_id',
						array(':task_id' => $db_task['id']));
				
					$task_state = $this->_db->query(Database::SELECT, $sql)
						->current();
						
					
                    // Загружаем параметры
                    $parameters = array();
                     if (!empty($db_task['parameters']))
                    {
                        $parameters = json_decode($db_task['parameters'], TRUE);
                    }
					
					
                     $this->_tasks[$name] = array(
                        'instance' => new $db_task['class']($name),
                        'schedule' => $db_task['schedule'],
                        'db_task' => $db_task,
                        'last_run' => $task_state ? strtotime($task_state['last_run']) : NULL,
                        'next_run' => $task_state ? strtotime($task_state['next_run']) : NULL,
                        'last_duration' => $task_state ? $task_state['last_duration'] : NULL,
                        'last_status' => $task_state ? $task_state['last_status'] : NULL,
                        'run_count' => $task_state ? $task_state['total_runs'] : 0,
                        'error_count' => $task_state ? $task_state['total_errors'] : 0,
                        'parameters' => $parameters,
                    ); 
					
					
                }
                else
                {
              		Kohana::$log->add(Log::ERROR, "Scheduler task class not found: {$db_task['class']}");
                }
            }
        }
        catch (Exception $e)
        {
			        
		   Kohana::$log->add(Log::ERROR, "Error loading tasks from database: ".$e->getMessage());
        }
		
    }
    
    /**
     * Автоматическая регистрация задач из конфигурации
     */
    protected function _auto_register_tasks()
    {
       
		$auto_tasks = Arr::get($this->_config, 'auto_register_tasks_', array());
        $registered = 0;
       
        foreach ($auto_tasks as $name => $task_config)
        {
           
		   try
            {
                // Проверяем существует ли задача
                $existing_task = $this->_db->query(Database::SELECT, "
                    SELECT id FROM `scheduler_tasks` 
                    WHERE name = :name
                ", array(':name' => $name))->current();
              
                if (!$existing_task)
                {
                    // Создаем новую задачу
                    $parameters = isset($task_config['parameters']) ? json_encode($task_config['parameters']) : NULL;


					 $sql = __("
                        INSERT INTO `scheduler_tasks` 
                        (name, class, schedule, enabled, parameters, created_at, updated_at) 
                        VALUES (':name', ':class', ':schedule', ':enabled', ':parameters', ':created_at', ':updated_at')
                    ", array(
                        ':name' => $name,
                        ':class' => $task_config['class'],
                        ':schedule' => $task_config['schedule'],
                        ':enabled' => (int)$task_config['enabled'],
                        ':parameters' => $parameters,
                        ':created_at' => date('Y-m-d H:i:s'),
                        ':updated_at' => date('Y-m-d H:i:s')
                    ));
					
			//echo Debug::vars('169', $sql);exit;
			
			$result = $this->_db->query(Database::INSERT, $sql);
					
             
                    if ($result)
                    {
                        $task_id = $result[0];
                        
                        // Создаем начальное состояние
                        $sql=__("
                         INSERT INTO `scheduler_state` 
                            (task_id, total_runs, total_errors, updated_at) 
                            VALUES (':task_id', ':total_runs', ':total_errors', ':updated_at')
                        ", array(
                            ':task_id' => $task_id,
                            ':total_runs' => 0,
                            ':total_errors' => 0,
                            ':updated_at' => date('Y-m-d H:i:s')
                        ));
                        
				//echo Debug::vars('183', $sql);exit;		
						 $this->_db->query(Database::INSERT, $sql);
                        
						
						
                        $registered++;
                    }
                }
            }
            catch (Exception $e)
            {
                Kohana::$log->add(Log::ERROR, "Error auto-registering task {$name}: ".$e->getMessage());
            }
        }
        
        if ($registered > 0)
        {
            Kohana::$log->add(Log::INFO, "Auto-registered {$registered} scheduler tasks");
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
	//echo Debug::vars('220', $this->_tasks);exit;
            foreach ($this->_tasks as $name => &$task)
            {
            // echo Debug::vars('223', $name, $task);exit;
				if ($this->_should_run($task['schedule'], $task['last_run']))
                {
				//echo Debug::vars('226');exit;
					$this->_execute_task($name, $task);
				
                    $executed_tasks++;
                }
            }
            
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
    protected function _execute_task($name, &$task, $execution_parameters = array())
    {
        $start_time = microtime(TRUE);
        $start_memory = memory_get_usage();
        $output = '';
  // echo Debug::vars('268');exit;
        try
        {
            $this->_log("Starting task: {$name}");
         //echo Debug::vars('272');exit;   
            // Устанавливаем параметры выполнения
            $final_parameters = array_merge($task['parameters'], $execution_parameters);
		//echo Debug::vars('275');exit;
            foreach ($final_parameters as $param_name => $param_value)
            {
	//echo Debug::vars('274', $task['instance']); exit;

                $task['instance']->set_parameter($param_name, $param_value);
					//echo Debug::vars('276');exit;
            }
   // echo Debug::vars('275');exit;        
            // Валидируем параметры
            if (method_exists($task['instance'], 'validate_parameters'))
            {
                $task['instance']->validate_parameters($final_parameters);
            }
     //echo Debug::vars('281');exit;       
            // Захватываем вывод задачи
            ob_start();
            $task['instance']->execute();
            $output = ob_get_clean();
            
            $execution_time = round(microtime(TRUE) - $start_time, 2);
            $memory_usage = memory_get_usage() - $start_memory;
            
            // Сохраняем в базу данных
            $this->_save_task_execution($task, 'success', $execution_time, $memory_usage, $output, $final_parameters);
            
            // Обновляем информацию в памяти
            $task['last_run'] = time();
            $task['next_run'] = $this->_calculate_next_run($task['schedule']);
            $task['last_duration'] = $execution_time;
            $task['last_status'] = 'success';
            $task['run_count']++;
            
            $this->_log("Task completed: {$name} (time: {$execution_time}s)");
        }
        catch (Exception $e)
        {
            $output = ob_get_clean();
            $error_message = $e->getMessage();
            $execution_time = round(microtime(TRUE) - $start_time, 2);
            $memory_usage = memory_get_usage() - $start_memory;
            
            // Сохраняем ошибку в базу данных
            $this->_save_task_execution($task, 'error', $execution_time, $memory_usage, $output."\nError: ".$error_message, $final_parameters);
            
            // Обновляем информацию в памяти
            $task['last_status'] = 'error';
            $task['last_run'] = time();
            $task['error_count']++;
            
            $this->_log("Task failed: {$name} - {$error_message}");
        }
    }
    
    /**
 * Сохранение выполнения задачи в базу данных
 */
protected function _save_task_execution(&$task, $status, $duration, $memory_usage, $output, $parameters = array())
{
    $task_id = $task['db_task']['id'];
    $last_run = date('Y-m-d H:i:s');
    $next_run = date('Y-m-d H:i:s', $this->_calculate_next_run($task['schedule']));
    
    // Очищаем output от лишних символов
    $output = trim($output);
    
    // Исправляем пути для Windows
    if (is_array($parameters))
    {
        array_walk_recursive($parameters, function(&$value) {
            if (is_string($value)) {
                $value = str_replace('\\', '/', $value);
            }
        });
    }
    
    try
    {
        // Сохраняем лог выполнения
        $sql=__( "
            INSERT INTO `scheduler_logs` 
            (task_id, status, duration, memory_usage, output, parameters, created_at) 
            VALUES (':task_id', ':status', ':duration', ':memory_usage', ':output', ':parameters', ':created_at')
        ", array(
            ':task_id' => $task_id,
            ':status' => $status,
            ':duration' => $duration,
            ':memory_usage' => $memory_usage,
            ':output' => $output,
            ':parameters' => json_encode($parameters),
            ':created_at' => date('Y-m-d H:i:s')
        ));
		
		$this->_db->query(Database::INSERT, $sql);
        
        // Обновляем состояние задачи
        $state_data = array(
            'last_run' => $last_run,
            'next_run' => $next_run,
            'last_duration' => $duration,
            'last_status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        if ($status == 'success')
        {
            $state_data['total_runs'] = $task['run_count'] + 1;
            $state_data['total_errors'] = $task['error_count'];
        }
        else
        {
            $state_data['total_runs'] = $task['run_count'];
            $state_data['total_errors'] = $task['error_count'] + 1;
        }
        
      /*   $this->_db->query(Database::UPDATE, "
            UPDATE `scheduler_state` 
            SET last_run = :last_run, 
                next_run = :next_run, 
                last_duration = :last_duration, 
                last_status = :last_status, 
                total_runs = :total_runs, 
                total_errors = :total_errors, 
                updated_at = :updated_at 
            WHERE task_id = :task_id
        ", array_merge($state_data, array(':task_id' => $task_id))); */
		
		
		$sql=__("UPDATE `scheduler_state` 
            SET last_run = ':last_run', 
                next_run = ':next_run', 
                last_duration = ':last_duration', 
                last_status = ':last_status', 
                total_runs = ':total_runs', 
                total_errors = ':total_errors', 
                updated_at = ':updated_at' 
            WHERE task_id = :task_id",
			array(
				':last_run' => $last_run,
				':next_run' => $next_run,
				':last_duration' => $duration,
				':last_status' => $status,
				':total_runs' => $state_data['total_runs'],
				':total_errors' => $state_data['total_errors'],
				':updated_at' => date('Y-m-d H:i:s'),
				':task_id' => $task_id
			));
			//echo Debug::vars('428', $sql);exit;
			$this->_db->query(Database::UPDATE,$sql);
        
        // Обновляем параметры в задаче (если нужно сохранять последние параметры)
        if ($status == 'success')
        {
            $this->_db->query(Database::UPDATE, "
                UPDATE `scheduler_tasks` 
                SET parameters = :parameters, updated_at = :updated_at 
                WHERE id = :task_id
            ", array(
                ':parameters' => json_encode($parameters),
                ':updated_at' => date('Y-m-d H:i:s'),
                ':task_id' => $task_id
            ));
        }
        
        return TRUE;
    }
    catch (Exception $e)
    {
        $this->_log("Error saving task execution to database: " . $e->getMessage());
        return FALSE;
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

	   if ( ! Arr::get(Arr::get($this->_config, 'lock'),'enabled', TRUE))
            return TRUE;
        
        $lock_file = Arr::get(Arr::get($this->_config, 'lock'),'file', APPPATH.'cache/scheduler.lock');
      
        // Проверка существующей блокировки
        if (file_exists($lock_file))
        {
            $lock_time = filemtime($lock_file);
          //  $timeout = Arr::get($this->_config, 'lock.timeout', 300);
			$timeout = Arr::get(Arr::get($this->_config, 'lock'),'timeout', 300);
       
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
                'error_count' => $task['error_count'],
                'last_status' => $task['last_status'],
                'is_due' => $this->_should_run($task['schedule'], $task['last_run']),
                'class' => get_class($task['instance']),
                'parameters' => $task['parameters'],
            );
        }
        
        return $status;
    }
    
    /**
     * Получение статистики
     */
    public function get_statistics()
    {
        $stats = array(
            'total_tasks' => count($this->_tasks),
            'enabled_tasks' => 0,
            'due_tasks' => 0,
            'total_runs' => 0,
            'total_errors' => 0,
            'last_execution' => NULL,
        );
        
        foreach ($this->_tasks as $task)
        {
            if (!empty($task['last_run']))
            {
                $stats['enabled_tasks']++;
                $stats['total_runs'] += $task['run_count'];
                $stats['total_errors'] += $task['error_count'];
                
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
     * Запуск конкретной задачи с параметрами
     */
    public function run_task($name, $parameters = array())
    {
		if (!isset($this->_tasks[$name]))
        {
            throw new Exception("Task not found: {$name}");
        }
        
        $task = &$this->_tasks[$name];
        $this->_execute_task($name, $task, $parameters);
        
        return $task['last_status'] == 'success';
    }
    
    /**
     * Получить параметры задачи для Minion
     */
    public function get_task_parameters_info($name)
    {
        if (!isset($this->_tasks[$name]))
        {
            return array();
        }
        
        if (method_exists($this->_tasks[$name]['instance'], 'get_minion_parameters'))
        {
            return $this->_tasks[$name]['instance']->get_minion_parameters();
        }
        
        return array();
    }
    
    /**
     * Добавить новую задачу
     */
    public function add_task($name, $class, $schedule, $enabled = TRUE, $parameters = array())
    {
      
		if (isset($this->_tasks[$name]))
        {
            throw new Exception("Task already exists: {$name}");
        }
        
        try
        {
            $parameters_json = !empty($parameters) ? json_encode($parameters) : NULL;
            
            $sql= __("INSERT INTO `scheduler_tasks` 
                (name, class, schedule, enabled, parameters, created_at, updated_at) 
                VALUES (':name', ':class', ':schedule', ':enabled', ':parameters', ':created_at', ':updated_at')
            ", array(
                ':name' => $name,
                ':class' => $class,
                ':schedule' => $schedule,
                ':enabled' => (int)$enabled,
                ':parameters' => $parameters_json,
                ':created_at' => date('Y-m-d H:i:s'),
                ':updated_at' => date('Y-m-d H:i:s')
            ));
	//Minion_CLI::write("779 ".$sql, 'red');		
			$result = $this->_db->query(Database::INSERT, $sql);
            
            if ($result)
            {
                $task_id = $result[0];
                
              		
				$sql=__( "
                    INSERT INTO `scheduler_state` 
                    (task_id, total_runs, total_errors, updated_at) 
                    VALUES (':task_id', ':total_runs', ':total_errors', ':updated_at')
                ", array(
                    ':task_id' => $task_id,
                    ':total_runs' => 0,
                    ':total_errors' => 0,
                    ':updated_at' => date('Y-m-d H:i:s')
                ));
	
				$this->_db->query(Database::INSERT, $sql);
                
                // Перезагружаем задачи
                $this->_load_tasks_from_database();
                return TRUE;
            }
        }
        catch (Exception $e)
        {
            throw new Exception("Error creating task: ".$e->getMessage());
        }
        
        return FALSE;
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
        
        return round($bytes, 2).' '.$units[$pow];
    }
}
