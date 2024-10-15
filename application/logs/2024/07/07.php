
2024-07-07 00:25:15 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '/' ~ MODPATH\kohana-acl\views\acl\list.php [ 168 ] in file:line
2024-07-07 00:25:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 00:30:41 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: type ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 200 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php:200
2024-07-07 00:30:41 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php(200): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 200, Array)
#1 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(111): Model_Aclm->updateResource('25', '0', '\xD1\x80\xD0\xB5\xD1\x81\xD1\x83\xD1\x80\xD1\x811--...', '\xD1\x82\xD0\xB5\xD1\x81\xD1\x82\xD0\xBE1----')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Acls->action_editItem()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Model\Aclm.php:200
2024-07-07 00:53:44 --- CRITICAL: ErrorException [ 2 ]: Illegal offset type in isset or empty ~ SYSPATH\classes\Kohana\I18n.php [ 84 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\I18n.php:84
2024-07-07 00:53:44 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\I18n.php(84): Kohana_Core::error_handler(2, 'Illegal offset ...', 'C:\\xampp\\htdocs...', 84, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\I18n.php(161): Kohana_I18n::get(Object(Database_Exception))
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Kohana\Exception.php(53): __(Object(Database_Exception), NULL)
#3 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Source\Database.php(121): Kohana_Kohana_Exception->__construct(Object(Database_Exception))
#4 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php(212): Kohana_ACL_Source_Database->rules()
#5 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL.php(171): Kohana_ACL->load()
#6 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Controller\Acls.php(24): Kohana_ACL->__construct(true)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(69): Controller_Acls->before()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Acls))
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\I18n.php:84
2024-07-07 01:17:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Database_Expression::execute() ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 232 ] in file:line
2024-07-07 01:17:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 01:18:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Database_Expression::execute() ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 234 ] in file:line
2024-07-07 01:18:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 01:19:07 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Database_Expression::execute() ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 234 ] in file:line
2024-07-07 01:19:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 01:21:14 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Database_Expression::execute() ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 235 ] in file:line
2024-07-07 01:21:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 01:24:02 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Database_Expression::execute() ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 235 ] in file:line
2024-07-07 01:24:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 01:24:29 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Database_Expression::execute() ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 235 ] in file:line
2024-07-07 01:24:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 01:37:48 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Database_Expression::execute() ~ MODPATH\kohana-acl\classes\Model\Aclm.php [ 235 ] in file:line
2024-07-07 01:37:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 01:46:48 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function redirect() ~ MODPATH\kohana-acl\classes\Controller\Acls.php [ 28 ] in file:line
2024-07-07 01:46:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 01:47:33 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-07-07 02:00:40 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant JOptionPane - assumed 'JOptionPane' ~ APPPATH\views\dashboard.php [ 5 ] in C:\xampp\htdocs\crm2\application\views\dashboard.php:5
2024-07-07 02:00:40 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\dashboard.php(5): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\\xampp\\htdocs...', 5, Array)
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
#14 {main} in C:\xampp\htdocs\crm2\application\views\dashboard.php:5
2024-07-07 11:11:06 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ MODPATH\kohana-acl\classes\Kohana\ACL.php [ 286 ] in file:line
2024-07-07 11:11:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 11:25:12 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 86 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:86
2024-07-07 11:25:12 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(86): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\\xampp\\htdocs...', 86, Array)
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
2024-07-07 11:32:21 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 86 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:86
2024-07-07 11:32:21 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(86): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\\xampp\\htdocs...', 86, Array)
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
2024-07-07 11:33:29 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 104 ] in file:line
2024-07-07 11:33:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 11:33:39 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 104 ] in file:line
2024-07-07 11:33:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 11:36:04 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'if' (T_IF), expecting ',' or ';' ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 87 ] in file:line
2024-07-07 11:36:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-07 12:04:23 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ MODPATH\kohana-acl\classes\Kohana\ACL\Auth.php [ 88 ] in C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php:88
2024-07-07 12:04:23 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\kohana-acl\classes\Kohana\ACL\Auth.php(88): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\\xampp\\htdocs...', 88, Array)
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