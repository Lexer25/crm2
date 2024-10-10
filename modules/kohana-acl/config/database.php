<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	
	'aclcfg' => array(// сокращение от passofficeconfig
		'type'       => 'pdo',
		'connection' => array(
       		'dsn'        => 'sqlite:'.MODPATH .'\\kohana-acl\\Config\\acl_config.sqlite',
			'persistent' => FALSE,
    )),

	

	
);

