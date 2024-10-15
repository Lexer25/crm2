<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-10-01 11:16:04 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:16:09 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:16:17 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:17:13 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:17:27 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:21:17 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:31:37 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$this' (T_VARIABLE) ~ APPPATH\classes\Controller\contacts.php [ 211 ] in file:line
2024-10-01 11:31:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 11:45:07 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '306' (T_LNUMBER) ~ APPPATH\classes\Model\contact.php [ 331 ] in file:line
2024-10-01 11:45:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 11:54:31 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:54:31 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:54:31 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:54:36 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:58:19 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:58:35 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 11:59:17 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 12:04:38 --- CRITICAL: Exception [ 63 ]: Дублирование логина и  пароля ~ APPPATH\classes\Auth\City.php [ 62 ] in C:\xampp\htdocs\crm2\application\classes\Auth.php:99
2024-10-01 12:04:38 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth.php(99): Auth_City->_login('user19144', '2024', NULL)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('user19144', '2024', NULL)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\Auth.php:99
2024-10-01 12:07:52 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Auth_City::redirect() ~ APPPATH\classes\Auth\City.php [ 63 ] in file:line
2024-10-01 12:07:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 12:08:33 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Auth_City::redirect() ~ APPPATH\classes\Auth\City.php [ 63 ] in file:line
2024-10-01 12:08:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 12:31:17 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 12:31:31 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-01 12:51:31 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant php - assumed 'php' ~ MODPATH\cards\views\cards\list.php [ 90 ] in C:\xampp\htdocs\crm2\modules\cards\views\cards\list.php:90
2024-10-01 12:51:31 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\views\cards\list.php(90): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\\xampp\\htdocs...', 90, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(102): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\cards\views\cards\list.php:90
2024-10-01 14:03:20 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE) ~ APPPATH\views\contacts\list.php [ 224 ] in file:line
2024-10-01 14:03:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 14:04:16 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant fegee - assumed 'fegee' ~ APPPATH\views\contacts\list.php [ 222 ] in C:\xampp\htdocs\crm2\application\views\contacts\list.php:222
2024-10-01 14:04:16 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\contacts\list.php(222): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\\xampp\\htdocs...', 222, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(102): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\contacts\list.php:222
2024-10-01 14:10:24 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\views\contacts\list.php [ 67 ] in file:line
2024-10-01 14:10:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 14:24:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'поиском' (T_STRING) ~ APPPATH\views\contacts\list.php [ 64 ] in file:line
2024-10-01 14:24:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 14:25:12 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\views\contacts\list.php [ 66 ] in file:line
2024-10-01 14:25:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 14:26:32 --- CRITICAL: ErrorException [ 8192 ]: Non-static method History::getHistory() should not be called statically, assuming $this from incompatible context ~ APPPATH\classes\Controller\contacts.php [ 537 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:537
2024-10-01 14:26:32 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(537): Kohana_Core::error_handler(8192, 'Non-static meth...', 'C:\\xampp\\htdocs...', 537, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_history()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:537
2024-10-01 14:26:44 --- CRITICAL: ErrorException [ 8192 ]: Non-static method History::getHistory() should not be called statically, assuming $this from incompatible context ~ APPPATH\classes\Controller\contacts.php [ 537 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:537
2024-10-01 14:26:44 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(537): Kohana_Core::error_handler(8192, 'Non-static meth...', 'C:\\xampp\\htdocs...', 537, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_history()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:537
2024-10-01 14:34:19 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '>' ~ APPPATH\views\contacts\list.php [ 5 ] in file:line
2024-10-01 14:34:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 14:36:25 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\views\contacts\list.php [ 6 ] in file:line
2024-10-01 14:36:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 14:36:59 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\views\contacts\list.php [ 6 ] in file:line
2024-10-01 14:36:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 14:37:13 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\views\contacts\list.php [ 6 ] in file:line
2024-10-01 14:37:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 14:38:54 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\contacts\list.php [ 69 ] in file:line
2024-10-01 14:38:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-01 14:50:44 --- CRITICAL: ErrorException [ 8192 ]: Non-static method History::getHistory() should not be called statically, assuming $this from incompatible context ~ APPPATH\classes\Controller\contacts.php [ 537 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:537
2024-10-01 14:50:44 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(537): Kohana_Core::error_handler(8192, 'Non-static meth...', 'C:\\xampp\\htdocs...', 537, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_history()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:537