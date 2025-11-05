<?php defined('SYSPATH') or die('No direct script access.');

//c:\xampp\php\php.exe c:\xampp\htdocs\crm2\modules\minion\minion --task=taskmanager --create=true --name="new_task" --class="Task_Example" --schedule="*/10 * * * *" --parameters="{\"output_file\":\"c:/rrr/file.txt\"}"

class Task_TaskManager extends Minion_Task {

    protected $_options = array(
        'list' => NULL,
        'create' => NULL,
        'update' => NULL,
        'delete' => NULL,
        'enable' => NULL,
        'disable' => NULL,
        'show' => NULL,
        'name' => NULL,
        'class' => NULL,
        'schedule' => NULL,
        'enabled' => NULL,
        'parameters' => NULL,
        'connection' => 'scheduler_db',
    );

    /**
     * Main task execution
     */
    protected function _execute(array $params)
    {
        $scheduler = Scheduler::factory();
        
        if ($params['list'] !== NULL)
        {
            return $this->_list_tasks($scheduler);
        }
        
        if ($params['show'] !== NULL && $params['name'])
        {
            return $this->_show_task($scheduler, $params['name']);
        }
        
        if ($params['create'] !== NULL && $params['name'] && $params['class'] && $params['schedule'])
        {
          
		   return $this->_create_task($scheduler, $params);
        }
        
        if ($params['update'] !== NULL && $params['name'])
        {
            return $this->_update_task($scheduler, $params);
        }
        
        if ($params['delete'] !== NULL && $params['name'])
        {
            return $this->_delete_task($scheduler, $params['name']);
        }
        
        if ($params['enable'] !== NULL && $params['name'])
        {
            return $this->_enable_task($scheduler, $params['name']);
        }
        
        if ($params['disable'] !== NULL && $params['name'])
        {
            return $this->_disable_task($scheduler, $params['name']);
        }
        
        $this->_show_help();
        return 1;
    }
    
    /**
     * List all tasks
     */
    protected function _list_tasks($scheduler)
    {
        $tasks = $scheduler->get_tasks();
        
        Minion_CLI::write('Registered Tasks:', 'cyan');
        Minion_CLI::write('=================', 'cyan');
        
        if (empty($tasks))
        {
            Minion_CLI::write('No tasks found', 'yellow');
            return 0;
        }
        
        foreach ($tasks as $name => $task)
        {
            $status = $task['db_task']['enabled'] ? 'ENABLED' : 'DISABLED';
            $status_color = $task['db_task']['enabled'] ? 'green' : 'red';
            $last_run = $task['last_run'] ? date('Y-m-d H:i:s', $task['last_run']) : 'Never';
            $success_rate = $task['run_count'] > 0 ? 
                round(100 - ($task['error_count'] / $task['run_count'] * 100), 1) : 0;
            
            Minion_CLI::write("{$name}:", 'yellow');
            Minion_CLI::write("  Class: {$task['db_task']['class']}");
            Minion_CLI::write("  Schedule: {$task['schedule']}");
            Minion_CLI::write("  Status: {$status}", $status_color);
            Minion_CLI::write("  Last run: {$last_run}");
            Minion_CLI::write("  Total runs: {$task['run_count']} (Errors: {$task['error_count']}, Success: {$success_rate}%)");
            Minion_CLI::write("  Is due: " . ($task['last_status'] ? 'YES' : 'NO'));
            
            if (!empty($task['parameters']))
            {
                Minion_CLI::write("  Parameters: ".json_encode($task['parameters']));
            }
            Minion_CLI::write("");
        }
        
        // Show available task classes
        $this->_show_available_classes();
        
        return 0;
    }
    
