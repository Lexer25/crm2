<?php defined('SYSPATH') or die('No direct script access.');

return array(
    // Основные настройки планировщика
    'log' => array(
        'enabled' => TRUE,
        'path' => APPPATH.'logs/scheduler.log',
    ),
    
    'lock' => array(
        'enabled' => TRUE,
        'file' => APPPATH.'cache/scheduler.lock',
        'timeout' => 300,
    ),
    
    // Настройки базы данных
    'database' => array(
        'enabled' => TRUE,
        'log_retention_days' => 30,
        'cleanup_old_logs' => TRUE,
        'auto_install' => TRUE, // Автоматическая установка таблиц при первом запуске
    ),
    
    // Автоматическая регистрация задач при первом запуске
    'auto_register_tasks' => array(
        'example_task' => array(
            'class' => 'Task_Example',
            'schedule' => '*/5 * * * *',
            'enabled' => TRUE,
            'parameters' => array(
                'output_file' => APPPATH.'logs/example_output.txt',
                'repeat_count' => 3,
                'enable_logging' => TRUE,
            ),
        ),
        'cleanup_task' => array(
            'class' => 'Task_Cleanup', 
            'schedule' => '0 2 * * *',
            'enabled' => TRUE,
            'parameters' => array(
                'cleanup_days' => 7,
                'backup_before_cleanup' => TRUE,
            ),
        ),
    ),
);