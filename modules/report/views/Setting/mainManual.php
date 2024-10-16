<?php 
//6.08.2024 страница для демонстрации и сохранения параметров конфигурации.
//echo Debug::vars('2', $group); exit;
/*
acl
guest
main
rfid
system
*/
//echo Debug::vars('11', $groupList);
//$group='main';
$acl=Kohana::$config->load('acl');
$mainConfg=Kohana::$config->load('main');
$system=Kohana::$config->load('system');
$guest=Kohana::$config->load('guest');
$rfid=Kohana::$config->load('rfid');

/*
echo Debug::vars('19', $acl);
echo Debug::vars('20', $mainConfg);
echo Debug::vars('21', $system);
echo Debug::vars('22', $guest);
echo Debug::vars('23', $rfid);
*/		
include Kohana::find_file('views','alert');
 ?>
<div class="onecolumn">
	<div class="header">

		<span><?php echo __('setting.main_title');?></span>



	</div>
	<br class="clear"/>
	<div class="content">

	<?php
	//вывод настроект system
	
	?>
		<fieldset>
						<legend><?php echo __('setting.system'); ?></legend>
						<div>
	<?php

		echo Form::open('settings/updateManual');

		echo Form::hidden('group', 'system');
?>	
		<table class="tablesorter-blue">
		<thead>
		<tr>
						<th>№ п/п</th>
						<th>Группа</th>
						<th>Параметр конфигурации</th>
						<th>Значение</th>
						<th>Выбор значения</th>
						<th>Пояснения</th>

						
					</tr>
		</thead>
		<tbody>
		<?php
		$countRow=0;
		
		$list=array(
		'0'=>'HEX 8 byte 00124CD8',
		'1'=>'001A 10 byte 262F8F001A',
//		'2'=>'DEC 10 digit 0001493650',
//		'4'=>'ГРЗ A123BC45'
		);
	//формат хранения номера RFID в базе данных СКУД.
			echo '<tr>';
				echo '<td>'.++$countRow.'</td>';
				echo '<td>system</td>';
				echo '<td>baseFormatRfid</td>';
				echo '<td>'.$system->baseFormatRfid.'</td>';
				echo '<td>';
					foreach($list as $key=>$value){
					    echo Form::radio('key[baseFormatRfid]', $key, $system->baseFormatRfid==$key, array('disabled'=>'disabled')).$value.' '.$key.'<br>';
					    //echo Form::radio('key[baseFormatRfid]', $key, $system->baseFormatRfid==$key).$value.' '.$key.'<br>';
					}
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'descBaseFormatRfid').'</td>';
				//echo '<td>'.Form::button('baseFormatRfid', 'baseFormatRfid').'</td>';
			echo '</tr>';
			
			
	//Показать все варианты номера идентификатора.
	$list=array(
		'0'=>'Не выводить',
		'1'=>'Выводить',
	
		);
			echo '<tr>';
				echo '<td>'.++$countRow.'</td>';
				echo '<td>system</td>';
				echo '<td>formatViewAll</td>';
				echo '<td>'.$system->formatViewAll .'</td>';
				echo '<td>';
					foreach($list as $key=>$value){
					    echo Form::radio('key[formatViewAll]', $key, $system->formatViewAll==$key).$value.'<br>';
					}
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'formatViewAll').'</td>';
				//echo '<td>'.Form::button('formatViewAll', 'formatViewAll').'</td>';
			echo '</tr>';
			
			
			
		//}
	//формат ввода номера RFID на регистрационном считыателе
	$list=array(
		'0'=>'HEX 8 byte 00124CD8',
		'2'=>'DEC 10 digit 0001493650',
	
		);
		$list=array(
		'0'=>'baseFormatRfid',
		'2'=>'Выводить в формате DEC',
		
		);
	
	echo '<tr>';
				echo '<td>'.++$countRow.'</td>';
				echo '<td>system</td>';
				echo '<td>regFormatRfid</td>';
				echo '<td>'.$system->regFormatRfid.'</td>';
				echo '<td>';
					foreach($list as $key=>$value){
					    echo Form::radio('key[regFormatRfid]', $key, $system->regFormatRfid==$key).$value.'<br>';
					}
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'regFormatRfid').'</td>';
				//echo '<td>'.Form::button('regFormatRfid', 'regFormatRfid').'</td>';
			echo '</tr>';
	
	$list=array(
		'0'=>'baseFormatRfid',
		'2'=>'Выводить в формате DEC',
		
		);
	
	echo '<tr>';
				echo '<td>'.++$countRow.'</td>';
				echo '<td>system</td>';
				echo '<td>screenFormatRFID</td>';
				echo '<td>'.$system->screenFormatRFID.'</td>';
				echo '<td>';
					foreach($list as $key=>$value){
					    echo Form::radio('key[screenFormatRFID]', $key, $system->screenFormatRFID==$key).$value.' '.$key.'<br>';
					}
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'screenFormatRFID').'</td>';
				//echo '<td>'.Form::button('screenFormatRFID', 'screenFormatRFID').'</td>';
			echo '</tr>';
			
			$list=array(
		//'0'=>'HEX 8 byte 00124CD8',
		'001A'=>'001A 10 byte 262F8F001A',
		'DEC'=>'DEC 10 digit 0001493650',
		//'4'=>'ГРЗ A123BC45'
		);
	//При редактировании номера идентификатора показывать все его значения.
			echo '<tr>';
				echo '<td>'.++$countRow.'</td>';
				echo '<td>system</td>';
				echo '<td>viewFromatForEdit</td>';
				echo '<td>'.$system->viewFromatForEdit.'</td>';
				echo '<td>';
					foreach($list as $key=>$value){
					    echo Form::radio('key[viewFromatForEdit]', $key, $system->viewFromatForEdit==$key).$value.'<br>';
					}
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'viewFromatForEdit').'</td>';
				//echo '<td>'.Form::button('viewFromatForEdit', 'viewFromatForEdit').'</td>';
			echo '</tr>';
		
	?>
	</tbody>
		</table>
	<?php

		echo Form::submit('saveConfig', 'system');
		echo Form::close();	
	?>	
		
						</div>
		</fieldset>	
	
	<fieldset>
						<legend><?php echo __('setting.main'); ?></legend>
						<div>
