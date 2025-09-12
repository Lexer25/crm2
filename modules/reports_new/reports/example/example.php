<?php defined('SYSPATH') OR die('No direct access allowed.');

/** пример модели для report
*
*/
class Model_Report_example extends Model_Report_Base {
	
	
	private $selectYear;
	private $selectMonth;
	 
	 
	 public function __construct()
    {
        parent::__construct();
        $this->_name = 'example';
    }

	
	public function generate($post=array())
	{
		echo Debug::vars('12', $post);//exit;
		$result=array(
			array('column1'=>'column1', 'column2'=>'column2', 'column3'=>'column3', 'column4'=>Debug::vars($post) )
		);
		$this->set('report', $result);
		return $result;
	}
	
	
}
	

