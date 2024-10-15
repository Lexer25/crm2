
<style>
.container {
    width: 100%;
}

.container ul {
    text-align: center;
    list-style: none;
}

.container li {
    display: inline-block;
}
</style>

<?php
$configModule=Kohana::$config->load('config_newcrm')->module;
//echo Debug::vars('3', Arr::get($configModule, 'org'));

?>
<a href="javascript:;" id="show_menu">&raquo;</a>
<div id="left_menu">
	<a href="javascript:;" id="hide_menu">&laquo;</a>
	<ul id="main_menu">
		<li>
			<?php echo HTML::anchor('/', HTML::image('images/icon_home.png') . __('home')); ?>
		</li>

<?php 

	$acl=ACL::instance(true);
	$role=Arr::get(Auth::instance()->get_user(), 'ROLE', 'guest');
	//echo Debug::vars('251',Auth::instance());exit;
	//echo Debug::vars('251',Auth::instance(),  $acl->is_allowed($role,'organization', 'read'));//exit;
	Session::instance()->set('role', $role );
	
    if($acl->is_allowed($role,'organization', 'read')){// есть есть права хотя бы на чтение, то открываем раздел Организации
			?>

			<li>
				<a id="sidebar_companies" href="javascript:"><img src="images/icon_companies.png" /><?php echo __('companies'); ?></a>
				<ul>
					<li><?php if($acl->is_allowed($role,'organization', 'read')) echo HTML::anchor ('companies', __('sidebar.companieslist')); ?></li>
					<li><?php if($acl->is_allowed($role,'organization', 'create')) echo HTML::anchor ('companies/edit/0', __('sidebar.addcompany')); ?></li>
				</ul>
			</li>
			<?php 
			}
			//echo Debug::vars('269', $acl->is_allowed($role,'Contact', 'read'));//exit;
			
	
			
			 if($acl->is_allowed($role,'Contact', 'read')){// есть есть права хотя бы на чтение, то открываем раздел Контакты. 
			 //4.09.2024 общий вход с последующим перенаправлением.
			?>
			
			<li>
					<a id="sidebar_contacts" href="javascript:"><img src="images/icon_contacts.png" /><?php echo __('contacts'); ?></a>
					<ul>
						<li><?php  if($acl->is_allowed($role,'Contact', 'read')) echo HTML::anchor ('contacts/disp/activeOnlyList', __('sidebar.contactslist')); ?></li>
						<li><?php  if($acl->is_allowed($role,'Contact', 'create')) echo HTML::anchor ('contacts/disp/addContact', __('sidebar.addcontact')); ?></li>
						<li><?php  if($acl->is_allowed($role,'Contact', 'delete')) echo HTML::anchor ('contacts/disp/deletedList', __('sidebar.deletedcontact')); ?></li>
					
					</ul>
			</li>
			
	<?php 
			}
			
			
			
			
			//echo Debug::vars('286', $acl->is_allowed($role,'identifier', 'read') );//xit;
			if($acl->is_allowed($role,'identifier', 'read')){// есть есть права хотя бы на чтение, то открываем раздел Идентификаторы
	?>
            <li>
                <a id="sidebar_cards" href="javascript:"><img src="images/icon_card.png" /><?php echo __('identity'); ?></a>
                <ul>
                    <li><?php if($acl->is_allowed($role,'identifier', 'read')) echo HTML::anchor ('cards/select/rfid', __('sidebar.rfid')); ?></li>
                    <li><?php //echo HTML::anchor ('cards/select/grz', __('sidebar.grz')); ?></li>
                    <li><?php //echo HTML::anchor ('cards/select/uhf', __('sidebar.uhf')); ?></li>
                    <li><?php echo HTML::anchor ('cards/expired', __('sidebar.cardexpired')); ?></li>
                </ul>
            </li>
            <?php 
			}
