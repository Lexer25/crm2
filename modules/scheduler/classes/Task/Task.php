<?php defined('SYSPATH') or die('No direct script access.');

abstract class Task_Base extends Task {
    
    protected $_parameters = array();
    protected $_db_task = NULL;
    
    public function __construct($name)
    {
        parent::__construct($name);
        $this->_load_parameters_from_database();
    }
    
    /**
     * Загрузка параметров из базы данных
     */
    protected function _load_parameters_from_database()
    {
        try
        {
            $db_task = Model_Scheduler_Task::get_by_name($this->_name);
            if ($db_task->loaded())
            {
                $this->_db_task = $db_task;
                $this->_parameters = $db_task->get_parameters();
                
                // Также загружаем параметры из шаблонов
                $parameter_templates = $db_task->get_parameter_templates();
                foreach ($parameter_templates as $template)
                {
                    if (!isset($this->_parameters[$template->name]))
                    {
                        $this->_parameters[$template->name] = $template->get_typed_value();
                    }
                }
            }
        }
        catch (Exception $e)
        {
            $this->log('Error loading parameters from database: '.$e->getMessage());
        }
    }
    
    /**
     * Получить параметр
     */
    protected function get_parameter($name, $default = NULL)
    {
        return isset($this->_parameters[$name]) ? $this->_parameters[$name] : $default;
    }
    
    /**
     * Получить все параметры
     */
    protected function get_parameters()
    {
        return $this->_parameters;
    }
    
    /**
     * Установить параметр (только для текущего выполнения)
     */
    protected function set_parameter($name, $value)
    {
        $this->_parameters[$name] = $value;
        return $this;
    }
    
    /**
     * Сохранить параметры в базу данных
     */
    protected function save_parameters()
    {
        if ($this->_db_task && $this->_db_task->loaded())
        {
            $this->_db_task->set_parameters($this->_parameters);
            return $this->_db_task->save();
        }
        return FALSE;
    }
    
    /**
     * Получить параметры для Minion
     */
    public function get_minion_parameters()
    {
        return array();
    }
    
    /**
     * Валидация параметров
     */
    public function validate_parameters(array $parameters)
    {
        return TRUE;
    }
    
    // ... остальные методы ...
}