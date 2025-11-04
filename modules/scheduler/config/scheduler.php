<?php defined('SYSPATH') or die('No direct script access.');

return array(
    // Задачи для выполнения
    'tasks' => array(
        'example_task' => array(
            'class' => 'Task_Example',
            'schedule' => '* * * * *', // Каждую минуту
            'enabled' => TRUE,
        ),
        'cleanup_task' => array(
            'class' => 'Task_Cleanup',
            'schedule' => '0 2 * * *', // Каждый день в 2:00
            'enabled' => TRUE,
        ),
    ),
    
    // Настройки логгирования
    'log' => array(
        'enabled' => TRUE,
        'path' => APPPATH.'logs/scheduler.log',
    ),
    
    // Настройки блокировки (предотвращение параллельного выполнения)
    'lock' => array(
        'enabled' => TRUE,
        'file' => APPPATH.'cache/scheduler.lock',
        'timeout' => 300, // 5 минут
    ),
);