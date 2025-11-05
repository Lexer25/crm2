<?php defined('SYSPATH') or die('No direct script access.');

class Model_Scheduler_Parameter extends ORM {

    protected $_table_name = 'scheduler_parameters';
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
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 100)),
            ),
            'type' => array(
                array('not_empty'),
                array('in_array', array(':value', array('string', 'integer', 'boolean', 'json'))),
            ),
        );
    }
    
    /**
     * Получить значение параметра с приведением типа
     */
    public function get_typed_value()
    {
        switch ($this->type)
        {
            case 'integer':
                return (int)$this->value;
            case 'boolean':
                return (bool)$this->value;
            case 'json':
                return json_decode($this->value, TRUE);
            default:
                return $this->value;
        }
    }
    
    /**
     * Установить значение с автоматическим определением типа
     */
    public function set_auto_typed_value($value)
    {
        if (is_int($value))
        {
            $this->type = 'integer';
        }
        elseif (is_bool($value))
        {
            $this->type = 'boolean';
        }
        elseif (is_array($value) || is_object($value))
        {
            $this->type = 'json';
            $value = json_encode($value);
        }
        else
        {
            $this->type = 'string';
        }
        
        $this->value = $value;
        return $this;
    }
    
    /**
     * Добавить параметр к задаче
     */
    public static function add_parameter($task_id, $name, $value, $description = '', $is_required = FALSE)
    {
        $parameter = ORM::factory('Scheduler_Parameter')
            ->where('task_id', '=', $task_id)
            ->where('name', '=', $name)
            ->find();
            
        if (!$parameter->loaded())
        {
            $parameter = ORM::factory('Scheduler_Parameter');
            $parameter->task_id = $task_id;
            $parameter->name = $name;
            $parameter->created_at = date('Y-m-d H:i:s');
        }
        
        $parameter->set_auto_typed_value($value);
        $parameter->description = $description;
        $parameter->is_required = (int)$is_required;
        $parameter->updated_at = date('Y-m-d H:i:s');
        
        return $parameter->save();
    }
    
    /**
     * Получить параметры задачи
     */
    public static function get_task_parameters($task_id)
    {
        return ORM::factory('Scheduler_Parameter')
            ->where('task_id', '=', $task_id)
            ->find_all();
    }
}