<?php defined('SYSPATH') OR die('No direct script access.');

class MenuUser extends Kohana_Menu {
	
	/**
	 *06.10.2024
	 * Instantiate a new menu с учетом нужного шаблона
	 *предполагается, что из общего файла меню будут выбраны только те пункты, которые указанаы в шаблоне
	 * шаблон - это массив с перечнем корневых элементов меню, которые необходимо вывести на экран
	 */
	public static function factory($config_file = 'simple', $_file = 'simple')
	{
		// Load menu config
		$menu_config = self::_get_menu_config($config_file);
        
		// Auto-detect view path when no view file given
		if (Arr::get($menu_config, 'view') === NULL) {
			$view_file = Kohana::find_file('views/'.self::VIEWS_DIR, $config_file)
				? $config_file : self::DEFAULT_VIEW;
			$menu_config['view'] = self::VIEWS_DIR.DIRECTORY_SEPARATOR.$view_file;
		}
		
	
		$currentMenu=array();//тут будет формироваться текущее меню
		$currentMenu['view']=Arr::get($menu_config, 'view');
		
		//foreach($configMenu as $key){
		foreach($_file as $key){
			
			$currentMenu['items'][]=Arr::get(Arr::get($menu_config, 'items'), $key);

		}			
			
		
		return new Menu($currentMenu);
	}
	

}