<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-07-12 08:37:58 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Passoffice::delete() ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 937 ] in file:line
2024-07-12 08:37:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-12 08:46:47 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ MODPATH\passoffice\classes\passoffice.php [ 78 ] in file:line
2024-07-12 08:46:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-12 08:47:21 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: id ~ MODPATH\passoffice\classes\passoffice.php [ 78 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php:78
2024-07-12 08:47:21 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php(78): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 78, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(937): Passoffice->delete()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_editItem()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php:78
2024-07-12 08:47:40 --- CRITICAL: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 19 NOT NULL constraint failed: po_config.name [ INSERT INTO po_config (name, id_org_guest, id_org_archive, is_active) VALUES (NULL, '665', '641', 1) ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-12 08:47:40 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(2, 'INSERT INTO po_...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php(66): Kohana_Database_Query->execute('pocfg')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(956): Passoffice->add()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_editItem()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-12 08:48:00 --- CRITICAL: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 19 NOT NULL constraint failed: po_config.name [ INSERT INTO po_config (name, id_org_guest, id_org_archive, is_active) VALUES (NULL, '722', '725', 1) ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-12 08:48:00 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(2, 'INSERT INTO po_...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php(66): Kohana_Database_Query->execute('pocfg')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(956): Passoffice->add()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_editItem()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-12 08:51:52 --- CRITICAL: ErrorException [ 2 ]: Missing argument 1 for ExceptionCRM::__construct(), called in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php on line 961 and defined ~ APPPATH\classes\ExceptionCRM.php [ 7 ] in C:\xampp\htdocs\crm2\application\classes\ExceptionCRM.php:7
2024-07-12 08:51:52 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\ExceptionCRM.php(7): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\\xampp\\htdocs...', 7, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(961): ExceptionCRM->__construct()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_editItem()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\ExceptionCRM.php:7
2024-07-12 08:53:23 --- CRITICAL: ErrorException [ 2 ]: Missing argument 1 for ExceptionCRM::__construct(), called in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php on line 954 and defined ~ APPPATH\classes\ExceptionCRM.php [ 7 ] in C:\xampp\htdocs\crm2\application\classes\ExceptionCRM.php:7
2024-07-12 08:53:23 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\ExceptionCRM.php(7): Kohana_Core::error_handler(2, 'Missing argumen...', 'C:\\xampp\\htdocs...', 7, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(954): ExceptionCRM->__construct()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_editItem()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\ExceptionCRM.php:7
2024-07-12 08:57:57 --- CRITICAL: ErrorException [ 1 ]: Cannot use object of type Passoffice as array ~ SYSPATH\classes\Kohana\Arr.php [ 287 ] in file:line
2024-07-12 08:57:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-12 08:58:42 --- CRITICAL: ErrorException [ 1 ]: Cannot use object of type Passoffice as array ~ SYSPATH\classes\Kohana\Arr.php [ 287 ] in file:line
2024-07-12 08:58:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-12 08:59:49 --- CRITICAL: ErrorException [ 1 ]: Cannot use object of type Passoffice as array ~ SYSPATH\classes\Kohana\Arr.php [ 287 ] in file:line
2024-07-12 08:59:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-12 09:01:06 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: name ~ MODPATH\passoffice\classes\passoffice.php [ 90 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php:90
2024-07-12 09:01:06 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php(90): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 90, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(946): Passoffice->update()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_editItem()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php:90
2024-07-12 09:01:32 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Passoffice::$id_org_guest ~ MODPATH\passoffice\classes\passoffice.php [ 90 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php:90
2024-07-12 09:01:32 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php(90): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 90, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(946): Passoffice->update()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_editItem()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php:90
2024-07-12 09:02:04 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Passoffice::$idorgguest ~ MODPATH\passoffice\classes\passoffice.php [ 90 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php:90
2024-07-12 09:02:04 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php(90): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 90, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(946): Passoffice->update()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_editItem()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php:90
2024-07-12 09:02:29 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1 no such table: roles [ UPDATE roles SET name = 'Алексеевская22', id_org_guest = '2', id_org_archive = '3', is_active = '1' WHERE id = '2' ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-12 09:02:29 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(3, 'UPDATE roles SE...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\passoffice.php(91): Kohana_Database_Query->execute('pocfg')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(946): Passoffice->update()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_editItem()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-12 10:59:56 --- DEBUG: 75 Добавление бюро пропусков <pre class="debug"><small>object</small> <span>Passoffice(7)</span> <code>{
    <small>public</small> idOrgGuest => <small>string</small><span>(1)</span> "1"
    <small>public</small> idOrgGuestArchive => <small>string</small><span>(1)</span> "1"
    <small>public</small> name => <small>string</small><span>(4)</span> "lala"
    <small>public</small> is_active => <small>integer</small> 1
    <small>public</small> id => <small>NULL</small>
    <small>public</small> table_po => <small>string</small><span>(9)</span> "po_config"
    <small>public</small> base_po => <small>string</small><span>(5)</span> "pocfg"
}</code>
<small>array</small><span>(1)</span> <span>(
    0 => <small>integer</small> 1
)</span></pre> in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:906
2024-07-12 11:06:46 --- DEBUG: 107 Обновление бюро пропусков <pre class="debug"><small>object</small> <span>Passoffice(7)</span> <code>{
    <small>public</small> idOrgGuest => <small>string</small><span>(1)</span> "1"
    <small>public</small> idOrgGuestArchive => <small>string</small><span>(1)</span> "1"
    <small>public</small> name => <small>string</small><span>(4)</span> "lala"
    <small>public</small> is_active => <small>string</small><span>(1)</span> "1"
    <small>public</small> id => <small>string</small><span>(1)</span> "3"
    <small>public</small> table_po => <small>string</small><span>(9)</span> "po_config"
    <small>public</small> base_po => <small>string</small><span>(5)</span> "pocfg"
}</code>
<small>integer</small> 1</pre> in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:946
2024-07-12 11:06:56 --- DEBUG: 107 Обновление бюро пропусков <pre class="debug"><small>object</small> <span>Passoffice(7)</span> <code>{
    <small>public</small> idOrgGuest => <small>string</small><span>(1)</span> "1"
    <small>public</small> idOrgGuestArchive => <small>string</small><span>(1)</span> "1"
    <small>public</small> name => <small>string</small><span>(7)</span> "lala---"
    <small>public</small> is_active => <small>string</small><span>(1)</span> "1"
    <small>public</small> id => <small>string</small><span>(1)</span> "3"
    <small>public</small> table_po => <small>string</small><span>(9)</span> "po_config"
    <small>public</small> base_po => <small>string</small><span>(5)</span> "pocfg"
}</code>
<small>integer</small> 1</pre> in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:946
2024-07-12 11:25:16 --- DEBUG: 107 Обновление бюро пропусков <pre class="debug"><small>object</small> <span>Passoffice(7)</span> <code>{
    <small>public</small> idOrgGuest => <small>string</small><span>(1)</span> "1"
    <small>public</small> idOrgGuestArchive => <small>string</small><span>(1)</span> "1"
    <small>public</small> name => <small>string</small><span>(10)</span> "lala---666"
    <small>public</small> is_active => <small>string</small><span>(1)</span> "1"
    <small>public</small> id => <small>string</small><span>(1)</span> "3"
    <small>public</small> table_po => <small>string</small><span>(9)</span> "po_config"
    <small>public</small> base_po => <small>string</small><span>(5)</span> "pocfg"
}</code>
<small>integer</small> 1</pre> in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:946
2024-07-12 11:25:20 --- DEBUG: 107 Обновление бюро пропусков <pre class="debug"><small>object</small> <span>Passoffice(7)</span> <code>{
    <small>public</small> idOrgGuest => <small>string</small><span>(1)</span> "1"
    <small>public</small> idOrgGuestArchive => <small>string</small><span>(1)</span> "1"
    <small>public</small> name => <small>string</small><span>(10)</span> "lala---666"
    <small>public</small> is_active => <small>string</small><span>(1)</span> "1"
    <small>public</small> id => <small>string</small><span>(1)</span> "3"
    <small>public</small> table_po => <small>string</small><span>(9)</span> "po_config"
    <small>public</small> base_po => <small>string</small><span>(5)</span> "pocfg"
}</code>
<small>integer</small> 1</pre> in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:946
2024-07-12 11:25:28 --- DEBUG: 107 Обновление бюро пропусков <pre class="debug"><small>object</small> <span>Passoffice(7)</span> <code>{
    <small>public</small> idOrgGuest => <small>string</small><span>(3)</span> "723"
    <small>public</small> idOrgGuestArchive => <small>string</small><span>(3)</span> "693"
    <small>public</small> name => <small>string</small><span>(10)</span> "lala---666"
    <small>public</small> is_active => <small>string</small><span>(1)</span> "1"
    <small>public</small> id => <small>string</small><span>(1)</span> "3"
    <small>public</small> table_po => <small>string</small><span>(9)</span> "po_config"
    <small>public</small> base_po => <small>string</small><span>(5)</span> "pocfg"
}</code>
<small>integer</small> 1</pre> in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:946
2024-07-12 11:25:32 --- DEBUG: 89 Удаление бюро пропусков <pre class="debug"><small>object</small> <span>Passoffice(7)</span> <code>{
    <small>public</small> idOrgGuest => <small>string</small><span>(3)</span> "723"
    <small>public</small> idOrgGuestArchive => <small>string</small><span>(3)</span> "693"
    <small>public</small> name => <small>string</small><span>(10)</span> "lala---666"
    <small>public</small> is_active => <small>string</small><span>(1)</span> "1"
    <small>public</small> id => <small>string</small><span>(1)</span> "3"
    <small>public</small> table_po => <small>string</small><span>(9)</span> "po_config"
    <small>public</small> base_po => <small>string</small><span>(5)</span> "pocfg"
}</code>
<small>integer</small> 1</pre> in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:937
2024-07-12 19:36:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-12 19:36:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-12 19:40:16 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-12 19:40:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-12 19:43:04 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-12 19:43:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-12 19:44:13 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Cpdf::addInfo() ~ APPPATH\vendor\dompdf\src\Adapter\CPDF.php [ 205 ] in file:line
2024-07-12 19:44:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line