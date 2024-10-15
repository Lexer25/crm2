<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-09-03 21:53:52 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-03 22:15:11 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ MODPATH\passoffice\views\passoffice\edit.php [ 206 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\edit.php:206
2024-09-03 22:15:11 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\edit.php(206): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\\xampp\\htdocs...', 206, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\edit.php:206
2024-09-03 22:17:26 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ MODPATH\passoffice\views\passoffice\edit.php [ 206 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\edit.php:206
2024-09-03 22:17:26 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\edit.php(206): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\\xampp\\htdocs...', 206, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\edit.php:206
2024-09-03 22:34:01 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_contact2' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2024-09-03 22:34:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-03 22:34:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Contact2::init() ~ APPPATH\views\sidebar.php [ 119 ] in file:line
2024-09-03 22:34:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-03 22:47:19 --- CRITICAL: View_Exception [ 0 ]: The requested view Passoffice2s/list could not be found ~ SYSPATH\classes\Kohana\View.php [ 265 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\View.php:145
2024-09-03 22:47:19 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(145): Kohana_View->set_filename('Passoffice2s/li...')
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(30): Kohana_View->__construct('Passoffice2s/li...', NULL)
#2 C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php(170): Kohana_View::factory('Passoffice2s/li...')
#3 C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php(122): Controller_Passoffice2s->action_index()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffice2s->action_guest()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffice2s))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\View.php:145
2024-09-03 22:48:30 --- CRITICAL: View_Exception [ 0 ]: The requested view Passoffices/list could not be found ~ SYSPATH\classes\Kohana\View.php [ 265 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\View.php:145
2024-09-03 22:48:30 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(145): Kohana_View->set_filename('Passoffices/lis...')
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(30): Kohana_View->__construct('Passoffices/lis...', NULL)
#2 C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php(170): Kohana_View::factory('Passoffices/lis...')
#3 C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php(122): Controller_Passoffice2s->action_index()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffice2s->action_guest()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffice2s))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\View.php:145
2024-09-03 23:12:47 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ MODPATH\contact2\views\edit.php [ 206 ] in C:\xampp\htdocs\crm2\modules\contact2\views\edit.php:206
2024-09-03 23:12:47 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\contact2\views\edit.php(206): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\\xampp\\htdocs...', 206, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffice2s))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\contact2\views\edit.php:206
2024-09-03 23:13:54 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: id ~ MODPATH\contact2\classes\controller\Passoffice2s.php [ 424 ] in C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php:424
2024-09-03 23:13:54 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php(424): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 424, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffice2s->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffice2s))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php:424
2024-09-03 23:16:11 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Contact::$id ~ MODPATH\contact2\classes\controller\Passoffice2s.php [ 446 ] in C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php:446
2024-09-03 23:16:11 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php(446): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 446, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffice2s->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffice2s))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php:446
2024-09-03 23:28:05 --- CRITICAL: ErrorException [ 4096 ]: Object of class Controller_Passoffice2s could not be converted to string ~ MODPATH\contact2\classes\controller\Passoffice2s.php [ 465 ] in C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php:465
2024-09-03 23:28:05 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php(465): Kohana_Core::error_handler(4096, 'Object of class...', 'C:\\xampp\\htdocs...', 465, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffice2s->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffice2s))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php:465
2024-09-03 23:28:05 --- CRITICAL: ErrorException [ 4096 ]: Object of class Controller_Passoffice2s could not be converted to string ~ MODPATH\contact2\classes\controller\Passoffice2s.php [ 465 ] in C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php:465
2024-09-03 23:28:05 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php(465): Kohana_Core::error_handler(4096, 'Object of class...', 'C:\\xampp\\htdocs...', 465, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffice2s->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffice2s))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\contact2\classes\controller\Passoffice2s.php:465
2024-09-03 23:38:07 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\views\contacts\edit.php [ 328 ] in file:line
2024-09-03 23:38:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line