<?php defined('SYSPATH') or die('No direct script access.');
/**
Настройка системы: ввод и просмотр разных параметров.

*/
class Controller_mreports extends Controller_Template { 
		private $session;
		public $template = 'template';
	

	public function before()
	{
			
			parent::before();
			$this->session = Session::instance();
			
	}
	
	
	
	/*
	17.12.2023 вывод списка конфигурационных групп
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
	
	
	public function action_export()
	{
		
		if(Arr::get($_POST, 'savecsv'))
		{
			$csv=new ExportCsv(Session::instance()->get('report'));
			$csv->makeReport();
			$csv->sendFile();
			
			
		};
		if(Arr::get($_POST, 'savexls'))
		{
			$csv=new ExportXlsx(Session::instance()->get('report'));
			$csv->makeReport();
			$csv->sendFile();
			
			
		}
		if(Arr::get($_POST, 'savepdf')) 
		{
			/*  $csv=new ExportPdf(Session::instance()->get('report'));
			 $csv->makeReport();
			 $csv->sendFile(); */
		 	
			if(Kohana::find_file('views','report'))
				{
				// $content=View::Factory('report')
				// ->bind('report', $report); 
				
				$content=View::Factory('testpdf')
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
