<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-07-08 08:49:27 --- CRITICAL: ErrorException [ 2 ]: Attempt to assign property of non-object ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 88 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:88
2024-07-08 08:49:27 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(88): Kohana_Core::error_handler(2, 'Attempt to assi...', 'C:\\xampp\\htdocs...', 88, Array)
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
#16 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:88
2024-07-08 08:49:44 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 88 ] in file:line
2024-07-08 08:49:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-08 08:54:12 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '{' ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 90 ] in file:line
2024-07-08 08:54:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-08 08:54:28 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 92 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:92
2024-07-08 08:54:28 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(92): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\\xampp\\htdocs...', 92, Array)
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
#16 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:92
2024-07-08 09:25:49 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: user_ ~ APPPATH\classes\Auth\City.php [ 53 ] in C:\xampp\htdocs\crm2\application\classes\Auth\City.php:53
2024-07-08 09:25:49 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth\City.php(53): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 53, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('USER19144', '2024', NULL)
#2 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('USER19144', '2024', NULL)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Auth\City.php:53
2024-07-08 09:27:08 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 near "=": syntax error [ select poc.id, poc.name, poc.id_org_guest, poc.id_org_archive, poc.is_active from po_config poc
            join po_user pou on poc.id=pou.id_po
            where pou.id_user= ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:27:08 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select poc.id, ...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(67): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\application\views\sidebar.php(85): Model_Passofficem->init(NULL)
#3 C:\xampp\htdocs\crm2\application\views\template.php(91): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:28:29 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 near "=": syntax error [ select poc.id, poc.name, poc.id_org_guest, poc.id_org_archive, poc.is_active from po_config poc
            join po_user pou on poc.id=pou.id_po
            where pou.id_user= ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:28:29 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select poc.id, ...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(67): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\application\views\sidebar.php(85): Model_Passofficem->init(NULL)
#3 C:\xampp\htdocs\crm2\application\views\template.php(91): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:28:36 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 near "=": syntax error [ select poc.id, poc.name, poc.id_org_guest, poc.id_org_archive, poc.is_active from po_config poc
            join po_user pou on poc.id=pou.id_po
            where pou.id_user= ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:28:36 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select poc.id, ...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(67): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\application\views\sidebar.php(85): Model_Passofficem->init(NULL)
#3 C:\xampp\htdocs\crm2\application\views\template.php(91): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:29:31 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 near "=": syntax error [ select poc.id, poc.name, poc.id_org_guest, poc.id_org_archive, poc.is_active from po_config poc
            join po_user pou on poc.id=pou.id_po
            where pou.id_user= ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:29:31 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select poc.id, ...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(67): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\application\views\sidebar.php(85): Model_Passofficem->init(NULL)
#3 C:\xampp\htdocs\crm2\application\views\template.php(91): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:30:10 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 near "=": syntax error [ select poc.id, poc.name, poc.id_org_guest, poc.id_org_archive, poc.is_active from po_config poc
            join po_user pou on poc.id=pou.id_po
            where pou.id_user= ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:30:10 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select poc.id, ...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(67): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\application\views\sidebar.php(85): Model_Passofficem->init(NULL)
#3 C:\xampp\htdocs\crm2\application\views\template.php(91): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:32:42 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 near "=": syntax error [ select poc.id, poc.name, poc.id_org_guest, poc.id_org_archive, poc.is_active from po_config poc
            join po_user pou on poc.id=pou.id_po
            where pou.id_user= ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:32:42 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select poc.id, ...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(67): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\application\views\sidebar.php(85): Model_Passofficem->init(NULL)
#3 C:\xampp\htdocs\crm2\application\views\template.php(91): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Dashboard))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-08 09:35:03 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: user ~ APPPATH\classes\Auth\City.php [ 54 ] in C:\xampp\htdocs\crm2\application\classes\Auth\City.php:54
2024-07-08 09:35:03 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth\City.php(54): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 54, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('USER19144', '2024', NULL)
#2 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('USER19144', '2024', NULL)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Auth\City.php:54
2024-07-08 10:14:55 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Arr::is_assoc() must be of the type array, object given, called in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php on line 607 and defined ~ SYSPATH\classes\Kohana\Arr.php [ 30 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:30
2024-07-08 10:14:55 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php(30): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php(607): Kohana_Arr::is_assoc(Object(Database_Result_Cached))
#2 C:\xampp\htdocs\crm2\application\classes\Auth\City.php(52): Kohana_Arr::flatten(Object(Database_Result_Cached))
#3 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('USER19144', '2024', NULL)
#4 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('USER19144', '2024', NULL)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#11 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Arr.php:30
2024-07-08 21:40:56 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: user ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 287 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php:287
2024-07-08 21:40:56 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php(287): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 287, Array)
#1 C:\xampp\htdocs\crm2\application\views\dashboard.php(32): Kohana_ACL->allowed('acl', 'read')
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
#15 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php:287
2024-07-08 21:54:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-08 21:54:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-08 21:56:28 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-08 21:56:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-08 21:57:45 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-08 21:57:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-08 21:58:29 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-08 21:58:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-08 21:59:35 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-08 21:59:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line