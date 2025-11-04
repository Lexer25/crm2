<?php defined('SYSPATH') or die('No direct script access.');

return array(
    'tasks' => array(
        'example_task' => array(
            'class' => 'Task_Example',
            'schedule' => '*/5 * * * *', // Каждые 5 минут
            'enabled' => TRUE,
        ),
        'cleanup_task' => array(
            'class' => 'Task_Cleanup',
            'schedule' => '0 2 * * *', // Каждый день в 2:00
            'enabled' => TRUE,
        ),
    ),
    
    'log' => array(
        'enabled' => TRUE,
        'path' => APPPATH.'logs/scheduler.log',
    ),
    
    'lock' => array(
        'enabled' => TRUE,
        'file' => APPPATH.'cache/scheduler.lock',
        'timeout' => 300,
    ),
);