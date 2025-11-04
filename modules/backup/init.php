<?php defined('SYSPATH') or die('No direct script access.');

if ( ! defined('BACKUP_PATH'))
{
    //define('BACKUP_PATH', APPPATH.'backups/');
    define('BACKUP_PATH', 'C:\\rrr/');
}


    // Регистрируем маршруты
Route::set('backup', 'backup/<action>(/<filename>)', array(
    'filename' => '.*' // Разрешить любые символы включая точки
))
->defaults(array(
    'controller' => 'backup',
    'action'     => 'index',
));
/* Route::set('backup', 'backup(/<action>(/<filename>(.<ext>)))')
	->defaults(array(
		'controller' => 'backup',
		'action'     => 'index',
	)); */
	
	
