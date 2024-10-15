<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-09-08 15:19:38 --- CRITICAL: Exception [ 182 ]: Вы не можете добавлять сотрудников в организацию "Все" ~ APPPATH\classes\Controller\contacts.php [ 224 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 15:19:38 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 15:23:33 --- CRITICAL: Exception [ 182 ]: Вы не можете добавлять сотрудников в организацию "Все" ~ APPPATH\classes\Controller\contacts.php [ 224 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 15:23:33 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 15:23:48 --- CRITICAL: Exception [ 182 ]: Вы не можете добавлять сотрудников в организацию "Все" ~ APPPATH\classes\Controller\contacts.php [ 224 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 15:23:48 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 15:30:43 --- CRITICAL: Exception [ 182 ]: Вы не можете добавлять сотрудников в организацию "Все" ~ APPPATH\classes\Controller\contacts.php [ 224 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 15:30:43 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 15:36:12 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 15:42:41 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'current' ~ APPPATH\views\contacts\edit.php [ 94 ] in file:line
2024-09-08 15:42:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-08 15:44:14 --- CRITICAL: ErrorException [ 1 ]: Cannot access protected property Request::$_uri ~ APPPATH\views\contacts\edit.php [ 94 ] in file:line
2024-09-08 15:44:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-08 15:44:30 --- CRITICAL: ErrorException [ 1 ]: Cannot access empty property ~ APPPATH\views\contacts\edit.php [ 94 ] in file:line
2024-09-08 15:44:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-08 15:44:40 --- CRITICAL: ErrorException [ 1 ]: Cannot access empty property ~ APPPATH\views\contacts\edit.php [ 94 ] in file:line
2024-09-08 15:44:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-08 15:45:02 --- CRITICAL: ErrorException [ 1 ]: Cannot use object of type Request as array ~ SYSPATH\classes\Kohana\Arr.php [ 287 ] in file:line
2024-09-08 15:45:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-08 15:46:26 --- CRITICAL: ErrorException [ 1 ]: Cannot use object of type Request as array ~ SYSPATH\classes\Kohana\Arr.php [ 287 ] in file:line
2024-09-08 15:46:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-08 15:55:26 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '=>' (T_DOUBLE_ARROW) ~ APPPATH\views\contacts\edit.php [ 504 ] in file:line
2024-09-08 15:55:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-08 16:04:38 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Route::name() must be an instance of Route, string given, called in C:\xampp\htdocs\crm2\application\views\contacts\edit.php on line 97 and defined ~ SYSPATH\classes\Kohana\Route.php [ 136 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Route.php:136
2024-09-08 16:04:38 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Route.php(136): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'C:\\xampp\\htdocs...', 136, Array)
#1 C:\xampp\htdocs\crm2\application\views\contacts\edit.php(97): Kohana_Route::name('http://127.0.0....')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Route.php:136
2024-09-08 16:08:41 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 16:08:53 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 16:15:11 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method HTML::abchor() ~ APPPATH\views\contacts\edit.php [ 531 ] in file:line
2024-09-08 16:15:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-08 16:22:57 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-08 16:33:24 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 71 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php:71
2024-09-08 16:33:24 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php(71): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 71, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php(338): Kohana_HTML::chars(Array)
#2 C:\xampp\htdocs\crm2\application\classes\Form.php(107): Kohana_HTML::attributes(Array)
#3 C:\xampp\htdocs\crm2\application\views\contacts\edit.php(537): Form::input('', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#12 [internal function]: Kohana_Controller->execute()
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#16 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#17 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php:71
2024-09-08 16:35:59 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\views\contacts\edit.php [ 537 ] in file:line
2024-09-08 16:35:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-08 16:37:29 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 71 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php:71
2024-09-08 16:37:29 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php(71): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 71, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php(338): Kohana_HTML::chars(Array)
#2 C:\xampp\htdocs\crm2\application\classes\Form.php(107): Kohana_HTML::attributes(Array)
#3 C:\xampp\htdocs\crm2\application\views\contacts\edit.php(537): Form::input('button.backtoli...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#12 [internal function]: Kohana_Controller->execute()
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#16 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#17 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php:71