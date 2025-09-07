<?php
class Controller_Report extends Controller_Template {
	
	public $template = 'template';
    
    public function action_index()
    {
        $report_name = $this->request->param('report');
        
        try {
            $report = Report_Factory::create($report_name);//возвращает экземпляр модели отчета, которая содержит имя, дату, форму для заполнения, форму для результата и набор параметров.
          
				
			
            $content = View::factory('report/layout')
                ->set('report_name', $report_name)
                ->set('report_title', ucfirst($report_name).' Report')
                ->set('form_content', $report->get_form())
                ->set('result_content', '')
                ->set('active_tab', 'form');
                
            //echo Debug::vars('18', $view);exit;
			//$this->response->body($view);
			$this->template->content = $content;
            
        } catch (Exception $e) {
           // $this->response->body('Error: '.$e->getMessage());
			$this->template->content = 'Error: '.$e->getMessage();
        }
    }
    
    public function action_generate()
    {
        // echo Debug::vars('34', $_GET);//exit;
        // echo Debug::vars('35', $_POST);exit;
		$report_name = $this->request->param('report');
        $params = $this->request->query();
        
        try {
            $report = Report_Factory::create($report_name);
            $report->set_params($params);
            $report->generate($params);
           // echo Debug::vars('43', $report);exit;
            // Сохраняем отчет в сессии для кнопки "Сохранить"
            Session::instance()->set('current_report', array(
                'name' => $report_name,
                'data' => $report->get_data(),
                'params' => $params
            ));
          //echo Debug::vars('50', $report);//exit;
         // echo Debug::vars('51', $report->render());exit;
          
		  $view = View::factory('report/layout')
                ->set('report_name', $report_name)
                ->set('report_title', ucfirst($report_name).' Report')
                ->set('form_content', $report->get_form())
                ->set('result_content', $report->render())
                ->set('active_tab', 'result');
                
           // $this->response->body($view);
			$this->template->content = $view;
            
        } catch (Exception $e) {
           // $this->response->body('Error: '.$e->getMessage());
			$this->template->content = 'Error: '.$e->getMessage();
        }
    }
    
    
	
	public function action_save()
    {
		//echo Debug::vars('73');exit;       
	   $report_data = Session::instance()->get('current_report');
	   //$report=Cache::instance()->get(Session::instance()->id());
		$report=Arr::get(Arr::get($report_data,'data'), 'report');
        //echo Debug::vars('75', $report_data);//exit;
        //echo Debug::vars('78', $report);//exit;
        if (!$report_data) {
            $this->redirect('reports');
        }
        
		//echo Debug::vars('80',$report_data );exit;
        // try {
          // $report=Cache::instance()->get(Session::instance()->id());
			//Session::instance()->delete('report');//очищаю сессию от отчета
			//echo Debug::vars('121', $report);exit;
			$csv=new ExportCsv($report);
			//echo Debug::vars('118', $csv->filename);exit;
			if($csv->makeOk) 
			{
				//echo Debug::vars('125', $this);exit;
				$content = Model::Factory('mreport')->send_file($csv->filename);//передача файла через браузер
				//удалить файл с диска, чтобы не занимал место
			//echo Debug::vars('129', $content);exit;
				if (file_exists($csv->filename)) {
					if (unlink($csv->filename)) {
						echo "Файл успешно удален!"; exit;
					} else {
						echo "Не удалось удалить файл"; exit;
					}
				} else {
					echo "Файл не существует";
				}
				
			} else {
				//echo Debug::vars('142', $this);exit;
				$this->redirect($this->request->referrer());
			}
            
        // } catch (Exception $e) {
            // $this->response->body('Error saving report: '.$e->getMessage());
			// $this->template->content ='113 Error saving report: '.$e->getMessage();
        // }
    }
    
    public function action_save_deep()
    {
		//echo Debug::vars('73');exit;       
	   $report_data = Session::instance()->get('current_report');
        
        if (!$report_data) {
            $this->redirect('reports');
        }
        
		//echo Debug::vars('80',$report_data );exit;
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
                
            //$this->response->body($view);
			$this->template->content = $view;
            
        } catch (Exception $e) {
            $this->response->body('Error saving report: '.$e->getMessage());
			$this->template->content ='113 Error saving report: '.$e->getMessage();
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
