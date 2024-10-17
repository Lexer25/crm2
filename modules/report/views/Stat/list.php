<?php	
//echo Debug::vars('2',$getStat);exit;
//echo Debug::vars('3',Arr::get($getStat,'title'));//exit;

echo __($titleReport);
					
 include Kohana::find_file('views', 'paginatoion_controller_template'); 
		$sn=0;?>
<div class="onecolumn">
	<div class="header">							
		<table class="data tablesorter-blue" width="100%" cellpadding="0" cellspacing="0" id="tablesorter" >
			<thead>
					<?php 
					echo'<tr>';
						echo '<th>'.__('sn').'</th>';
					 foreach(Arr::get($getStat,'titleColumn') as $key=>$value){
					 
					
						echo '<th>'.__($value).'</th>';
						
				
					}; 
					echo '</tr>';?>
			</thead>	
			<tbody>	
								
					<?php 
					
					 foreach(Arr::get($getStat, 'data') as $key=>$value){
					 
					echo'<tr>';
						
						echo '<td>'.++$sn.'</td>';
						
						echo '<td>'.Arr::get($value, 'YEARFROM').'</td>';
						echo '<td>'.Arr::get($value, 'MONTFROM').'</td>';
						echo '<td>'.Arr::get($value, 'COUNT').'</td>';
						
					echo '</tr>';
					}; ?>
			</tbody>
		</table>
	</div>
</div>
