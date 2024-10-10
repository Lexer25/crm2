
<style>
.container {
    width: 100%;
}

.container ul {
    text-align: center;
    list-style: none;
}

.container li {
    display: inline-block;
}
</style>

<a href="javascript:;" id="show_menu">&raquo;</a>
<div id="left_menu">
	<a href="javascript:;" id="hide_menu">&laquo;</a>
	<ul id="main_menu">
	
	<?php 
		//готовлю массив меню исходя из необходимой конфигурации
		/* $configMenu=array(
			'home',
			'org',
			'contact',
			'identity',
			'fastreg',
			'Reports',
			); */
		
		//$var1=(string)Menu::factory('leftside');
		$configMenu= Kohana::$config->load('config_newcrm')->get('configLeftMenu');// получаю массив меню из указанного в конфигурации файла
		$fullMenu='leftside';// полный список меню. Файл со списком должен находится в C:\xampp\htdocs\crm2\modules\menu\config\menu\<$fullMenu>.php. 
		echo (string)MenuUser::factory($fullMenu, $configMenu);//работаю с классом, который фильтрует основной набор меню
		
		
	?>	
	</ul>

	<br class="clear"/>
	<div id="calendar"></div>

</div>