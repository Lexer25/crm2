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
}