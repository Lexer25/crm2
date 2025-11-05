<?php defined('SYSPATH') or die('No direct script access.');

class Task_Example extends Task_Base {
    
    public function execute()
    {
        $this->log('Starting example task with parameters');
        
        // Получаем параметры
        $output_file = $this->get_parameter('output_file', 'example_output.txt');
        $repeat_count = $this->get_parameter('repeat_count', 1);
        $enable_logging = $this->get_parameter('enable_logging', TRUE);
        $data_array = $this->get_parameter('data_array', array());
        
        $this->log("Output file: {$output_file}");
        $this->log("Repeat count: {$repeat_count}");
        $this->log("Enable logging: ".($enable_logging ? 'YES' : 'NO'));
        
        // Пример работы с параметрами
        for ($i = 0; $i < $repeat_count; $i++)
        {
            $content = "Iteration: ".($i + 1)."\n";
            $content .= "Task: {$this->_name}\n";
            $content .= "Time: ".date('Y-m-d H:i:s')."\n";
            $content .= "Parameters: ".json_encode($this->get_parameters())."\n";
            
            if ($enable_logging)
            {
                $this->log("Processing iteration: ".($i + 1));
            }
            
            // Записываем в файл
            file_put_contents($output_file, $content, FILE_APPEND);
        }
        
        $this->log('Example task completed successfully');
        
        return TRUE;
    }
    
    /**
     * Параметры для Minion
     */
    public function get_minion_parameters()
    {
        return array(
            'output_file' => array(
                'type' => 'string',
                'description' => 'Output file path',
                'default' => 'example_output.txt',
            ),
            'repeat_count' => array(
                'type' => 'integer', 
                'description' => 'Number of repetitions',
                'default' => 1,
            ),
            'enable_logging' => array(
                'type' => 'boolean',
                'description' => 'Enable detailed logging',
                'default' => TRUE,
            ),
            'data_array' => array(
                'type' => 'json',
                'description' => 'Additional data as JSON',
                'default' => '[]',
            ),
        );
    }
    
    /**
     * Валидация параметров
     */
    public function validate_parameters(array $parameters)
    {
        if (isset($parameters['repeat_count']) && $parameters['repeat_count'] < 1)
        {
            throw new Exception('Repeat count must be at least 1');
        }
        
        if (isset($parameters['output_file']) && empty($parameters['output_file']))
        {
            throw new Exception('Output file cannot be empty');
        }
        
        return TRUE;
    }
}