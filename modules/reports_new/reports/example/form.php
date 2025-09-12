<br class="clear">
	<div class="content">

<?php
	echo Form::open('reports/'.$report_name.'/generate', array('method' => 'get')); 
	echo Form::submit('button', __('button.makeReport')); ?>
    

		 
			<br>
			<fieldset>
				<legend><?php echo __('legend'); ?></legend>
				<?php
				
					echo Form::input('_data', null, array('type'=>'text', 'placeholder'=>'example data form'));

				?>
							
			</fieldset>				
			<?php 
			
			//echo Form::hidden('id_report', '234');
			echo Form::hidden('report', $report_name);
			//echo Form::submit('button', __('button.makeReport'));
				
			echo Form::close();
			?>
</div>
