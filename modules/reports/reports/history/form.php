<?php
/**Форма для выбора параметров отчета history Журнал событий
 * номер отчета 234
 * 19.11.2024 
 * 
 */
?>
	<br class="clear">
	<div class="content">
<?php echo Form::open('reports/'.$report_name.'/generate', array('method' => 'get')); ?>

   <input type="hidden" name="report" value="<?php echo $report_name; ?>">

		<?php echo Form::submit('button', __('button.makeReport')); ?>
    </div>
	<?php
		
		//echo Form::open(URL::site('reports/'.$report_name.'/generate'));
		
		//echo Debug::vars('6', date('Y-m')); exit;
		?>
		 
			<br>
			<fieldset>
				<legend><?php echo __('Журнал событий'); ?></legend>
				 <table cellspacing="5" cellpadding="5">
                <tbody>
                <tr>
                    <th align="right" style="padding-right: 10px;">
                        <label for="reportdatestart"><?php echo __('report.datestart'); ?></label>
                    </th>
                    <td>
                        <div style="padding-bottom: 10px;">

                            <input type="text" size="12" name="reportdatestart" id="carddatestart" value="<?php
                            echo Cookie::get('reportdatestart', Date::formatted_time('now', "d.m.Y"));?>" />
                            <br>
                            <span class="error" id="error2" style="color: red; display: none;"><?php echo __('report.emptystarttime'); ?></span>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th align="right" style="padding-right: 10px;">
                        <label for="reportdateend"><?php echo __('report.dateend'); ?></label>
                    </th>
                    <td>
                        <div style="padding-bottom: 10px;">
                            <input type="text" size="12" name="reportdateend" id="carddateend" value="<?php
                            echo Cookie::get('reportdateend', Date::formatted_time('tomorrow', "d.m.Y"));?>" />
                            <br>
                            <span class="error" id="error3" style="color: red; display: none;"><?php echo __('report.wrongendtime'); ?></span>
                        </div>
                    </td>
                </tr>


                </tbody>
            </table>
							
			</fieldset>				
			<?php 
			
			
			echo Form::submit('button', __('button.makeReport'));
				
		echo Form::close();
			?>
</div>
