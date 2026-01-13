<?php defined('SYSPATH') or die('No direct script access.');

class Task_Scheduler extends Minion_Task {

    protected $_options = array(
        'task' => NULL,
        'list' => FALSE,
        'status' => FALSE,
        'stats' => FALSE,
        'reset' => NULL,
        'run' => FALSE,
        'force' => FALSE,
        'enabled' => FALSE,
    );

    /**
     * Main task execution
     */
    protected function _execute(array $params)
    {
        if(Arr::get($params,'enabled', false)){
			Log::instance()->add(Log::DEBUG, '21 Модуль scheduler отключен');	
			exit;	
		}
		if ($params['list']) {
            return $this->_list_tasks();
        }

        if ($params['status']) {
            return $this->_show_status();
        }

        if ($params['stats']) {
            return $this->_show_statistics();
        }

        if ($params['reset']) {
            return $this->_reset_task($params['reset']);
        }

        if ($params['task']) {
            return $this->_run_single_task($params['task'], $params['force']);
        }

        // Default: run all due tasks
        return $this->_run_scheduler($params['force']);
    }

    /**
     * Run the main scheduler
     */
    protected function _run_scheduler($force = FALSE)
    {
        Minion_CLI::write('Starting scheduler...', 'green');
        
        $scheduler = Scheduler::factory();
     
        if ($force) {
            Minion_CLI::write('Force mode: ignoring schedule', 'yellow');
        }
  //echo Debug::vars('56');exit;    
        $result = $scheduler->run();
       
        if ($result) {
            Minion_CLI::write('Scheduler completed successfully', 'green');
        } else {
            Minion_CLI::write('Scheduler is already running or failed', 'yellow');
        }
        
        return $result ? 0 : 1;
    }

    /**
     * Run a single task by name
     */
    protected function _run_single_task($task_name, $force = FALSE)
    {
        //Minion_CLI::write("Running task: {$task_name}", 'green');
        
        $scheduler = Scheduler::factory();
        $tasks = $scheduler->get_tasks();
        
        if (!isset($tasks[$task_name])) {
            Minion_CLI::write("Task '{$task_name}' not found!", 'red');
            return 1;
        }
        
        try {
            $start_time = microtime(TRUE);
            $tasks[$task_name]['instance']->execute();
            $execution_time = round(microtime(TRUE) - $start_time, 2);
            
        //    Minion_CLI::write("Task '{$task_name}' completed successfully in {$execution_time}s", 'green');
            return 0;
        } catch (Exception $e) {
        //    Minion_CLI::write("Task '{$task_name}' failed: " . $e->getMessage(), 'red');
            return 1;
        }
    }

    /**
     * List all available tasks
     */
    protected function _list_tasks()
    {
        $scheduler = Scheduler::factory();
        $tasks = $scheduler->get_tasks();
        $status = $scheduler->get_status();
        
      //  Minion_CLI::write('Available Tasks:', 'cyan');
      //  Minion_CLI::write('================', 'cyan');
        
        foreach ($tasks as $name => $task) {
            $task_status = $status[$name];
            $is_due = $task_status['is_due'] ? 'YES' : 'NO';
            $last_run = $task_status['last_run'] 
                ? date('Y-m-d H:i:s', $task_status['last_run']) 
                : 'Never';
                
            // Minion_CLI::write("Task: {$name}", 'yellow');
            // Minion_CLI::write("  Schedule: {$task_status['schedule']}");
            // Minion_CLI::write("  Class: ".get_class($task['instance']));
            // Minion_CLI::write("  Last run: {$last_run}");
            // Minion_CLI::write("  Is due: {$is_due}");
            // Minion_CLI::write("");
        }
        
        return 0;
    }

