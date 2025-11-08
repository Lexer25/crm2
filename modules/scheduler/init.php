<?php defined('SYSPATH') or die('No direct script access.');

// Автоматическая загрузка модуля
if (class_exists('Kohana') && ! Kohana::modules())
{
    Kohana::modules(array(
        'scheduler' => MODPATH.'scheduler',
    ));
}

// CLI routes
/* if (PHP_SAPI == 'cli')
{
    Route::set('scheduler_cli', 'scheduler(/<action>)')
        ->defaults(array(
            'controller' => 'scheduler',
            'action'     => 'index',
        ));
} */

// Web routes
/* 
Route::set('scheduler', 'scheduler(/<action>(/<id>))')
    ->defaults(array(
       // 'directory'  => '',
        'controller' => 'scheduler',
        'action'     => 'index',
    ));
	 */