<?php defined('SYSPATH') or die('No direct script access.');

abstract class Task {
    
    protected $_name;
    
    public function __construct($name)
    {
        $this->_name = $name;
    }
    
    /**
     * Основной метод выполнения задачи
     */
    abstract public function execute();
    
    /**
     * Получение имени задачи
     */
    public function get_name()
    {
        return $this->_name;
    }
    
    /**
     * Получить параметр (базовая реализация)
     */
    public function get_parameter($name, $default = NULL)
    {
        return $default;
    }
    
    /**
     * Установить параметр (базовая реализация)
     */
    public function set_parameter($name, $value)
    {
        // Базовая реализация ничего не делает
        // Должна быть переопределена в дочерних классах
        return $this;
    }
    
    /**
     * Получить все параметры (базовая реализация)
     */
    public function get_parameters()
    {
        return array();
    }
    
    /**
     * Получить параметры для Minion (базовая реализация)
     */
    public function get_minion_parameters()
    {
        return array();
    }
    
    /**
     * Валидация параметров (базовая реализация)
     */
    public function validate_parameters(array $parameters)
    {
        return TRUE;
    }
}
