<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-09-11 15:50:27 --- CRITICAL: Exception [ 64 ]: Ошибка с базой данных при авторизации ~ APPPATH\classes\Auth\City.php [ 43 ] in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-09-11 15:50:27 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('ADMIN', 'qwerty123321', NULL)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('ADMIN', 'qwerty123321', NULL)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-09-11 17:07:56 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\views\sidebar.php [ 57 ] in file:line
2024-09-11 17:07:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-11 17:19:04 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: var2 ~ MODPATH\cards\classes\controller\cards.php [ 297 ] in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:297
2024-09-11 17:19:04 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(297): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 297, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search_any()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:297
2024-09-11 17:19:22 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: var2 ~ MODPATH\cards\classes\controller\cards.php [ 297 ] in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:297
2024-09-11 17:19:22 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(297): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 297, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search_any()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:297
2024-09-11 18:08:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Stat::hexTo001A() ~ MODPATH\cards\classes\controller\cards.php [ 264 ] in file:line
2024-09-11 18:08:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-11 18:09:48 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Stat::hexTo001A() ~ MODPATH\cards\classes\controller\cards.php [ 264 ] in file:line
2024-09-11 18:09:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-11 18:20:31 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Stat::hexTo001A() ~ MODPATH\cards\classes\controller\cards.php [ 264 ] in file:line
2024-09-11 18:20:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-09-11 18:24:30 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: var2 ~ MODPATH\cards\classes\controller\cards.php [ 298 ] in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:298
2024-09-11 18:24:30 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(298): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 298, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search_any()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:298
2024-09-11 18:25:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: var2 ~ MODPATH\cards\classes\controller\cards.php [ 298 ] in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:298
2024-09-11 18:25:46 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(298): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 298, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search_any()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:298
2024-09-11 18:26:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: var2 ~ MODPATH\cards\classes\controller\cards.php [ 298 ] in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:298
2024-09-11 18:26:09 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(298): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 298, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search_any()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:298
2024-09-11 19:49:42 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-11 19:50:52 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-11 19:51:04 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-11 19:59:53 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-11 19:59:59 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84