    /**
     * Show scheduler status
     */
    protected function _show_status()
    {
        $scheduler = Scheduler::factory();
        $status = $scheduler->get_status();
        
        // Minion_CLI::write('Scheduler Status:', 'cyan');
        // Minion_CLI::write('=================', 'cyan');
        
        $due_tasks = 0;
        foreach ($status as $name => $task_status) {
            if ($task_status['is_due']) {
                $due_tasks++;
            }
            
            $last_run = $task_status['last_run'] 
                ? date('Y-m-d H:i:s', $task_status['last_run']) 
                : 'Never';
            $next_run = $task_status['next_run'] 
                ? date('Y-m-d H:i:s', $task_status['next_run']) 
                : 'Unknown';
            $duration = $task_status['last_duration'] 
                ? $task_status['last_duration'].'s' 
                : 'N/A';
            $runs = $task_status['run_count'];
            $status_color = $task_status['last_status'] == 'success' ? 'green' : 
                           ($task_status['last_status'] == 'error' ? 'red' : 'gray');
                
            // Minion_CLI::write("{$name}:", 'yellow');
            // Minion_CLI::write("  Schedule: {$task_status['schedule']}");
            // Minion_CLI::write("  Last run: {$last_run} ({$duration})");
            // Minion_CLI::write("  Total runs: {$runs}");
            // Minion_CLI::write("  Next run: {$next_run}");
            // Minion_CLI::write("  Last status: {$task_status['last_status']}", $status_color);
            // Minion_CLI::write("  Is due: " . ($task_status['is_due'] ? 'YES' : 'NO'));
            // Minion_CLI::write("");
        }
        
        // Minion_CLI::write("Due tasks: {$due_tasks}/".count($status), 'blue');
        return 0;
    }

    /**
     * Показать расширенную статистику
     */
    protected function _show_statistics()
    {
        $scheduler = Scheduler::factory();
        $status = $scheduler->get_status();
        $stats = $scheduler->get_statistics();
        
       /*  Minion_CLI::write('Scheduler Statistics:', 'cyan');
        Minion_CLI::write('=====================', 'cyan');
        
        Minion_CLI::write("Total tasks: {$stats['total_tasks']}");
        Minion_CLI::write("Enabled tasks: {$stats['enabled_tasks']}");
        Minion_CLI::write("Due tasks: {$stats['due_tasks']}");
        Minion_CLI::write("Total executions: {$stats['total_runs']}");
        Minion_CLI::write("Last execution: " . 
            ($stats['last_execution'] ? date('Y-m-d H:i:s', $stats['last_execution']) : 'Never'));
        
        Minion_CLI::write("\nTask Details:", 'yellow');
        Minion_CLI::write("=============", 'yellow'); */
        
        foreach ($status as $name => $task_status) {
            $last_run = $task_status['last_run'] 
                ? date('Y-m-d H:i:s', $task_status['last_run']) 
                : 'Never';
            $duration = $task_status['last_duration'] 
                ? $task_status['last_duration'].'s' 
                : 'N/A';
            $status_color = $task_status['last_status'] == 'success' ? 'green' : 
                           ($task_status['last_status'] == 'error' ? 'red' : 'gray');
            
            // Minion_CLI::write("{$name}:", 'light_blue');
            // Minion_CLI::write("  Total runs: {$task_status['run_count']}");
            // Minion_CLI::write("  Last run: {$last_run}");
            // Minion_CLI::write("  Last duration: {$duration}");
            // Minion_CLI::write("  Last status: {$task_status['last_status']}", $status_color);
            // Minion_CLI::write("  Schedule: {$task_status['schedule']}");
            // Minion_CLI::write("  Is due: " . ($task_status['is_due'] ? 'YES' : 'NO'));
            // Minion_CLI::write("");
        }
        
        return 0;
    }

    /**
     * Сброс статистики задачи
     */
    protected function _reset_task($task_name)
    {
        $scheduler = Scheduler::factory();
        
        if ($scheduler->reset_task($task_name)) {
        //    Minion_CLI::write("Statistics reset for task: {$task_name}", 'green');
            return 0;
        } else {
        //    Minion_CLI::write("Task not found: {$task_name}", 'red');
            return 1;
        }
    }

    /**
     * Валидация опций
     */
    public function build_validation(Validation $validation)
    {
        $validation = parent::build_validation($validation);
        
        return $validation
            ->rule('task', 'regex', array(':value', '/^[a-zA-Z0-9_-]+$/'))
            ->rule('list', 'in_array', array(':value', array(TRUE, FALSE)))
            ->rule('status', 'in_array', array(':value', array(TRUE, FALSE)))
            ->rule('stats', 'in_array', array(':value', array(TRUE, FALSE)))
            ->rule('run', 'in_array', array(':value', array(TRUE, FALSE)))
            ->rule('force', 'in_array', array(':value', array(TRUE, FALSE)))
            ->rule('reset', 'regex', array(':value', '/^[a-zA-Z0-9_-]+$/'));
    }

