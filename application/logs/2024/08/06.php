<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-08-06 15:31:12 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 71 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php:71
2024-08-06 15:31:12 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php(71): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 71, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php(338): Kohana_HTML::chars(Array)
#2 C:\xampp\htdocs\crm2\application\classes\Form.php(107): Kohana_HTML::attributes(Array)
#3 C:\xampp\htdocs\crm2\application\classes\Form.php(211): Form::input('key[baseFormatR...', Array, Array)
#4 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\main.php(72): Form::radio('key[baseFormatR...', Array, '2', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#13 [internal function]: Kohana_Controller->execute()
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#15 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#17 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#18 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php:71
2024-08-06 17:32:07 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO) ~ MODPATH\tuner\views\Setting\main.php [ 180 ] in file:line
2024-08-06 17:32:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-06 17:33:23 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ MODPATH\tuner\views\Setting\main.php [ 179 ] in file:line
2024-08-06 17:33:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-06 18:06:16 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO), expecting ',' or ';' ~ APPPATH\views\header.php [ 16 ] in file:line
2024-08-06 18:06:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-06 18:35:42 --- CRITICAL: ErrorException [ 8 ]: Undefined index: howDeletePeople ~ MODPATH\tuner\views\Setting\mainManual.php [ 125 ] in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:125
2024-08-06 18:35:42 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(125): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 125, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:125
2024-08-06 18:40:49 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ MODPATH\tuner\views\Setting\mainManual.php [ 130 ] in file:line
2024-08-06 18:40:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-06 18:41:05 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ MODPATH\tuner\views\Setting\mainManual.php [ 130 ] in file:line
2024-08-06 18:41:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-06 21:30:38 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Form::submut() ~ MODPATH\tuner\views\Setting\mainManual.php [ 78 ] in file:line
2024-08-06 21:30:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-06 21:30:49 --- CRITICAL: ErrorException [ 2 ]: Missing argument 2 for Form::submit(), called in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php on line 78 and defined ~ APPPATH\classes\Form.php [ 354 ] in C:\xampp\htdocs\crm2\application\classes\Form.php:354
2024-08-06 21:30:49 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Form.php(354): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\\xampp\\htdocs...', 354, Array)
#1 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(78): Form::submit('baseFormatRfid')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Form.php:354