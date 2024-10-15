<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-08-20 08:26:42 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-20 08:29:33 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\views\contacts\list.php [ 138 ] in file:line
2024-08-20 08:29:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 09:12:28 --- CRITICAL: Exception [ 63 ]: Дублирование логина и  пароля ~ APPPATH\classes\Auth\City.php [ 62 ] in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-08-20 09:12:28 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Auth.php(98): Auth_City->_login('USER19144', '2024', NULL)
#1 C:\xampp\htdocs\crm2\application\classes\Controller\login.php(21): Auth->login('USER19144', '2024', NULL)
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Login->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Login))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\Auth.php:98
2024-08-20 10:49:21 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ APPPATH\views\sidebar.php [ 92 ] in file:line
2024-08-20 10:49:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 10:50:37 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\views\sidebar.php [ 106 ] in file:line
2024-08-20 10:50:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 10:50:50 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\views\sidebar.php [ 106 ] in file:line
2024-08-20 10:50:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 13:08:04 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-08-20 13:08:07 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-08-20 13:10:53 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: result ~ MODPATH\cards\classes\Keyk.php [ 187 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:10:53 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(187): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 187, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(225): Keyk->convertFormat(NULL, '0', '0')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(203): Keyk->__construct('12122121')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:33:31 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: result ~ MODPATH\cards\classes\Keyk.php [ 187 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:33:31 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(187): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 187, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(225): Keyk->convertFormat(NULL, '0', '0')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(203): Keyk->__construct('12122121')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:34:39 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: result ~ MODPATH\cards\classes\Keyk.php [ 187 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:34:39 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(187): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 187, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(225): Keyk->convertFormat(NULL, '0', '0')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(203): Keyk->__construct('12122121')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:37:01 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: id_card ~ MODPATH\cards\classes\Keyk.php [ 226 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:226
2024-08-20 13:37:01 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(226): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 226, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(203): Keyk->__construct('12122121')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:226
2024-08-20 13:37:42 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: result ~ MODPATH\cards\classes\Keyk.php [ 187 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:37:42 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(187): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 187, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(226): Keyk->convertFormat('12122121', '0', '0')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(203): Keyk->__construct('12122121')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:38:56 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: result ~ MODPATH\cards\classes\Keyk.php [ 187 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:38:56 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(187): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 187, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(226): Keyk->convertFormat('12122121', '0', '0')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(203): Keyk->__construct('12122121')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:39:01 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: result ~ MODPATH\cards\classes\Keyk.php [ 187 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:39:01 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(187): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 187, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(226): Keyk->convertFormat('12122121', '0', '0')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(203): Keyk->__construct('12122121')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:43:50 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:875
2024-08-20 13:47:45 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: result ~ MODPATH\cards\classes\Keyk.php [ 187 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:47:45 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(187): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 187, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(226): Keyk->convertFormat('12122121', '0', '0')
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(204): Keyk->__construct('12122121')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:187
2024-08-20 13:52:18 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19716,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:227
2024-08-20 13:52:18 --- DEBUG: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 10, char 6. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'12122121'
					,1
					,19716
					, '20.08.2024'
					,'21.08.2024'
					,':'
					,
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:238
2024-08-20 13:52:25 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:877
2024-08-20 13:53:12 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:877
2024-08-20 13:53:25 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19717,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:227
2024-08-20 13:53:25 --- DEBUG: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 10, char 6. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'23233232'
					,1
					,19717
					, '20.08.2024'
					,'21.08.2024'
					,':'
					,
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:238
2024-08-20 13:53:33 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:877
2024-08-20 13:56:30 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19718,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:228
2024-08-20 14:04:41 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ' ~ MODPATH\passoffice\views\passoffice\edit.php [ 327 ] in file:line
2024-08-20 14:04:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 14:05:08 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH\passoffice\views\passoffice\edit.php [ 417 ] in file:line
2024-08-20 14:05:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 14:05:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH\passoffice\views\passoffice\edit.php [ 420 ] in file:line
2024-08-20 14:05:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 14:12:11 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19719,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:248
2024-08-20 14:12:48 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19720,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:248
2024-08-20 14:12:55 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:898
2024-08-20 14:19:58 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: row ~ MODPATH\passoffice\views\passoffice\list.php [ 111 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:111
2024-08-20 14:19:58 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php(111): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 111, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:111
2024-08-20 14:25:39 --- CRITICAL: Kohana_Exception [ 0 ]: Database results are read-only ~ MODPATH\database\classes\Kohana\Database\Result.php [ 258 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:116
2024-08-20 14:25:39 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php(116): Kohana_Database_Result->offsetSet(NULL, Object(Keyk))
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:116
2024-08-20 14:26:31 --- CRITICAL: Kohana_Exception [ 0 ]: Database results are read-only ~ MODPATH\database\classes\Kohana\Database\Result.php [ 258 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:117
2024-08-20 14:26:31 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php(117): Kohana_Database_Result->offsetSet(NULL, '34344343')
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:117
2024-08-20 14:40:43 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19721,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:248
2024-08-20 14:40:47 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:898
2024-08-20 14:41:05 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:898
2024-08-20 14:41:19 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=760
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (759, 760)
			where c.timeend<'now'
			)
			and p2.id_org=759 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:898
2024-08-20 14:43:59 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19722,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:248
2024-08-20 14:44:39 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19723,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:248
2024-08-20 15:21:24 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ MODPATH\cards\views\cards\list.php [ 125 ] in file:line
2024-08-20 15:21:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 15:21:42 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ MODPATH\cards\views\cards\list.php [ 141 ] in file:line
2024-08-20 15:21:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 18:01:14 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\contacts\cardlist.php [ 123 ] in file:line
2024-08-20 18:01:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 18:06:02 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\views\contacts\cardlist.php [ 153 ] in file:line
2024-08-20 18:06:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 20:23:36 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'case' (T_CASE) ~ MODPATH\cards\views\cards\list.php [ 133 ] in file:line
2024-08-20 20:23:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 20:36:39 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$result' (T_VARIABLE), expecting case (T_CASE) or default (T_DEFAULT) or '}' ~ MODPATH\cards\classes\Keyk.php [ 214 ] in file:line
2024-08-20 20:36:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-20 20:37:45 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant result - assumed 'result' ~ MODPATH\cards\classes\Keyk.php [ 219 ] in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:219
2024-08-20 20:37:45 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(219): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\\xampp\\htdocs...', 219, Array)
#1 C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php(256): Keyk->makeDecFromBase('007E3600')
#2 C:\xampp\htdocs\crm2\modules\cards\views\cards\list.php(104): Keyk->__construct('007E3600')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#6 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#15 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#16 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\Keyk.php:219