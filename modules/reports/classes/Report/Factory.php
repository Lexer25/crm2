<?php
class Report_Factory {
    
    public static function create($report_name, $data=null)
    {
        // Приводим к правильному формату имени класса
        $class_name = 'Model_Report_'.ucfirst(strtolower($report_name));
        
        if (!class_exists($class_name)) {
            // Пробуем загрузить вручную
            $file_path = self::get_model_path($report_name, $data=null);
 
		    if (file_exists($file_path)) {
                require_once $file_path;
            } else {
                throw new Kohana_Exception('Report not found: :name class_name :class_name ', 
                    array(':name' => $report_name, ':class_name'=>$class_name));
            }
        }
      
        return new $class_name($report_name, $data=null);
    }
    
	
	
    public static function get_model_path($report_name)
    {
        $report_name = strtolower($report_name);
        return MODPATH.'reports/reports/'.$report_name.'/'.ucfirst($report_name).'.php';
    }
    
    public static function get_view_path($report_name)
    {
        $report_name = strtolower($report_name);
        return MODPATH.'reports/reports/'.$report_name.'/view.php';
    }
    
    public static function get_available_reports()
    {
        $reports = array();
        $reports_dir = MODPATH.'reports/reports/';
        
        if (is_dir($reports_dir)) {
            $dirs = glob($reports_dir.'*', GLOB_ONLYDIR);
            foreach ($dirs as $dir) {
                $report_name = basename($dir);
                if (file_exists($dir.'/'.ucfirst($report_name).'.php')) {
                    $reports[$report_name] = ucfirst($report_name);
                }
            }
        }
        
        return $reports;
    }
	
	 public static function get_form_path($report_name)
    {
        $report_name = strtolower($report_name);
        return MODPATH.'reports/reports/'.$report_name.'/form.php';
    }
}
