<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-10-10 13:19:09 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\views\contacts\list.php [ 107 ] in file:line
2024-10-10 13:19:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-10 13:31:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'break' (T_BREAK), expecting ',' or ';' ~ APPPATH\views\contacts\list.php [ 113 ] in file:line
2024-10-10 13:31:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-10 15:51:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'case' (T_CASE) ~ APPPATH\views\contacts\list.php [ 126 ] in file:line
2024-10-10 15:51:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-10 15:52:00 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'case' (T_CASE) ~ APPPATH\views\contacts\list.php [ 127 ] in file:line
2024-10-10 15:52:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-10 15:52:03 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'case' (T_CASE) ~ APPPATH\views\contacts\list.php [ 127 ] in file:line
2024-10-10 15:52:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-10 19:07:45 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-10 19:23:49 --- CRITICAL: ErrorException [ 2 ]: include(): Filename cannot be empty ~ APPPATH\views\contacts\list.php [ 61 ] in C:\xampp\htdocs\crm2\application\views\contacts\list.php:61
2024-10-10 19:23:49 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\contacts\list.php(61): Kohana_Core::error_handler(2, 'include(): File...', 'C:\\xampp\\htdocs...', 61, Array)
#1 C:\xampp\htdocs\crm2\application\views\contacts\list.php(61): include()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(50): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\views\contacts\list.php:61