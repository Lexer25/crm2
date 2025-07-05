<?php defined('SYSPATH' OR die('No direct access allowed.'));
	const DOOR=0;
	const CONFIG=2;
	const MANCARD=4;
	const REPORT=5;
	const MONITOR=6;
	const INTEGRATOR=8;
	const GUEST=13;
 return array(	 
 
 //вывод меню с учетом прав пользователя
	'configMenu'=>array(
			'home'=>array(),
			'org'=>array(MANCARD),
			'contact'=>array(MANCARD),
			'identity'=>array(MANCARD),
			'fastreg'=>array(GUEST),
			'Reports'=>array(REPORT),
			'passoffice'=>array(GUEST),
			'monitor'=>array(MANCARD, MONITOR),
			'acl'=>array(INTEGRATOR),
			'doors'=>array(DOOR)
		),
	//вывод меню без учета прав пользователя (т.к. указатели пусты)
	'_configMenu'=>array(
			'home'=>array(),
			'org'=>array(),
			'contact'=>array(),
			'identity'=>array(),
			'fastreg'=>array(),
			'Reports'=>array(),
			'passoffice'=>array(),
			'monitor'=>array(),
			'acl'=>array(),
			'doors'=>array()
			),
);