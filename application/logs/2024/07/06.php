<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-07-06 00:00:58 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 00:01:46 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Company::$parentid ~ APPPATH\views\companies\list.php [ 164 ] in C:\xampp\htdocs\crm2\application\views\companies\list.php:164
2024-07-06 00:01:46 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\companies\list.php(164): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 164, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\companies\list.php:164
2024-07-06 00:01:58 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Company::$parentid ~ APPPATH\views\companies\list.php [ 164 ] in C:\xampp\htdocs\crm2\application\views\companies\list.php:164
2024-07-06 00:01:58 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\companies\list.php(164): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 164, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\companies\list.php:164
2024-07-06 00:02:19 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Company::$parentid ~ APPPATH\views\companies\list.php [ 164 ] in C:\xampp\htdocs\crm2\application\views\companies\list.php:164
2024-07-06 00:02:19 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\companies\list.php(164): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 164, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\companies\list.php:164
2024-07-06 00:05:25 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 00:05:37 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 00:06:39 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: res ~ APPPATH\classes\Model\company.php [ 236 ] in C:\xampp\htdocs\crm2\application\classes\Model\company.php:236
2024-07-06 00:06:39 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Model\company.php(236): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 236, Array)
#1 C:\xampp\htdocs\crm2\application\views\contacts\acl.php(166): Model_Company::getListAccessNameForCurrentUser('19707')
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
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Model\company.php:236
2024-07-06 00:06:44 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: res ~ APPPATH\classes\Model\company.php [ 236 ] in C:\xampp\htdocs\crm2\application\classes\Model\company.php:236
2024-07-06 00:06:44 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Model\company.php(236): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 236, Array)
#1 C:\xampp\htdocs\crm2\application\views\contacts\acl.php(166): Model_Company::getListAccessNameForCurrentUser('19707')
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
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Model\company.php:236
2024-07-06 00:06:58 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: res ~ APPPATH\classes\Model\company.php [ 236 ] in C:\xampp\htdocs\crm2\application\classes\Model\company.php:236
2024-07-06 00:06:58 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Model\company.php(236): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 236, Array)
#1 C:\xampp\htdocs\crm2\application\views\contacts\acl.php(166): Model_Company::getListAccessNameForCurrentUser('19707')
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
#15 {main} in C:\xampp\htdocs\crm2\application\classes\Model\company.php:236
2024-07-06 00:39:47 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 01:04:55 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 01:05:52 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 08:51:34 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: dis1 ~ APPPATH\views\companies\list.php [ 179 ] in C:\xampp\htdocs\crm2\application\views\companies\list.php:179
2024-07-06 08:51:34 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\companies\list.php(179): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 179, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\companies\list.php:179
2024-07-06 08:52:21 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: dis1 ~ APPPATH\views\companies\list.php [ 179 ] in C:\xampp\htdocs\crm2\application\views\companies\list.php:179
2024-07-06 08:52:21 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\companies\list.php(179): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 179, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\companies\list.php:179
2024-07-06 09:00:07 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:00:22 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:03:05 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:09:35 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: acl ~ APPPATH\views\companies\acl.php [ 187 ] in C:\xampp\htdocs\crm2\application\views\companies\acl.php:187
2024-07-06 09:09:35 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\companies\acl.php(187): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 187, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Companies))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\companies\acl.php:187
2024-07-06 09:21:47 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:21:57 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:23:18 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:23:48 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:26:44 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:27:07 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:27:32 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:27:52 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:28:00 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:30:02 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:30:59 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:31:12 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:32:10 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:32:21 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:40:04 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:40:08 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:42:32 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:42:48 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:42:50 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:43:26 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:43:46 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:46:25 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:48:30 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:48:32 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:49:02 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:49:18 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:50:26 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:50:27 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:54:48 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:57:53 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:58:08 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:59:47 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 09:59:53 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:00:36 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:01:41 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:04:50 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:04:52 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:09:41 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:11:22 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:12:04 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:14:27 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:14:52 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:14:54 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:15:13 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:15:23 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:15:51 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:16:33 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:17:19 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:17:54 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:18:06 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:20:14 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:49:09 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:51:21 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 10:52:10 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 12:04:09 --- DEBUG: 178 SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 2, char 17. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ UPDATE PEOPLE
			SET ID_ORG = ,
			SURNAME = '',
			NAME = '',
			PATRONYMIC = '',
			NOTE = '',
			POST = ''
			WHERE (ID_PEP = 19491) AND (ID_DB = 1) ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:229
