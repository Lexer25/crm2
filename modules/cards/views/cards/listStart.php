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
	
		<?php
		
		echo Debug::vars('28', $q);//exit;
		?>

		<form id="form_data" name="form_data" action="" method="post">
			
		<div style="margin: 100px 0; text-align: center;">
			<?php echo __('identifier.empty');
				echo '<br><br>'.HTML::anchor('cards/index/no/all','Показать все. Вывод всех записей может занять много времени.');
			?><br /><br />
			
			
		</div>
		
		</form>
		

	</div>
</div>

