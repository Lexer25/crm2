<?php
/**Форма для выбора месяцев, за которые надо подготовить отчет.
 * номер отчета 234
 * 19.11.2024 
 * 
 */
?>
	<br class="clear"/>
	<div class="content">
	<?php
		
		echo Form::open('mreports/makeReport');
		//echo Debug::vars('6', date('Y-m')); exit;
		?>
		 
			<br />
			<fieldset>
				<legend><?php echo __('Месяцы'); ?></legend>
				<?php
					echo Kohana::message('report234', 'aboutReport234');
				//	<input type="text" name="dataReport[monceList]" id="monthselect" />
				echo '<br>';
					echo Form::input("dataReport[monceList]", null, array('id'=>'monthselect', 'type'=>'text'));
				
				
				$n=0;
					/* for($i=1; $i<13; $i++)
					{
						
						if($i==6) {
							echo Form::radio('dataReport[howManyMonce]', $i, true).$i.'<br>';
						} else {
							echo Form::radio('dataReport[howManyMonce]', $i).$i.'<br>';
						}
					} */
				?>
							
			</fieldset>				
			<?php 
			//echo '<p>'.__('howManyMonce').Form::input('dataReport[howManyMonce]', '7').'</p>';
			
			echo Form::hidden('dataReport[id_report]', '234');
			echo Form::submit('dataReport[button]', __('button.makeReport'));
				
		echo Form::close();
			?>
</div>
