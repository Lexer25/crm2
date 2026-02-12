<?php
//view example
//форма отчета по зарегистрированным контактам
//echo Debug::vars('2', $report);//exit; 
//echo Debug::vars('3', $user);//exit; 

?>
<div class="onecolumn">
	<div class="header">
		<span><?php //echo $report->titleReport; ?></span>
		<span><?php //echo $report->org; ?></span>
	</div>

	
	
	<br class="clear"/>
	<div class="content">
		<form id="form_data" name="form_data" action="" method="post">
			Здесь будет выводится подготовленный отчет.<br>
			Ниже приводятся данные, сформированные в файле crm2\modules\reports\reports\example\example.php<br>
			в методе generate.<br><br><br> 
			
			<?php 
			
			echo Debug::vars('19', $report); 
			
			?>
			
		</form>
		
		
	</div>

</div>
