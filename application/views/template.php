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

//вывод строки статуса					
				if (true) include Kohana::find_file('views', 'bottom_status_table');				
								?>
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
