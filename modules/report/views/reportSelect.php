	<br class="clear"/>
	<div class="content">
	<?php
		echo Kohana::message('report234', 'aboutReport234');
		echo Form::open('mreports/makeReport');
		?>
		
		 <input type="text" size="12" name="monthselet55" id="monthselet" value="<?php
                            echo Cookie::get('reportdatestart', Date::formatted_time('now', "d.m.Y"));														?>" />
                            <br />
			<fieldset>
				<legend><?php echo __('Месяцы'); ?></legend>
				<?php
					$n=0;
					for($i=1; $i<13; $i++)
					{
						
						if($i==6) {
							echo Form::radio('dataReport[howManyMonce]', $i, true).$i.'<br>';
						} else {
							echo Form::radio('dataReport[howManyMonce]', $i).$i.'<br>';
						}
					}
				?>
							
			</fieldset>				
			<?php 
			//echo '<p>'.__('howManyMonce').Form::input('dataReport[howManyMonce]', '7').'</p>';
			
			echo Form::hidden('dataReport[id_report]', '234');
			echo Form::submit('dataReport[button]', __('button.makeReport'));
				
		echo Form::close();
			?>
</div>
