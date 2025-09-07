<?php
class Controller_Report extends Controller {
    
    public function action_index()
    {
        
		
		$report_name = $this->request->param('report');
        $format = $this->request->query('format') ?: 'html';
        
        // Логируем для отладки
        Kohana::$log->add(Log::DEBUG, 'Loading report: '.$report_name);
		
		// В начале action_index()
Kohana::$log->add(Log::DEBUG, '15 Report name: '.$report_name);
Kohana::$log->add(Log::DEBUG, '16 Model path: '.Report_Factory::get_model_path($report_name));
Kohana::$log->add(Log::DEBUG, '16 View path: '.Report_Factory::get_view_path($report_name));

// Проверяем существование файлов
if (!file_exists(Report_Factory::get_model_path($report_name))) {
    throw new Kohana_Exception('Model file not found for report: '.$report_name);
} else {
	
	Kohana::$log->add(Log::DEBUG, '24 Model file  found (!) for report: '.$report_name);
}


        
        try {
            $report = Report_Factory::create($report_name);
            
            // Генерация отчета
            $report->generate(
                $this->request->query('date_from'),
                $this->request->query('date_to')
            );
            
            // Вывод в разных форматах
            switch ($format) {
                case 'json':
                    $this->response->headers('Content-Type', 'application/json');
                    $this->response->body(json_encode($report->get_data()));
                    break;
                case 'csv':
                    $this->_render_csv($report);
                    break;
                default:
                    $this->response->body($report->render());
            }
            
        } catch (Exception $e) {
            Kohana::$log->add(Log::ERROR, 'Report error: '.$e->getMessage());
            $this->response->body('Error: '.$e->getMessage());
        }
    }
    
    public function action_list()
    {
        // Показываем доступные отчеты
        $reports = Report_Factory::get_available_reports();
        
        $view = View::factory('report/list')
            ->set('reports', $reports);

        $this->response->body($view);
    }
    
    protected function _render_csv($report)
    {
        $data = $report->get_data();
        $csv = '';
        
        if (isset($data['sales_data'])) {
            foreach ($data['sales_data'] as $row) {
                $csv .= implode(',', $row)."\n";
            }
        }
        
        $this->response->headers('Content-Type', 'text/csv');
        $this->response->headers('Content-Disposition', 
            'attachment; filename="'.$report->get_name().'.csv"');
        $this->response->body($csv);
    }
}
