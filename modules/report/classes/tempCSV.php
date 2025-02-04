<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
*04.02.2025
*Класс tempCSV - Класс для создания файла csv и временного хранения данных.
*вход - имя файла
*выход - ссылка на подготовленный файл.
*все входные данные должны быть в формате utf-8!!!
*/

class tempCSV
{
	
	public $fileName = 'C:\\xampp\\htdocs\\crm2\\reportDefault.tmp';//имя создаваемого файла
	public $fp;
	
	public function __construct()
	{
			
		$this->fp=$this->makeFile($this->fileName);		
		
	}
	
	/**4.02.2025 открываю файл для чтения
	*@input $filename - имя открываемого файла
	*@output - указать ресурса.
	*/
	public function getFile($fileName)
	{
		
		$this->fp=fopen($this->fileName, "r");	
		return;
	}
	
	/**4.02.2025 открываю файл для записи
	*@input $filename - имя создавамого файла
	*@output - указать ресурса.
	*/
	public function makeFile($fileName)
	{
		return fopen($fileName, 'w');
	}
	
	/**4.02.2025 закрываю файл для записи
	*@input $fp - указатель ресурса
	*@output - пока не знаю.
	*/
	public function closeFile()
	{
				
		return fclose($this->fp); //Закрытие файла
	}
	
	
	/**4.02.2025 добавляю строку в файл
	*@input $fp - указатель ресурса
	*@output - пока не знаю.
	*/
	public function addRow(array $row)
	{
				
		return fputcsv ($this->fp, $row);//добавил строку в файл/ возвращает количество записанных символом или false
	}
	
	
	/**4.02.2025 получить строку из файла
	*@output - строка из файла.
	*/
	public function getRow()
	{
				
		return fgetcsv ($this->fp);//добавил строку в файл/ возвращает количество записанных символом или false
	}
	
	
	
	
	
}
