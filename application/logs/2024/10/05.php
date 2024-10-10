<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-10-05 00:56:15 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH\views\contacts\card.php [ 406 ] in file:line
2024-10-05 00:56:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-10-05 01:06:39 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant patternValid - assumed 'patternValid' ~ APPPATH\views\contacts\card.php [ 199 ] in C:\xampp\htdocs\crm2\application\views\contacts\card.php:199
2024-10-05 01:06:39 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\contacts\card.php(199): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\\xampp\\htdocs...', 199, Array)
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
#14 {main} in C:\xampp\htdocs\crm2\application\views\contacts\card.php:199
2024-10-05 02:07:21 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-05 02:09:04 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-05 02:09:18 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-05 09:18:32 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-05 09:25:11 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-05 09:25:11 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-05 09:25:57 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-05 09:26:15 --- DEBUG: 239 <pre class="debug"><small>array</small><span>(4)</span> <span>(
    "hidden" => <small>string</small><span>(9)</span> "form_sent"
    "id" => <small>string</small><span>(1)</span> "0"
    "name" => <small>string</small><span>(17)</span> "ty№* отдел"
    "parent" => <small>string</small><span>(0)</span> ""
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-10-05 09:26:15 --- DEBUG: 113 INSERT INTO organization (id_org, name, id_parent) VALUES (801, 'ty№* отдел', 1) in C:\xampp\htdocs\crm2\application\classes\Controller\companies.php:343
2024-10-05 09:26:37 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84