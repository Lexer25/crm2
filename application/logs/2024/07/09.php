<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-07-09 00:30:49 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 287 ] in file:line
2024-07-09 00:30:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 00:31:25 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 287 ] in file:line
2024-07-09 00:31:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 00:32:13 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 287 ] in file:line
2024-07-09 00:32:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 10:02:16 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vvv ~ APPPATH\classes\Const2.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:02:16 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:02:48 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vvv ~ APPPATH\classes\Const2.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:02:48 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:03:19 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vvv ~ APPPATH\classes\Const2.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:03:19 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:03:34 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vvv2 ~ APPPATH\classes\Const2.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:03:34 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:03:55 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vvv2 ~ APPPATH\classes\Const2.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:03:55 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:03:58 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vvv2 ~ APPPATH\classes\Const2.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:03:58 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:04:01 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vvv2 ~ APPPATH\classes\Const2.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:04:01 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:04:08 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vvv2 ~ APPPATH\classes\Const2.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:04:08 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:06:57 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vvv2 ~ APPPATH\classes\Const2.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:06:57 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:12
2024-07-09 10:07:32 --- CRITICAL: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH\classes\Const2.php [ 12 ] in file:line
2024-07-09 10:07:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 10:08:44 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant CREATE - assumed 'CREATE' ~ APPPATH\classes\Const2.php [ 16 ] in C:\xampp\htdocs\crm2\application\classes\Const2.php:16
2024-07-09 10:08:44 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Const2.php(16): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\\xampp\\htdocs...', 16, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Const2.php:16
2024-07-09 10:11:08 --- CRITICAL: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH\classes\Const2.php [ 16 ] in file:line
2024-07-09 10:11:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 10:11:21 --- CRITICAL: ErrorException [ 2048 ]: Non-static method Const2::vvv() should not be called statically ~ APPPATH\views\dashboard.php [ 35 ] in C:\xampp\htdocs\crm2\application\views\dashboard.php:35
2024-07-09 10:11:21 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Kohana_Core::error_handler(2048, 'Non-static meth...', 'C:\\xampp\\htdocs...', 35, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Const2::vvv()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\views\dashboard.php:35
2024-07-09 10:13:53 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Const2::vvv() ~ APPPATH\views\dashboard.php [ 35 ] in file:line
2024-07-09 10:13:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 10:13:56 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Const2::vvv() ~ APPPATH\views\dashboard.php [ 35 ] in file:line
2024-07-09 10:13:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 10:16:04 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'const' (T_CONST), expecting variable (T_VARIABLE) ~ APPPATH\classes\Const2.php [ 9 ] in file:line
2024-07-09 10:16:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 10:17:21 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant danger - assumed 'danger' ~ APPPATH\views\dashboard.php [ 35 ] in C:\xampp\htdocs\crm2\application\views\dashboard.php:35
2024-07-09 10:17:21 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\dashboard.php(35): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\\xampp\\htdocs...', 35, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\dashboard.php:35
2024-07-09 20:26:40 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 157 ] in file:line
2024-07-09 20:26:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 20:53:20 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Auth_City::$get_user ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 86 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:86
2024-07-09 20:53:20 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(86): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 86, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(39): Kohana_ACL_Auth->__construct(true)
#2 [internal function]: Kohana_ACL_Auth::instance()
#3 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php(162): ReflectionMethod->invokeArgs(NULL, Array)
#4 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php(71): Kohana_ACL->__construct(true)
#5 C:\xampp\htdocs\crm2\application\views\sidebar.php(30): Kohana_ACL::instance(true)
#6 C:\xampp\htdocs\crm2\application\views\template.php(91): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#15 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#16 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:86
2024-07-09 20:53:43 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Auth_City::$role ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 86 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:86
2024-07-09 20:53:43 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(86): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 86, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(39): Kohana_ACL_Auth->__construct(true)
#2 [internal function]: Kohana_ACL_Auth::instance()
#3 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php(162): ReflectionMethod->invokeArgs(NULL, Array)
#4 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php(71): Kohana_ACL->__construct(true)
#5 C:\xampp\htdocs\crm2\application\views\sidebar.php(30): Kohana_ACL::instance(true)
#6 C:\xampp\htdocs\crm2\application\views\template.php(91): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#15 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#16 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:86
2024-07-09 21:01:39 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Auth_City::$get_user ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 86 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:86
2024-07-09 21:01:39 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(86): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 86, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(39): Kohana_ACL_Auth->__construct(true)
#2 [internal function]: Kohana_ACL_Auth::instance()
#3 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php(162): ReflectionMethod->invokeArgs(NULL, Array)
#4 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php(71): Kohana_ACL->__construct(true)
#5 C:\xampp\htdocs\crm2\application\views\sidebar.php(30): Kohana_ACL::instance(true)
#6 C:\xampp\htdocs\crm2\application\views\template.php(91): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#15 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#16 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:86
2024-07-09 22:34:06 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-09 22:34:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:06:10 --- CRITICAL: ErrorException [ 2 ]: Missing argument 2 for Kohana_Arr::get(), called in C:\xampp\htdocs\crm2\application\classes\Auth\City.php on line 68 and defined ~ SYSPATH\classes\Kohana\Arr.php [ 280 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:280
2024-07-09 23:06:10 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php(280): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\\xampp\\htdocs...', 280, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Auth\City.php(68): Kohana_Arr::get(Array)
#2 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('USER19144', '2024', NULL)
#3 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('USER19144', '2024', NULL)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:280
2024-07-09 23:12:06 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method ACL::losd() ~ APPPATH\views\dashboard.php [ 31 ] in file:line
2024-07-09 23:12:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:12:16 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 288 ] in file:line
2024-07-09 23:12:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:14:44 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 287 ] in file:line
2024-07-09 23:14:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:17:27 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 287 ] in file:line
2024-07-09 23:17:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:17:35 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 287 ] in file:line
2024-07-09 23:17:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:18:41 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 286 ] in file:line
2024-07-09 23:18:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:21:14 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 286 ] in file:line
2024-07-09 23:21:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:21:16 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 286 ] in file:line
2024-07-09 23:21:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:24:24 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 285 ] in file:line
2024-07-09 23:24:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:26:01 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_user() on null ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 285 ] in file:line
2024-07-09 23:26:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:26:32 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-07-09 23:27:50 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-07-09 23:53:15 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH\passoffice\views\passoffice\config.php [ 166 ] in file:line
2024-07-09 23:53:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:55:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH\passoffice\views\passoffice\config.php [ 167 ] in file:line
2024-07-09 23:55:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:56:29 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: acl ~ MODPATH\passoffice\views\passoffice\config.php [ 118 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:118
2024-07-09 23:56:29 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php(118): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 118, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:118
2024-07-09 23:57:39 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '>' ~ MODPATH\passoffice\views\passoffice\config.php [ 118 ] in file:line
2024-07-09 23:57:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:57:49 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ MODPATH\passoffice\views\passoffice\config.php [ 118 ] in file:line
2024-07-09 23:57:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-09 23:58:00 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: acl ~ MODPATH\passoffice\views\passoffice\config.php [ 138 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:138
2024-07-09 23:58:00 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php(138): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 138, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:138