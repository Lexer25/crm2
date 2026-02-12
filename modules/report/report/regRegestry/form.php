
<script>
/* 	$(document).ready(function() {
	  $('#monthselect').multiMonthPicker({
		value: '2023-10'
	  });
	}); */
</script>
<?php
/**Форма для выбора месяцев, за которые надо подготовить отчет.
 * 13.09.2025 в значение value надо бы подставлять monceList, но не получается: если скрипт раскомментировать, то даже выбор перестает работать.
 */

 //echo Debug::vars('9', $params);//exit; monceList
 
 $monceList = isset($params['monceList']) ? $params['monceList'] : '';
 

?>

123
<br class="clear">
	<div class="content">

   <?php echo Form::open('report/'.$report_name.'/generate', array('method' => 'get')); ?>

   <input type="hidden" name="report" value="<?php echo $report_name; ?>">

		<?php echo Form::submit('button', __('button.makeReport')); ?>
    			<br>
			<fieldset>
				<legend><?php echo __('Месяцы'); ?></legend>
				<?php
				echo '<br>';
				// echo Debug::vars('9', $params);
					echo Form::input("monceList", null, array('id'=>'monthselect', 'type'=>'text'));
					

				?>
							
			</fieldset>				
			<?php 

			echo Form::hidden('report', $report_name);
			echo Form::close();
			?>
</div>
