<?php defined('SYSPATH') or die('No direct script access.');

if (PHP_SAPI == 'cli')
{
    // Регистрируем CLI маршруты
    Route::set('scheduler', 'scheduler(/<action>)')
        ->defaults(array(
            'controller' => 'scheduler',
            'action'     => 'index',
        ));
}