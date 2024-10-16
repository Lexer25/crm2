<?php	
//echo Debug::vars('2',$getStat);exit;
//echo Debug::vars('3',Arr::get($getStat,'title'));//exit;

					
 include Kohana::find_file('views', 'paginatoion_controller_template'); 
		$sn=0;?>
<div class="onecolumn">
	<div class="header">							
		<table class="data tablesorter-blue" width="100%" cellpadding="0" cellspacing="0" id="tablesorter" >
			<thead>
					<?php 
					echo'<tr>';
						echo '<th>'.++$sn.'1</th>';
					 foreach(Arr::get($getStat,'title') as $key=>$value){
					 
					
						echo '<th>'.$value.'</th>';
						
				
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
