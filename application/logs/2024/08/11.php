<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-08-11 09:31:12 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 09:31:17 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 10:05:54 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '', '' (T_CONSTANT_ENCAPSED_STRING) ~ MODPATH\tuner\views\Setting\mainManual.php [ 88 ] in file:line
2024-08-11 10:05:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 10:10:08 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '''' (T_CONSTANT_ENCAPSED_STRING), expecting ',' or ';' ~ MODPATH\tuner\views\Setting\mainManual.php [ 85 ] in file:line
2024-08-11 10:10:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 10:12:24 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'm' (T_STRING) ~ MODPATH\tuner\views\Setting\mainManual.php [ 86 ] in file:line
2024-08-11 10:12:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 11:44:48 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ',' ~ MODPATH\tuner\views\Setting\mainManual.php [ 255 ] in file:line
2024-08-11 11:44:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 11:52:54 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 11:52:54 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ MODPATH\tuner\views\Setting\main.php [ 7 ] in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\main.php:7
2024-08-11 11:52:54 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\main.php(7): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 7, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\main.php:7
2024-08-11 11:55:08 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '58' (T_LNUMBER) ~ MODPATH\tuner\classes\controller\Settings.php [ 443 ] in file:line
2024-08-11 11:55:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 11:55:47 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 11:55:47 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ MODPATH\tuner\views\Setting\mainManual.php [ 30 ] in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:30
2024-08-11 11:55:47 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(30): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:30
2024-08-11 11:57:13 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 11:57:13 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ MODPATH\tuner\views\Setting\mainManual.php [ 30 ] in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:30
2024-08-11 11:57:13 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(30): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:30
2024-08-11 11:58:47 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 11:58:48 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: alert ~ MODPATH\tuner\views\Setting\mainManual.php [ 26 ] in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:26
2024-08-11 11:58:48 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(26): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 26, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:26
2024-08-11 11:59:29 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ MODPATH\tuner\views\Setting\mainManual.php [ 30 ] in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:30
2024-08-11 11:59:29 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(30): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:30
2024-08-11 11:59:38 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 11:59:38 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ MODPATH\tuner\views\Setting\mainManual.php [ 30 ] in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:30
2024-08-11 11:59:38 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(30): Kohana_Core::error_handler(8, 'Array to string...', 'C:\\xampp\\htdocs...', 30, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:30
2024-08-11 12:00:12 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:02:42 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:03:01 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:05:01 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:05:24 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:05:30 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:07:29 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:07:41 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:08:30 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:09:08 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:09:08 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:09:08 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:09:08 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:09:34 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:09:34 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:09:34 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:09:34 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:09:38 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:10:03 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:10:03 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: system ~ MODPATH\tuner\views\Setting\mainManual.php [ 41 ] in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:41
2024-08-11 12:10:03 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(41): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 41, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:41
2024-08-11 12:10:34 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:11:38 --- DEBUG: 89 <pre class="debug"><small>array</small><span>(1)</span> <span>(
    "group" => <small>string</small><span>(20)</span> "введите group"
)</span></pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:01 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(15)</span> "howDeletePeople"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:01 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(6)</span> "iphost"
<small>string</small><span>(13)</span> "192.168.9.100"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:01 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(8)</span> "odbcname"
<small>string</small><span>(4)</span> "vnii"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:01 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(7)</span> "orgname"
<small>string</small><span>(29)</span> "ВНИИЖТ Щербинка"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:10 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(15)</span> "howDeletePeople"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:10 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(6)</span> "iphost"
<small>string</small><span>(13)</span> "192.168.9.100"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:10 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(8)</span> "odbcname"
<small>string</small><span>(4)</span> "vnii"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:10 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(7)</span> "orgname"
<small>string</small><span>(20)</span> "ВестГарден"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:34 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(15)</span> "howDeletePeople"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:34 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(6)</span> "iphost"
<small>string</small><span>(13)</span> "192.168.9.100"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:34 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(8)</span> "odbcname"
<small>string</small><span>(4)</span> "vnii"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:12:34 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(7)</span> "orgname"
<small>string</small><span>(20)</span> "ВестГарден"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:13:25 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(15)</span> "howDeletePeople"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:13:25 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(6)</span> "iphost"
<small>string</small><span>(13)</span> "192.168.9.100"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:13:25 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(8)</span> "odbcname"
<small>string</small><span>(4)</span> "vnii"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 12:13:25 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(7)</span> "orgname"
<small>string</small><span>(20)</span> "ВестГарден"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:00:53 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(14)</span> "baseFormatRfid"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:00:53 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:00:53 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(2)</span> "id"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:00:53 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:00:53 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:00:53 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:19:57 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR), expecting ')' ~ MODPATH\cards\classes\Keyk.php [ 292 ] in file:line
2024-08-11 13:19:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 13:20:25 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR), expecting ')' ~ MODPATH\cards\classes\Keyk.php [ 292 ] in file:line
2024-08-11 13:20:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 13:20:29 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR), expecting ')' ~ MODPATH\cards\classes\Keyk.php [ 292 ] in file:line
2024-08-11 13:20:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 13:33:44 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:33:44 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:33:44 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:33:44 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:34:14 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:34:14 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:34:14 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:34:14 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:42:53 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(15)</span> "howDeletePeople"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:42:53 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(6)</span> "iphost"
<small>string</small><span>(13)</span> "192.168.9.100"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:42:53 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(8)</span> "odbcname"
<small>string</small><span>(2)</span> "wg"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 13:42:53 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(7)</span> "orgname"
<small>string</small><span>(20)</span> "ВестГарден"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 14:16:57 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(14)</span> "baseFormatRfid"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 14:16:57 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 14:16:57 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(2)</span> "id"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 14:16:57 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 14:16:57 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 14:16:57 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 14:21:53 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-08-11 14:21:53 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-08-11 20:59:14 --- CRITICAL: Exception [ 63 ]: Дублирование логина и  пароля ~ APPPATH\classes\Auth\City.php [ 62 ] in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-08-11 20:59:14 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('ADMIN', '333', NULL)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('ADMIN', '333', NULL)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-08-11 20:59:35 --- CRITICAL: Exception [ 63 ]: Дублирование логина и  пароля ~ APPPATH\classes\Auth\City.php [ 62 ] in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-08-11 20:59:35 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('ADMIN', '333', NULL)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('ADMIN', '333', NULL)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-08-11 21:02:33 --- CRITICAL: Exception [ 63 ]: Дублирование логина и  пароля ~ APPPATH\classes\Auth\City.php [ 62 ] in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-08-11 21:02:33 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('ADMIN', '333', NULL)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('ADMIN', '333', NULL)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-08-11 21:13:12 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Auth_City::redirect() ~ APPPATH\classes\Auth\City.php [ 63 ] in file:line
2024-08-11 21:13:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 21:13:25 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Auth_City::redirect() ~ APPPATH\classes\Auth\City.php [ 63 ] in file:line
2024-08-11 21:13:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 21:25:25 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: user ~ APPPATH\classes\Auth\City.php [ 51 ] in C:\xampp\htdocs\crm2\application\classes\Auth\City.php:51
2024-08-11 21:25:25 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth\City.php(51): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 51, Array)
#1 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('ADMIN', '333', NULL)
#2 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('ADMIN', '333', NULL)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Auth\City.php:51
2024-08-11 21:40:27 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 21:40:27 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 21:40:27 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 21:40:27 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 21:41:30 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 21:41:30 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 21:41:30 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 21:41:30 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:06:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: rf ~ MODPATH\cards\classes\Keyk.php [ 45 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:45
2024-08-11 22:06:46 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(45): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 45, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(107): Keyk->screenToBase('0014747700')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:45
2024-08-11 22:07:04 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: rf ~ MODPATH\cards\classes\Keyk.php [ 45 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:45
2024-08-11 22:07:04 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(45): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 45, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(107): Keyk->screenToBase('0014747700')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:45
2024-08-11 22:09:12 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Keyk::$regFormatRfid ~ MODPATH\cards\classes\Keyk.php [ 45 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:45
2024-08-11 22:09:12 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(45): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 45, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(107): Keyk->screenToBase('0014747700')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:45
2024-08-11 22:20:29 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:20:29 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:20:29 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:20:29 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:22:45 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:22:45 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:22:45 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:22:45 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:23:02 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:23:02 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:23:02 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:23:02 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:23:19 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:23:19 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:23:19 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:23:19 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:37:11 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(14)</span> "baseFormatRfid"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:37:11 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:37:11 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(2)</span> "id"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:37:11 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:37:11 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(3)</span> "DEC"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:37:11 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:42:04 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(14)</span> "baseFormatRfid"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:42:04 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:42:04 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(2)</span> "id"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:42:04 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:42:04 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(3)</span> "DEC"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:42:04 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(3)</span> "DEC"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:43:55 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(14)</span> "baseFormatRfid"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:43:55 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:43:55 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(2)</span> "id"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:43:55 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:43:55 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 22:43:55 --- DEBUG: 89 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(3)</span> "DEC"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:01:25 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:01:25 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:01:25 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:01:25 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:26:59 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:26:59 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:26:59 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:26:59 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:27:13 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:27:13 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:27:13 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:27:13 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:28:49 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:28:49 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:28:49 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:28:49 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:29:11 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:29:11 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:29:11 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:29:11 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:32:45 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:32:45 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:32:45 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:32:45 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:36:00 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:36:00 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:36:00 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:36:00 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:41:27 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:41:27 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:41:27 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:41:27 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:41:38 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:41:38 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:41:38 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:41:38 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:42:20 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:42:20 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:42:20 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:42:20 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:46:04 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:46:04 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:46:04 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:46:04 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:37 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:37 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:37 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:37 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:49 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:49 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:49 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:49 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:55 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:55 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:55 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:47:55 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:49:05 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:49:05 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:49:05 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "0"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:49:05 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:56:09 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Stat::_001AToDec() ~ MODPATH\cards\classes\Keyk.php [ 176 ] in file:line
2024-08-11 23:56:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-11 23:58:40 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "formatViewAll"
<small>string</small><span>(1)</span> "1"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:58:40 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(13)</span> "regFormatRfid"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:58:40 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(16)</span> "screenFormatRFID"
<small>string</small><span>(1)</span> "2"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-11 23:58:40 --- DEBUG: 414 <pre class="debug"><small>string</small><span>(17)</span> "viewFromatForEdit"
<small>string</small><span>(4)</span> "001A"</pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84