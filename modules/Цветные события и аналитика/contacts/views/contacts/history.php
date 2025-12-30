<div class="onecolumn">
	<div class="header">
		<span><?php echo __('contact.history_24') . ' - ' . iconv('CP1251', 'UTF-8', $contact['NAME'] . ' ' . $contact['SURNAME']); ?></span>
<?php
	echo $topbuttonbar;	
	?>
	</div>
	<br class="clear" />
	<div class="content">
		<?php 
		//echo Debug::vars('33',array_slice($data, 0, 10));
		
		if (count($data) > 0) { ?>
		<table class="data" width="100%" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<!--<th style="width:20%"><?php echo __('history.id_event'); ?></th>-->
					<th><?php echo __('history.date'); ?></th>
					<th><?php echo __('history.device'); ?></th>
					<th><?php echo __('history.event'); ?></th>
					<th><?php echo __('history.any'); ?></th>
					<th><?php echo __('history.analit'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				//<tr class="danger">
				//массив для расраски кодов событий
				
				foreach ($data as $h) { 
				switch(Arr::get($h, 'ANALIT')){
					case 480:
					case 507:
					case 509:
					case 650:
					case 651:
					case 652:
					case 653:
					case 654:
					case 655:
					case 656:
						//$_color='success';
						$_color='#dff2d9';
					break;
					
					case 481:
					case 500:
					case 501:
					case 502:
					case 503:
					case 504:
					case 505:
					case 506:
					case 506:
					case 508:
					case 657:
						//$_color='danger';
						$_color='#f4ddde';
					break;
					case 510:
					case 658:
					case 659:
					case 5001:
					case 5011:
					case 5021:
					case 5031:
					case 5041:
					case 5051:
						//$_color='warning';
						$_color='#fbf8e1';
					break;
					default:
						//$_color='active';
						$_color='#f8f9fa';
					break;
				


					
				}
				?>
				 <tr style="background-color: <?php echo $_color;?>;">
					<!--<td><?php echo $h['ID_EVENT']; ?></td>-->
					<td><?php echo $h['DATETIME']; ?></td>
					<td><?php echo iconv('CP1251', 'UTF-8', $h['DEVICENAME']); ?></td>
					<td><?php echo iconv('CP1251', 'UTF-8', $h['EVENTNAME']); ?></td>
					<td><?php echo iconv('CP1251', 'UTF-8', $h['ID_CARD']); ?></td>
					<td><?php echo __('mess_'.$h['ANALIT']); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php } else { ?>
		<div style="margin: 100px 0; text-align: center;">
			<?php echo __('history.empty'); ?><br /><br />
		</div>
		<?php } ?>
	</div>
</div>
