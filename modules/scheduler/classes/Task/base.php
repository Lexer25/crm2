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
    }
}