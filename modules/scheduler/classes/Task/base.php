<?php defined('SYSPATH') or die('No direct script access.');

abstract class Task_Base extends Task {
    
    /**
     * Логгирование
     */
    protected function log($message)
    {
        $log_path = Kohana::$config->load('scheduler.log.path');
        $timestamp = date('Y-m-d H:i:s');
        $message = "[{$timestamp}] [{$this->_name}] {$message}" . PHP_EOL;
        
        file_put_contents($log_path, $message, FILE_APPEND | LOCK_EX);
        
        // Также выводим в консоль при CLI выполнении
        if (PHP_SAPI == 'cli' && class_exists('Minion_CLI'))
        {
            Minion_CLI::write("[{$this->_name}] {$message}", 'light_blue');
        }
    }
    
    /**
     * Получение конфигурации задачи
     */
    protected function get_config()
    {
        $config = Kohana::$config->load('scheduler');
        $tasks = $config->get('tasks', array());
        
        return isset($tasks[$this->_name]) ? $tasks[$this->_name] : array();
    }
}
