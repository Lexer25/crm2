<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-10-06 08:37:42 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\views\sidebar.php [ 6 ] in file:line
2024-10-06 08:37:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 08:38:12 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: menu ~ APPPATH\views\sidebar.php [ 9 ] in C:\xampp\htdocs\crm2\application\views\sidebar.php:9
2024-10-06 08:38:12 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\sidebar.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 9, Array)
#1 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#11 {main} in C:\xampp\htdocs\crm2\application\views\sidebar.php:9
2024-10-06 08:44:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\users.php [ 13 ] in file:line
2024-10-06 08:44:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 08:48:19 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: menu ~ APPPATH\views\sidebar.php [ 9 ] in C:\xampp\htdocs\crm2\application\views\sidebar.php:9
2024-10-06 08:48:19 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\sidebar.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 9, Array)
#1 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#11 {main} in C:\xampp\htdocs\crm2\application\views\sidebar.php:9
2024-10-06 08:50:10 --- CRITICAL: ErrorException [ 1 ]: Call to a member function get_visible_items() on string ~ APPPATH\views\sidebar.php [ 11 ] in file:line
2024-10-06 08:50:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 08:51:05 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '=', expecting variable (T_VARIABLE) or '$' ~ APPPATH\views\sidebar.php [ 9 ] in file:line
2024-10-06 08:51:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 08:51:20 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '=' ~ APPPATH\views\sidebar.php [ 9 ] in file:line
2024-10-06 08:51:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 08:53:32 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Menu::__construct() must be of the type array, string given, called in C:\xampp\htdocs\crm2\application\views\sidebar.php on line 10 and defined ~ MODPATH\menu\classes\Kohana\Menu.php [ 62 ] in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:62
2024-10-06 08:53:32 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(62): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'C:\\xampp\\htdocs...', 62, Array)
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(10): Kohana_Menu->__construct('navbar')
#2 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:62
2024-10-06 08:54:06 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Menu::__construct() must be of the type array, string given, called in C:\xampp\htdocs\crm2\application\views\sidebar.php on line 10 and defined ~ MODPATH\menu\classes\Kohana\Menu.php [ 62 ] in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:62
2024-10-06 08:54:06 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(62): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'C:\\xampp\\htdocs...', 62, Array)
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(10): Kohana_Menu->__construct('navbar')
#2 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:62
2024-10-06 08:54:15 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Menu::__construct() must be of the type array, string given, called in C:\xampp\htdocs\crm2\application\views\sidebar.php on line 10 and defined ~ MODPATH\menu\classes\Kohana\Menu.php [ 62 ] in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:62
2024-10-06 08:54:15 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(62): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'C:\\xampp\\htdocs...', 62, Array)
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(10): Kohana_Menu->__construct('navbar')
#2 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:62
2024-10-06 08:54:24 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '=', expecting variable (T_VARIABLE) or '$' ~ APPPATH\views\sidebar.php [ 9 ] in file:line
2024-10-06 08:54:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 08:55:58 --- CRITICAL: Kohana_Exception [ 0 ]: Menu configuration file "C:\xampp\htdocs\crm2\application\config\menu\navbar2.php" not found! ~ MODPATH\menu\classes\Kohana\Menu.php [ 108 ] in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:128
2024-10-06 08:55:58 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(128): Kohana_Menu::_get_menu_config('navbar2')
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(11): Kohana_Menu::factory('navbar2')
#2 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:128
2024-10-06 08:59:47 --- CRITICAL: Kohana_Exception [ 0 ]: Menu configuration file "C:\xampp\htdocs\crm2\application\config\menu\side.php" not found! ~ MODPATH\menu\classes\Kohana\Menu.php [ 108 ] in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:128
2024-10-06 08:59:47 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(128): Kohana_Menu::_get_menu_config('side')
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(11): Kohana_Menu::factory('side')
#2 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:128
2024-10-06 09:00:02 --- CRITICAL: Kohana_Exception [ 0 ]: Menu configuration file "C:\xampp\htdocs\crm2\application\config\menu\leftside.php" not found! ~ MODPATH\menu\classes\Kohana\Menu.php [ 108 ] in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:128
2024-10-06 09:00:02 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(128): Kohana_Menu::_get_menu_config('leftside')
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(11): Kohana_Menu::factory('leftside')
#2 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php:128
2024-10-06 09:15:43 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ''items'' (T_CONSTANT_ENCAPSED_STRING), expecting ']' ~ MODPATH\menu\config\menu\leftside.php [ 42 ] in file:line
2024-10-06 09:15:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 09:16:28 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ''fired'' (T_CONSTANT_ENCAPSED_STRING), expecting ']' ~ MODPATH\menu\config\menu\leftside.php [ 54 ] in file:line
2024-10-06 09:16:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 09:37:32 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-06 09:43:32 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: var ~ APPPATH\views\sidebar.php [ 29 ] in C:\xampp\htdocs\crm2\application\views\sidebar.php:29
2024-10-06 09:43:32 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\sidebar.php(29): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 29, Array)
#1 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#11 {main} in C:\xampp\htdocs\crm2\application\views\sidebar.php:29
2024-10-06 10:20:19 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE) ~ MODPATH\menu\views\templates\menu\bootstrap\navbar.php [ 37 ] in file:line
2024-10-06 10:20:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 12:22:00 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ''items'' (T_CONSTANT_ENCAPSED_STRING), expecting ']' ~ MODPATH\menu\config\menu\leftside.php [ 44 ] in file:line
2024-10-06 12:22:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 12:27:56 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-06 12:39:57 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Menu_Item::__construct() must be of the type array, string given, called in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php on line 56 and defined ~ MODPATH\menu\classes\Kohana\Menu\Item.php [ 30 ] in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php:30
2024-10-06 12:39:57 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php(30): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php(56): Kohana_Menu_Item->__construct('contacts/disp/a...', Object(Menu))
#2 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php(56): Kohana_Menu_Item->__construct(Array, Object(Menu))
#3 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(92): Kohana_Menu_Item->__construct(Array, Object(Menu))
#4 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(79): Kohana_Menu->_build_items(Array)
#5 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(137): Kohana_Menu->__construct(Array)
#6 C:\xampp\htdocs\crm2\application\views\sidebar.php(23): Kohana_Menu::factory('leftside')
#7 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#12 [internal function]: Kohana_Controller->execute()
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#16 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#17 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php:30
2024-10-06 12:40:20 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Menu_Item::__construct() must be of the type array, string given, called in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php on line 56 and defined ~ MODPATH\menu\classes\Kohana\Menu\Item.php [ 30 ] in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php:30
2024-10-06 12:40:20 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php(30): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php(56): Kohana_Menu_Item->__construct('contacts/disp/a...', Object(Menu))
#2 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php(56): Kohana_Menu_Item->__construct(Array, Object(Menu))
#3 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(92): Kohana_Menu_Item->__construct(Array, Object(Menu))
#4 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(79): Kohana_Menu->_build_items(Array)
#5 C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu.php(137): Kohana_Menu->__construct(Array)
#6 C:\xampp\htdocs\crm2\application\views\sidebar.php(23): Kohana_Menu::factory('leftside')
#7 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#12 [internal function]: Kohana_Controller->execute()
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#16 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#17 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\Kohana\Menu\Item.php:30
2024-10-06 12:42:29 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '=>' (T_DOUBLE_ARROW), expecting ']' ~ MODPATH\menu\config\menu\leftside.php [ 52 ] in file:line
2024-10-06 12:42:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 12:50:03 --- CRITICAL: ErrorException [ 1 ]: Call to a member function set() on null ~ MODPATH\menu\classes\Kohana\Menu.php [ 154 ] in file:line
2024-10-06 12:50:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 12:54:37 --- CRITICAL: ErrorException [ 1 ]: Call to a member function set() on null ~ MODPATH\menu\classes\Kohana\Menu.php [ 155 ] in file:line
2024-10-06 12:54:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 13:14:29 --- CRITICAL: ErrorException [ 1 ]: Call to a member function set() on null ~ MODPATH\menu\classes\Kohana\Menu.php [ 155 ] in file:line
2024-10-06 13:14:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 20:49:05 --- CRITICAL: ErrorException [ 2048 ]: Declaration of MenuUser::factory() should be compatible with Kohana_Menu::factory($config_file = 'simple') ~ MODPATH\menu\classes\MenuUser.php [ 3 ] in C:\xampp\htdocs\crm2\modules\menu\classes\MenuUser.php:3
2024-10-06 20:49:05 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\MenuUser.php(3): Kohana_Core::error_handler(2048, 'Declaration of ...', 'C:\\xampp\\htdocs...', 3, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Core.php(511): require('C:\\xampp\\htdocs...')
#2 [internal function]: Kohana_Core::auto_load('MenuUser')
#3 C:\xampp\htdocs\crm2\application\views\sidebar.php(31): spl_autoload_call('MenuUser')
#4 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\MenuUser.php:3
2024-10-06 20:52:17 --- CRITICAL: ErrorException [ 2 ]: Illegal offset type in isset or empty ~ SYSPATH\classes\Kohana\Arr.php [ 287 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:287
2024-10-06 20:52:17 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php(287): Kohana_Core::error_handler(2, 'Illegal offset ...', 'C:\\xampp\\htdocs...', 287, Array)
#1 C:\xampp\htdocs\crm2\modules\menu\classes\MenuUser.php(28): Kohana_Arr::get(Array, Array)
#2 C:\xampp\htdocs\crm2\application\views\sidebar.php(31): MenuUser::factory('leftside')
#3 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:287
2024-10-06 21:00:13 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ MODPATH\menu\classes\MenuUser.php [ 30 ] in C:\xampp\htdocs\crm2\modules\menu\classes\MenuUser.php:30
2024-10-06 21:00:13 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\menu\classes\MenuUser.php(30): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\application\views\sidebar.php(31): MenuUser::factory('leftside')
#2 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\crm2\modules\menu\classes\MenuUser.php:30
2024-10-06 21:04:42 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ MODPATH\menu\classes\MenuUser.php [ 30 ] in file:line
2024-10-06 21:04:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 21:30:01 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '/', expecting ')' ~ MODPATH\menu\classes\MenuUser.php [ 27 ] in file:line
2024-10-06 21:30:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 21:32:21 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ MODPATH\menu\classes\Kohana\Menu.php [ 77 ] in file:line
2024-10-06 21:32:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 21:32:28 --- CRITICAL: ErrorException [ 1 ]: Call to a member function set() on null ~ MODPATH\menu\classes\Kohana\Menu.php [ 158 ] in file:line
2024-10-06 21:32:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 22:00:49 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method MenuUser::_get_menu_config() ~ MODPATH\menu\classes\MenuUser.php [ 13 ] in file:line
2024-10-06 22:00:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 22:02:05 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'CONFIG_DIR' ~ MODPATH\menu\classes\MenuUser.php [ 45 ] in file:line
2024-10-06 22:02:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 22:17:49 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: configMenu ~ APPPATH\views\sidebar.php [ 36 ] in C:\xampp\htdocs\crm2\application\views\sidebar.php:36
2024-10-06 22:17:49 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\sidebar.php(36): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 36, Array)
#1 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#11 {main} in C:\xampp\htdocs\crm2\application\views\sidebar.php:36
2024-10-06 22:19:08 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'б' (T_STRING) ~ APPPATH\views\sidebar.php [ 32 ] in file:line
2024-10-06 22:19:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 22:19:48 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: configMenu ~ APPPATH\views\sidebar.php [ 37 ] in C:\xampp\htdocs\crm2\application\views\sidebar.php:37
2024-10-06 22:19:48 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\sidebar.php(37): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 37, Array)
#1 C:\xampp\htdocs\crm2\application\views\template.php(45): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#11 {main} in C:\xampp\htdocs\crm2\application\views\sidebar.php:37
2024-10-06 22:23:16 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';', expecting ')' ~ APPPATH\config\config_newcrm.php [ 30 ] in file:line
2024-10-06 22:23:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-06 22:23:38 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\views\sidebar.php [ 34 ] in file:line
2024-10-06 22:23:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line