<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	
	'config_cards' => array(
		'type'       => 'pdo',
		'connection' => array(
       		'dsn'        => 'sqlite:'.MODPATH .'\\tuner\\classes\\Kohana\\Config\\config_contacts.sqlite',
			'persistent' => FALSE,
    )),

	

	
);

