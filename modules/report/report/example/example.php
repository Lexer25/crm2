<?php defined('SYSPATH') OR die('No direct access allowed.');

/** 13.09.2025 пример модели для отчетов
* это модель, которая готовит данные для формы (раздел __construct) и готовит результат (раздел generate)
*/
class Model_Report_example extends Model_Report_Base {
	
	
	public $report_title='Example13';
	 
	 
	 public function __construct($report_name, $data=null)
    {
        parent::__construct();
	    $this->_name = $report_name;//имя отчета надо задавать как свойство (см. стр. 9)
		$result=array(
			'report_title'=>'report_title_'.$this->_name,
			'data'=>$data,//$data - набор параметров для form передаются в форму
		);
		$this->set('report', $result);
    }

	
	public function generate($post=array())
	{
		
		$result=array( //это пример подготовленного отчета
			array('column1'=>'column1', 'column2'=>'column2', 'column3'=>'column3', 'column4'=>Debug::vars($post) ),
			'report_name'=>$this->_name,
		);
		$this->set('report', $result);
		return $result;
	}
	
	
}
	

