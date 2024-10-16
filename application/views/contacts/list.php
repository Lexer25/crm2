<?php 
//echo Debug::vars('13',$people );exit;
//echo Debug::vars('14',$company );exit;
//echo Debug::vars('15', Session::instance()->get('viewDeletePeopleOnly'));//exit;
if(count($people)>500){
	$alert=__('contCount', array(':contCount'=>Kohana::$config->load('config_newcrm')->table_view_max_contact));
	$people=array_slice($people, 0, 500);
	
}
if ($alert) { ?>
<div class="alert_success">
	<p>
		<img class="mid_align" alt="success" src="images/icon_accept.png" />
		<?php echo $alert; ?>
	</p>
</div>
<?php }

include Kohana::find_file('views','alert'); ?>
<div class="onecolumn">
	<div class="header">
		<div id="search"<?php if (isset($hidesearch)) echo ' style="display: none;"'; ?>>
			<form action="contacts/search" method="post">
				<input type="text" class="search noshadow" title="<?php echo __('search'); ?>" name="q" id="q" value="<?php if (isset($filter)) echo $filter; ?>" />
			</form>
		</div>
		
		
		<span><?php 
			if (isset($filter)){
				echo __('contacts.titleSearch', array(':filter'=>$filter));
			} else {
			echo __('contacts.title'); 
			}
			if (isset($company)) echo ' - ' . iconv('CP1251', 'UTF-8', $company['NAME']);
			?></span>
		<?php if (isset($company)) { ?>
		<div class="switch">
			<table cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<?php
							if ($company['CANEDIT'] != 0)
						 		echo HTML::anchor('companies/edit/' . $company['ID_ORG'], __('company.data'), array('class' => 'left_switch')); 
						 	else 
						 		echo HTML::anchor('companies/view/' . $company['ID_ORG'], __('company.data'), array('class' => 'left_switch'));
						?>
					</td>
					<td>
						<a href="javascript:" class="right_switch active"><?php echo __('company.contacts'); ?></a>
					</td>
				</tr>
			</tbody>
			</table>
		</div>
		<?php } ?>
	</div>
	<br class="clear"/>
	<div class="content">
		
		<?php if (count($people) <= 0) { ?>
		<div style="margin: 100px 0; text-align: center;">
			<?php echo __('contacts.empty');?><br /><br />
		</div>
		<?php } else { ?>
		<?php
		include Kohana::find_file('views', 'paginatoion_controller_template'); 
		$sn=0;
?>
		<form id="form_data" name="form_data" action="" method="post">
			<table class="data tablesorter-blue" width="100%" cellpadding="0" cellspacing="0" id="tablesorter" >
				<thead>
					<tr>
						<!--
						<th style="width:10px">
							<input type="checkbox" id="check_all" name="check_all"/>
						</th>
						-->
						<th class="filter-false sorter-false"><?php echo __('sn'); ?></th>
						<?php if(Kohana::$config->load('config_newcrm')->get('contactListIdView')) echo '<th>'.__('contacts.id_pep').'</th>'?>
						
						<th class="filter-false"><?php echo __('contacts.count_identificator'); ?></th>
						<th><?php echo __('contact.active'); ?></th>
						
						<?php if(Kohana::$config->load('config_newcrm')->get('contactListTabNumView')) echo '<th>'.__('contacts.code').'</th>'?>
						<th><?php echo __('contacts.name'); ?></th>
						<th><?php echo __('contact.post'); ?></th>
						
						<th><?php echo __('contacts.company'); ?></th>
						
						<th class="filter-false sorter-false"><?php echo __('contacts.action'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($people as $pep) { 
					
					$peppep=new Contact(Arr::get($pep,'ID_PEP'));
					$org = new Company($peppep->id_org);
					?>
					<tr>
						<!--
						<td>
							<input type="checkbox" />
						</td>
						-->
						<td><?php echo ++$sn; ?></td>
						<?php if(Kohana::$config->load('config_newcrm')->get('contactListIdView')) echo '<td>'.$peppep->id_pep.'</td>'?>
						
							<td><?php if(count($peppep->count_identificator)) {
								echo HTML::anchor('contacts/cardlist/'.$peppep->id_pep, HTML::image('images/icon_card.png'))
								//.' '
								//.__('(:count)', array(':count'=>count($peppep->count_identificator)))
								; }?>
						</td>
						
						<td><?php echo Arr::get($pep,'IS_ACTIVE')? 'Да':'Нет'; ?></td>
						
						
						
						<td><?php 
						//echo Debug::vars('115', $pep);
						if (Auth::instance()->logged_in('admin') && $peppep->id_pep <>1)
						    echo HTML::anchor('contacts/edit/' . $peppep->id_pep, iconv('CP1251', 'UTF-8', $peppep->surname. ' '.$peppep->name . ' ' . $peppep->patronymic));
							else
							    echo iconv('CP1251', 'UTF-8', $peppep->surname. ' '.$peppep->name . ' ' . $peppep->patronymic);
							    if($org->flag & 1) echo HTML::image('/images/icon_guest2.png', array('width'=>'16'));
						
						?></td>
						<td><?php echo iconv('CP1251', 'UTF-8', $peppep->post);?></td>

						<td><?php 
						
						if (Auth::instance()->logged_in('admin') && $peppep->id_pep <>1)
						    echo HTML::anchor('companies/edit/' . $peppep->id_org, iconv('CP1251', 'UTF-8', $org->name)); 
							else 
							    echo iconv('CP1251', 'UTF-8',  $org->name);
						?></td>
					
						<?php
						
						//набор параметров, определяющий поведение кнопок для разных ролей
						if(class_exists('Acl')){
							$acl=new Acl(true);
							if($acl->is_allowed(Session::instance()->get('role'),'organization', 'read')){
								$dis1='';
								$dis2='class="disabled"';
								$dis2_lighten='lighten';
								$dis3='';
							};
							if($acl->is_allowed(Session::instance()->get('role'),'organization', 'create')){
								$dis1='';
								$dis2='class="disabled"';
								$dis2_lighten='lighten';
								$dis3='';
							};
							if($acl->is_allowed(Session::instance()->get('role'),'organization', 'update')){
								$dis1='';
								$dis2='';
								$dis2_lighten='';
								$dis3='';
							};
							if($acl->is_allowed(Session::instance()->get('role'),'organization', 'delete')){
								$dis1='';
								$dis2='';
								$dis2_lighten='';
								$dis3='';
							};
						} else {
							 $dis1='';
							 $dis2='';
							 $dis2_lighten='';
							$dis3='';
								
						}
						?>
						<td>
							<?php 
							    
	//редактировать						    
							 echo HTML::anchor('contacts/edit/'.$peppep->id_pep, HTML::image('images/icon_edit.png', array('title' => __('tip.edit'), 'class' => 'help', 'alt'=>'edit'.$dis1))
							    
							     );

							 ?>
							
							<?php if ($peppep->is_active == 1) {

									switch (ConfigType::howDeletePeople()) {
										case 0://делать неактивным. Вывожу надпись что сотрудник будет Уволен
										?>
										<a href="javascript:" <?php echo $dis2 ?> onclick="if (confirm('<?php echo __('contacts.confirmSetNotActive'); ?>')) location.href='<?php echo URL::base() . 'contacts/fired/' . $pep['ID_PEP']; ?>';">
										 <?php echo HTML::image('images/icon_delete.png', array('title' => __('tip.fired'), 'class' => 'help '.$dis2_lighten)); ?>
										</a>
										<?php 
										
										break;
										case 1:// удалять сотрудника. Вывожу надпись, что сотрудник будет удален
											?>
											<a href="javascript:" <?php echo $dis2 ?> onclick="if (confirm('<?php echo __('contacts.confirmdelete'); ?>')) location.href='<?php echo URL::base() . 'contacts/fired/' . $pep['ID_PEP']; ?>';">
											 <?php echo HTML::image('images/icon_delete.png', array('title' => __('tip.delete'), 'class' => 'help '.$dis2_lighten)); ?>
											</a>
											<?php 
										
										break;
										
									}
//уволить							

							?>
										
								<?php } else {?>
									<a href="javascript:" <?php echo $dis2 ?> onclick="if (confirm('<?php echo __('contacts.restore'); ?>')) location.href='<?php echo URL::base() . 'contacts/restore/' . Arr::get($pep,'ID_PEP'); ?>';">
										<?php echo HTML::image('images/restore_16.png', array('title' => __('tip.restore'), 'class' => 'help '.$dis2_lighten)); ?>
								</a>
								
								
								<?php }
							?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			
			
			
			
			
			
			<div id="chart_wrapper" class="chart_wrapper"></div>
		<!-- End bar chart table-->
		</form>
		<?php }?>
	</div>
</div>
