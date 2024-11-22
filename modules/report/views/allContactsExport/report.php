<div class="onecolumn">
	<div class="header">
		<span><?php echo __('contact.allContactsExport') ; ?></span>
<?php
	//echo $topbuttonbar;
    //echo Debug::vars('6', ::get('reportdatestart'));
    //echo Debug::vars('6', ::get('reportdateend'));
    //echo Debug::vars('6', $data); exit;
$data=array();
if(isset($report)) $data=$report;
$ruid='allContactsExport';
	?>
	</div>
	<br class="clear" />
    <div class="content">
        <form action="mreports/makeReport" method="post" onsubmit="return validate()">
		

          

            <?php
			//передаю RUID отчета
			
			
			echo Form::hidden('dataReport[id_report]', $ruid);
            
           echo Form::submit(NULL, __('button.allContactsExport'));
            echo Form::close();
			
          	
            ?>


    </div>

	<div class="content">


		<?php 

		
		
		echo Form::open('mreports/export');
	

		
		echo Form::submit('savecsv', __('button.savecsv'));
	
		//echo Debug::vars('96', $data);//exit;
		$t1=microtime(true);
		if (count($data) > 0) { 
		//echo Debug::vars('52', $data);exit;
		echo __('<p>Надено :count записей.</p>', array(':count'=>count($data->rowData)));
		?>
		<table class="data" width="100%" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
							
					<?php
					
					foreach($data->titleColumn  as $key=>$value)
					{
					    //echo Debug::vars('81', $key, $value); exit;
					    echo '<th>'. $value.'</th>'; 
					}
					
					?>
				</tr>
			</thead>
			<tbody>
				<?php 
				
				foreach ($data->rowData as $h) {
                // echo Debug::vars('74', $h);exit;
				
				
				  echo '<tr>'; 
				   echo '<td>'. Arr::get($h, 'ORGNAME').'</td>';
					echo '<td>'. Arr::get($h, 'NAME').' '.Arr::get($h, 'SURNAME').' '.Arr::get($h, 'PATRONYMIC').'</td>';
					echo '<td>'. Arr::get($h, 'ID_CARD').'</td>';
					echo '<td>'. Arr::get($h, 'ACNAME').'</td>';
					echo '<td>'. Arr::get($h, 'TIME_STAMP').'</td>';
				echo '</tr>';
			
				
				} 
				?>
			</tbody>
		</table>
		<?php 
		//echo __('Время выполнения :timeexec сек.', array(':timeexec'=>(microtime(true)-$t1)));
		} else { ?>
		<div style="margin: 100px 0; text-align: center;">
			<?php echo __('history.empty'); ?><br /><br />
		</div>
		<?php } ?>
			<?php 	
			

			echo Form::close();
			?>
	</div>
</div>
