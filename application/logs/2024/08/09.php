<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-08-09 08:07:04 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\template.php [ 96 ] in C:\xampp\htdocs\crm2\application\views\template.php:96
2024-08-09 08:07:04 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\template.php(96): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 96, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\views\template.php:96