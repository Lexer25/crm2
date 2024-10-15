<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-07-01 00:01:27 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: alert ~ MODPATH\kohana-acl\views\acl\list.php [ 12 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:12
2024-07-01 00:01:27 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acl))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:12
2024-07-01 00:02:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: people ~ MODPATH\kohana-acl\views\acl\list.php [ 62 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:62
2024-07-01 00:02:09 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(62): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 62, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acl))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:62
2024-07-01 00:03:12 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: people ~ MODPATH\kohana-acl\views\acl\list.php [ 29 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:29
2024-07-01 00:03:12 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(29): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 29, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acl))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:29
2024-07-01 00:04:06 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method ACL::instznce() ~ MODPATH\kohana-acl\views\acl\list.php [ 30 ] in file:line
2024-07-01 00:04:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 00:07:30 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'root' (T_STRING) ~ MODPATH\kohana-acl\views\acl\list.php [ 29 ] in file:line
2024-07-01 00:07:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 00:20:14 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Model_Aclm::$getRoles ~ MODPATH\kohana-acl\views\acl\list.php [ 29 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:29
2024-07-01 00:20:14 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(29): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 29, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:29
2024-07-01 00:20:41 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Model_Aclm::$getRoles ~ MODPATH\kohana-acl\views\acl\list.php [ 29 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:29
2024-07-01 00:20:41 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(29): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 29, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:29
2024-07-01 00:21:15 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Model_Aclm::$getRoles ~ MODPATH\kohana-acl\views\acl\list.php [ 29 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:29
2024-07-01 00:21:15 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(29): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 29, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:29
2024-07-01 00:22:49 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Aclm::roles() ~ MODPATH\kohana-acl\views\acl\list.php [ 31 ] in file:line
2024-07-01 00:22:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 00:26:09 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Aclm::getRosource() ~ MODPATH\kohana-acl\views\acl\list.php [ 30 ] in file:line
2024-07-01 00:26:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 00:26:25 --- CRITICAL: Exception [ 0 ]: Не могу получить список ролей из базы данных alccfg ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 48 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:30
2024-07-01 00:26:25 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(30): Model_Aclm->getResource()
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:30
2024-07-01 00:27:13 --- CRITICAL: Exception [ 48 ]: Не могу получить список ресурсов из базы данных alccfg ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 48 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:30
2024-07-01 00:27:13 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(30): Model_Aclm->getResource()
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:30
2024-07-01 00:28:05 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Aclm::getResources() ~ MODPATH\kohana-acl\views\acl\list.php [ 30 ] in file:line
2024-07-01 00:28:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 00:28:20 --- CRITICAL: Exception [ 48 ]: Не могу получить список ресурсов из базы данных alccfg ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 48 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:30
2024-07-01 00:28:20 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(30): Model_Aclm->getResources()
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:30
2024-07-01 08:19:04 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: showphone ~ MODPATH\kohana-acl\views\acl\list.php [ 49 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:49
2024-07-01 08:19:04 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(49): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 49, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:49
2024-07-01 08:22:42 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH\kohana-acl\views\acl\list.php [ 104 ] in file:line
2024-07-01 08:22:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 08:30:22 --- CRITICAL: ErrorException [ 1 ]: Method name must be a string ~ MODPATH\kohana-acl\views\acl\list.php [ 130 ] in file:line
2024-07-01 08:30:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 08:30:49 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ MODPATH\kohana-acl\views\acl\list.php [ 130 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:130
2024-07-01 08:30:49 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(130): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 130, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:130
2024-07-01 08:31:56 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH\kohana-acl\views\acl\list.php [ 188 ] in file:line
2024-07-01 08:31:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 09:00:07 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH\kohana-acl\views\acl\list.php [ 114 ] in file:line
2024-07-01 09:00:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 09:00:42 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE) ~ MODPATH\kohana-acl\views\acl\list.php [ 83 ] in file:line
2024-07-01 09:00:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 14:05:22 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '/' ~ MODPATH\kohana-acl\views\acl\list.php [ 42 ] in file:line
2024-07-01 14:05:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 14:13:44 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ MODPATH\kohana-acl\views\acl\list.php [ 66 ] in file:line
2024-07-01 14:13:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 14:34:25 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'ролей' (T_STRING) ~ MODPATH\kohana-acl\views\acl\list.php [ 50 ] in file:line
2024-07-01 14:34:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 14:41:24 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\views\sidebar.php [ 339 ] in file:line
2024-07-01 14:41:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 15:17:10 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'break' (T_BREAK) ~ MODPATH\kohana-acl\classes\Controller\Acls.php [ 60 ] in file:line
2024-07-01 15:17:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 15:17:21 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\template.php [ 52 ] in C:\xampp\htdocs\crm2\application\views\template.php:52
2024-07-01 15:17:21 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 52, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\views\template.php:52
2024-07-01 15:18:11 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\template.php [ 52 ] in C:\xampp\htdocs\crm2\application\views\template.php:52
2024-07-01 15:18:11 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 52, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\views\template.php:52
2024-07-01 15:18:59 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\template.php [ 52 ] in C:\xampp\htdocs\crm2\application\views\template.php:52
2024-07-01 15:18:59 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 52, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\views\template.php:52
2024-07-01 15:24:11 --- CRITICAL: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 19 UNIQUE constraint failed: roles_users.user_id, roles_users.role_id [ INSERT INTO roles_users (user_id, role_id) VALUES ('12', '0') ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-01 15:24:11 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(2, 'INSERT INTO rol...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php(105): Kohana_Database_Query->execute('aclcfg')
#2 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(59): Model_Aclm->addRoleUser('12', '0')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Acls->action_addItem()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-01 16:04:48 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Aclm::is_allowed() ~ MODPATH\kohana-acl\views\acl\list.php [ 238 ] in file:line
2024-07-01 16:04:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 16:10:02 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '', '' (T_CONSTANT_ENCAPSED_STRING) ~ MODPATH\kohana-acl\views\acl\list.php [ 244 ] in file:line
2024-07-01 16:10:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 16:53:47 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'case' (T_CASE) ~ MODPATH\kohana-acl\classes\Controller\Acls.php [ 64 ] in file:line
2024-07-01 16:53:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 16:54:33 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: user_id ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 120 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php:120
2024-07-01 16:54:33 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php(120): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 120, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(64): Model_Aclm->addRule('allow', '3', '21', NULL)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Acls->action_addItem()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php:120
2024-07-01 17:14:02 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Aclm::updateRole() ~ MODPATH\kohana-acl\classes\Controller\Acls.php [ 84 ] in file:line
2024-07-01 17:14:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 17:38:51 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '/' ~ MODPATH\kohana-acl\views\acl\list.php [ 281 ] in file:line
2024-07-01 17:38:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 17:45:41 --- CRITICAL: ErrorException [ 1 ]: Class 'From' not found ~ MODPATH\kohana-acl\views\acl\list.php [ 212 ] in file:line
2024-07-01 17:45:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 17:52:29 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'id' (T_STRING) ~ MODPATH\kohana-acl\views\acl\list.php [ 203 ] in file:line
2024-07-01 17:52:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 18:16:21 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ';' or '{' ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 152 ] in file:line
2024-07-01 18:16:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 18:16:40 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ';' or '{' ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 152 ] in file:line
2024-07-01 18:16:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 18:17:51 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Aclm::addRule() ~ MODPATH\kohana-acl\classes\Controller\Acls.php [ 64 ] in file:line
2024-07-01 18:17:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 18:21:10 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 table rules has no column named privelege [ INSERT INTO rules (type, role_id, resource_id, privelege) VALUES ('allow', '0', '3', 'read') ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-01 18:21:10 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(2, 'INSERT INTO rul...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php(174): Kohana_Database_Query->execute('aclcfg')
#2 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(64): Model_Aclm->addRule('allow', '0', '3', 'read')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Acls->action_addItem()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-01 18:21:45 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: privlege ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 173 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php:173
2024-07-01 18:21:45 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php(173): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 173, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(64): Model_Aclm->addRule('allow', '0', '3', 'read')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Acls->action_addItem()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php:173
2024-07-01 18:32:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Aclm::addRoleUser() ~ MODPATH\kohana-acl\classes\Controller\Acls.php [ 59 ] in file:line
2024-07-01 18:32:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 18:39:20 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ MODPATH\kohana-acl\views\acl\list.php [ 325 ] in file:line
2024-07-01 18:39:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 18:44:53 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 no such column: id [ DELETE FROM roles_users WHERE id = '45' ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-01 18:44:53 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(4, 'DELETE FROM rol...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php(225): Kohana_Database_Query->execute('aclcfg')
#2 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(109): Model_Aclm->deleteUserRole('45')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Acls->action_editItem()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-01 18:56:37 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\Model\company.php [ 60 ] in file:line
2024-07-01 18:56:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 18:57:09 --- CRITICAL: ErrorException [ 8 ]: Undefined index: id ~ APPPATH\classes\Tree.php [ 40 ] in C:\xampp\htdocs\crm2\application\classes\Tree.php:40
2024-07-01 18:57:09 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Tree.php(40): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 40, Array)
#1 C:\xampp\htdocs\crm2\application\views\contacts\edit.php(301): Tree->array_to_tree(Array)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Tree.php:40
2024-07-01 19:03:00 --- CRITICAL: ErrorException [ 8 ]: Undefined index: id ~ APPPATH\classes\Tree.php [ 40 ] in C:\xampp\htdocs\crm2\application\classes\Tree.php:40
2024-07-01 19:03:00 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Tree.php(40): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 40, Array)
#1 C:\xampp\htdocs\crm2\application\views\contacts\edit.php(301): Tree->array_to_tree(Array)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Tree.php:40
2024-07-01 19:03:39 --- CRITICAL: ErrorException [ 8 ]: Undefined index: id ~ APPPATH\classes\Tree.php [ 40 ] in C:\xampp\htdocs\crm2\application\classes\Tree.php:40
2024-07-01 19:03:39 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Tree.php(40): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 40, Array)
#1 C:\xampp\htdocs\crm2\application\views\contacts\edit.php(302): Tree->array_to_tree(Array)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Tree.php:40
2024-07-01 19:21:22 --- CRITICAL: Exception [ 182 ]: Вы не можете добавлять сотрудников в организацию "Все" ~ APPPATH\classes\Controller\contacts.php [ 182 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 19:21:22 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 19:21:49 --- CRITICAL: Exception [ 182 ]: Вы не можете добавлять сотрудников в организацию "Все" ~ APPPATH\classes\Controller\contacts.php [ 182 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 19:21:49 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 19:23:17 --- CRITICAL: Exception [ 182 ]: Вы не можете добавлять сотрудников в организацию "Все" ~ APPPATH\classes\Controller\contacts.php [ 182 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 19:23:17 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 20:03:39 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: id_pep ~ APPPATH\classes\Controller\contacts.php [ 336 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:03:39 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(336): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 336, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:03:51 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: id_pep ~ APPPATH\classes\Controller\contacts.php [ 336 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:03:51 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(336): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 336, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:04:58 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: id_pep ~ APPPATH\classes\Controller\contacts.php [ 336 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:04:58 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(336): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 336, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:08:54 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 17, char 29. guest_mode.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ select p.id_pep
		,p.id_org
		, p.surname
		, p.name
		, p.patronymic
		, p.numdoc
		, p.datedoc
		, p."ACTIVE" as is_active
		, p.flag
		, p.sysnote
		, p.note
		, p.time_stamp
		, p.tabnum
		
		from people p

        where p.id_pep=19704guest_mode ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-01 20:08:54 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select p.id_pep...', false, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Guest.php(64): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\edit.php(150): Guest->__construct('19704guest_mode')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#15 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#16 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-01 20:14:15 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: acl ~ APPPATH\classes\Controller\contacts.php [ 338 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:338
2024-07-01 20:14:15 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(338): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 338, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:338
2024-07-01 20:15:00 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Contacts::$acl ~ APPPATH\classes\Controller\contacts.php [ 338 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:338
2024-07-01 20:15:00 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(338): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 338, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:338
2024-07-01 20:15:21 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Contacts::$acl ~ APPPATH\classes\Controller\contacts.php [ 338 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:338
2024-07-01 20:15:21 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(338): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 338, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:338
2024-07-01 20:16:07 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: role ~ APPPATH\classes\Controller\contacts.php [ 338 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:338
2024-07-01 20:16:07 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(338): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 338, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:338
2024-07-01 20:28:14 --- CRITICAL: Exception [ 0 ]: Недостаточно прав. ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 36 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:69
2024-07-01 20:28:14 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(69): Controller_Passoffices->before()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:69
2024-07-01 20:31:48 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 36 ] in file:line
2024-07-01 20:31:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 20:32:14 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'pubic' (T_STRING), expecting function (T_FUNCTION) ~ APPPATH\classes\ExceptionCRM.php [ 16 ] in file:line
2024-07-01 20:32:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 20:41:35 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$' ~ APPPATH\classes\Contact.php [ 476 ] in file:line
2024-07-01 20:41:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 20:41:47 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Contact.php [ 479 ] in file:line
2024-07-01 20:41:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 20:42:51 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:337
2024-07-01 20:44:01 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:337
2024-07-01 20:44:07 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:337
2024-07-01 20:44:49 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:337
2024-07-01 20:45:36 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:45:47 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:46:24 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:48:18 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:48:59 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:49:30 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:49:59 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:50:07 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:50:11 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:51:14 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 20:51:14 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: query ~ APPPATH\classes\Contact.php [ 489 ] in C:\xampp\htdocs\crm2\application\classes\Contact.php:489
2024-07-01 20:51:14 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Contact.php(489): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 489, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(336): Contact->checkOnGuest()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_edit()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\Contact.php:489
2024-07-01 20:51:31 --- DEBUG: Undefined property: Database_Result_Cached::$as_array in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:336
2024-07-01 21:17:21 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 21:28:43 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 21:35:34 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH\views\companies\list.php [ 189 ] in file:line
2024-07-01 21:35:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 21:35:36 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH\views\companies\list.php [ 189 ] in file:line
2024-07-01 21:35:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 21:40:55 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'с' (T_STRING) ~ APPPATH\views\companies\list.php [ 154 ] in file:line
2024-07-01 21:40:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 21:42:56 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\views\companies\list.php [ 163 ] in file:line
2024-07-01 21:42:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 21:44:22 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '.' ~ APPPATH\views\companies\list.php [ 163 ] in file:line
2024-07-01 21:44:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 21:56:35 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: company ~ APPPATH\views\contacts\list.php [ 14 ] in C:\xampp\htdocs\crm2\application\views\contacts\list.php:14
2024-07-01 21:56:35 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\contacts\list.php(14): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 14, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\contacts\list.php:14
2024-07-01 21:57:28 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: company ~ APPPATH\views\contacts\list.php [ 14 ] in C:\xampp\htdocs\crm2\application\views\contacts\list.php:14
2024-07-01 21:57:28 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\contacts\list.php(14): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 14, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\contacts\list.php:14
2024-07-01 21:57:34 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: company ~ APPPATH\views\contacts\list.php [ 14 ] in C:\xampp\htdocs\crm2\application\views\contacts\list.php:14
2024-07-01 21:57:34 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\contacts\list.php(14): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 14, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\contacts\list.php:14
2024-07-01 22:08:42 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 22:18:44 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: org ~ APPPATH\views\contacts\list.php [ 125 ] in C:\xampp\htdocs\crm2\application\views\contacts\list.php:125
2024-07-01 22:18:44 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\contacts\list.php(125): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 125, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\contacts\list.php:125
2024-07-01 22:30:15 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'11112222'
					,1
					,0
					, '01.07.2024'
					,'02.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:266
2024-07-01 22:33:38 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'11112222'
					,1
					,0
					, '01.07.2024'
					,'02.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:266
2024-07-01 22:33:38 --- CRITICAL: Exception [ 274 ]: Карта 11112222 не зарегистрирована. Ошибка. ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 274 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 22:33:38 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 22:34:19 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'11112222'
					,1
					,0
					, '01.07.2024'
					,'02.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:266
2024-07-01 22:35:06 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'11112222'
					,1
					,0
					, '01.07.2024'
					,'02.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:266
2024-07-01 22:35:25 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'11112222'
					,1
					,0
					, '01.07.2024'
					,'02.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:266
2024-07-01 22:36:42 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'11112222'
					,1
					,0
					, '01.07.2024'
					,'02.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:266
2024-07-01 22:37:19 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'11112222'
					,1
					,0
					, '01.07.2024'
					,'02.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:266
2024-07-01 22:37:19 --- CRITICAL: Exception [ 274 ]: Карта 11112222 не зарегистрирована. Ошибка. ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 276 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 22:37:19 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 22:37:57 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$this' (T_VARIABLE), expecting function (T_FUNCTION) ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 300 ] in file:line
2024-07-01 22:37:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 22:38:41 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'11112222'
					,1
					,0
					, '01.07.2024'
					,'02.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:266
2024-07-01 22:42:55 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'11112222'
					,1
					,0
					, '01.07.2024'
					,'02.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:266
2024-07-01 23:08:43 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:09:47 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:17:35 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:17:47 --- DEBUG: 239 <pre class="debug"><small>array</small><span>(4)</span> <span>(
    "hidden" => <small>string</small><span>(9)</span> "form_sent"
    "id" => <small>string</small><span>(3)</span> "752"
    "name" => <small>string</small><span>(47)</span> "Экспериментальное кольцо"
    "parent" => <small>string</small><span>(1)</span> "1"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:17:47 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:18:06 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:18:21 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:18:30 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:18:34 --- DEBUG: 239 <pre class="debug"><small>array</small><span>(4)</span> <span>(
    "hidden" => <small>string</small><span>(9)</span> "form_sent"
    "id" => <small>string</small><span>(3)</span> "757"
    "name" => <small>string</small><span>(25)</span> "сотрудники эк"
    "parent" => <small>string</small><span>(1)</span> "1"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:18:34 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:18:50 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:18:53 --- DEBUG: 239 <pre class="debug"><small>array</small><span>(4)</span> <span>(
    "hidden" => <small>string</small><span>(9)</span> "form_sent"
    "id" => <small>string</small><span>(3)</span> "754"
    "name" => <small>string</small><span>(18)</span> "временный"
    "parent" => <small>string</small><span>(1)</span> "1"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:18:54 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-01 23:34:38 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\Model\company.php [ 60 ] in file:line
2024-07-01 23:34:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-01 23:34:50 --- CRITICAL: ErrorException [ 8 ]: Undefined index: title ~ APPPATH\classes\Model\Treeorg.php [ 113 ] in C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php:113
2024-07-01 23:34:50 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(113): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 113, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(149): Model_Treeorg->tplMenu_anchor(Array)
#2 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(165): Model_Treeorg->showCat(Array)
#3 C:\xampp\htdocs\crm2\application\classes\Controller\companies.php(85): Model_Treeorg->make_tree(Array, 1)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Companies->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php:113
2024-07-01 23:41:10 --- CRITICAL: ErrorException [ 8 ]: Undefined index: title ~ APPPATH\classes\Model\Treeorg.php [ 114 ] in C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php:114
2024-07-01 23:41:10 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(114): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 114, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(150): Model_Treeorg->tplMenu_anchor(Array)
#2 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(166): Model_Treeorg->showCat(Array)
#3 C:\xampp\htdocs\crm2\application\classes\Controller\companies.php(85): Model_Treeorg->make_tree(Array, 1)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Companies->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php:114
2024-07-01 23:45:54 --- CRITICAL: ErrorException [ 8 ]: Undefined index: parent ~ APPPATH\classes\Model\Treeorg.php [ 28 ] in C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php:28
2024-07-01 23:45:54 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(28): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 28, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(163): Model_Treeorg->getTree(Array)
#2 C:\xampp\htdocs\crm2\application\classes\Controller\companies.php(85): Model_Treeorg->make_tree(Array, 1)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Companies->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php:28
2024-07-01 23:49:34 --- CRITICAL: ErrorException [ 8 ]: Undefined index: parent ~ APPPATH\classes\Model\Treeorg.php [ 28 ] in C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php:28
2024-07-01 23:49:34 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(28): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\\xampp\\htdocs...', 28, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php(163): Model_Treeorg->getTree(Array)
#2 C:\xampp\htdocs\crm2\application\classes\Controller\companies.php(85): Model_Treeorg->make_tree(Array, 1)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Companies->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Model\Treeorg.php:28