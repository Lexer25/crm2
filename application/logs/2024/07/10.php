<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-07-10 00:02:34 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: roleParent ~ MODPATH\passoffice\views\passoffice\config.php [ 201 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:201
2024-07-10 00:02:34 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php(201): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 201, Array)
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
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:201
2024-07-10 00:03:05 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: roleParent ~ MODPATH\passoffice\views\passoffice\config.php [ 201 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:201
2024-07-10 00:03:05 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php(201): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 201, Array)
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
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:201
2024-07-10 21:13:19 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\template.php [ 96 ] in C:\xampp\htdocs\crm2\application\views\template.php:96
2024-07-10 21:13:19 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 96, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Reports))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\views\template.php:96
2024-07-10 22:47:36 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: acl ~ MODPATH\passoffice\views\passoffice\config.php [ 139 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:139
2024-07-10 22:47:36 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php(139): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 139, Array)
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
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:139
2024-07-10 22:52:09 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Passoffices' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2024-07-10 22:52:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-10 22:54:16 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH\passoffice\classes\model\Passofficem.php [ 749 ] in file:line
2024-07-10 22:54:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-10 22:54:41 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Passoffices' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2024-07-10 22:54:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-10 23:22:33 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19715,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:225
2024-07-10 23:22:38 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-07-10 23:38:51 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Arr::is_assoc() must be of the type array, object given, called in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php on line 607 and defined ~ SYSPATH\classes\Kohana\Arr.php [ 30 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:30
2024-07-10 23:38:51 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php(30): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php(607): Kohana_Arr::is_assoc(Object(Database_Result_Cached))
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php(35): Kohana_Arr::flatten(Object(Database_Result_Cached))
#3 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php(127): Passoffice->init('1')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#12 [internal function]: Kohana_Controller->execute()
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#16 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#17 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:30
2024-07-10 23:39:52 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Arr::is_assoc() must be of the type array, object given, called in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php on line 607 and defined ~ SYSPATH\classes\Kohana\Arr.php [ 30 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:30
2024-07-10 23:39:52 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php(30): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php(607): Kohana_Arr::is_assoc(Object(Database_Result_Cached))
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php(36): Kohana_Arr::flatten(Object(Database_Result_Cached))
#3 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php(127): Passoffice->init('1')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#12 [internal function]: Kohana_Controller->execute()
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#16 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#17 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:30
2024-07-10 23:45:57 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: roleParent ~ MODPATH\passoffice\views\passoffice\config.php [ 151 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:151
2024-07-10 23:45:57 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php(151): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 151, Array)
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
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:151
2024-07-10 23:48:37 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ' ~ MODPATH\passoffice\views\passoffice\config.php [ 149 ] in file:line
2024-07-10 23:48:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-10 23:50:17 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ MODPATH\passoffice\views\passoffice\config.php [ 155 ] in file:line
2024-07-10 23:50:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-10 23:54:23 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ MODPATH\passoffice\views\passoffice\config.php [ 147 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:147
2024-07-10 23:54:23 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php(147): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 147, Array)
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
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\config.php:147
2024-07-10 23:57:07 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ MODPATH\passoffice\views\passoffice\config.php [ 165 ] in file:line
2024-07-10 23:57:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line