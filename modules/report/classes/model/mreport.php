<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
Модель для работы с конфигурацией как с единым целым
*/

class Model_mreport extends Model
{
	
	public function getStat_0(){// Статистика
		
		$month=20;
		
			
			$ttime=time()-60*60*24*30*$month;
			$timeFrom=date('Y-m-d', mktime(0, 0, 0, date('m', $ttime), 1, date('Y', $ttime)));
		
		

			$sql='SELECT EXTRACT(year from p.time_stamp) as yearFrom, EXTRACT(month from p.time_stamp) as montFrom, count(*) FROM people p
			where p.time_stamp>\''.$timeFrom.'\'
				GROUP BY 1, 2
				order by 1,2';
			//	echo Debug::vars('21', $sql);exit;
			$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->as_array();
			$titleArray=array('YEARFROM', 'MONTFROM', 'COUNT' );
			return array('title'=>$titleArray, 'data'=>$query);
	}
	
}
	