    /**
     * Show detailed information about a task
     */
    protected function _show_task($scheduler, $task_name)
    {
        $task = $scheduler->get_task($task_name);
        
        if (!$task)
        {
            Minion_CLI::write("Task not found: {$task_name}", 'red');
            return 1;
        }
        
        $status = $task['db_task']['enabled'] ? 'ENABLED' : 'DISABLED';
        $status_color = $task['db_task']['enabled'] ? 'green' : 'red';
        $last_run = $task['last_run'] ? date('Y-m-d H:i:s', $task['last_run']) : 'Never';
        $next_run = $task['next_run'] ? date('Y-m-d H:i:s', $task['next_run']) : 'Unknown';
        $success_rate = $task['run_count'] > 0 ? 
            round(100 - ($task['error_count'] / $task['run_count'] * 100), 1) : 0;
        
        Minion_CLI::write("Task Details: {$task_name}", 'cyan');
        Minion_CLI::write("=============".str_repeat("=", strlen($task_name)), 'cyan');
        Minion_CLI::write("");
        
        Minion_CLI::write("Basic Information:", 'yellow');
        Minion_CLI::write("  Name: {$task_name}");
        Minion_CLI::write("  Class: {$task['db_task']['class']}");
        Minion_CLI::write("  Schedule: {$task['schedule']}");
        Minion_CLI::write("  Status: {$status}", $status_color);
        Minion_CLI::write("  Created: {$task['db_task']['created_at']}");
        Minion_CLI::write("  Updated: {$task['db_task']['updated_at']}");
        Minion_CLI::write("");
        
        Minion_CLI::write("Execution Statistics:", 'yellow');
        Minion_CLI::write("  Last run: {$last_run}");
        Minion_CLI::write("  Next run: {$next_run}");
        Minion_CLI::write("  Last status: {$task['last_status']}", 
                         $task['last_status'] == 'success' ? 'green' : 'red');
        Minion_CLI::write("  Last duration: ".($task['last_duration'] ? $task['last_duration'].'s' : 'N/A'));
        Minion_CLI::write("  Total runs: {$task['run_count']}");
        Minion_CLI::write("  Total errors: {$task['error_count']}");
        Minion_CLI::write("  Success rate: {$success_rate}%");
        Minion_CLI::write("  Is due: " . ($scheduler->_should_run($task['schedule'], $task['last_run']) ? 'YES' : 'NO'));
        Minion_CLI::write("");
        
        if (!empty($task['parameters']))
        {
            Minion_CLI::write("Parameters:", 'yellow');
            foreach ($task['parameters'] as $key => $value)
            {
                if (is_array($value) || is_object($value))
                {
                    $value = json_encode($value);
                }
                Minion_CLI::write("  {$key}: {$value}");
            }
            Minion_CLI::write("");
        }
        
        // Show Minion parameters if available
        $minion_params = $scheduler->get_task_parameters_info($task_name);
        if (!empty($minion_params))
        {
            Minion_CLI::write("Available Minion Parameters:", 'yellow');
            foreach ($minion_params as $param_name => $param_info)
            {
                Minion_CLI::write("  {$param_name}:", 'light_blue');
                Minion_CLI::write("    Type: {$param_info['type']}");
                Minion_CLI::write("    Default: ".$this->_format_parameter_value($param_info['default']));
                Minion_CLI::write("    Description: {$param_info['description']}");
            }
            Minion_CLI::write("");
        }
        
        return 0;
    }
    
    /**
     * Create a new task
     */
    protected function _create_task($scheduler, $params)
    {
        $name = $params['name'];
        $class = $params['class'];
        $schedule = $params['schedule'];
        $enabled = $params['enabled'] !== NULL ? (bool)$params['enabled'] : TRUE;
      
        // Parse parameters
        $parameters = array();
		//echo Debug::vars('201', $params['parameters']);
		//$ppp=$params['parameters'];
		//echo Debug::vars('203', $ppp);exit;
		//echo Debug::vars('202', json_decode($ppp, TRUE)); exit;;
		//echo Debug::vars('203', json_decode($params['parameters'], TRUE));exit;
        if ($params['parameters'])
        {
            $parameters = json_decode($params['parameters'], TRUE);
            if (json_last_error() !== JSON_ERROR_NONE)
            {
                Minion_CLI::write("Invalid JSON parameters: ".json_last_error_msg(), 'red');
                return 1;
            }
        }
 
        // Validate class exists
        if (!class_exists($class))
        {
            Minion_CLI::write("Task class not found: {$class}", 'red');
            Minion_CLI::write("Available classes:", 'yellow');
            $this->_show_available_classes();
            return 1;
        }
             
        // Validate cron schedule
        if (!$this->_validate_cron_schedule($schedule))
        {
            Minion_CLI::write("Invalid cron schedule: {$schedule}", 'red');
            return 1;
        }
        
        try
        {
			
            $scheduler->add_task($name, $class, $schedule, $enabled, $parameters);
            Minion_CLI::write("Task created successfully: {$name}", 'green');
            
            // Show task details
            $this->_show_task($scheduler, $name);
            
            return 0;
        }
        catch (Exception $e)
        {
            Minion_CLI::write("Error creating task: ".$e->getMessage(), 'red');
            return 1;
        }
    }
    
