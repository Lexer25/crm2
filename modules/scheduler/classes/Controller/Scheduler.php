<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Scheduler extends Controller {
    
    public function before()
    {
        // Разрешаем выполнение только через CLI
        if (PHP_SAPI != 'cli')
        {
            throw new HTTP_Exception_403('Access denied');
        }
        
        parent::before();
    }
    
    public function action_index()
    {
        $scheduler = Scheduler::factory();
        $scheduler->run();
    }
    
    public function action_status()
    {
        $scheduler = Scheduler::factory();
        $status = $scheduler->get_status();
        
        echo "Scheduler Status:\n";
        echo "================\n\n";
        
        foreach ($status as $task_name => $task_status)
        {
            echo "Task: {$task_name}\n";
            echo "Schedule: {$task_status['schedule']}\n";
            echo "Last run: " . ($task_status['last_run'] ? date('Y-m-d H:i:s', $task_status['last_run']) : 'Never') . "\n";
            echo "Next run: " . ($task_status['next_run'] ? date('Y-m-d H:i:s', $task_status['next_run']) : 'Unknown') . "\n";
            echo "Is due: " . ($task_status['is_due'] ? 'Yes' : 'No') . "\n";
            echo "---\n";
        }
    }
}