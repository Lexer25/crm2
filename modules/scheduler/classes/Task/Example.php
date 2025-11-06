<?php defined('SYSPATH') or die('No direct script access.');

class Task_Example extends Task_Base {
    
    public function execute()
    {
        // Начало выполнения
        $this->_start_execution();
        
        try
        {
            $this->log('Starting example task');
            
            // Получаем параметры из базы данных или конфигурации
            $output_file = $this->get_parameter('output_file', APPPATH.'logs/example_output'.date('Y-m-d_H-i-s').'.txt');
			$output_file = APPPATH.'logs/example_output'.date('Y-m-d_H-i-s').'.txt';
            $repeat_count = $this->get_parameter('repeat_count', 1);
            $enable_logging = $this->get_parameter('enable_logging', TRUE);
            $custom_message = $this->get_parameter('custom_message', 'Hello from scheduler!');
            
            $this->log("Output file: {$output_file}");
            $this->log("Repeat count: {$repeat_count}");
            $this->log("Enable logging: " . ($enable_logging ? 'YES' : 'NO'));
            $this->log("Custom message: {$custom_message}");
            
            // Создаем директорию если не существует
            $output_dir = dirname($output_file);
            $this->_create_directory($output_dir);
            
            // Основная логика задачи
            $results = array();
            
            for ($i = 0; $i < $repeat_count; $i++)
            {
                $iteration = $i + 1;
                
                if ($enable_logging)
                {
                    $this->log("Processing iteration: {$iteration}/{$repeat_count}");
                }
                
                // Имитация работы
                $start_time = microtime(TRUE);
                
                // Выполняем какую-то работу
                $result = $this->_process_iteration($iteration, $custom_message);
                $results[] = $result;
                
                $execution_time = round(microtime(TRUE) - $start_time, 4);
                
                if ($enable_logging)
                {
                    $this->log("Iteration {$iteration} completed in {$execution_time}s");
                }
                
                // Небольшая пауза между итерациями
                if ($iteration < $repeat_count)
                {
                    sleep(1);
                }
            }
            
            // Записываем результаты в файл
            $this->_write_results_to_file($output_file, $results);
            
            $this->log("Example task completed successfully");
            $this->log("Total iterations: {$repeat_count}");
            $this->log("Results written to: {$output_file}");
            
            // Завершение выполнения
            $this->_end_execution();
            
            return TRUE;
        }
        catch (Exception $e)
        {
            $this->log("Task failed: " . $e->getMessage(), 'ERROR');
            $this->_end_execution();
            throw $e;
        }
    }
    
    /**
     * Обработка одной итерации
     */
    protected function _process_iteration($iteration, $message)
    {
        $result = array(
            'iteration' => $iteration,
            'timestamp' => date('Y-m-d H:i:s'),
            'message' => $message . " (iteration {$iteration})",
            'random_number' => rand(1, 1000),
            'memory_usage' => memory_get_usage(true),
        );
        
        // Небольшая случайная задержка
        usleep(rand(10000, 50000)); // 10-50 ms
        
        return $result;
    }
    
    /**
     * Запись результатов в файл
     */
    protected function _write_results_to_file($output_file, $results)
    {
        $content = "Example Task Execution Report\n";
        $content .= "Generated at: " . date('Y-m-d H:i:s') . "\n";
        $content .= "Task: {$this->_name}\n";
        $content .= "Total iterations: " . count($results) . "\n";
        $content .= str_repeat("=", 50) . "\n\n";
        
        foreach ($results as $index => $result)
        {
            $content .= "Iteration: {$result['iteration']}\n";
            $content .= "Time: {$result['timestamp']}\n";
            $content .= "Message: {$result['message']}\n";
            $content .= "Random number: {$result['random_number']}\n";
            $content .= "Memory usage: " . $this->_format_memory($result['memory_usage']) . "\n";
            $content .= str_repeat("-", 30) . "\n";
        }
        
        // Статистика
        $content .= "\nStatistics:\n";
        $content .= "Total memory used: " . $this->_format_memory(memory_get_peak_usage(true)) . "\n";
        
        if (file_put_contents($output_file, $content, LOCK_EX) !== FALSE)
        {
            $this->log("Results written to file: {$output_file}");
        }
        else
        {
            throw new Exception("Failed to write results to file: {$output_file}");
        }
        
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
                'description' => 'Path to output file',
                'default' => APPPATH.'logs/example_output.txt',
            ),
            'repeat_count' => array(
                'type' => 'integer',
                'description' => 'Number of iterations to process',
                'default' => 3,
            ),
            'enable_logging' => array(
                'type' => 'boolean',
                'description' => 'Enable detailed logging for each iteration',
                'default' => TRUE,
            ),
            'custom_message' => array(
                'type' => 'string',
                'description' => 'Custom message to include in output',
                'default' => 'Hello from scheduler task!',
            ),
        );
    }
    
    /**
     * Валидация параметров
     */
    public function validate_parameters(array $parameters)
    {
        if (isset($parameters['repeat_count']))
        {
            $repeat_count = (int)$parameters['repeat_count'];
            if ($repeat_count < 1 || $repeat_count > 100)
            {
                throw new Exception('Repeat count must be between 1 and 100');
            }
        }
        
        if (isset($parameters['output_file']))
        {
            $output_file = $parameters['output_file'];
            $dir = dirname($output_file);
            
            if (!is_writable($dir) && !is_writable(dirname($dir)))
            {
                throw new Exception("Output directory is not writable: {$dir}");
            }
        }
        
        return TRUE;
    }
}
