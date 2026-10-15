<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
Модель для работы с конфигурацией как с единым целым
*/

class Model_mreport extends Model
{
	
	public function getReport1($id_org){// Статистика
		
			$month=20;
			$ttime=time()-60*60*24*30*$month;
			$timeFrom=date('Y-m-d', mktime(0, 0, 0, date('m', $ttime), 1, date('Y', $ttime)));
			$sql='SELECT EXTRACT(year from p.time_stamp) as yearFrom, EXTRACT(month from p.time_stamp) as montFrom, count(*) FROM people p
			join organization_getchild(1, '.Arr::get(Auth::instance()->get_user(), 'ID_ORGCTRL').') og on og.id_org=p.id_org
			where p.time_stamp>\''.$timeFrom.'\'
				GROUP BY 1, 2
				order by 1,2';
			//echo Debug::vars('21', $sql);exit;
			$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->as_array();
			//заменяю номер месяца на его название
			$monthes = array('NullMonth', 'Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь', 'Декабрь');
			foreach ($query as $key=>$value)
			{
				$query[$key]['MONTFROM']=Arr::get($monthes, $value['MONTFROM']).' ('.$value['MONTFROM'].')';
			}
		
			$titleArray=array('YEARFROM', 'MONTFROM', 'COUNT' );
			return array('title'=>$titleArray, 'data'=>$query);
	}
	
	/**2.03.2025 Передача файла через браузер.
	*$file_sourc - какой файл передать
	*$file_dest - под каким именем передать
	*$report->fileName.'_'.date('Y-m-d_H_i_s')
	*/
	
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
