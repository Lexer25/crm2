<?php
class Controller_Report extends Controller_Template {
	
	public $template = 'template';
	public function before()
	{
		parent::before();
	}
    
    public function action_index()
    {
        $report_name = $this->request->param('report');
      //  try {
            $report = Report_Factory::create($report_name);//возвращает экземпляр модели отчета, которая содержит имя, дату, форму для заполнения, форму для результата и набор параметров.
					
			$content = View::factory('report/layout')
                ->set('report_name', $report_name)
                ->set('report_title',  $report->report_title)
                ->set('form_content', $report->get_form())
                ->set('result_content', '')
                ->set('active_tab', 'form')
				;
				//echo Debug::vars('25', $content);exit;
			$this->template->content = $content;
            
        // } catch (Exception $e) {
          // $this->response->body('Error: '.$e->getMessage());
			// $this->template->content = 'Error: '.$e->getMessage();
        // }
    }
    
    /**7.09.2025 генерация данных для отчета
	* "_data" => string(3) "133"
    * "report" => string(7) "example"
	*/
	public function action_generate()
    {
      	$report_name = $this->request->param('report');
        $params = $this->request->query();// тут все полученные данные
		//echo Debug::vars('37', $params);exit;
       // try {
			Session::instance()->delete('current_report');
            $report = Report_Factory::create($report_name);//вызываю модель, которая готовит нужные данные.
		
            $report->set_params($params);//передал все входные параметры в модель

            $report->generate($params);//генерация данных. Теперь у экземпляра report заполнено поле data=>report, и при этом данные сохранены в файл
            // Сохраняем отчет в сессии для кнопки "Сохранить"
            
			Session::instance()->set('current_report', array(
                'name' => $report_name,
                'data' => $report->get_data(),
                'params' => $params
            ));
			
          // echo Debug::vars('51', $params);exit;         
		  $content = View::factory('report/layout')
                ->set('report_name', $report_name)
                ->set('report_title', $report->report_title)
                ->set('form_content', $report->get_form())
                ->set('result_content', $report->render())//данные отчета вставляются в форму layout в раздел result
                ->set('active_tab', 'result')
                ->set('params', $params)
				 ->set('user', $this->user)//переда параметры текущего авторизованного пользователя
				;
             
			$this->template->content = $content;
            
         // } catch (Exception $e) {
          
			 // $this->template->content = 'Error: '.$e->getMessage();
         // }
    }
    
    
	
	public function action_save()
    {
		//echo Debug::vars('74', $_GET);//exit;       
		//echo Debug::vars('75', $_POST);//exit;       
		//echo Debug::vars('73');exit;       
	   $report_data = Session::instance()->get('current_report');
	 	$report=Arr::get(Arr::get($report_data,'data'), 'report');
        if (!$report_data) {
            $this->redirect('reports');
        }
     		$csv=new ExportCsv($report);
			if($csv->makeOk) 
			{
				//$content = Model::Factory('mreport')->send_file($csv->filename);//передача файла через браузер
				$content = $this->send_file($csv->filename);//передача файла через браузер
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
    
	/**13.09.2025
	*
	*/
	public function action_result()
{
    $report_name = $this->request->param('report');
    $report_data = Session::instance()->get('current_report_data');
    
    if (!$report_data) {
        $this->redirect('reports/'.$report_name);
    }

    $view = View::factory('report/result')
        ->set('report_name', $report_name)
        ->set('report_content', $report_data['content'])
        ->set('params', $report_data['params'])
        ->set('stats', array(
            'generation_time' => number_format($report_data['generation_time'], 3) . ' sec',
            'total_records' => $report_data['total_records']
        ));

    $this->response->body($view);
}


	/** исходный код от deepseek
	*/
    public function action_save_вууз()
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
	
	public function send_file ($filePath, $file_dest='test')// скачать указанный файл в браузер
	{
			//https://habr.com/ru/post/151795/
		set_time_limit(0);
		ignore_user_abort(true);
		$file_dest='report_'.date('Y_m_d_H-i-s').'.csv';
		if (!file_exists($filePath)) {
			die('File not found');
		}
		
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file_dest).'"');
		header('Content-Length: ' . filesize($filePath));
		
		$chunkSize = 1024 * 1024; // 1MB chunks
		$handle = fopen($filePath, 'rb');
		
		while (!feof($handle)) {
			echo fread($handle, $chunkSize);
			ob_flush();
			flush();
		}
		
		fclose($handle);
		
		// Удаляем файл
		unlink($filePath);
		
		exit;
	}
	
	
}