//echo Debug::vars('82',$role, $acl->is_allowed($role,'passoffice', 'read'));


			if($acl->is_allowed($role,'passoffice', 'read') AND false){// есть права хотя бы на чтение, то открываем раздел Бюро пропусков
			$po=Model::factory('passofficem');// создаю модель бюро пропусков
		
			$po->init(Arr::get(Auth::instance()->get_user(), 'ID_PEP'));// инициализирую для текущего авторизованного пользователя.
            ?>

			
				<li>
					<a id="sidebar_guests" href="javascript:"><img src="images/icon_guest.png" /><?php echo __('passoffice.passoffice', array(':po_name'=>$po->name)); ?></a>
					<ul>
                   
						<li><?php if($acl->is_allowed($role,'passoffice', 'read')) echo HTML::anchor ('passoffices/guest', __('passoffice.guestslist')); ?></li>
						<li><?php if($acl->is_allowed($role,'passoffice', 'read')) echo HTML::anchor ('passoffices/archive', __('sidebar.archive')); ?></li>
						<li><?php //echo HTML::anchor ('guests/edit/0', __('sidebar.addguest')); ?></li>
						<li><?php if($acl->is_allowed($role,'passoffice', 'create')) echo HTML::anchor ('passoffices/issue', __('sidebar.addguest')); ?></li>
						<li><?php echo HTML::anchor ('passoffices/events', __('passoffice.menu_events')); ?></li>
						<li><?php if($acl->is_allowed($role,'passoffice', 'delete')) echo HTML::anchor ('passoffices/config', __('sidebar.config')); ?></li>
					
					
					</ul>
				</li>
				<?php 
			} else {
				
				//echo Debug::vars('107');//exit;
			}
		
		
		// БЫСТРАЯ РЕГИСТРАЦИЯ КОНТАКТОВ
			 if($acl->is_allowed($role,'Contact', 'read') AND false){// есть есть права хотя бы на чтение, то открываем раздел Контакты
			 //https://doka.guide/html/dialog/ модальные и диалоговые окна
			?>
			
			
			<li>
					<a id="sidebar_contacts" href="javascript:"><img src="images/icon_contacts.png" /><?php echo __('contacts.host'); ?></a>
					<ul>
						<li><?php  if($acl->is_allowed($role,'Contact', 'read')) echo HTML::anchor ('contacts/disp/HostOnlyList', __('sidebar.contactslist')); ?></li>
						<li><?php  if($acl->is_allowed($role,'Contact', 'create')) echo HTML::anchor ('contacts/disp/hostAddContact', __('sidebar.addcontact')); ?></li>
						<li><?php  if($acl->is_allowed($role,'Contact', 'delete')) echo HTML::anchor ('contacts/disp/hostDeletedList', __('sidebar.deletedcontact')); ?></li>
						<li {display:inline-block;}>
							 <button type="button" class="button button-blue" onclick="window['some-dialog-id'].show()" aria-controls="some-dialog-id">
    <?php echo HTML::image('images/shortcut/setting.png', array('width'=>20)); ?>
  </button>
  <!--<button class="button button-blue" type="button" onclick="window['some-modal-id'].showModal()" aria-controls="some-modal-id">
    Открыть модальное окно
  </button>-->
							   <dialog class="dialog" id="some-modal-id" aria-labelledby="dialog-name">
								<h2 class="dialog__title" id="dialog-name">Я модальное окно</h2>
								<p>Весь остальной контент на странице недоступен, когда я открыто.</p>
								<form method="dialog">
								  <button class="dialog__button button-orange">
									Ясно-понятно 👍
								  </button>
								</form>
							  </dialog>
							  
							  <dialog class="dialog" id="some-dialog-id_"  aria-labelledby="dialog-name">
								<h2 class="dialog__title" id="dialog-name">Я окно-диалог</h2>
								<p>Несмотря на то, что я поверх кнопок, они по-прежнему доступны.</p>
								<button class="dialog__button button-orange" type="button" onclick="window['some-dialog-id'].close()">
								  Окей 👌
								</button>
							  </dialog>
							  
							  <dialog class="dialog" id="some-dialog-id"  aria-labelledby="dialog-name">
								<h2 class="dialog__title" id="dialog-name">Выбор организации для быстрой регистрации</h2>
								<p>Выберите организацию для быстрой регистрации гостей</p>
								
								
								<?php
								
								$tree=new Tree();
									$org_tree = Model::Factory('Company')->getOrgListForOnce(Arr::get(Auth::instance()->get_user(), 'ID_ORGCTRL'));
									
									
									$id_org_host=Arr::get(Kohana::$config->load('system')->get('fastorder'), Arr::get(Auth::instance()->get_user(), 'ID_PEP'));
									echo Form::open('contacts/saveFastOrder');
									
									echo Form::hidden('id_pep', Arr::get(Auth::instance()->get_user(), 'ID_PEP'));
									echo '<select name="id_org">';
										echo $tree->out_options($tree->array_to_tree($org_tree), $id_org_host);
									echo '</select>';
									echo Form::submit('123','Выбрать');
									echo Form::close();
									
								?>
							</select>
								<button  type="submit" onclick="window['some-dialog-id'].close()">
								  Сохранить
								</button>
							  </dialog>
							  
							  
							  
							  
						
						
						</li>
					
					</ul>
			</li>
			
	<?php 
			}

			
