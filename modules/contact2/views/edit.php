<script language="javascript">
	function validate()
	{
		$('.error').hide();
		if ($('#surname').val() == '') {
			$('#error1').show();
			$('#surname').focus();
			return false;
		}
		
		/*
		var ymd = $('#datebirth').val();
		if (ymd == '') {
			$('#error21').show();
			return false;
		}
		if (!ymd.match(/^\d{4}-\d{2}-\d{2}$/)) {
			$('#error22').show();
			return false;
		}
		ymd = ymd.split('-');
		if (ymd[1] > 12 || ymd[1] < 1 || ymd[2] > 31 || ymd[2] < 1) {
			$('#error23').show();
			return false;
		}
		ymd = $('#datedoc').val(); 
		if (ymd == '') {
			$('#error31').show();
			return false;
		}
		if (!ymd.match(/^\d{4}-\d{2}-\d{2}$/)) {
			$('#error32').show();
			return false;
		}
		ymd = ymd.split('-');
		if (ymd[1] > 12 || ymd[1] < 1 || ymd[2] > 31 || ymd[2] < 1) {
			$('#error33').show();
			return false;
		}
		
		var hm = $('#workstart').val();
		if (hm == '') {
			$('#error41').show();
			$('#workstart').focus();
			return false;
		}
		if (!hm.match(/^\d{2}:\d{2}$/) && !hm.match(/^\d{2}:\d{2}:\d{2}$/)) {
			$('#error42').show();
			$('#workstart').focus();
			return false;
		}
		hm = hm.split(':');
		if (hm[0] > 23 || hm[1] > 59 || (hm.length == 3 && hm[2] > 59)) {
			$('#error43').show();
			$('#workstart').focus();
			return false;
		}
		hm = $('#workend').val();
		if (hm == '') {
			$('#error51').show();
			$('#workend').focus();
			return false;
		}
		if (!hm.match(/^\d{2}:\d{2}$/) && !hm.match(/^\d{2}:\d{2}:\d{2}$/)) {
			$('#error52').show();
			$('#workend').focus();
			return false;
		}
		hm = hm.split(':');
		if (hm[0] > 23 || hm[1] > 59 || (hm.length == 3 && hm[2] > 59)) {
			$('#error53').show();
			$('#workstart').focus();
			return false;
		}
		if ($('#tabnum').val() == '') {
			$('#error6').show();
			$('#tabnum').focus();
			return false;
		} else if ($('#login').val() == '') {
			$('#error7').show();
			$('#login').focus();
			return false;
		} else if ($('#password').val() == '') {
			$('#error8').show();
			$('#password').focus();
			return false;
		}
		*/
	}
</script>

<?php 
$tt=microtime(true);
//echo Debug::vars('93 contact mode', $mode);
//echo Debug::vars('89 contact', $contact);
//echo Debug::vars('90', $contact_acl); exit;
//echo Debug::vars('95', $org_tree); exit;
//echo Debug::vars('96 force_org', $force_org);
//echo Debug::vars('98', array_to_tree($org_tree));
//echo Debug::vars('98', out_options(array_to_tree($org_tree)));
//echo Debug::vars('99', Auth::instance());

//набор параметров, определяющий поведение кнопок для разных ролей
						
						$acl=new Acl(true);
						if($acl->is_allowed(Session::instance()->get('role'),'organization', 'read')){
							$dis1='disabled="disbled"';
							$dis1_arr='disabled'>'disbled';
							
							$dis2='class="disabled"';
							$dis2_lighten='lighten';
							$dis3='';
						};
						if($acl->is_allowed(Session::instance()->get('role'),'organization', 'create')){
							$dis1='disabled="disbled"';
							$dis1_arr='';
							$dis2='class="disabled"';
							$dis2_lighten='lighten';
							$dis3='';
						};
						if($acl->is_allowed(Session::instance()->get('role'),'organization', 'update')){
							$dis1='';
							$dis1_arr='';
							$dis2='';
							$dis2_lighten='';
							$dis3='';
						};
						if($acl->is_allowed(Session::instance()->get('role'),'organization', 'delete')){
							$dis1='';
							$dis1_arr='';
							$dis2='';
							$dis2_lighten='';
							$dis3='';
						};
						
						
if ($alert) { ?>
<div class="alert_success">
	<p>
		<img class="mid_align" alt="success" src="images/icon_accept.png" />
		<?php echo $alert; ?>
	</p>
</div>
<?php } 