    /**
     * Update an existing task
     */
    protected function _update_task($scheduler, $params)
    {
        $name = $params['name'];
        $task = $scheduler->get_task($name);
        
        if (!$task)
        {
            Minion_CLI::write("Task not found: {$name}", 'red');
            return 1;
        }
        
        $updates = array();
        
        // Schedule update
        if ($params['schedule'])
        {
            if (!$this->_validate_cron_schedule($params['schedule']))
            {
                Minion_CLI::write("Invalid cron schedule: {$params['schedule']}", 'red');
                return 1;
            }
            $updates['schedule'] = $params['schedule'];
        }
        
        // Enabled/disabled update
        if ($params['enabled'] !== NULL)
        {
            $updates['enabled'] = (bool)$params['enabled'];
        }
        
        // Parameters update
        if ($params['parameters'])
        {
            $parameters = json_decode($params['parameters'], TRUE);
            if (json_last_error() !== JSON_ERROR_NONE)
            {
                Minion_CLI::write("Invalid JSON parameters: ".json_last_error_msg(), 'red');
                return 1;
            }
            $updates['parameters'] = $parameters;
        }
        
        if (empty($updates))
        {
            Minion_CLI::write("No updates specified. Use --schedule, --enabled, or --parameters", 'yellow');
            return 1;
        }
        
        try
        {
            // For simplicity, we'll delete and recreate the task
            // In a real implementation, you'd have an update method in Scheduler
            $this->_delete_task($scheduler, $name, TRUE);
            $this->_create_task($scheduler, array_merge($params, $updates));
            
            Minion_CLI::write("Task updated successfully: {$name}", 'green');
            return 0;
        }
        catch (Exception $e)
        {
            Minion_CLI::write("Error updating task: ".$e->getMessage(), 'red');
            return 1;
        }
    }
    
    /**
     * Delete a task
     */
    protected function _delete_task($scheduler, $task_name, $silent = FALSE)
    {
        $task = $scheduler->get_task($task_name);
        
        if (!$task)
        {
            if (!$silent) Minion_CLI::write("Task not found: {$task_name}", 'red');
            return 1;
        }
        
        if (!$silent)
        {
            $confirm = Minion_CLI::read("Are you sure you want to delete task '{$task_name}'? This will also delete all execution logs. (yes/no)", array('yes', 'no'));
            if ($confirm != 'yes')
            {
                Minion_CLI::write("Deletion cancelled", 'yellow');
                return 1;
            }
        }
        
        try
        {
            $db = $scheduler->_get_db();
            $task_id = $task['db_task']['id'];
            
            // Delete logs
            $db->query(Database::DELETE, "DELETE FROM `scheduler_logs` WHERE task_id = :task_id", 
                      array(':task_id' => $task_id));
            
            // Delete state
            $db->query(Database::DELETE, "DELETE FROM `scheduler_state` WHERE task_id = :task_id", 
                      array(':task_id' => $task_id));
            
            // Delete parameters
            $db->query(Database::DELETE, "DELETE FROM `scheduler_parameters` WHERE task_id = :task_id", 
                      array(':task_id' => $task_id));
            
            // Delete task
            $db->query(Database::DELETE, "DELETE FROM `scheduler_tasks` WHERE id = :task_id", 
                      array(':task_id' => $task_id));
            
            if (!$silent) Minion_CLI::write("Task deleted successfully: {$task_name}", 'green');
            return 0;
        }
        catch (Exception $e)
        {
            if (!$silent) Minion_CLI::write("Error deleting task: ".$e->getMessage(), 'red');
            return 1;
        }
    }
    
    /**
     * Enable a task
     */
    protected function _enable_task($scheduler, $task_name)
    {
        return $this->_set_task_enabled($scheduler, $task_name, TRUE);
    }
    
    /**
     * Disable a task
     */
    protected function _disable_task($scheduler, $task_name)
    {
        return $this->_set_task_enabled($scheduler, $task_name, FALSE);
    }
    
