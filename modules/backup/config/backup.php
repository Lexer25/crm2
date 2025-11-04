<?php defined('SYSPATH') or die('No direct script access.');

return array(
   
	'default' => array(
        'database' => array(
		
			//$_connectName='fb',
			//$about=Model::factory('Parkdb')->aboutDB($_connectName),
			
            'type'      => 'firebird',
            'host'      => 'localhost',
            //'host'      => iconv('cp866','UTF-8//IGNORE', Arr::get($about, 'Server')),
            //'host'      => Arr::get($about, 'Server'),
           // 'database'  => '/path/to/your/database.fdb',
			'database'		=> 'localhost:C:\\rrr\\HL_2025_07_21.GDB',
			//'database'		=> iconv('cp866','UTF-8//IGNORE', Arr::get($about, 'pathDB')),
			//'database'		=> Arr::get($about, 'pathDB'),
            'username'  => 'SYSDBA',
            'password'  => 'temp',
            'charset'   => 'UTF8',
			'gbak' => 'C:\\Program Files (x86)\\Firebird\Firebird_1_5_6\\bin\\gbak.exe',	
        ),
        'backup' => array(
            'path'          => BACKUP_PATH,
            'compress'      => TRUE,
            'max_files'     => 10, // максимальное количество хранимых бэкапов
            'prefix'        => 'backup_',
        ),
		
    ),
	
	
	
);
