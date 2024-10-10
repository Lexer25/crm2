<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-10-09 16:24:12 --- CRITICAL: Exception [ 64 ]: Ошибка с базой данных при авторизации ~ APPPATH\classes\Auth\City.php [ 43 ] in C:\xampp\htdocs\crm2\application\classes\Auth.php:99
2024-10-09 16:24:12 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth.php(99): Auth_City->_login('ADMIN', '333', NULL)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('ADMIN', '333', NULL)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\Auth.php:99
2024-10-09 16:25:25 --- CRITICAL: Exception [ 64 ]: Ошибка с базой данных при авторизации ~ APPPATH\classes\Auth\City.php [ 43 ] in C:\xampp\htdocs\crm2\application\classes\Auth.php:99
2024-10-09 16:25:25 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth.php(99): Auth_City->_login('ADMIN', '333', NULL)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('ADMIN', '333', NULL)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\Auth.php:99