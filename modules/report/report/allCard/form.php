<?php
/**Форма для выбора параметров отчета Идентификаторы
 * номер отчета 234
 * 19.11.2024 
 * 
 */
//echo Debug::vars('7', $params);//exit;

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
		
			<?php 
			
			
			//echo Form::submit('button', __('button.makeReport'));
				
		echo Form::close();
			?>
</div>