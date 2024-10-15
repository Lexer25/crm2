<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-07-03 09:24:11 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-03 09:36:22 --- DEBUG: 178 SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 2, char 54. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO people (id_pep, id_db, surname, name, patronymic, id_org, note) 
                VALUES (20442,1, 'Гость0936', '', '',,  '') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:190
2024-07-03 09:36:22 --- DEBUG: 178 SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Unexpected end of command.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ select sso.id_accessname from  ss_accessorg sso
		where sso.id_org= ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:195
2024-07-03 09:36:22 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'09360936'
					,1
					,20442
					, '03.07.2024'
					,'04.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:206
2024-07-03 09:47:56 --- DEBUG: 178 SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 2, char 54. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO people (id_pep, id_db, surname, name, patronymic, id_org, note) 
                VALUES (20444,1, 'Гость0947', '', '',,  '') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:190
2024-07-03 09:47:56 --- DEBUG: 178 SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Unexpected end of command.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ select sso.id_accessname from  ss_accessorg sso
		where sso.id_org= ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:195
2024-07-03 09:47:56 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'0A1E8604'
					,1
					,20444
					, '03.07.2024'
					,'04.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:206
2024-07-03 09:49:14 --- DEBUG: 297 <pre class="debug"><small>object</small> <span>PDOStatement(1)</span> <code>{
    <small>public</small> queryString => <small>string</small><span>(54)</span> "UPDATE people SET photo = ? 
				WHERE id_pep = 20160"
}</code></pre> in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:84
2024-07-03 10:03:41 --- DEBUG: 178 SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 2, char 54. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO people (id_pep, id_db, surname, name, patronymic, id_org, note) 
                VALUES (20445,1, 'Гость1003', '', '',,  '') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:190
2024-07-03 10:03:41 --- DEBUG: 178 SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Unexpected end of command.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ select sso.id_accessname from  ss_accessorg sso
		where sso.id_org= ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:195
2024-07-03 10:03:41 --- DEBUG: SQLSTATE[23000]: Integrity constraint violation: -530 [Gemini InterBase ODBC Driver][INTERBASE]violation of FOREIGN KEY constraint "FK_CARD_ID_PEP" on table "CARD".  (SQLExecute[-530] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'10031003'
					,1
					,20445
					, '03.07.2024'
					,'04.07.2024'
					,':'
					,0
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:206
2024-07-03 10:23:18 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: id_pep ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 39 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:39
2024-07-03 10:23:18 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 39, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(69): Controller_Passoffices->before()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:39
2024-07-03 10:26:43 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20449,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-03 10:27:03 --- CRITICAL: ErrorException [ 8 ]: Undefined property: passoffice::$surname ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 439 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:439
2024-07-03 10:27:03 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(439): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 439, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_delete()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:439
2024-07-03 10:27:35 --- CRITICAL: ErrorException [ 8 ]: Undefined property: passoffice::$surname ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 439 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:439
2024-07-03 10:27:35 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(439): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 439, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_delete()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:439
2024-07-03 10:33:44 --- CRITICAL: ErrorException [ 8 ]: Undefined property: passoffice::$tabnum ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 440 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:440
2024-07-03 10:33:44 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(440): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\\xampp\\htdocs...', 440, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_delete()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:440
2024-07-03 10:42:27 --- CRITICAL: ErrorException [ 1 ]: Class 'Passoffice' not found ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 432 ] in file:line
2024-07-03 10:42:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-03 10:42:43 --- CRITICAL: ErrorException [ 1 ]: Class 'Passoffice' not found ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 432 ] in file:line
2024-07-03 10:42:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-03 10:45:39 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20452,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-03 10:46:10 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20454,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-03 10:46:57 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20455,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-03 11:33:08 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20460,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-03 11:47:18 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20462,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-03 11:50:38 --- DEBUG: 297 <pre class="debug"><small>object</small> <span>PDOStatement(1)</span> <code>{
    <small>public</small> queryString => <small>string</small><span>(54)</span> "UPDATE people SET photo = ? 
				WHERE id_pep = 19877"
}</code></pre> in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:84
2024-07-03 12:42:34 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20463,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-03 12:42:46 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20464,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-03 12:42:58 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20465,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-03 12:43:08 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20466,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207