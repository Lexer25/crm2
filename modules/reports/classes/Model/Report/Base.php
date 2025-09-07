<?php
abstract class Model_Report_Base {
    
     protected $_data = array();//это результат работы отчета, подготовленные данные
    protected $_name;
    protected $_view_path;
    protected $_form_path;
    protected $_params = array();//это набор входных значений
    
    public function __construct()
    {
        $this->_name = strtolower(str_replace('Model_Report_', '', get_class($this)));
        $this->_update_paths();
    }
    
    protected function _update_paths()
    {
        $this->_view_path = Report_Factory::get_view_path($this->_name);
        $this->_form_path = Report_Factory::get_form_path($this->_name);
    }
    
    abstract public function generate($params = array());
    
    public function get_form()
    {
        if (!file_exists($this->_form_path)) {
            return $this->_get_default_form();
        }
        
        // Передаем переменные в форму
        $params = $this->_params;
        $report_name = $this->_name;
        
        ob_start();
        include $this->_form_path;
        return ob_get_clean();
    }
    
    public function render()
    {
        if (!file_exists($this->_view_path)) {
            throw new Kohana_Exception('View not found for report: :name', 
                array(':name' => $this->_name));
        }
        extract($this->_data, EXTR_SKIP);//преобразует массив key=>value в набор $key=$value 
       // extract($this->_params , EXTR_SKIP);//преобразует массив key=>value в набор $key=$value 
		//echo Debug::vars('46', $this->_data);//exit;
		//echo Debug::vars('47', $this->_view_path);//exit;
		ob_start();
		
        include $this->_view_path;
		
        return ob_get_clean();
    }
    
    protected function _get_default_form()
    {
        return '
        <form method="get" action="" class="report-form">
            <div class="form-group">
                <label>Date From:</label>
                <input type="date" name="date_from" value="'.date('Y-m-01').'" class="form-control">
            </div>
            <div class="form-group">
                <label>Date To:</label>
                <input type="date" name="date_to" value="'.date('Y-m-d').'" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Prepare Report</button>
        </form>';
    }
    
    public function set_params($params)
    {
        $this->_params = $params;
        return $this;
    }
    
    public function get_params()
    {
        return $this->_params;
    }
    
    public function set($key, $value)//можно устанавливать _data как набор значений из массива
    {
        $this->_data[$key] = $value;
        return $this;
    }
    
    public function get_data()// можно получить массив _data
    {
        return $this->_data;
    }
    
    public function get_name()
    {
        return $this->_name;
    }
}
