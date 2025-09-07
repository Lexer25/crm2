<?php
abstract class Model_Report_Base {
    
    protected $_data = array();
    protected $_name;
    protected $_view_path;
    
    public function __construct()
    {
        // Имя будет установлено в дочернем классе
        $this->_name = strtolower(str_replace('Model_Report_', '', get_class($this)));
        $this->_update_view_path();
    }
    
    protected function _update_view_path()
    {
        $this->_view_path = Report_Factory::get_view_path($this->_name);
    }
    
    abstract public function generate();
    
    public function render()
    {
        if (!file_exists($this->_view_path)) {
            throw new Kohana_Exception('View not found for report: :name at :path', 
                array(
                    ':name' => $this->_name,
                    ':path' => $this->_view_path
                ));
        }
        
        // Импортируем переменные
        extract($this->_data, EXTR_SKIP);
        
        // Буферизуем вывод
        ob_start();
        include $this->_view_path;
        return ob_get_clean();
    }
    
    public function set($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }
    
    public function get($key, $default = null)
    {
        return isset($this->_data[$key]) ? $this->_data[$key] : $default;
    }
    
    public function get_data()
    {
        return $this->_data;
    }
    
    public function get_name()
    {
        return $this->_name;
    }
}
