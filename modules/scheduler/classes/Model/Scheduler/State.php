<?php defined('SYSPATH') or die('No direct script access.');

class Model_Scheduler_State extends ORM {

    protected $_table_name = 'scheduler_state';
    protected $_primary_key = 'task_id';
    
    protected $_belongs_to = array(
        'task' => array(
            'model' => 'Scheduler_Task',
            'foreign_key' => 'task_id',
        ),
    );
    
    /**
     * Обновить состояние задачи
     */
    public static function update_state($task_id, $last_run, $next_run, $duration, $status)
    {
        $state = ORM::factory('Scheduler_State', $task_id);
        
        if (!$state->loaded())
        {
            $state = ORM::factory('Scheduler_State');
            $state->task_id = $task_id;
            $state->total_runs = 0;
            $state->total_errors = 0;
        }
        
        $state->last_run = $last_run;
        $state->next_run = $next_run;
        $state->last_duration = $duration;
        $state->last_status = $status;
        $state->total_runs++;
        
        if ($status == 'error')
        {
            $state->total_errors++;
        }
        
        $state->updated_at = date('Y-m-d H:i:s');
        
        return $state->save();
    }
    
    /**
     * Получить состояние задачи
     */
    public static function get_state($task_id)
    {
        return ORM::factory('Scheduler_State', $task_id);
    }
    
    /**
     * Сбросить статистику задачи
     */
    public static function reset_stats($task_id)
    {
        $state = ORM::factory('Scheduler_State', $task_id);
        
        if ($state->loaded())
        {
            $state->total_runs = 0;
            $state->total_errors = 0;
            $state->last_duration = NULL;
            $state->last_status = NULL;
            $state->updated_at = date('Y-m-d H:i:s');
            
            return $state->save();
        }
        
        return FALSE;
    }
	
	
	 /**
     * Инициализация состояния для новой задачи
     */
    public static function init_state($task_id)
    {
        $state = ORM::factory('Scheduler_State', $task_id);
        
        if (!$state->loaded())
        {
            $state = ORM::factory('Scheduler_State');
            $state->task_id = $task_id;
            $state->total_runs = 0;
            $state->total_errors = 0;
            $state->updated_at = date('Y-m-d H:i:s');
            
            return $state->save();
        }
        
        return TRUE;
    }
	
}