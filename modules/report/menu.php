'Reports'=>[
					'url'     => 'reports',
					'icon'    => 'export.png',
					'title'   => 'report.reports',
					'tooltip' => 'report.reports',
					'visible' => true, // можно запретить показ, если false
					'items'   => [
						
						'report1'=>[
									'url'     => 'reports/regRegestry',//реестр выданных пропусков
									'icon'    => '',
									'title'   => 'mreport.report1',
									'tooltip' => 'mreport.report1',
									'visible' => true,
								],
						
						'history2'=>[
									'url'     => 'reports/history',
									'icon'    => '',
									'title'   => 'mreport.history',
									'tooltip' => 'mreport.history',
									'visible' => true,
								],
						
						'exportAllContact'=>[
									'url'     => 'reports/allContactsExport',
									'icon'    => '',
									'title'   => 'mreport.allcontact',
									'tooltip' => 'mreport.allcontact',
									'visible' => true,
								],
						
//=========23.01.2026 вставка для пункта меню Идентификаторы						
						'exportAllCard'=>[
									'url'     => 'reports/allCard',
									'icon'    => '',
									'title'   => 'Список всех идентификаторов',
									'tooltip' => 'Идентификаторы и их свойства',
									'visible' => true,
								],
//==============						
						
						
							
					]
					
				],