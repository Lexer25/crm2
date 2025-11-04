<?php defined('SYSPATH') or die('No direct script access.');

// Автоматическая загрузка модуля
if (class_exists('Kohana') && ! Kohana::modules())
{
    Kohana::modules(array(
        'scheduler' => MODPATH.'scheduler',
    ));
}