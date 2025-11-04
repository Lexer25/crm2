<?php defined('SYSPATH') or die('No direct script access.');

class Task_Example extends Task_Base {
    
    public function execute()
    {
        $this->log('Example task executed successfully');
        
        // Пример: очистка временных файлов
        $this->_clean_temp_files();
        
        // Пример: отправка email
        $this->_send_notifications();
        
        return TRUE;
    }
    
    protected function _clean_temp_files()
    {
        $temp_dir = APPPATH.'cache/temp/';
        if (is_dir($temp_dir))
        {
            $files = glob($temp_dir.'*');
            $now = time();
            
            foreach ($files as $file)
            {
                if (is_file($file) && ($now - filemtime($file) > 3600)) // Старше 1 часа
                {
                    unlink($file);
                }
            }
        }
    }
    
    protected function _send_notifications()
    {
        // Пример отправки уведомлений
        // Email::factory('Subject', 'Message')->send();
    }
}