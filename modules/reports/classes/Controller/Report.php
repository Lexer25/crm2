<?php
class Controller_Report extends Controller {
    
    public function action_index()
    {
        $report_name = $this->request->param('report');
        
        try {
            $report = Report_Factory::create($report_name);//возвращает экземпляр модели отчета, которая содержит имя, дату, форму для заполнения, форму для результата и набор параметров.
            // echo Debug::vars('10', $report);exit;
			// echo Debug::vars('11', $report_name);//exit;
			// echo Debug::vars('12', ucfirst($report_name));//exit;
			// echo Debug::vars('13', $report);//exit;
			// echo Debug::vars('14', $report->get_form());exit;//а вот тут должна вернуться форма html с заполненными данными

				
			
            $view = View::factory('report/layout')
                ->set('report_name', $report_name)
                ->set('report_title', ucfirst($report_name).' Report')
                ->set('form_content', $report->get_form())
                ->set('result_content', '')
                ->set('active_tab', 'form');
                
            //echo Debug::vars('18', $view);exit;
			$this->response->body($view);
            
        } catch (Exception $e) {
            $this->response->body('Error: '.$e->getMessage());
        }
    }
    
    public function action_generate()
    {
        $report_name = $this->request->param('report');
        $params = $this->request->query();
        
        try {
            $report = Report_Factory::create($report_name);
            $report->set_params($params);
            $report->generate($params);
            
            // Сохраняем отчет в сессии для кнопки "Сохранить"
            Session::instance()->set('current_report', array(
                'name' => $report_name,
                'data' => $report->get_data(),
                'params' => $params
            ));
            
            $view = View::factory('report/layout')
                ->set('report_name', $report_name)
                ->set('report_title', ucfirst($report_name).' Report')
                ->set('form_content', $report->get_form())
                ->set('result_content', $report->render())
                ->set('active_tab', 'result');
                
            $this->response->body($view);
            
        } catch (Exception $e) {
            $this->response->body('Error: '.$e->getMessage());
        }
    }
    
    public function action_save()
    {
        $report_data = Session::instance()->get('current_report');
        
        if (!$report_data) {
            $this->redirect('reports');
        }
        
        try {
            $report = Report_Factory::create($report_data['name']);
            $report->set_params($report_data['params']);
            
            // Генерируем отчет снова для сохранения
            $report->generate($report_data['params']);
            
            // Сохранение в файл
            $filename = $report_data['name'].'_'.date('Y-m-d_His').'.html';
            $filepath = DOCROOT.'reports/'.$filename;
            
            // Создаем папку если не существует
            if (!is_dir(DOCROOT.'reports')) {
                mkdir(DOCROOT.'reports', 0755, true);
            }
            
            // Сохраняем HTML
            file_put_contents($filepath, $report->render());
            
            // Можно также сохранить в базу данных
            // $this->_save_to_database($report_data);
            
            $view = View::factory('report/result')
                ->set('report_name', $report_data['name'])
                ->set('saved', true)
                ->set('filename', $filename)
                ->set('report_content', $report->render());
                
            $this->response->body($view);
            
        } catch (Exception $e) {
            $this->response->body('Error saving report: '.$e->getMessage());
        }
    }
    
    public function action_download()
    {
        $report_data = Session::instance()->get('current_report');
        
        if (!$report_data) {
            $this->redirect('reports');
        }
        
        $format = $this->request->param('format', 'html');
        
        try {
            $report = Report_Factory::create($report_data['name']);
            $report->set_params($report_data['params']);
            $report->generate($report_data['params']);
            
            switch ($format) {
                case 'pdf':
                    $this->_download_pdf($report, $report_data['name']);
                    break;
                case 'csv':
                    $this->_download_csv($report, $report_data['name']);
                    break;
                default:
                    $this->_download_html($report, $report_data['name']);
            }
            
        } catch (Exception $e) {
            $this->response->body('Error: '.$e->getMessage());
        }
    }
    
    protected function _download_html($report, $name)
    {
        $filename = $name.'_'.date('Y-m-d_His').'.html';
        
        $this->response->headers('Content-Type', 'text/html');
        $this->response->headers('Content-Disposition', 
            'attachment; filename="'.$filename.'"');
        $this->response->body($report->render());
    }
}
