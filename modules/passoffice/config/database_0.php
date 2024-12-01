<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	
	'pocfg' => array(// сокращение от passofficeconfig
		'type'       => 'pdo',
		'connection' => array(
       		'dsn'        => 'sqlite:'.MODPATH .'\\passoffice\\Config\\passofficeconfig.sqlite',
			'persistent' => FALSE,
    )),

	

	
);

