'Reports'=>[
					'url'     => 'report',
					'icon'    => 'export.png',
					'title'   => 'report.report',
					'tooltip' => 'report.report',
					'visible' => true, // можно запретить показ, если false
					'items'   => [
						
						'report1'=>[
									'url'     => 'report/regRegestry',//реестр выданных пропусков
									'icon'    => '',
									'title'   => 'mreport.report1',
									'tooltip' => 'mreport.report1',
									'visible' => true,
								],
						
						'history2'=>[
									'url'     => 'report/history',
									'icon'    => '',
									'title'   => 'mreport.history',
									'tooltip' => 'mreport.history',
									'visible' => true,
								],
						
						'exportAllContact'=>[
									'url'     => 'report/allContactsExport',
									'icon'    => '',
									'title'   => 'mreport.allcontact',
									'tooltip' => 'mreport.allcontact',
									'visible' => true,
								],
						
//=========23.01.2026 вставка для пункта меню Идентификаторы						
						'exportAllCard'=>[
									'url'     => 'report/allCard',
									'icon'    => '',
									'title'   => 'Список всех идентификаторов',
									'tooltip' => 'Идентификаторы и их свойства',
									'visible' => true,
								],
//==============						
						
						
							
					]
					
				],