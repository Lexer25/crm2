<div class="onecolumn">
	<div class="header">
		<span><?php echo 'Сообщение об ошибке при подготовке отчета' ?></span>
		
	</div>

	
	
	<br class="clear"/>
	<div class="content">
	<?php
		echo __('messAboutReportErr');
		echo Debug::vars($mess);
	
	?>
		
		
	</div>
		
</div>
