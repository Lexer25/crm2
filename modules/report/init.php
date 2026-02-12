<?php

Route::set('report', 'report/<report>(.<format>)')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'index',
        'format' => 'html'
    ));	

Route::set('report_generate', 'report/<report>/generate')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'generate'
    ));

Route::set('report_save', 'report/<report>/save')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'save'
    ));

Route::set('report_download', 'report/<report>/download.<format>')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'download',
        'format' => 'html'
    ));
	
Route::set('report_result', 'report/<report>/result')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'result'
    ));
