<?php
/**Форма для выбора параметров отчета о выданных карта в бюро пропусков
 * 
 * 13.02.2026 
 * 
 */

 $user=new User();
$reportdatestart = isset($params['reportdatestart']) ? $params['reportdatestart'] : Date::formatted_time('now', "d.m.Y");
$reportdateend = isset($params['reportdateend']) ? $params['reportdateend'] : Date::formatted_time('tomorrow', "d.m.Y");


?>

<script language="javascript">
$(document).ready(function () {
//change selectboxes to selectize mode to be searchable
$("select").find('option[value="1"]').attr('disabled','disabled').attr('value','');
$("select").select2();
});
</script>

<br class="clear">
<div >
<?php echo Form::open('report/'.$report_name.'/generate', array('method' => 'get')); ?>
  	<?php 
		
		echo Form::submit('button', __('button.makeReport')); 
	
		?>
    
 
			<br>
			<fieldset>
				<legend><?php echo __('Выданные пропуска'); ?></legend>
				 <table cellspacing="5" cellpadding="5">
                <tbody>
                <tr>
                    <th align="right" style="padding-right: 10px;">
                        <label for="reportdatestart"><?php echo __('report.datestart'); ?></label>
                    </th>
                    <td>
                        <div style="padding-bottom: 10px;">
							
							<input type="text" size="12" name="reportdatestart" id="carddatestart" value="<?php echo $reportdatestart;?>" />
							
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
                           	<input type="text" size="12" name="reportdateend" id="carddateend" value="<?php echo $reportdateend;?>" />
							
							
                            <br>
                            <span class="error" id="error3" style="color: red; display: none;"><?php echo __('report.wrongendtime'); ?></span>
                        </div>
                    </td>
                </tr>


                </tbody>
            </table>
			

					
							

					
							
			</fieldset>				
			<?php 
			
	
				
		echo Form::close();
			?>
</div>