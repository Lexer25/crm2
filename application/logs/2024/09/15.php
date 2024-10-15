<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-09-15 22:12:47 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\template.php [ 94 ] in C:\xampp\htdocs\crm2\application\views\template.php:94
2024-09-15 22:12:47 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 94, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Doors))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\views\template.php:94
2024-09-15 22:14:25 --- CRITICAL: Exception [ 182 ]: Вы не можете добавлять сотрудников в организацию "Все" ~ APPPATH\classes\Controller\contacts.php [ 224 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-09-15 22:14:25 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Contacts->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Contacts))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84