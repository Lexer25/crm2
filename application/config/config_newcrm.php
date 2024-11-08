<?php defined('SYSPATH') or die('No direct access allowed.');
return array(

		'view_settings'=>true,// показывать ли пункт Настройка в хидере?
		'iphost'=>'192.168.0.18',// тут надо указать IP адрес сервера СКУД
		//'iphost'=>'127.0.0.1:80',// тут надо указать IP адрес сервера СКУД
		'siteurl'=>'crm2',// 
		'contactListIdView'=> true,// показывать id_pep в листе контактов
		'contactListTabNumView'=> false,// показывать id_pep в листе контактов

	'version' => array(
		'minor' => '3',
		'major' => '6.6'),
	
	'use_acl'=>false,
	'role_default'=>'admin',
	'table_view_max_contact'=>'100',//максимальное количество получаемых идентификаторов для вывода на страницу
	
	
	//набор левого меню, которое надо показывать по левому краю.
	//для разных объектов этот набор меню может быть разным.
	'configLeftMenu'=>array(
			'home',
			'org',
			'contact',
			'identity',
			'fastreg',
			'Reports',
			),

	'module'=>array(
		'org'=>true,
		'contact'=>true,
		'card'=>true,
		'guest'=>true,
		'event'=>false,
		'queue'=>false,
		'user'=>false,
		'stat'=>false,
		'devices'=>false,
		'doors'=>false,
		),
	
		
	
);