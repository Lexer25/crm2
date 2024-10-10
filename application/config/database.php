<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(

	'fb' => array(
		'type'			=> 'pdo',
		'connection'	=> array(
			//'dsn'		=> 'odbc:VNII_2024_06_17',
			'dsn'		=> 'odbc:VNII_local',
			//'dsn'		=> 'odbc:SDUO',
			//'dsn'		=> 'odbc:wg',
			//'dsn'		=> 'odbc:'.Kohana::$config->load('main')->odbcname,
			'username'	=> 'SYSDBA',
			'password'	=> 'temp',
			//'password'	=> 'masterkey',
			'charset'   => 'windows-1251',
			)
		),
);

