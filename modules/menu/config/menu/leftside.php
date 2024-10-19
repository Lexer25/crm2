<?php defined('SYSPATH' OR die('No direct access allowed.'));
/**
 * 06.10.2024
 * перечень всех пунктов меню
 * если 'visible' => false, то пункт меню не будет показан
 * если 'visible' => true или отсутсвует, то пункт меню будет показан
 * */
 
return [
	'view' => 'templates/menu/bootstrap/navbar',
	'items' => [
		'home'=>[
					'url'     => '/',
					'title'   => 'home',
					'icon'    => 'icon_home.png',
					'tooltip' => 'home'
				],
		'org'=>[
					'url'     => 'companies',
					'title'   => 'companies',
					'icon'    => 'icon_companies.png',
					'tooltip' => 'sidebar.companieslist',
					'attributes'=> ['data-method' => 'ajax'],
					'items'   => [
						'list'=>[
									'url'     => 'companies',
									'icon'    => '',
									'title'   => 'sidebar.companieslist',
									'tooltip' => 'sidebar.companieslist',
									'visible' => true,
								],
						'add'=>[
								'url'     => 'companies/edit/0',
								'icon'    => '',
								'title'   => 'sidebar.addcompany',
								'tooltip' => 'sidebar.addcompany'
							]
					]
				],
	
		'identity'=>[
					'url'     => 'identity',
					'icon'    => 'icon_card.png',
					'title'   => 'identity',
					'tooltip' => 'identity',
					'visible' => true, // можно запретить показ, если false
					'items'   => [
						'list'=>[
									'url'     => 'cards/select/rfid',
									'icon'    => '',
									'title'   => 'sidebar.rfid',
									'tooltip' => 'sidebar.rfid',
								],
						'cardexpired'=>[
								'url'     => 'cards/expired',
								'icon'    => '',
								'title'   => 'sidebar.cardexpired',
								'tooltip' => 'sidebar.cardexpired'
							],
					
							
					]
				],
		
		'contact'=>[
					'url'     => 'contacts',
					'icon'    => 'icon_contacts.png',
					'title'   => 'contacts',
					'tooltip' => 'contacts',
					'visible' => true, // можно запретить показ, если false
					'items'   => [
						'list'=>[
									'url'     => 'contacts/disp/activeOnlyList',
									'icon'    => '',
									'title'   => 'sidebar.contactslist',
									'tooltip' => 'sidebar.contactslist',
								],
						'add'=>[
								'url'     => 'contacts/disp/addContact',
								'icon'    => '',
								'title'   => 'sidebar.addcontact',
								'tooltip' => 'sidebar.addcontact'
							],
						'fired'=>[
								'url'     => 'contacts/disp/deletedList',
								'icon'    => '',
								'title'   => 'sidebar.deletedcontact',
								'tooltip' => 'sidebar.deletedcontact'
							]
							
					]
				],
		
		
		
		'fastreg'=>[	//быстрая регистрация в выбранную организацию
					'url'     => '',
					'icon'    => 'icon_contacts.png',
					'title'   => 'contacts.host',
					'tooltip' => 'contacts',
					'visible' => true, // можно запретить показ, если false
					'items'   => [
						'contactslist'=>[
									'url'     => 'contacts/disp/HostOnlyList',
									'icon'    => '',
									'title'   => 'sidebar.contactslist',
									'tooltip' => 'sidebar.contactslist',
								],
						'hostAddContact'=>[
								'url'     => 'contacts/disp/hostAddContact',
								'icon'    => '',
								'title'   => 'sidebar.addcontact',
								'tooltip' => 'sidebar.addcontact'
							],
						'hostDeletedList'=>[
								'url'     => 'contacts/disp/hostDeletedList',
								'icon'    => '',
								'title'   => 'sidebar.deletedcontact',
								'tooltip' => 'sidebar.deletedcontact'
							]
							
					]
					
				],
		

		'passoffice'=>[	//бюро пропусков
					'url'     => 'passoffice.passoffice',
					'icon'    => 'icon_guest.png',
					'title'   => 'passoffice.passoffice',
					'tooltip' => 'passoffice.passoffice',
					'visible' => true, // можно запретить показ, если false
					'items'   => [
						'guestslist'=>[
									'url'     => 'passoffices/guest',
									'icon'    => '',
									'title'   => 'passoffice.guestslist',
									'tooltip' => 'passoffice.guestslist',
								],
						'archive'=>[
									'url'     => 'passoffices/archive',
									'icon'    => '',
									'title'   => 'sidebar.archive',
									'tooltip' => 'sidebar.archive',
								],
						'addguest'=>[
									'url'     => 'passoffices/addguest',
									'icon'    => '',
									'title'   => 'sidebar.addguest',
									'tooltip' => 'sidebar.addguest',
								],
						'menu_events'=>[
									'url'     => 'passoffices/events',
									'icon'    => '',
									'title'   => 'passoffice.menu_events',
									'tooltip' => 'passoffice.menu_events',
								],
						'config'=>[
									'url'     => 'passoffices/config',
									'icon'    => '',
									'title'   => 'sidebar.config',
									'tooltip' => 'sidebar.config',
								],
						
							
					]
					
				],
		

		
				
		'acl'=>[
					'url'     => 'acls',
					'icon'    => 'icon_contacts.png',
					'title'   => 'acls',
					'tooltip' => 'sidebar.acls',
					'visible' => true, // можно запретить показ, если false
					
				],
				
		'doors'=>[
					'url'     => 'doors',
					'icon'    => 'icon_contacts.png',
					'title'   => 'doors.list',
					'tooltip' => 'doors.list',
					'visible' => true, // можно запретить показ, если false
					
				],
				
				
		'Reports'=>[
					'url'     => '',
					'icon'    => 'export.png',
					'title'   => 'report.history',
					'tooltip' => 'report.history',
					'visible' => true, // можно запретить показ, если false
					'items'   => [
						'history'=>[
									'url'     => 'reports/events',
									'icon'    => '',
									'title'   => 'report.history',
									'tooltip' => 'report.history',
								],
						'stat'=>[
									'url'     => 'mreports/stat',
									'icon'    => '',
									'title'   => 'mreport.stat',
									'tooltip' => 'mreport.stat',
									'visible' => true,
								],
						'report1'=>[
									'url'     => 'mreports/report1',
									'icon'    => '',
									'title'   => 'mreport.report1',
									'tooltip' => 'mreport.report1',
									'visible' => true,
								],
						'peopleRegStat'=>[
									'url'     => 'reports/peopleRegStat',
									'icon'    => '',
									'title'   => 'report.peopleRegStat',
									'tooltip' => 'report.peopleRegStat',
									'visible' => false,
								],
						
						'identityRegStat'=>[
									'url'     => 'reports/identityRegStat',
									'icon'    => '',
									'title'   => 'report.identityRegStat',
									'tooltip' => 'report.identityRegStat',
									'visible' => false,
								],
						
						
						
							
					]
					
				],
				
				
				
		
	],
];