<div class="onecolumn">
	<div class="header">
		<span><?php 
		echo $report->titleReport; 
		?></span>
<?php
	$data=array();
	if(isset($report)) $data=$report;
	?>
	</div>
	<br class="clear">
	<div class="content">

		<?php 
		if( $data instanceof Report) {//если есть переменная $data типа Report, то организую вывод данных в таблицу
		
		$t1=microtime(true);
		if ($data->totalCountRow>1) { 
		
			echo __('<p>Отчет содержит :count записей.</p>', array(':count'=>$data->totalCountRow));
			
			if($data->totalCountRow>$data->totalCountRow) echo __('<p>Будут показаны первые 100 событий. Для получения полного отчета нажмите "Сохранить результат".</p>');
			
			$tempFile=new tempCSV;
			$tempFile->getFile();
			?>
			<table class="data" width="100%" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<?php
						// первая строка файла содержит заголовки столбцов
						$headerRow = $tempFile->getRow();
						if (is_array($headerRow)) {
							foreach($headerRow as $key=>$value)
							{
								echo '<th>'. $value.'</th>'; 
							}
						}
						?>
					</tr>
				</thead>
				<tbody>
					<?php 
				// выводим все строки до конца файла
				while (true)
				{
					// читаем следующую строку данных из файла
					$row = $tempFile->getRow();
					if ($row === false || !is_array($row)) {
						// достигли конца файла
						break;
					}
					echo '<tr>';
					foreach($row as $key=>$value)
					{
						echo '<td>'. $value.'</td>'; 
					}
					echo '</tr>';				
				}?>
				</tbody>
			</table>
		<?php 
		} else { ?>
		<div style="margin: 100px 0; text-align: center;">
			<?php echo __('history.empty'); ?><br><br>
		</div>
		<?php } 
			
		}
			
			echo __('<p>Отчет подготовлен за :count секунд.</p>', array(':count'=>number_format($data->timeExecute, 3, '.', '')));
			?>
	</div>
</div>

