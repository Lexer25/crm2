<?php defined('SYSPATH') OR die('No direct access allowed.');

/** 13.09.пример модели для отчетов
*
*/
class Model_Report_example extends Model_Report_Base {
	
	
	public $report_title='Example13';
	 
	 
	 public function __construct($report_name, $data=null)
    {
        parent::__construct();
		//echo Debug::vars('19', $report_name, $data=null);exit;
        $this->_name = $report_name;
		$result=array(
			'report_title'=>'report_title_'.$this->_name,
			'data'=>$data,
		);
		$this->set('report', $result);
    }

	
	public function generate($post=array())
	{
		//echo Debug::vars('12', $post);//exit;
		$result=array(
			array('column1'=>'column1', 'column2'=>'column2', 'column3'=>'column3', 'column4'=>Debug::vars($post) ),
			'report_name'=>$this->_name,
		);
		$this->set('report', $result);
		return $result;
	}
	
	
}
	

