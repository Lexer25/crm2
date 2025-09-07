<?php
//форма отчета по зарегистрированным контактам
//echo Debug::vars('2', $report);//exit; 
//echo Debug::vars('3', $user);//exit; 

?>
<div class="onecolumn">
	<div class="header">
		<span><?php echo $report->titleReport; ?></span>
		<span><?php echo $report->org; ?></span>
	</div>

	
	
	<br class="clear"/>
	<div class="content">
	<?php
		$sn=0;
	?>
		<form id="form_data" name="form_data" action="" method="post">
			<table class="data tablesorter-blue" width="100%" cellpadding="0" cellspacing="0" id="tablesorter" >
				<thead>
					<tr>
						<th class="filter-false sorter-false"><?php echo __('sn');?></th>
						<?php
						
						foreach($report->titleColumn as $key=>$value)
						{
							
							echo '<th class="filter-false sorter-false">' . $value. '</th>';
							
						}
						?>
					</tr>
				</thead>
				<tbody>
						<?php
						//echo Debug::vars('52', $rowData);exit;
						foreach($report->rowData as $key=>$value)
						{
						echo '<tr>';
						//echo Debug::vars('55', $value);exit;
							echo '<td>' . ++$sn. '</td>';
							foreach($value as $key2=>$value2){
								//echo Debug::vars('57', $value2);exit;
							
								echo '<td>' . $value2. '</td>';
							}
						echo '</tr>';
						}
						?>
						
					
					
				</tbody>
			</table>
			
		</form>
		
		
	</div>
		<?php
		$filePresent=false;
		if (file_exists($report->fileName)) {
				// Файл существует
				echo 'Файл найден';
				$filePresent=true;
				
			} else {
				// Файл не существует
				echo 'Файл не найден';
			}
			
			if($filePresent){
			echo Form::open('mreports/export');
				
				echo Form::submit('savecsv', __('button.savecsv'));
				//echo Form::submit('savexls', __('button.savexlsx'));
				//echo Form::submit('savepdf', __('button.savepdf'));
			echo Form::close();
			} else {
				echo Form::submit('savecsv', __('button.savecsv'), array('disabled'=>'disabled'));
				
			}
			?>
</div>
