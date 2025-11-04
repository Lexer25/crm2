<?php defined('SYSPATH') or die('No direct script access.');

class Minion_Task_Task extends Minion_Task {

    protected $_options = array(
        'name' => NULL,
        'list' => FALSE,
        'run' => FALSE,
        'enable' => NULL,
        'disable' => NULL,
    );

    protected function _execute(array $params)
    {
        if ($params['list']) {
            return $this->_list_all_tasks();
        }

        if ($params['run'] && $params['name']) {
            return $this->_run_task($params['name']);
        }

        if ($params['enable'] && $params['name']) {
            return $this->_enable_task($params['name']);
        }

        if ($params['disable'] && $params['name']) {
            return $this->_disable_task($params['name']);
        }

        Minion_CLI::write('Use --help for usage information', 'yellow');
        return 1;
    }

    protected function _list_all_tasks()
    {
        $config = Kohana::$config->load('scheduler');
        $tasks = $config->get('tasks', array());
        
        Minion_CLI::write('Configured Tasks:', 'cyan');
        Minion_CLI::write('=================', 'cyan');
        
        foreach ($tasks as $name => $task_config) {
            $enabled = $task_config['enabled'] ? 'ENABLED' : 'DISABLED';
            $color = $task_config['enabled'] ? 'green' : 'red';
            
            Minion_CLI::write("{$name}:", 'yellow');
            Minion_CLI::write("  Class: {$task_config['class']}");
            Minion_CLI::write("  Schedule: {$task_config['schedule']}");
            Minion_CLI::write("  Status: {$enabled}", $color);
            Minion_CLI::write("");
        }
        
        return 0;
    }

    protected function _run_task($name)
    {
        // Реализация запуска конкретной задачи
        $scheduler = Scheduler::factory();
        $task = $scheduler->get_task($name);
        
        if (!$task) {
            Minion_CLI::write("Task '{$name}' not found!", 'red');
            return 1;
        }
        
        try {
            Minion_CLI::write("Running task: {$name}", 'green');
            $task['instance']->execute();
            Minion_CLI::write("Task completed successfully", 'green');
            return 0;
        } catch (Exception $e) {
            Minion_CLI::write("Task failed: " . $e->getMessage(), 'red');
            return 1;
        }
    }

    protected function _enable_task($name)
    {
        return $this->_toggle_task($name, TRUE);
    }

    protected function _disable_task($name)
    {
        return $this->_toggle_task($name, FALSE);
    }

    protected function _toggle_task($name, $enable)
    {
        $config = Kohana::$config->load('scheduler');
        $tasks = $config->get('tasks', array());
        
        if (!isset($tasks[$name])) {
            Minion_CLI::write("Task '{$name}' not found!", 'red');
            return 1;
        }
        
        $status = $enable ? 'enabled' : 'disabled';
        $tasks[$name]['enabled'] = $enable;
        
        // Сохраняем изменения в конфиг (если нужно)
        Minion_CLI::write("Task '{$name}' {$status}", 'green');
        return 0;
    }
}