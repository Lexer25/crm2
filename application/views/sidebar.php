

<a href="javascript:" id="show_menu">&nbsp;</a>
<div id="left_menu">
	<a href="javascript:;" id="hide_menu">&nbsp;</a>
	<ul id="main_menu">
	
	<?php 
		
		$configMenu= Kohana::$config->load('config_newcrm')->get('configLeftMenu');// получаю массив меню из указанного в конфигурации файла
		
		
		//$configMenu= MenuModuleUser::factory();// получаю массив меню из указанного в конфигурации файла
		
		//echo Debug::vars('15', $configMenu);exit;
		//если набор меню будет зависеть от параметра user->flag, то получится меню, зависящее от авторизованного пользователя.
		
		$fullMenu='leftside';// полный список меню. Файл со списком должен находится в C:\xampp\htdocs\crm2\modules\menu\config\menu\<$fullMenu>.php. 
				
			
		echo (string)MenuUser::factory($fullMenu, $configMenu);//работаю с классом, который фильтрует основной набор меню
		
	?>	
	</ul>

	<br class="clear">
	<div id="calendar"></div>

</div>