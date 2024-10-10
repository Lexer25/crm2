<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-10-04 07:31:57 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 71 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php:71
2024-10-04 07:31:57 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php(71): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 71, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php(338): Kohana_HTML::chars(Array)
#2 C:\xampp\htdocs\crm2\application\classes\Form.php(107): Kohana_HTML::attributes(Array)
#3 C:\xampp\htdocs\crm2\application\classes\Form.php(125): Form::input('contact_acl', Array, Array)
#4 C:\xampp\htdocs\crm2\application\views\contacts\acl.php(186): Form::hidden('contact_acl', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\application\views\template.php(50): Kohana_View->__toString()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#13 [internal function]: Kohana_Controller->execute()
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#15 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#17 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#18 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\HTML.php:71
2024-10-04 07:41:59 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\views\contacts\acl.php [ 199 ] in C:\xampp\htdocs\crm2\application\views\contacts\acl.php:199
2024-10-04 07:41:59 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\contacts\acl.php(199): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 199, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(50): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\contacts\acl.php:199
2024-10-04 07:42:53 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\views\contacts\acl.php [ 199 ] in C:\xampp\htdocs\crm2\application\views\contacts\acl.php:199
2024-10-04 07:42:53 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\contacts\acl.php(199): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 199, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(50): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\application\views\contacts\acl.php:199
2024-10-04 07:52:48 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: contact_acl_befor ~ APPPATH\classes\Controller\contacts.php [ 935 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:935
2024-10-04 07:52:48 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(935): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 935, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_saveACL()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:935
2024-10-04 07:53:22 --- CRITICAL: ErrorException [ 2 ]: array_diff(): Argument #1 is not an array ~ APPPATH\classes\Controller\contacts.php [ 935 ] in file:line
2024-10-04 07:53:22 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_diff(): A...', 'C:\\xampp\\htdocs...', 935, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(935): array_diff('["6","4","8"]', '["6","4","8"]')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_saveACL()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in file:line
2024-10-04 07:53:41 --- CRITICAL: ErrorException [ 2 ]: array_diff(): Argument #1 is not an array ~ APPPATH\classes\Controller\contacts.php [ 935 ] in file:line
2024-10-04 07:53:41 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_diff(): A...', 'C:\\xampp\\htdocs...', 935, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(935): array_diff('["6","4","8"]', '["6","4","8"]')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_saveACL()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in file:line
2024-10-04 07:58:38 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$aclList' (T_VARIABLE) ~ APPPATH\classes\Controller\contacts.php [ 941 ] in file:line
2024-10-04 07:58:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-04 07:58:40 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$aclList' (T_VARIABLE) ~ APPPATH\classes\Controller\contacts.php [ 941 ] in file:line
2024-10-04 07:58:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-04 08:00:58 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: aclList ~ APPPATH\classes\Controller\contacts.php [ 940 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:940
2024-10-04 08:00:58 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(940): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 940, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_saveACL()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:940
2024-10-04 08:02:35 --- CRITICAL: ErrorException [ 2 ]: array_merge(): Argument #1 is not an array ~ APPPATH\classes\Controller\contacts.php [ 941 ] in file:line
2024-10-04 08:02:35 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_merge(): ...', 'C:\\xampp\\htdocs...', 941, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(941): array_merge(NULL, Array)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_saveACL()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in file:line
2024-10-04 08:13:03 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: aclList ~ APPPATH\classes\Controller\contacts.php [ 953 ] in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:953
2024-10-04 08:13:03 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php(953): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 953, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_saveACL()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:953
2024-10-04 09:11:06 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'FIO_VALID_LENGHT' ~ APPPATH\views\contacts\edit.php [ 186 ] in file:line
2024-10-04 09:11:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line