2024-07-06 12:22:43 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 12:23:10 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 12:23:25 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 12:24:10 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 2, char 27. ).  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ SELECT p.id_pep, o.id_org from people p join organization o on p.id_org=o.id_org
    				where o.id_org in() ORDER BY p.time_stamp desc ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 12:24:10 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'SELECT p.id_pep...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(476): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(150): Model_Passofficem->getList(NULL, 'home_page')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 12:24:22 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 2, char 27. ).  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ SELECT p.id_pep, o.id_org from people p join organization o on p.id_org=o.id_org
    				where o.id_org in() ORDER BY p.time_stamp desc ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 12:24:22 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'SELECT p.id_pep...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(476): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(150): Model_Passofficem->getList(NULL, 'home_page')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 12:25:09 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 2, char 27. ).  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ SELECT p.id_pep, o.id_org from people p join organization o on p.id_org=o.id_org
    				where o.id_org in() ORDER BY p.time_stamp desc ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 12:25:09 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'SELECT p.id_pep...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(476): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(150): Model_Passofficem->getList(NULL, 'home_page')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 12:38:48 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ',' ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 33 ] in file:line
2024-07-06 12:38:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-06 12:39:04 --- CRITICAL: ErrorException [ 1 ]: Call to protected method Kohana_ACL::match() from context 'Controller_Passoffices' ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 33 ] in file:line
2024-07-06 12:39:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-06 13:09:54 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ MODPATH\kohana-acl\views\acl\list.php [ 266 ] in file:line
2024-07-06 13:09:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-06 13:14:31 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Model_Aclm::$getRules ~ MODPATH\kohana-acl\views\acl\list.php [ 267 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:267
2024-07-06 13:14:31 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(267): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 267, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:267
2024-07-06 13:15:21 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Model_Aclm::$getRules ~ MODPATH\kohana-acl\views\acl\list.php [ 267 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:267
2024-07-06 13:15:21 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(267): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 267, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:267
2024-07-06 13:15:51 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: valies ~ MODPATH\kohana-acl\views\acl\list.php [ 269 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:269
2024-07-06 13:15:51 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php(269): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 269, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\views\acl\list.php:269
2024-07-06 13:25:34 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Form::radiobutton() ~ MODPATH\kohana-acl\views\acl\list.php [ 205 ] in file:line
2024-07-06 13:25:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-06 14:09:15 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 no such column: privelege [ UPDATE rules SET type = 'deny', role_id = '4', resource_id = '21', privelege = 'delete' WHERE id IS NULL ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 14:09:15 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(3, 'UPDATE rules SE...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php(156): Kohana_Database_Query->execute('aclcfg')
#2 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(100): Model_Aclm->updateRule(NULL, 'deny', '4', '21', 'delete')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Acls->action_editItem()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 14:13:42 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 no such column: privelege [ UPDATE rules SET type = 'deny', role_id = '4', resource_id = '21', privelege = 'delete' WHERE id = '104' ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 14:13:42 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(3, 'UPDATE rules SE...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php(156): Kohana_Database_Query->execute('aclcfg')
#2 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(100): Model_Aclm->updateRule('104', 'deny', '4', '21', 'delete')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Acls->action_editItem()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-06 14:18:50 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 154 ] in file:line
2024-07-06 14:18:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-06 14:22:41 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'todo' (T_STRING), expecting ',' or ';' ~ MODPATH\kohana-acl\views\acl\list.php [ 219 ] in file:line
2024-07-06 14:22:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-06 14:46:36 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function Exception() ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 40 ] in file:line
2024-07-06 14:46:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-06 14:46:50 --- CRITICAL: Exception [ 40 ]: Нет прав. Доступ в раздел запрещен. ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 40 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:69
2024-07-06 14:46:50 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(69): Controller_Passoffices->before()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:69
2024-07-06 14:52:27 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 15:03:53 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 40 ] in file:line
2024-07-06 15:03:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-06 15:05:58 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: resource ~ MODPATH\kohana-acl\classes\Controller\Acls.php [ 26 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php:26
2024-07-06 15:05:58 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(26): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 26, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(69): Controller_Acls->before()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php:26
2024-07-06 15:06:17 --- CRITICAL: Exception [ 28 ]: Нет прав. Доступ в раздел запрещен. ~ MODPATH\kohana-acl\classes\Controller\Acls.php [ 28 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:69
2024-07-06 15:06:17 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(69): Controller_Acls->before()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:69
2024-07-06 15:06:36 --- CRITICAL: Exception [ 28 ]: Нет прав. Доступ в раздел запрещен. ~ MODPATH\kohana-acl\classes\Controller\Acls.php [ 28 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:69
2024-07-06 15:06:36 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(69): Controller_Acls->before()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:69
2024-07-06 18:19:30 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-07-06 18:28:45 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 18:28:45 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 19:33:32 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-06 23:46:34 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Form::text() ~ MODPATH\kohana-acl\views\acl\list.php [ 162 ] in file:line
2024-07-06 23:46:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line