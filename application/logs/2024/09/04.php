<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-09-04 07:43:57 --- DEBUG: 178 SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 1, char 120. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO people (id_pep, id_db, surname, name, patronymic, id_org, note, post) VALUES (19730,1, 'Гость0743', '', '',,'','') ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:211
2024-09-04 08:03:14 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ' ~ MODPATH\contact2\views\list.php [ 195 ] in file:line
2024-09-04 08:03:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 08:03:28 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: topbuttonbar ~ MODPATH\contact2\views\edit.php [ 182 ] in C:\xampp\htdocs\crm2\modules\contact2\views\edit.php:182
2024-09-04 08:03:28 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\contact2\views\edit.php(182): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 182, Array)
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
#14 {main} in C:\xampp\htdocs\crm2\modules\contact2\views\edit.php:182
2024-09-04 08:13:50 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Contact2s::$listsize ~ APPPATH\classes\Controller\contact2s.php [ 31 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contact2s.php:31
2024-09-04 08:13:50 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contact2s.php(31): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 31, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contact2s->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contact2s))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contact2s.php:31
2024-09-04 08:16:58 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'public' (T_PUBLIC) ~ APPPATH\classes\Controller\contact2s.php [ 8 ] in file:line
2024-09-04 08:16:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 08:17:58 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Contact2s::$listsize ~ APPPATH\classes\Controller\contact2s.php [ 49 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contact2s.php:49
2024-09-04 08:17:58 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contact2s.php(49): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 49, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contact2s->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contact2s))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contact2s.php:49
2024-09-04 08:41:42 --- CRITICAL: ErrorException [ 1 ]: Cannot instantiate abstract class Image ~ APPPATH\classes\Controller\contacts.php [ 80 ] in file:line
2024-09-04 08:41:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 08:43:33 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_image' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2024-09-04 08:43:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 08:52:24 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: filename ~ APPPATH\classes\Controller\contacts.php [ 91 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:91
2024-09-04 08:52:24 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(91): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 91, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_upload()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:91
2024-09-04 08:52:38 --- CRITICAL: Kohana_Exception [ 0 ]: Directory must be writable:  ~ MODPATH\image\classes\Kohana\Image.php [ 633 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:91
2024-09-04 08:52:38 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(91): Kohana_Image->save('C:\\xampp\\tmpC:\\...')
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_upload()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:91
2024-09-04 08:59:38 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH\classes\Controller\contacts.php [ 95 ] in file:line
2024-09-04 08:59:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 09:00:04 --- CRITICAL: ErrorException [ 1 ]: Call to a member function save() on string ~ APPPATH\classes\Controller\contacts.php [ 97 ] in file:line
2024-09-04 09:00:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 10:41:19 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\template.php [ 94 ] in C:\xampp\htdocs\crm2\application\views\template.php:94
2024-09-04 10:41:19 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 94, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\views\template.php:94
2024-09-04 21:26:02 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-04 22:26:57 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: dis1 ~ APPPATH\views\sidebar.php [ 159 ] in C:\xampp\htdocs\crm2\application\views\sidebar.php:159
2024-09-04 22:26:57 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\sidebar.php(159): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 159, Array)
#1 C:\xampp\htdocs\crm2\application\views\template.php(89): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#11 {main} in C:\xampp\htdocs\crm2\application\views\sidebar.php:159
2024-09-04 22:27:22 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Tree.php [ 39 ] in C:\xampp\htdocs\crm2\application\classes\Tree.php:39
2024-09-04 22:27:22 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Tree.php(39): Kohana_Core::error_handler(2, 'Invalid argumen...', 'C:\\xampp\\htdocs...', 39, Array)
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(165): Tree->array_to_tree(1)
#2 C:\xampp\htdocs\crm2\application\views\template.php(89): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\application\classes\Tree.php:39
2024-09-04 22:27:28 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Tree.php [ 39 ] in C:\xampp\htdocs\crm2\application\classes\Tree.php:39
2024-09-04 22:27:28 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Tree.php(39): Kohana_Core::error_handler(2, 'Invalid argumen...', 'C:\\xampp\\htdocs...', 39, Array)
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(165): Tree->array_to_tree(1)
#2 C:\xampp\htdocs\crm2\application\views\template.php(89): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\application\classes\Tree.php:39
2024-09-04 22:27:49 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Tree.php [ 39 ] in C:\xampp\htdocs\crm2\application\classes\Tree.php:39
2024-09-04 22:27:49 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Tree.php(39): Kohana_Core::error_handler(2, 'Invalid argumen...', 'C:\\xampp\\htdocs...', 39, Array)
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(165): Tree->array_to_tree(1)
#2 C:\xampp\htdocs\crm2\application\views\template.php(89): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\application\classes\Tree.php:39
2024-09-04 22:51:49 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\views\sidebar.php [ 133 ] in file:line
2024-09-04 22:51:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 23:12:26 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ APPPATH\views\sidebar.php [ 167 ] in file:line
2024-09-04 23:12:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 23:14:47 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '{', expecting '(' ~ APPPATH\classes\Controller\contacts.php [ 30 ] in file:line
2024-09-04 23:14:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 23:22:17 --- CRITICAL: ErrorException [ 1 ]: [] operator not supported for strings ~ APPPATH\classes\Controller\contacts.php [ 35 ] in file:line
2024-09-04 23:22:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 23:23:41 --- CRITICAL: ErrorException [ 1 ]: [] operator not supported for strings ~ APPPATH\classes\Controller\contacts.php [ 36 ] in file:line
2024-09-04 23:23:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 23:24:35 --- CRITICAL: ErrorException [ 1 ]: [] operator not supported for strings ~ APPPATH\classes\Controller\contacts.php [ 34 ] in file:line
2024-09-04 23:24:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 23:27:25 --- CRITICAL: ErrorException [ 1 ]: [] operator not supported for strings ~ APPPATH\classes\Controller\contacts.php [ 36 ] in file:line
2024-09-04 23:27:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 23:30:20 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\Controller\contacts.php [ 34 ] in file:line
2024-09-04 23:30:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-04 23:30:29 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: post ~ APPPATH\classes\Controller\contacts.php [ 37 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:37
2024-09-04 23:30:29 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(37): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 37, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_saveFastOrder()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:37
2024-09-04 23:36:32 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\template.php [ 94 ] in C:\xampp\htdocs\crm2\application\views\template.php:94
2024-09-04 23:36:32 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 94, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\views\template.php:94