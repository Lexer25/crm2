<div class="onecolumn">
	<div class="header">
		<span><?php echo __('contact.history') ; ?></span>
<?php
	//echo $topbuttonbar;
    //echo Debug::vars('6', ::get('reportdatestart'));
    //echo Debug::vars('6', ::get('reportdateend'));
    //echo Debug::vars('6', $data); exit;
   // echo Debug::vars('9-9', $report); //exit;
$data=array();
if(isset($report)) $data=$report;
$ruid='history2';//
	?>
	</div>
	<br class="clear">
	<div class="content">


		<?php 
		if( $data instanceof Report) {//если есть переменная дата $data типа Report, то организую вывод данных в таблицу
		
		
		$t1=microtime(true);
		if ($data->totalCountRow>1) { 
		
			echo __('<p>Отчет содержит :count записей.</p>', array(':count'=>$data->totalCountRow));
			echo __('<p>Отчет подготовлен за :count секунд.</p>', array(':count'=>$data->timeExecute));
			echo __('<p>Будут показаны первые 100 событий. Для получения полного отчета нажмите "Сохранить результат".</p>');
			
			
			  $tempFile=new tempCSV;
			  $tempFile->getFile();
			 // echo Debug::vars('96', $tempFile->getRow());exit;
			  
			?>
			<table class="data" width="100%" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
								
						<?php
						//echo Debug::vars('109', $tempFile->getRow());exit;
						foreach($tempFile->getRow()  as $key=>$value)
						{
							echo '<th>'. $value.'</th>'; 
						}
						
						?>
					</tr>
				</thead>
				<tbody>
					<?php 
				$countMax=100;
				if(($data->totalCountRow-1) < $countMax) $countMax=$data->totalCountRow-1;		
				for($i=0; $i<$countMax; $i++)
				{
					echo '<tr>';
					foreach($tempFile->getRow() as $key=>$value)
					{
							echo '<td>'. $value.'</td>'; 
					}
					echo '</tr>';				
				}?>
				</tbody>
			</table>
		<?php 
		//echo __('Время выполнения :timeexec сек.', array(':timeexec'=>(microtime(true)-$t1)));
		} else { ?>
		<div style="margin: 100px 0; text-align: center;">
			<?php echo __('history.empty'); ?><br><br>
		</div>
		<?php } ?>
			<?php 	
			
			// echo Form::hidden('filename', $data->fileName);
			// echo Form::close();
		}
			?>
	</div>
</div>