<?php

		echo Form::open('settings/updateManual');


		echo Form::hidden('group', 'main');
?>									
		<table class="tablesorter-blue">
		<thead>
		<tr>
						<th>№ п/п</th>
						<th>Группа</th>
						<th>Параметр конфигурации</th>
						<th>Значение</th>
						<th>Выбор значения</th>
						<th>Пояснения</th>
						
					</tr>
		</thead>
		<tbody>
		<?php
		$countRow=0;

	$list=array(
		'0'=>'Делать сотрудника неактивным (Уволить) с возможность восстановить',
		'1'=>'Удалять сотрудника из базы данных',
		);
		echo '<tr>';
        		echo '<td>'.++$countRow.'</td>';
				echo '<td>mainConfg</td>';
		        echo '<td>howDeletePeople</td>';
				echo '<td>'.$mainConfg->howDeletePeople.'</td>';
				echo '<td>';
					//echo Form::input('key[howDeletePeople]', $mainConfg->howDeletePeople);
						foreach($list as $key=>$value){
					    echo Form::radio('key[howDeletePeople]', $key, $mainConfg->howDeletePeople==$key).$value.'<br>';
					}
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'howDeletePeople.'.$key).'</td>';
				//echo '<td>'.Form::button('howDeletePeople', 'howDeletePeople').'</td>';
			echo '</tr>';
		
		echo '<tr>';
        		echo '<td>'.++$countRow.'</td>';
				echo '<td>mainConfg</td>';
		        echo '<td>iphost</td>';
				echo '<td>'.$mainConfg->iphost.'</td>';
				echo '<td>';
					echo Form::input('key[iphost]', $mainConfg->iphost);
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'descBaseFormatRfid.'.$key).'</td>';
				//echo '<td>'.Form::button('iphost', 'iphost').'</td>';
			echo '</tr>';
		
			echo '<tr>';
				echo '<td>'.++$countRow.'</td>';
				echo '<td>mainConfg</td>';
				echo '<td>lic</td>';
				echo '<td>'.$mainConfg->lic.'</td>';
				echo '<td>';
					echo Form::input('key[lic]', $mainConfg->lic, array('disabled'=>'disabled'));
				echo '</td>';
				echo '<td>'.' '.Kohana::message('lic', 'lic').'</td>';
				//echo '<td>'.Form::button('lic', 'lic', array('disabled'=>'disabled')).'</td>';
			echo '</tr>';
		
		echo '<tr>';
				echo '<td>'.++$countRow.'</td>';
				echo '<td>mainConfg</td>';
				echo '<td>odbcname</td>';
				echo '<td>'.$mainConfg->odbcname.'</td>';
				echo '<td>';
					echo Form::input('key[odbcname]', $mainConfg->odbcname);
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'descBaseFormatRfid.'.$key).'</td>';
				//echo '<td>'.Form::button('odbcname', 'odbcname').'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>'.++$countRow.'</td>';
				echo '<td>mainConfg </td>';
				echo '<td>orgname</td>';
				echo '<td>'.$mainConfg->orgname.'</td>';
				echo '<td>';
					echo Form::input('key[orgname]', $mainConfg->orgname);
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'descBaseFormatRfid.'.$key).'</td>';
				//echo '<td>'.Form::button('orgname', 'orgname').'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>'.++$countRow.'</td>';
				echo '<td>mainConfg</td>';
				echo '<td>sysVer</td>';
				echo '<td>'.$mainConfg->sysVer.'</td>';
				echo '<td>';
					echo Form::input('key[sysVer]', $mainConfg->sysVer, array('disabled'=>'disabled'));
				echo '</td>';
				echo '<td>'.' '.Kohana::message('tunermess', 'descBaseFormatRfid.'.$key).'</td>';
				//echo '<td>'.Form::submit('sysVer1', 'sysVer2').'</td>';
			echo '</tr>';
			

	?>
	</tbody>
		</table>
			
	<?php

		echo Form::submit('saveConfig', 'main');
		echo Form::close();	
	?>		
						</div>
		</fieldset>	
	
	

	
	<fieldset>
						<legend><?php echo __('setting.constnant'); ?></legend>
						<div>
	<?php
		//echo Debug::vars('317', new constants);
		echo '<p>constants::RFID_MAX_LENGTH='.constants::RFID_MAX_LENGTH().'</p>';
		echo '<p>constants::RFID_MIN_LENGTH='.constants::RFID_MIN_LENGTH.'</p>';
		
	
		
		$countRow=0;
	?>
	<table class="tablesorter-blue">
			<thead>
			<tr>
						<th>№ п/п</th>
						<th>Константа</th>
						<th>Значение</th>
			</tr>
			</thead>
			<tbody>
				<?php
				echo '<tr>';
					echo '<td>'.++$countRow.'</td>';
					echo '<td>constants::RFID_MAX_LENGTH</td>';
					echo '<td>'.constants::RFID_MAX_LENGTH().'</td>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<td>'.++$countRow.'</td>';
					echo '<td>constants::RFID_MIN_LENGTH</td>';
					echo '<td>'.constants::RFID_MIN_LENGTH.'</td>';
				echo '</tr>';
				
				
				?>
			</tbody>
						
				</div>
		</fieldset>	

	</div>
</div>
