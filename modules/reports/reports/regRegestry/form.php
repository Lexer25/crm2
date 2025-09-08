<?php
/**Форма для выбора месяцев, за которые надо подготовить отчет.
 * номер отчета 234
 * 19.11.2024 
 * 07.09.2025 
 * 
 */
 //echo Debug::vars('7', $report_name);//exit;
 //echo Debug::vars('9', $params);exit;
?>
	<br class="clear">
	<div class="content">
	
<!--	<form method="get" action="<?php echo URL::site('reports/'.$report_name.'/generate'); ?>" class="report-form"> -->
   <?php echo Form::open('reports/'.$report_name.'/generate', array('method' => 'get')); ?>

   <input type="hidden" name="report" value="<?php echo $report_name; ?>">
	
	 <!--  <div class="form-actions">
        <button type="submit" name="action" value="prepare" class="btn btn-primary">
            <i class="icon-refresh"></i> Prepare Report
			
        </button>-->
		<?php echo Form::submit('button', __('button.makeReport')); ?>
    </div>
	<?php
		
		//echo Form::open(URL::site('reports/'.$report_name.'/generate'));
		
		//echo Debug::vars('6', date('Y-m')); exit;
		?>
		 
			<br>
			<fieldset>
				<legend><?php echo __('Месяцы'); ?></legend>
				<?php
				//echo Kohana::message('report234', 'aboutReport234');
				echo '<br>';
				 echo Debug::vars('9', $params);
					echo Form::input("monceList", null, array('id'=>'monthselect', 'type'=>'text'));

				?>
							
			</fieldset>				
			<?php 
			
			//echo Form::hidden('id_report', '234');
			echo Form::hidden('report', $report_name);
			//echo Form::submit('button', __('button.makeReport'));
				
			echo Form::close();
			?>
</div>
