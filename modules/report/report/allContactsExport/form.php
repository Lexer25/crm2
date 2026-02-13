<?php
/**Форма для выбора параметров отчета history Журнал событий
 * номер отчета 234
 * 19.11.2024 
 * 
 */
//echo Debug::vars('7', $params);//exit;
//echo Debug::vars('7-1', array_slice($params,1,1));//exit;
// echo Debug::vars('8', $user);exit;
 //$user=Arr::get($params, 'user'); exit;
 // $report_name='history';
 // $user=Arr::get($params, 'user');
 //echo Debug::vars('12', $user);exit;
 $user=new User();
$reportdatestart = isset($params['reportdatestart']) ? $params['reportdatestart'] : Date::formatted_time('now', "d.m.Y");
$reportdateend = isset($params['reportdateend']) ? $params['reportdateend'] : Date::formatted_time('tomorrow', "d.m.Y");


?>

<script language="javascript">
$(document).ready(function () {
//change selectboxes to selectize mode to be searchable
$("select").find('option[value="1"]').attr('disabled','disabled').attr('value','');
$("select").select2();
});
</script>

<br class="clear">
<div >
<?php echo Form::open('report/'.$report_name.'/generate', array('method' => 'get')); ?>
   
  	<?php 
		
		echo Form::submit('button', __('button.makeReport')); 
	
		?>
    
 
			<br>
			<fieldset>
				<legend><?php echo __('AllContactsExport'); ?></legend>

						
						<?php 
							//$id_orgctrl=23;//орагизация, которой может управлять текущий авторизованный пользователь.
							$org_tree = Model::Factory('Company')->getOrgListForOnce($user->id_orgctrl);
							$tree=new Tree();
							
							$var2=$tree->buildTreeWithReferences($org_tree);
						
							//$select_org=1;//выбранная организации из предыдущего отчета.
							$select_org = isset($params['id_org_select']) ? $params['id_org_select'] : $user->id_orgctrl;

							?>
							
							<select name="id_org_select" required>
							
								<?php
								
								
									echo $tree->out_options($var2, $select_org);
									
								?>
							</select>
							

					
							
			</fieldset>				
			<?php 
			
			
			//echo Form::submit('button', __('button.makeReport'));
				
		echo Form::close();
			?>
</div>