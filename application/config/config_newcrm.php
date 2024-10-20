<?php defined('SYSPATH') or die('No direct access allowed.');
return array(

		'view_settings'=>true,// показывать ли пункт Настройка в хидере?
		//'iphost'=>'10.110.161.2',// тут надо указать IP адрес сервера СКУД
		'iphost'=>'127.0.0.1',// тут надо указать IP адрес сервера СКУД
		'siteurl'=>'crm2',// 
		'contactListIdView'=> true,// показывать id_pep в листе контактов
		'contactListTabNumView'=> false,// показывать id_pep в листе контактов

	'version' => array(
		'minor' => '3',
		'major' => '6.1'),
	
	'use_acl'=>false,
	'role_default'=>'admin',
	'table_view_max_contact'=>'500',//максимальное количество получаемых идентификаторов для вывода на страницу
	
	
	//'listMenu'=>'sidebar_0',// ссылка на файл правого меню
	//'listMenu'=>'sidebar_vnii',// ссылка на файл правого меню для ВНИИЖТ
	//'listMenu'=>'sidebar_akr',// ссылка на файл правого меню для Акрихина
	
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