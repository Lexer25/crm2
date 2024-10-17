<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
*17.10.2024
*Класс exportCSV - Класс для создания файла csv.
*вход - массив класса Report
*выход - ссылка на подготовленный файл.
*/

class exportCSV
{
	
	public function __construct(Report $report)
	{
		
			
		$file_name="report_wt_test".date('Y-m-d_H_i_s').".csv";
		
		$fp = fopen($file_name, 'w');
		$f_title=array('Отчет рабочего времени сотрудника '.$report->fromUser);
		
		
		//собираю заголовок	Название отчета и головную организацию
		fputcsv ($fp, Array(iconv('UTF-8','CP1251', $report->titleReport), iconv('UTF-8','CP1251',$report->org)),';');
		//дата создания отчета
		fputcsv ($fp, Array('',iconv('UTF-8','CP1251',$report->dateCreated)),';');
		
		//кто готовил и департамент
		fputcsv ($fp, Array(iconv('UTF-8','CP1251',__('fromUser')),iconv('UTF-8','CP1251',$report->fromUser),iconv('UTF-8','CP1251',__('depatment')),iconv('UTF-8','CP1251',$report->depatment)),';');
		
		fputcsv ($fp, $report->titleColumn,';');

		foreach ($report->rowData as $key=>$value)
		{
			//echo Debug::vars('29', $value); exit;
			fputcsv ($fp, $value,';');
		}
			
		
	
		fclose($fp); //Закрытие файла
		$content = Model::Factory('ReportWorkTime')->send_file($file_name);
		
		//echo Debug::vars('29', $file_name); exit;
		$this->redirect('/report');
		
		
	}
	
	
	
	
	
	
	
}
