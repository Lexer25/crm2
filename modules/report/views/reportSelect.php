	<br class="clear"/>
	<div class="content">
	<?php
		echo Form::open('mreports/makeReport');

			echo '<p>'.__('howManyMonce').Form::input('dataReport[howManyMonce]', '7').'</p>';
			echo '<p>'.__('comment').Form::input('dataReport[comment]').'</p>';
			echo Form::hidden('dataReport[id_report]', '234');
			echo Form::submit('dataReport[button]', __('button.makeReport'));
				
		echo Form::close();
			?>
</div>
