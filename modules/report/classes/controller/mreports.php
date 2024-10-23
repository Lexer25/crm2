<?php defined('SYSPATH') or die('No direct script access.');
/**
Настройка системы: ввод и просмотр разных параметров.

*/
class Controller_mreports extends Controller_Template { 
		private $session;
		private $user;
		public $template = 'template';
	

	public function before()
	{
			
			parent::before();
			$this->session = Session::instance();
			$this->user = new User();
			
	}
	
	
	
	/*
	17.10.2024 шаблон тестового отчета
	*/
	
	public function action_stat()
	{
	
		//echo Debug::vars('29 report stat');exit;
		
		$report=new Report();
		
			
		Session::instance()->set('report', $report);
		$content = View::factory('report')
			->bind('report', $report)
			;
        $this->template->content = $content;
	}
	
	
	/*
	21.10.2024 отчет для Щербинки. Выбор параметров
	*/
	
	public function action_reportSelect()
	{
	
		
		$content = View::factory('reportSelect')
			
			;
        $this->template->content = $content;
	}
	
	/*
	18.10.2024 отчет для Щербинки статистика выданных карт
	*/
	
	
	/*
	21.10.2024 отчет для Щербинки. Подготовка отчета
	*/
	
	public function action_makeReport_0()
	{
	
		echo Debug::vars('69', $_POST);exit;
		$content = View::factory('reportSelect')
			
			;
        $this->template->content = $content;
	}
	
	/*
	18.10.2024 отчет для Щербинки статистика выданных карт
	*/
	
	
	
	
	
	
	public function action_makeReport()
	{
	
		//echo Debug::vars('29 report stat', $_POST);exit;
		$post=Validation::factory(Arr::get($_POST, 'dataReport'))
			->rule('id_report', 'not_empty')
			->rule('id_report', 'digit');
			
		if($post->check()){
		//номер 234 следует брать из post, где этот номер - фиксированный.	
			$report=Model::factory('mr_m234')->getReport1($post,$this->user);
		
			Session::instance()->set('report', $report);
			
			$content = View::factory('report1')
				->bind('report', $report)
				;
		} else {
			
			$content = View::factory('reportError', array(
			'mess'=> $post->errors(),
			));
		}
		
		
        $this->template->content = $content;
	}
	
	
	/*
		18.10.2024 экспорт результата
	*/
	public function action_export()
	{
		//echo Debug::vars('76',$_POST);exit;
		Log::instance()->add(Log::DEBUG, '63 '.Debug::vars($_POST));
		if(Arr::get($_POST, 'savecsv'))
		{
			$csv=new ExportCsv(Session::instance()->get('report'));
			//$csv->makeReport();
			//$csv->sendFile();
			
			
		};
		if(Arr::get($_POST, 'savexls'))
		{
			$csv=new ExportXlsx(Session::instance()->get('report'));
			//$csv->makeReport();
			//$csv->sendFile();
			
			
		}
		if(Arr::get($_POST, 'savepdf')) 
		{
			/*  $reportData=new ExportPdf(Session::instance()->get('report'));
			 $csv->makeReport();
			 $csv->sendFile(); */
		 	$reportData=Session::instance()->get('report');
			
			if(Kohana::find_file('views','exportpdf'))
				{
				// $content=View::Factory('report')
				// ->bind('report', $report); 
				
				$content=View::Factory('exportpdf')
					->bind('reportData', $reportData)
				 ; 
				
				
				} else {
					throw new  Exception('Нет файла view!');
				}
					
				//if(false){ // переключатель: true - делать экспорт в pdf, false - выводит отчет на экран браузера
				if(true){ // переключатель: true - делать экспорт в pdf, false - выводит отчет на экран браузера
				
					require_once APPPATH . 'vendor/dompdf/autoload.inc.php';
					Dompdf\Autoloader::register();
								
					$dompdf = new Dompdf\Dompdf();
					$dompdf->setPaper("A4");				
					$dompdf->loadHtml($content, 'UTF-8');
					$dompdf->render();
					
			
					$color = array(0, 0, 0);
					$font = null;
					$size = 8;
					$text = "Стр. {PAGE_NUM} из {PAGE_COUNT}";

					$canvas = $dompdf->getCanvas();
					$pageWidth = $canvas->get_width();
					$pageHeight = $canvas->get_height();
					$width=10;
					$canvas = $dompdf->get_canvas();
					$canvas->page_text($pageWidth/2, $pageHeight - 40, $text, $font, $size, $color);
					$dompdf->stream();
				} else {
//echo Debug::vars('49', $content);//exit;
						$this->template->content = $content;
				}
						 
		}
		
	}
	
}
