<?php 


		/* $configMenu= MenuModuleUser::factory();// получаю массив меню из указанного в конфигурации файла
		$fullMenu='leftside';// полный список меню. Файл со списком должен находится в C:\xampp\htdocs\crm2\modules\menu\config\menu\<$fullMenu>.php. 
		echo (string)MenuUser::factory($fullMenu, $configMenu);//работаю с классом, который фильтрует основной набор меню
 */

//область для быстрого тестирования. Эта область показывается при обращении по адресу http://127.0.0.1/crm2/
if (false)
{

	echo 'Test';

	echo Debug::vars('27', Kohana::$config->load('config_newcrm_')->get('contactListIdView_', '123-321'));//exit;
	$cache = Cache::instance();
	//$cache->set('foo', '777');
	echo Debug::vars('30', Cache::instance()->get('foo'));
	$cache_file = Cache::instance('file');
	$cache_file->garbage_collect();
	

}