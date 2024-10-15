<!DOCTYPE HTML> 
<html> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title><?php echo Kohana::$config->load('main')->get('orgname');?> </title>
	<base href="http://<?php echo Kohana::$config->load('config_newcrm')->iphost.'/'.Kohana::$config->load('config_newcrm')->siteurl;?>/"/>
	<link rel="stylesheet" type="text/css" media="all" href="css/screen.css">
	<link rel="stylesheet" type="text/css" media="all" href="css/datepicker.css">
	<link rel="stylesheet" type="text/css" media="all" href="css/theme.blue.css">
	<link rel="stylesheet" type="text/css" media="all" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="css/theme.default.min.css">
	
	 <?php // echo HTML::style('static/css/bootstrap.css'); ?>
	<?php //echo HTML::style('static/css/modal.css'); ?>
 
	
	<link rel="stylesheet" href="static/css/themes/blue/style.css" type="text/css" media="print, projection, screen" />
	
	
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" media="all" href="css/ie.css" >
	<script type="text/javascript" src="js/excanvas.js"></script>
	<![endif]-->
	
	<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/crm2_hint.js"></script>
	<script type="text/javascript" src="js/visualize/jquery.visualize.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.js"></script><!--что оно делает-->
	<script type="text/javascript" src="js/jquery.fancybox.min.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.widgets.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script>
	<script type="text/javascript" src="js/crm2_custom_blue.js"></script>
	<script type="text/javascript" src="js/crm2_template_tablesorter.js"></script>

	<style>
	/*
		это стиль для нижней таблицы состояний
	*/
			#someidentifier {
				position: fixed;
				z-index: 100; 
				bottom: 0; 
				left: 0;
				width: 100%;
				
				  width: 100%;
				opacity: 0.8;
				background: transparent;
			}
			



			/*
			делает ссылку <a> неактивной
			если указать class="disabled"
			https://stackoverflow.com/questions/43492742/how-to-use-the-disabled-attribute-for-a-a-tag-in-html
			*/
			a.disabled {
				pointer-events: none;
				color: #ccc;
			}


			/*
			Затемняет изображение.
			надо указать class="darken"
			*/
			.lighten {
			 /* filter: brightness(0.6);*/
			  opacity: .3;
			}


			/*
			Кнопка submit становится бледной
			для этого надо указать disabled="disabled"
			https://stackoverflow.com/questions/3759692/css-selector-for-disabled-input-type-submit
			*/
			
			input[type=submit][disabled], input[type=button][disabled],  button[disabled] {
			   opacity: .3;
			}

	</style>
	
  
  
</head>
<body>
	<div class="content_wrapper">
		<?php include Kohana::find_file('views', 'header'); ?>		
		<br>
		<br>
		<?php include Kohana::find_file('views', 'sidebar'); ?>
		<div id="content">
			<div class="inner">
				<?php 
				//include Kohana::find_file('views/','alert');
				echo $content; 
						
							?>



				<?php
				//печатаю в нижней части строку состояния
				//echo Debug::vars(Session::instance()); //exit;
				$list=array(
						'0'=>'HEX 8 byte',
						'1'=>'001A 10 byte',
						'2'=>'DEC 10 digit',
						'4'=>'ГРЗ A123BC45',
						);
						
				$list2=array(
						'0'=>'as baseFormatRfid',
						'1'=>'001A 10 byte',
						'2'=>'DEC 10 digit',
						'4'=>'ГРЗ A123BC45',
						);
						
					
				?>
				<div id="someidentifier">
					<table class="data tablesorter-blue">
						<tr style="filter:alpha(opacity=50)" >
							
							<td><?php echo __('template.Auth', array(':auth'=> Auth::instance()->logged_in()? 'True':'False')) ;?></td>
							<td><?php echo __('Формат RFID в БД СКУД <u>:id</u> (:format)',array(':id'=>Kohana::$config->load('system')->get('baseFormatRfid'), ':format'=> Arr::get($list, Kohana::$config->load('system')->get('baseFormatRfid'), '--')));?></td>
							<td><?php echo __('Формат регистрационного считывателя <u>:id</u> (:format)',array(':id'=>Kohana::$config->load('system')->get('regFormatRfid'), ':format'=> Arr::get($list2, Kohana::$config->load('system')->get('regFormatRfid'))));?></td>
							<td><?php echo __('template.Role', array(':role'=> Session::instance()->get('role')));?></td>
							<td><?php echo __('template.DB', array(':db'=> Arr::get(
									Arr::get(
											Kohana::$config->load('database')->fb,
											'connection' 
											),
								'dsn'))) ;?></td>
								<td><?php echo __('PHP: :php', array(':php'=> phpversion())) ;?></td>
							<td><?php echo __('template.Mode', array(':mode'=> Session::instance()->get('mode')));
							echo '<br>';
							
							echo ConfigType::howDeletePeople() . (ConfigType::howDeletePeople())? 'Удалять':'Увольнять';
							?>
							</td>
							<?php
							$mode=array(0=>'Режим регистрации (0) полный',
										1=>'Режим регистрации (1) быстрый');
							
							?>
							
							<td>
								<?php 
									if(isset(Kohana::$config->load('config_newcrm')->use_acl)){
			
										if (Kohana::$config->load('config_newcrm')->use_acl) {
												echo 'acl  TURN';
										} else {
										echo 'acl  OFF';
										
										}
									} 
									
									
								?></td>
							
							
							<td><?php echo __('template.id_pep', array(':id_pep'=> Arr::get(Auth::instance()->get_user(), 'ID_PEP'))) ;?></td>
							
							
							<td><span id="currentTime"></span></td>
						</tr>
					</table>
				</div>
			</div>
				
		</div>
	</div>

<script>
function updateAdditionalInfo() {
        var currentTime = new Date();
        var formattedTime = currentTime.toLocaleTimeString();
        // Обновляем текущее время
        document.getElementById("currentTime").textContent = "Время: " + formattedTime;
    }
	
 setInterval(updateAdditionalInfo, 1000);
</script>
</body>
</html>
