<?php defined('SYSPATH') or die('No direct script access.');

class Model_Scheduler_Log extends ORM {

    protected $_table_name = 'scheduler_logs';
    protected $_primary_key = 'id';
    
    protected $_belongs_to = array(
        'task' => array(
            'model' => 'Scheduler_Task',
            'foreign_key' => 'task_id',
        ),
    );
    
    public function rules()
    {
        return array(
            'status' => array(
                array('not_empty'),
                array('in_array', array(':value', array('success', 'error'))),
            ),
        );
    }
    
    /**
     * Добавить запись в лог
     */
    public static function add_log($task_id, $status, $duration, $memory_usage, $output = '')
    {
        $log = ORM::factory('Scheduler_Log');
        $log->task_id = $task_id;
        $log->status = $status;
        $log->duration = $duration;
        $log->memory_usage = $memory_usage;
        $log->output = $output;
        $log->created_at = date('Y-m-d H:i:s');
        
        return $log->save();
    }
    
    /**
     * Получить логи задачи
     */
    public static function get_task_logs($task_id, $limit = 100)
    {
        return ORM::factory('Scheduler_Log')
            ->where('task_id', '=', $task_id)
            ->order_by('created_at', 'DESC')
            ->limit($limit)
            ->find_all();
    }
    
    /**
     * Очистить старые логи
     */
    public static function cleanup_old_logs($days = 30)
    {
        $date = date('Y-m-d H:i:s', strtotime("-$days days"));
        
        DB::delete('scheduler_logs')
            ->where('created_at', '<', $date)
            ->execute();
            
        return DB::count_last_query();
    }
	
	 public function get_execution_parameters()
    {
        if (!empty($this->parameters))
        {
            return json_decode($this->parameters, TRUE);
        }
        
        return array();
    }
    
    /**
     * Установить параметры выполнения
     */
    public function set_execution_parameters(array $parameters)
    {
        $this->parameters = json_encode($parameters);
        return $this;
    }
    
    /**
     * Добавить запись в лог с параметрами
     */
    public static function add_log_with_parameters($task_id, $status, $duration, $memory_usage, $output = '', $parameters = array())
    {
        $log = ORM::factory('Scheduler_Log');
        $log->task_id = $task_id;
        $log->status = $status;
        $log->duration = $duration;
        $log->memory_usage = $memory_usage;
        $log->output = $output;
        $log->set_execution_parameters($parameters);
        $log->created_at = date('Y-m-d H:i:s');
        
        return $log->save();
    }
}