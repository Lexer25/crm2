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
			$csv=new ExportCsv(Session::instance()->get('report'));
			$csv->makeReport();
			$csv->sendFile();
			
			
		}
		if(Arr::get($_POST, 'savepdf')) 
		{
			$csv=new ExportCsv(Session::instance()->get('report'));
			$csv->makeReport();
			$csv->sendFile();
						
		}
		echo Debug::vars('44', $_POST, $_GET, Session::instance()->get('report'));exit;
	}
	
}
