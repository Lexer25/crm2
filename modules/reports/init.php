<?php

Route::set('reports', 'reports/<report>(.<format>)')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'index',
        'format' => 'html'
    ));	

Route::set('reports_generate', 'reports/<report>/generate')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'generate'
    ));

Route::set('reports_save', 'reports/<report>/save')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'save'
    ));

Route::set('reports_download', 'reports/<report>/download.<format>')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'download',
        'format' => 'html'
    ));
	
Route::set('report_result', 'reports/<report>/result')
    ->defaults(array(
        'controller' => 'report',
        'action' => 'result'
    ));
