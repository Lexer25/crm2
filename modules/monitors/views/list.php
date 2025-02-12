<script type="text/javascript">


 
  	$(function() {		
  		$("#tablesorter").tablesorter({ headers: { 7:{sorter: false}},  widgets: ['zebra']});
		
  	});	
	
</script>
<?php 
//https://webformyself.com/sortirovka-tablic-pri-pomoshhi-plagina-tablesorter-js/?ysclid=lrgdz4nrzp693511651
// список идентификаторов
//echo Debug::vars('2', $cards); //exit;
//echo Debug::vars('2-2', $cardsList); //exit;
//echo Debug::vars('16', array_diff($cards, $cardsList));//exit;
//echo Debug::vars('12', $cardsList); //exit;
//echo Debug::vars('2', $catdTypelist); //exit;
//echo Debug::vars('3', $alert); //exit;
//echo Debug::vars('4', $filter); //exit;
//echo Debug::vars('5', $pagination); //exit;
define ('_notAllowed', "HTML::image('images/text_lock.png', array('title' => __('tip.notAllowed'), 'width'=>'32'))");
include Kohana::find_file('views','alert');
if ($alert) { ?>
<div class="alert_success">
	<p>
		<img class="mid_align" alt="success" src="images/icon_accept.png" />
		<?php echo $alert; ?>
	</p>
</div>
<?php } ?>
<div class="onecolumn">
	<div class="header">
		<div id="search"<?php if (isset($hidesearch)) echo ' style="display: none;"'; ?>>
			<form action="cards/search_any" method="post">
			
				<input type="text" class="search noshadow" title="<?php echo __('search'); ?>" name="q" id="q" value="<?php if (isset($filter)) echo $filter; ?>" />
			</form>
		</div>
		<span><?php 
		switch(Session::instance()->get('identifier')){
			case 1:
				echo __('cards.titleRFID'); 
			break;
			case 1:
				echo __('cards.titleGRZ'); 
			break;
			default:
		break;
		}			
		
	?></span>
	</div>
	<br class="clear"/>
	<div class="content">

		

		<form id="form_data" name="form_data" action="" method="post">
			<table class="data tablesorter-blue" width="100%" cellpadding="0" cellspacing="0"  >
			<thead>
					<tr>
						<th class="filter-false sorter-false"><?php echo __('sn'); ?></th>
						<th><?php echo __('cards.code'); ?></th>
						<th><?php echo __('cards.id_cardtype'); ?></th>
						<th><?php echo __('cards.status'); ?></th>
						<th><?php echo __('cards.datestart'); ?></th>
						<th><?php echo __('cards.dateend'); ?></th>
						<th><?php echo __('cards.active'); ?></th>
						<th><?php echo __('cards.holder'); ?></th>
						<th><?php echo __('Должность'); ?></th>
						<th><?php echo __('cards.company'); ?></th>
						
					</tr>
			</thead>	
			<tbody>	
				<tr align="center">
					<?php
					 	echo '<td>1</td>';
						echo '<td>2</td>';
						echo '<td>3</td>';
						echo '<td>4</td>';
						echo '<td>5</td>';
						echo '<td>6</td>';
						echo '<td>7</td>';
						echo '<td>8</td>';
						echo '<td>9</td>'; 
						echo '<td>10</td>'; 
					
					?>
						
					</tr>
			
				
					
				</tbody>
			</table>
			<div id="chart_wrapper" class="chart_wrapper"></div>
		

	</div>
</div>

