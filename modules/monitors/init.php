<?php
// Добавить в файл маршрутов
Route::set('events_api', 'events/<action>(/<id>)', array(
    'action' => 'getEvent|getEvents',
    'id' => '\d+'
))
->defaults(array(
    'controller' => 'events',
));