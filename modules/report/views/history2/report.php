<div class="onecolumn">
	<div class="header">
		<span><?php echo __('contact.history') ; ?></span>
<?php
	//echo $topbuttonbar;
    //echo Debug::vars('6', ::get('reportdatestart'));
    //echo Debug::vars('6', ::get('reportdateend'));
    //echo Debug::vars('6', $data); exit;
    //echo Debug::vars('6', $report); exit;
$data=array();
if(isset($report)) $data=$report;
$ruid='history2';//r(eport)uid
	?>
	</div>
	<br class="clear" />
    <div class="content">
        <form action="mreports/makeReport" method="post" onsubmit="return validate()">
		

            <table cellspacing="5" cellpadding="5">
                <tbody>
                <tr>
                    <th align="right" style="padding-right: 10px;">
                        <label for="reportdatestart"><?php echo __('report.datestart'); ?></label>
                    </th>
                    <td>
                        <div style="padding-bottom: 10px;">

                            <input type="text" size="12" name="dataReport[reportdatestart]" id="carddatestart" value="<?php
                            echo Cookie::get('reportdatestart', Date::formatted_time('now', "d.m.Y"));														?>" />
                            <br />
                            <span class="error" id="error2" style="color: red; display: none;"><?php echo __('report.emptystarttime'); ?></span>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th align="right" style="padding-right: 10px;">
                        <label for="reportdateend"><?php echo __('report.dateend'); ?></label>
                    </th>
                    <td>
                        <div style="padding-bottom: 10px;">
                            <input type="text" size="12" name="dataReport[reportdateend]" id="carddateend" value="<?php
                            echo Cookie::get('reportdateend', Date::formatted_time('tomorrow', "d.m.Y"));														?>" />
                            <br />
                            <span class="error" id="error3" style="color: red; display: none;"><?php echo __('report.wrongendtime'); ?></span>
                        </div>
                    </td>
                </tr>


                </tbody>
            </table>

            <?php
			//передаю RUID отчета
			
			echo Form::hidden('dataReport[id_event][]', 50);
			echo Form::hidden('dataReport[id_event][]', 65);
			echo Form::hidden('dataReport[id_report]', $ruid);
            
           // echo Form::hidden('id_pep', $contact['ID_PEP']);
            
            //echo Form::hidden('todo', 'wtOncePep');
            echo Form::submit(NULL, __('button.reportEvents'));
            echo Form::close();
			echo __('Внимание! при подготовке отчета выбирается не более 10000 событий. При необходимости получить отчет большего размера разбейте его на несколько частей.');
          	
            ?>


    </div>

	<div class="content">


		<?php 

		
		
		echo Form::open('mreports/export');
	

		
		echo Form::submit('savecsv', __('button.savecsv'));
	
		//echo Debug::vars('96', $data);//exit;
		$t1=microtime(true);
		if (count($data) > 0) { 
		
		echo __('<p>Надено :count событий.</p>', array(':count'=>count($data->rowData)));
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
                 
				
				foreach($h as $key2=>$value2)
				{
				  echo '<tr>'; 
				   echo '<td>'. Arr::get($h, 'DATETIME').'</td>';
					echo '<td>'. Arr::get($h, 'DOORNAME').'</td>';
					echo '<td>'. Arr::get($h, 'EVENTNAME').'</td>';
					echo '<td>'. Arr::get($h, 'NAME').' '.Arr::get($h, 'SURNAME').' '.Arr::get($h, 'PATRONYMIC').'</td>';
					echo '<td>'. Arr::get($h, 'POST').'</td>';
				echo '</tr>';
				}
				
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