    /**
     * Set task enabled/disabled status
     */
    protected function _set_task_enabled($scheduler, $task_name, $enabled)
    {
        $task = $scheduler->get_task($task_name);
        
        if (!$task)
        {
            Minion_CLI::write("Task not found: {$task_name}", 'red');
            return 1;
        }
        
        try
        {
            $db = $scheduler->_get_db();
            $status = $enabled ? 'enabled' : 'disabled';
            
            $db->query(Database::UPDATE, "
                UPDATE `scheduler_tasks` 
                SET enabled = :enabled, updated_at = :updated_at 
                WHERE name = :name
            ", array(
                ':enabled' => (int)$enabled,
                ':updated_at' => date('Y-m-d H:i:s'),
                ':name' => $task_name
            ));
            
            Minion_CLI::write("Task {$status}: {$task_name}", 'green');
            return 0;
        }
        catch (Exception $e)
        {
            Minion_CLI::write("Error updating task: ".$e->getMessage(), 'red');
            return 1;
        }
    }
    
    /**
     * Show available task classes
     */
    protected function _show_available_classes()
    {
        $scheduler = Scheduler::factory();
        
        // This method would need to be implemented in Scheduler class
        // For now, we'll use a simple approach
        $task_files = Kohana::list_files('classes/Task');
        $classes = array();
        
        foreach ($task_files as $file)
        {
            if (is_array($file))
            {
                foreach ($file as $sub_file)
                {
                    if (is_string($sub_file))
                    {
                        $class_name = $this->_file_to_class_name($sub_file);
                        if ($class_name && class_exists($class_name))
                        {
                            $classes[] = $class_name;
                        }
                    }
                }
            }
            else
            {
                $class_name = $this->_file_to_class_name($file);
                if ($class_name && class_exists($class_name))
                {
                    $classes[] = $class_name;
                }
            }
        }
        
        if (!empty($classes))
        {
            Minion_CLI::write('Available Task Classes:', 'cyan');
            Minion_CLI::write('=======================', 'cyan');
            foreach (array_unique($classes) as $class)
            {
                Minion_CLI::write("  {$class}");
            }
            Minion_CLI::write("");
        }
    }
    
    /**
     * Convert file path to class name
     */
    protected function _file_to_class_name($file_path)
    {
        $file_path = str_replace('\\', '/', $file_path);
        $file_name = basename($file_path, '.php');
        
        if (strpos($file_path, 'classes/Task/') !== FALSE)
        {
            return 'Task_'.$file_name;
        }
        
        return NULL;
    }
    
    /**
     * Validate cron schedule
     */
    protected function _validate_cron_schedule($schedule)
    {
        $parts = preg_split('/\s+/', trim($schedule));
        return count($parts) === 5;
    }
    
    /**
     * Format parameter value for display
     */
    protected function _format_parameter_value($value)
    {
        if (is_array($value) || is_object($value))
        {
            return json_encode($value);
        }
        elseif (is_bool($value))
        {
            return $value ? 'true' : 'false';
        }
        elseif ($value === NULL)
        {
            return 'null';
        }
        
        return $value;
    }
    
    /**
     * Show help information
     */
    protected function _show_help()
    {
        Minion_CLI::write('Scheduler Task Management', 'cyan');
        Minion_CLI::write('=========================', 'cyan');
        Minion_CLI::write('');
        Minion_CLI::write('Usage:');
        Minion_CLI::write('  php minion taskmanager --list                    # List all tasks');
        Minion_CLI::write('  php minion taskmanager --show --name=TASK        # Show task details');
        Minion_CLI::write('  php minion taskmanager --create --name=NAME --class=CLASS --schedule=SCHEDULE [--enabled=1] [--parameters=JSON]');
        Minion_CLI::write('  php minion taskmanager --update --name=NAME [--schedule=SCHEDULE] [--enabled=0|1] [--parameters=JSON]');
        Minion_CLI::write('  php minion taskmanager --delete --name=TASK      # Delete a task');
        Minion_CLI::write('  php minion taskmanager --enable --name=TASK      # Enable a task');
        Minion_CLI::write('  php minion taskmanager --disable --name=TASK     # Disable a task');
        Minion_CLI::write('');
        Minion_CLI::write('Examples:');
        Minion_CLI::write('  php minion taskmanager --list');
        Minion_CLI::write('  php minion taskmanager --show --name=cleanup_task');
        Minion_CLI::write('  php minion taskmanager --create --name=backup --class=Task_Backup --schedule="0 2 * * *" --parameters=\'{"path":"/backups"}\'');
        Minion_CLI::write('  php minion taskmanager --update --name=backup --schedule="0 3 * * *"');
        Minion_CLI::write('  php minion taskmanager --enable --name=backup');
        Minion_CLI::write('  php minion taskmanager --delete --name=old_task');
        Minion_CLI::write('');
    }
    
    /**
     * Build validation rules
     */
    public function build_validation(Validation $validation)
    {
        return parent::build_validation($validation)
            ->rule('name', 'regex', array(':value', '/^[a-zA-Z0-9_-]+$/'))
            ->rule('class', 'regex', array(':value', '/^[a-zA-Z0-9_]+$/'))
            ->rule('enabled', 'in_array', array(':value', array('0', '1')))
            ->rule('connection', 'regex', array(':value', '/^[a-zA-Z0-9_-]+$/'));
    }
    
    /**
     * Get task help
     */
    public function get_help()
    {
        return "Scheduler Task Management\n\n"
             . "This task allows you to manage scheduler tasks in the database.\n\n"
             . "Examples:\n"
             . "  php minion taskmanager --list\n"
             . "  php minion taskmanager --create --name=backup --class=Task_Backup --schedule='0 2 * * *'\n"
             . "  php minion taskmanager --enable --name=backup\n"
             . "  php minion taskmanager --show --name=backup\n"
             . "  php minion taskmanager --delete --name=old_task";
    }
}