?>
<div class="onecolumn">
	<div class="header">
		<span >
			<?php //вывод надписи в зависимости от режима показа данных
			
			switch($mode) {
				case('new'):
					echo  __('contact.new');
				break;
				
				case('edit'):
					echo __('contact.titleEditContact', array( 
					':name'=> iconv('CP1251', 'UTF-8', $contact->name),
					':surname'=> iconv('CP1251', 'UTF-8', $contact->surname),
					':patronymic'=> iconv('CP1251', 'UTF-8', $contact->patronymic)));
				break;
				
				case('fired'):
					echo __('contact.titlefiredContact', array( 
					':name'=> iconv('CP1251', 'UTF-8', $contact->name),
					':surname'=> iconv('CP1251', 'UTF-8', $contact->surname),
					':patronymic'=> iconv('CP1251', 'UTF-8', $contact->patronymic)));
				break;
				default:
					echo __('form.editContact');
				break;
			}
				
				
				?>
				</span>

		<?php 	switch($mode) {
				case('edit'):
				case('fired'):
					echo $topbuttonbar;
					break;
			
		}

		?>
	</div>
	<br class="clear" />
	<div class="content">
	<?php if($mode=='edit') {?>
				<form action="<?php echo Route::url('default', array('controller' => 'contacts', 'action' => 'upload')) ?>" method="post" enctype="multipart/form-data">
				<label for="image_control">Для загрузки изображения выберите файл и нажмите кнопку Загрузить</label>
				<div class="row">
					<input type="file"  <?php echo $dis1?> name="image" id="image_control">
					<input type="submit" <?php echo $dis1?>  value="Загрузить">
					<input type="hidden" name="id_pep" value="<?php echo $contact->id_pep; ?>" />
				</div>
			</form>
	<?php } else {
		
		echo __('form.select_file_enabled_in_edit_mode');
	}?>
		<form action="contacts/save" method="post" onsubmit="return validate()">
			<input type="hidden" name="hidden" value="form_sent" />
			<input type="hidden" name="id_pep" value="<?php echo $contact->id_pep; ?>" />
			
			<table style="margin: 0">
				<tr>
					<td>
						<div>
							<?php if ($contact->photo != null) { 
							//echo Debug::vars('145', $photo); exit;?>
								
								<img src="data:image/jpeg;base64,<?php echo base64_encode(pack("H*",str_replace("\0", "",$contact->photo))); ?>" height="200" alt="photo" />
								<br>
							
								
							<?php 
							//echo HTML::image('"data:image/jpeg;base64,'.base64_encode($contact['PHOTO']));
							} else { 
							
								echo HTML::image("images/nophoto.png", array('height' => 200, 'alt' => 'photo'));
							}?>
						</div>
						
						
						<fieldset>
						<legend>Персональные данные</legend>
						<div>
							<label for="surname"><?php echo __('contact.surname').'*'; ?></label>
							<br />
							<input type="text" <?php echo $dis1; ?> size="50" name="surname" id="surname" value="<?php echo iconv('CP1251', 'UTF-8', $contact->surname); ?>" />
							<br />
							<span class="error" id="error1" style="color: red; display: none;"><?php echo __('contact.emptysurname'); ?></span>
						</div>
						<br />
						<div>
							<table align="left">
								<tr>
									<td>
										<label for="name"><?php echo __('contact.name'); ?></label>
										<br />
										<input type="text" <?php echo $dis1; ?> size="50" name="name" id="name" value="<?php echo iconv('CP1251', 'UTF-8', $contact->name); ?>" style="width: 150px" />
									</td>
									<td style="padding-left: 15px">
										<label for="patronymic"><?php echo __('contact.patronymic'); ?></label>
										<br />
										<input type="text" <?php echo $dis1; ?> size="50" name="patronymic" id="patronymic" value="<?php echo iconv('CP1251', 'UTF-8', $contact->patronymic); ?>" style="width: 150px" />
									</td>
								</tr>
							</table>
						</div>
						<br style="clear: both;" />
						<br />
					
						<br />
						<div>
							<table align="left">
								<tr>
									<td>
										<label for="numdoc"><?php echo __('contact.numdoc'); ?></label>
										<br />
										<input type="text" <?php echo $dis1; ?> size="23" name="numdoc" id="numdoc" value="<?php echo iconv('CP1251', 'UTF-8', $contact->numdoc); ?>" />
									</td>
									<td style="padding-left: 15px">
										<label for="datedoc"><?php echo __('contact.datedoc'); ?></label>
										<br />
										<input type="text" <?php echo $dis1; ?> name="datedoc" id="datedoc" value="<?php echo $contact->datedoc; ?>" style="width: 100px;" />
										<br />
										<span class="error" id="error31" style="color: red; display: none;"><?php echo __('contact.emptydatedoc'); ?></span>
										<span class="error" id="error32" style="color: red; display: none;"><?php echo __('contact.wrongdatedoc'); ?></span>
										<span class="errpr" id="error33" style="color: red; display: none;"><?php echo __('contact.wrongdate'); ?></span>
									</td>
								</tr>
							</table>
						</div>
						<br style="clear: both;" />
					</td>
					</fieldset>
					<td style="padding-left: 80px; vertical-align: top;">
						<div>
							<label for="id_org"><?php echo __('contact.company'); ?></label>
							<br />
							<fieldset>
						<legend>
						<?php 

							echo HTML::anchor('companies/edit/'.$contact->id_org,'Родительская организация '.Arr::get(Arr::get($org_tree, $contact->id_org ), 'title' ));?></legend>
						<?php
							/*
							если сюда пришли из режима Добавить пипла, то id_org=1 (т.е. надо показывать корень всех организаций
							если сюда пришли из редактирования пипла, то надо показывать id_org этого пипла.
							если сюда пришли их Оргназиация - доабвить пипла, то надо id_org=force_org
							как определить что выбрать?
							если id_pep=0 - добавление пипла
							если id_pep>0 - редактирование пипла
							
							
							contact==false,force_org = null - добавить контакт из Контактов select= 1
							contact !=false,force_org = null - редактирование пипла Надо select= Arr::get($contact, 'ID_ORG')
							contact==false,force_org>0 - добавление пипла из организации. Надо select= force_org
							*/
							$select_org=1;
							//if($contact===false and $force_org == null) $select_org=1;//добавление нового пипла, переход из Контактов
							//if($contact===false and $force_org >0) $select_org=$force_org;//добавление нового пипла, переход из Организаций, выбор организации, откуда произошел переход
							//if($contact!==false) $select_org=Arr::get($contact, 'ID_ORG');//редактирование пипла
							
							if($force_org >0)
							{
								$select_org=$force_org;
							} else {
								$select_org=$contact->id_org;
							}

							?>
							
							<input type="hidden" name="id_org_old" value="<?php echo $contact->id_org; ?>" />
							
							<select name="id_org" <?php echo $dis1; ?>>
								
								<?php
								
								$tree=new Tree();
									//$var2=$tree->array_to_tree($org_tree, 759);
									//echo $tree->out_options($tree->array_to_tree($org_tree), $select_org);
									echo $tree->out_options($tree->array_to_tree($org_tree), $idOrgGuest);// выбор строки в дереве организаций
									
								?>
							</select>
							<br>
							<input type="checkbox" <?php echo $dis1; ?> name="inherit" value="1" checked />
											<label for="inherit"><?php echo __('Наследовать категории доступа от организации.'); ?></label>
											<br><b>Внимание!</b> Для наследования категорий доступа необходимо выделить "Наследовать категории доступа от организации.
							</fieldset>
						</div>
						<br />
						
						<fieldset>
						<legend>Рабочие данные</legend>
						<!--
						<div>	
							<table align="left">
								<tbody>
								<tr>
									<td>
										<label for="workstart"><?php echo __('contact.workstart'); ?></label>
										<br />
										<input type="text" name="workstart" id="workstart" value="<?php //echo $contact->workstart; ?>" />
										<br />
										<span class="error" id="error41" style="color: red; display: none;"><?php echo __('contact.emptyworkstart'); ?></span>
										<span class="error" id="error42" style="color: red; display: none;"><?php echo __('contact.wrongworkstart'); ?></span>
										<span class="error" id="error43" style="color: red; display: none;"><?php echo __('contact.wrongtime'); ?></span>
									</td>
									<td style="padding-left: 15px;">
										<label for="workend"><?php echo __('contact.workend'); ?></label>
										<br />
										<input type="text" name="workend" id="workend" value="<?php //echo $contact->workend; ?>" />
										<br />
										<span class="error" id="error51" style="color: red; display: none;"><?php echo __('contact.emptyworkend'); ?></span>
										<span class="error" id="error52" style="color: red; display: none;"><?php echo __('contact.wrongworkend'); ?></span>
										<span class="error" id="error53" style="color: red; display: none;"><?php echo __('contact.wrongtime'); ?></span>
									</td>
								</tr>
								</tbody>
							</table>
							
						</div>
						-->
						
						<div>
						
						<br>
						<br>
						<br>
							<label for="post"><?php echo __('contact.post'); ?></label>
							<br />
							<input type="text" <?php echo $dis1; ?> size="50" name="post" id="post" value="<?php echo iconv('CP1251', 'UTF-8', $contact->post); ?>" />
						</div>
						
						<br />
						<!--
						<div>
							<label for="tabnum"><?php echo __('contact.tabnum'); ?></label>
							<br />
							<input type="text" size="50" name="tabnum" id="tabnum" value="<?php echo iconv('CP1251', 'UTF-8', $contact->tabnum); ?>" />
							<br />
							<span class="error" id="error6" style="color: red; display: none;"><?php echo __('contact.emptytabnum'); ?></span>
						</div>
						-->
						</fieldset>
						<br />
					
						
						<?php 
						echo '<fieldset>
									<legend>Служебная информация</legend>
								<div>';
								echo '<p>'.__('ID_PEP'). $contact->id_pep;
								echo '<p>'.__('IS_ACTIVE'). $contact->is_active;
								echo '<p>'.__('FLAG'). $contact->flag;
						echo '</div>
								</fieldset>';
						?>
						
						
						<br />
					</td>
					<td style="padding-left: 80px; vertical-align: top;">
					<br>
				
					<?php //формирование расцветки и надписей для раздела категорий доступа
					if($mode == 'edit'){
						//echo Debug::vars('357', $check_acl);
						switch ($check_acl){
							case '0':
								$ffon='#dff0d8';
								$fmess= __('Категории доступа контакта и организации совпадают.');
								break;
							case '1':
								$ffon='#fcf8e3';
								$fmess=  __('У контакта категорий доступа больше, чем у организации.');
								break;
							case '2':
								$ffon='#f2dede';
								$fmess=  __('У контакта категорий доступа меньше, чем у организации.');
								break;
							case '3':
								$ffon='#fcf8e3';
								$fmess=  __('Набор категорий доступа контакта отличается от набор категорий доступа родительской организации.');
								break;
							default:
								$ffon='#f2dede';
								$fmess=  __('Ошибка при сравнении категорий доступа у контакта и организации.');
								break;
						}
						?>
						<fieldset style="padding-left: 25px; background-color:<?php echo $ffon;?>">
							<legend>Cписок категорий доступа контакта</legend>
							<ol>
						
						<?php		
						foreach($contact_acl as $key=>$value)
						{
							echo '<li>'.iconv('CP1251','UTF-8',  Arr::get($value, 'NAME')).'</li>';
						}
						?>
						</ol>
						<?php
						
						echo $fmess;
						?>
						</fieldset>
					<?php }
					//echo Debug::vars('352', $contact );
					

						$authmode_desc=array('0'=>'Нет данных о режиме авторизаци',
					'1'=>'Только RFID карта (тип 1)',
					'2'=>'Только FaceID (тип 2)',
					'3'=>'Строгое соответствие RFID и FaceID (тип 3)',
					'4'=>'Не строгое соответствие RFID и FaceID (тип 4)',
					'5'=>'Проход по любому идентификатору (тип 5)');
						
						
						echo '<br><label for="note">'.__('contact.note').'</label><br>';
						if($acl->is_allowed(Session::instance()->get('role'),'organization', 'read')){
							echo Form::textarea('note', iconv('CP1251', 'UTF-8', $contact->note), array('id'=>'note', 'disabled'=>'disabled'));
						} else {
							echo Form::textarea('note', iconv('CP1251', 'UTF-8', $contact->note), array('id'=>'note'));
						}
						
					?>
		
					
						
					</td>
				</tr>
			</table>
			<br />
			<?php
				switch($mode) {
				case('new'):
					echo Form::hidden('todo', 'addContact');//
					echo Form::submit('', __('button.addpeople'));
					//echo Form::submit(null, __('button.cancel'), array('onclick'=>'document.forms[0].reset()'));
					//echo Form::submit(null, __('button.backtolist'), array('onclick'=>'location.href='.URL::base().'contacts'));
					echo Form::close();
				break;
				
				case('edit'):
			
					echo Form::hidden('todo', 'updateContact');//
					if(!$acl->is_allowed(Session::instance()->get('role'),'organization', 'read')){
						echo Form::submit('', __('button.save'), array('disabled'=>'disabled'));
					} else {
						echo Form::submit('', __('button.save'));
					}
					//echo Form::submit(null, __('button.cancel'), array('onclick'=>'document.forms[0].reset()'));
					//echo Form::submit(null, __('button.backtolist'), array('onclick'=>'location.href='.URL::base().'contacts'));
					echo Form::close();
			
				break;
				
				case('fired'):
					echo Form::close();
					echo Form::open('contacts/delete');
					echo Form::hidden('todo', 'hardDeleteContact');
					echo Form::hidden('id_pep', $contact->id_pep);
					echo Form::submit(null, __('button.totalDelete'));
						echo Form::close();
				break;
				default:
					echo __('form.editContact');
				break;
			}
			
			
		
			
			
			
			?>
	</div>
</div>