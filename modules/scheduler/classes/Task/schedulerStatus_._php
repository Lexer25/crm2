<?php defined('SYSPATH') or die('No direct script access.');

//c:\xampp\php\php.exe c:\xampp\htdocs\crm2\modules\minion\minion --task=schedulerStatus --id_ts=2

 class Task_schedulerStatus extends Minion_Task {
    
    /**
     * Логгирование
     */
	 
	  protected $_options = array(
        // param name => default value
     
        'id_ts'   => '2',
		);
		
		
     protected function _execute(array $params)
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