//таблица ACL	
//echo Debug::vars('324', $acl->is_allowed($role,'acl', 'read'));
			//if($acl->is_allowed($role,'acl', 'read') or true){// разрешить показ acls
			if($acl->is_allowed($role,'acl', 'read') AND false){// запретить показ acls
				
				?>
	
				<li>
            	    <a id="sidebar_guests" href="javascript:"><img src="images/icon_guest.png" /><?php echo __('acls'); ?></a>
           		     <ul>
                   
						<li><?php echo HTML::anchor ('acls', __('sidebar.acls')); ?></li>
						
						
					
         	       </ul>
        	    </li>
			<?php 
			}
			
			
//таблица точек прохода	
//echo Debug::vars('324', $acl->is_allowed($role,'listAp', 'read'));
			if($acl->is_allowed($role,'acl', 'read')  or true){
				
				?>
			
				<li>
					<a id="sidebar_users" href="javascript:"><img src="images/icon_users.png" /><?php echo __('doors'); ?></a>
					<ul>
						<li><?php echo HTML::anchor ('doors', __('doors.list')); ?></li>
						<li><?php //echo HTML::anchor ('doors/edit/0', __('doors.add')); ?></li>
					</ul>
				</li>
				
				
				
				
			<?php 
			}
			
			?>
			<li>
					<a id="sidebar_users" href="javascript:"><img src="images/export.png" /><?php echo __('Reports'); ?></a>
					<ul>
						<li><?php echo HTML::anchor ('reports/events', __('report.history')); ?></li>
						<li><?php //echo HTML::anchor ('doors/edit/0', __('doors.add')); ?></li>
					</ul>
				</li>
				<?php
			
			//echo Debug::vars('341', $acl->is_allowed($role,'events', 'read'));
			if($acl->is_allowed($role,'develope', 'develope') or true){// есть есть права хотя бы на чтение, то открываем раздел События
			    
	 
	
			};
			//echo Debug::vars('357', $acl->is_allowed($role,'develope', 'develope'));
			if($acl->is_allowed($role,'develope', 'develope')){// есть есть права хотя бы на чтение, то открываем раздел События
		?>
				<li>
    				<a id="sidebar_queue" href="javascript:"><img src="images/icon_data_out.png" /><?php echo __('queue.full'); ?></a>
    				<ul>
    						<li><?php echo HTML::anchor ('queue/index', __('queue.full')); ?></li>
    						<li><?php echo HTML::anchor ('queue/listqueue', __('queue.list')); ?></li>
    
    				</ul>
				</li>
		
				<li>
					<a id="sidebar_users" href="javascript:"><img src="images/icon_users.png" /><?php echo __('users'); ?></a>
					<ul>
						<li><?php echo HTML::anchor ('users', __('sidebar.userlist')); ?></li>
						<li><?php echo HTML::anchor ('users/edit/0', __('sidebar.adduser')); ?></li>
					</ul>
				</li>
			
				<li>
					<a id="sidebar_users" href="javascript:"><img src="images/icon_users.png" /><?php echo __('device'); ?></a>
					<ul>
						<li><?php echo HTML::anchor ('devices', __('device.devicelist')); ?></li>
						<li><?php echo HTML::anchor ('devices/edit/0', __('device.adddevice')); ?></li>
					</ul>
				</li>

				<li>
					<a id="sidebar_users" href="javascript:"><img src="images/icon_users.png" /><?php echo __('doors'); ?></a>
					<ul>
						<li><?php echo HTML::anchor ('doors', __('doors.list')); ?></li>
						<li><?php //echo HTML::anchor ('doors/edit/0', __('doors.add')); ?></li>
					</ul>
				</li>
	
			<li>
				<a id="sidebar_stats" href="javascript:"><img src="images/icon_stat.png" /><?php echo __('stat'); ?></a>
				<ul>
					<li><?php echo HTML::anchor ('stats/about', __('stat.form1')); ?></li>
					<li><?php echo HTML::anchor ('stats/queue_message', __('stat.title.que_but')); ?></li>
					<li><?php echo HTML::anchor ('stats/device', __('stat.form2')); ?></li>
					<li><?php echo HTML::anchor ('stats/events', __('stat.form3')); ?></li>
				</ul>
			</li>
			<?php 
			
			}
			?>
	
	</ul>
	<br class="clear"/>
	<div id="calendar"></div>
</div>
