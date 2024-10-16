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
		
			//получил список групп конфигурации
		$getStat=Model::factory('mreport')->getStat_0();//отчет статистика для Щербинки
		
		$fl = $this->session->get('alert', '');
		$this->session->delete('alert');
		
		$content = View::factory('stat/list')
			->bind('alert', $fl)
			->bind('getStat', $getStat)
			;
        $this->template->content = $content;
	}
	
	
	
}
