<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
9.07.2024
класс для глобальных констант.
вызов констант в других файлах т.о.: 
	constants::MAX_VALUE,
	constants::DANGER
	constants::RFID.MAX_LENGTH
*/
class constants
{
	const MAX_VALUE = 10;
	const DANGER = 'danger';
	//const RFID_MAX_LENGTH = 8;
	const RFID_MIN_LENGTH = 4;
	const RFID_NOTE = 50;
	
	
	const ALERT_SUCCESS = 0;
	const ALERT_INFO = 1;
	const ALERT_WARNING = 2;
	const ALERT_ERROR = 3;

       
	
	public static  function RFID_MAX_LENGTH()
	{
		$result=-1;
		if(Kohana::$config->load('system')->get('baseFormatRfid') == 0)	$result= 8;
		if(Kohana::$config->load('system')->get('baseFormatRfid') == 1)	$result=  10;
		return $result;
		
	}
	
	
	public static  function RFID_MIN_LENGTH()
	{
		$result=4;
		
		return $result;
		
	}
	
	
	
	
	
}
