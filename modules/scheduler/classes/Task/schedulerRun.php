<?php defined('SYSPATH') or die('No direct script access.');

//c:\xampp\php\php.exe c:\xampp\htdocs\crm2\modules\minion\minion --task=schedulerRun --id_ts=2
//c:\xampp\php\php.exe c:\xampp\htdocs\crm2\modules\minion\minion --task=schedulerRun

 class Task_schedulerRun extends Minion_Task {
    
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
        $scheduler->run();
		// echo Debug::vars('22');exit;
		//Log::instance()->add(Log::NOTICE, '408'. Debug::vars($key));
    }
}