    /**
     * Получение справки по задаче
     */
    public function get_help()
    {
        return "Scheduler Task Management\n\n"
             . "Usage:\n"
             . "  php minion scheduler                    # Run scheduler\n"
             . "  php minion scheduler --list            # List all tasks\n"
             . "  php minion scheduler --status          # Show status\n"
             . "  php minion scheduler --stats           # Show statistics\n"
             . "  php minion scheduler --task=NAME       # Run specific task\n"
             . "  php minion scheduler --reset=NAME      # Reset task statistics\n"
             . "  php minion scheduler --force           # Force run\n\n"
             . "Examples:\n"
             . "  php minion scheduler --stats\n"
             . "  php minion scheduler --task=cleanup_task\n"
             . "  php minion scheduler --reset=example_task";
    }
	
	// В класс Minion_Task_Scheduler добавьте новые методы:

/**
 * Показать расширенную статистику из базы данных
 */
protected function _show_detailed_statistics()
{
    $scheduler = Scheduler::factory();
    $stats = $scheduler->get_detailed_statistics();
    $status = $scheduler->get_status();
    
   /*  Minion_CLI::write('Detailed Scheduler Statistics:', 'cyan');
    Minion_CLI::write('==============================', 'cyan');
    
    Minion_CLI::write("Total tasks: {$stats['total_tasks']}");
    Minion_CLI::write("Enabled tasks: {$stats['enabled_tasks']}");
    Minion_CLI::write("Due tasks: {$stats['due_tasks']}");
    Minion_CLI::write("Total executions: {$stats['total_runs']}");
    Minion_CLI::write("Total errors: {$stats['total_errors']}");
    Minion_CLI::write("Success rate: ".($stats['total_runs'] > 0 ? 
        round(100 - ($stats['total_errors'] / $stats['total_runs'] * 100), 2) : 0)."%");
    Minion_CLI::write("Total logs in DB: {$stats['total_logs']}");
    Minion_CLI::write("Total execution time: ".round($stats['total_duration'], 2)."s");
    Minion_CLI::write("Average execution time: ".round($stats['avg_duration'], 2)."s");
    Minion_CLI::write("Max memory usage: ".$scheduler->_format_memory($stats['max_memory']));
    Minion_CLI::write("Last execution: " . 
        ($stats['last_execution'] ? date('Y-m-d H:i:s', $stats['last_execution']) : 'Never')); */
}

/**
 * Показать логи задачи
 */
protected function _show_task_logs($task_name, $limit = 10)
{
    $scheduler = Scheduler::factory();
    $logs = $scheduler->get_task_logs($task_name, $limit);
    
    if (empty($logs))
    {
       // Minion_CLI::write("No logs found for task: {$task_name}", 'yellow');
        return 1;
    }
    
    // Minion_CLI::write("Recent logs for task: {$task_name}", 'cyan');
    // Minion_CLI::write("==========================", 'cyan');
    
    foreach ($logs as $log)
    {
        $status_color = $log->status == 'success' ? 'green' : 'red';
        $duration = round($log->duration, 2).'s';
        $memory = $scheduler->_format_memory($log->memory_usage);
        
     //   Minion_CLI::write("[".$log->created_at."] {$log->status} ({$duration}, {$memory})", $status_color);
        
        if (!empty($log->output))
        {
            $output_lines = explode("\n", trim($log->output));
            foreach ($output_lines as $line)
            {
                if (!empty(trim($line)))
                {
            //        Minion_CLI::write("  > ".trim($line), 'gray');
                }
            }
        }
      //  Minion_CLI::write("");
    }
    
    return 0;
}

/**
 * Очистить старые логи
 */
protected function _cleanup_logs($days = 30)
{
    $scheduler = Scheduler::factory();
    $deleted_count = $scheduler->cleanup_old_logs($days);
    
  //  Minion_CLI::write("Deleted {$deleted_count} logs older than {$days} days", 'green');
    return 0;
}
}
