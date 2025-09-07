<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
*17.10.2024
*Класс exportCSV - Класс для подготовки файла csv.
*вход - массив класса Report
*выход - ссылка на подготовленный файл.
*все входные данные должны быть в формате utf-8!!!
*/

class exportCSV
{
	public $filename;//ссылка на файл, подготовленный к экспорту
	public $makeOk;//результат подготовки файла. true - все в порядке, false - ошибка
	public $mess;//результат подготовки файла. true - все в порядке, false - ошибка
	
	public function __construct(Report $report = null)
	{
		//echo Debug::vars('18', $report);exit;
		/**2.03.2025 проверка наличия класса
		*
		*
		*/
		
		$filePresent=false;
			if (file_exists($report->fileName)) {
				// Файл существует
				echo 'Файл найден';
				$filePresent=true;
				
			} else {
				// Файл не существует
				echo 'Файл не найден';
				//throw new  Exception('Файл не найден. Повторите подготовку отчета.');
				
			}
		//echo Debug::vars('36', $report);exit;	
		if(($report instanceof Report) and ($filePresent)) 
		{
			
			
			//$file_name=$report->fileName.'_'.date('Y-m-d_H_i_s').".csv";
			$file_name=$report->fileName.".csv";
			
			$fp = fopen($file_name, 'w');//тут будет результат
			//$fp_source = fopen($report->fileName , 'r');//это источника заранее подготовленных строк.
				
			//собираю заголовок	Название отчета и головную организацию
			fputcsv ($fp, Array(iconv('UTF-8','CP1251', $report->titleReport), iconv('UTF-8','CP1251',$report->org)),';');
			//дата создания отчета
			fputcsv ($fp, Array(iconv('UTF-8','CP1251',__('dateCreated')),iconv('UTF-8','CP1251',$report->dateCreated)),';');
			
			//кто готовил и департамент
			
			fputcsv ($fp, Array(iconv('UTF-8','CP1251',__('fromUser')),$report->fromUser,iconv('UTF-8','CP1251',__('depatment')),$report->depatment),';');
			
			//заголовок таблицы
			$title=$report->titleColumn;
			//преобразую каждый элемент массива в Win1251
			foreach($title as $key=>$value)
				{
					$title[$key]=iconv('UTF-8','CP1251', $value);
				}
			
			fputcsv ($fp, $title,';');

						
			$filename = $report->fileName;

					if (($file = fopen($filename, 'r')) !== false) {
						// Читаем заголовки (первую строку). Она нам не нужна
						$headers = fgetcsv($file, 1000, ',');
						
						// Читаем остальные строки
						while (($row = fgetcsv($file, 1000, ',')) !== false) {
							
							$convertedRow=array();
							 foreach ($row as $field) {
								$convertedRow[] = iconv('UTF-8', 'Windows-1251//IGNORE', $field);
							}
		
		
							//echo Debug::vars('73', $row, $convertedRow);exit;
							fputcsv ($fp, $convertedRow,';');//записал строку в результирующий файл
											
						}
						
						fclose($file);
						//unlink($report->fileName);// удалить файл отчета
					} else {
						echo "Не удалось открыть файл";
					}



		
			fclose($fp); //Закрытие файла
			//echo Debug::vars('93');exit;
			//$content = Model::Factory('ReportWorkTime')->send_file($file_name);
			
			//echo Debug::vars('29', $file_name); exit;
			//$this->redirect('/report');
			$this->filename=$file_name;
			$this->makeOk=true;
			//echo Debug::vars('58', $this);exit;
		} else {
			$this->makeOk=false;
			$this->mess='Code 11. Нет объекта класса Report для экспорта.';
		}
		
	}
	
	
	
	
}
