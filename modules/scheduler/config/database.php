<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	//база данных для щедулера
		'scheduler_db' => array(// 
		'type'       => 'Pdosqlite',
		'connection' => array(
       		//'dsn'        => 'sqlite:'.APPPATH .'\\Config\\scheduler.sqlite',
			'dsn'        => 'sqlite:'.MODPATH.'scheduler/config/scheduler.sqlite',
			'persistent' => FALSE,
    )),
	
	
);

