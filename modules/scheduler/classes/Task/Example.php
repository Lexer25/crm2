<?php defined('SYSPATH') or die('No direct script access.');

class Task_Example extends Task_Base {
    
    public function execute()
    {
        $this->log('Starting example task');
        
        // Пример работы
        $this->log('10 Processing data...');
        
        // Имитация работы
        sleep(1);
        
        // Пример: запись в файл
        $this->_create_test_file();
        
        $this->log('18 Example task completed successfully');
        
        return TRUE;
    }
    
    protected function _create_test_file()
    {
        $file_path = APPPATH.'cache/example_task_'.date('Y-m-d_H-i-s').'.txt';
        $content = "Task executed at: ".date('Y-m-d H:i:s')."\n";
        $content .= "Task name: {$this->_name}\n";
        
        file_put_contents($file_path, $content);
        $this->log("Created test file: {$file_path}");
    }
}