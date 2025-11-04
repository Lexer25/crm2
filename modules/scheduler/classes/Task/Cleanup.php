<?php defined('SYSPATH') or die('No direct script access.');

class Task_Cleanup extends Task_Base {
    
    public function execute()
    {
        $this->log('Starting cleanup task');
        
        $cleaned = 0;
        $cleaned += $this->_clean_cache();
        $cleaned += $this->_clean_temp();
        $cleaned += $this->_clean_logs();
        
        $this->log("Cleanup completed. Total files cleaned: {$cleaned}");
        
        return TRUE;
    }
    
    protected function _clean_cache()
    {
        $cache_dir = APPPATH.'cache/';
        return $this->_delete_old_files($cache_dir, 24 * 3600, 'cache'); // Старше 24 часов
    }
    
    protected function _clean_temp()
    {
        $temp_dir = APPPATH.'temp/';
        if ( ! is_dir($temp_dir))
        {
            return 0;
        }
        return $this->_delete_old_files($temp_dir, 3600, 'temp'); // Старше 1 часа
    }
    
    protected function _clean_logs()
    {
        $logs_dir = APPPATH.'logs/';
        return $this->_delete_old_files($logs_dir, 7 * 24 * 3600, 'logs'); // Старше 7 дней
    }
    
    protected function _delete_old_files($directory, $max_age, $type = 'files')
    {
        if ( ! is_dir($directory))
        {
            $this->log("Directory not found: {$directory}");
            return 0;
        }
        
        $files = glob($directory.'*');
        $now = time();
        $deleted = 0;
        
        foreach ($files as $file)
        {
            if (is_file($file) && ($now - filemtime($file) > $max_age))
            {
                if (unlink($file))
                {
                    $deleted++;
                    $this->log("Deleted old {$type} file: ".basename($file));
                }
                else
                {
                    $this->log("Failed to delete file: ".basename($file));
                }
            }
        }
        
        $this->log("Deleted {$deleted} old {$type} files from ".basename($directory));
        return $deleted;
    }
}