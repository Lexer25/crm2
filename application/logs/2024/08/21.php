<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2024-08-21 07:18:56 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ MODPATH\stat\classes\model\Stat.php [ 148 ] in file:line
2024-08-21 07:18:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:19:11 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'constants' (T_STRING), expecting ')' ~ MODPATH\stat\classes\model\Stat.php [ 149 ] in file:line
2024-08-21 07:19:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:19:22 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'constants' (T_STRING), expecting ')' ~ MODPATH\stat\classes\model\Stat.php [ 149 ] in file:line
2024-08-21 07:19:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:19:50 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID' ~ MODPATH\stat\classes\model\Stat.php [ 148 ] in file:line
2024-08-21 07:19:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:20:05 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '.', expecting '=' ~ APPPATH\classes\constants.php [ 14 ] in file:line
2024-08-21 07:20:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:20:31 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID' ~ MODPATH\stat\classes\model\Stat.php [ 148 ] in file:line
2024-08-21 07:20:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:20:43 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID' ~ MODPATH\stat\classes\model\Stat.php [ 148 ] in file:line
2024-08-21 07:20:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:39:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE) ~ APPPATH\views\contacts\list.php [ 217 ] in file:line
2024-08-21 07:39:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:40:04 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE) ~ APPPATH\views\contacts\list.php [ 214 ] in file:line
2024-08-21 07:40:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:48:12 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ MODPATH\passoffice\views\passoffice\cardlist.php [ 44 ] in file:line
2024-08-21 07:48:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 07:55:57 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\template.php [ 94 ] in C:\xampp\htdocs\crm2\application\views\template.php:94
2024-08-21 07:55:57 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 94, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Reports))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\crm2\application\views\template.php:94
2024-08-21 08:14:15 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '.' ~ MODPATH\cards\classes\controller\cards.php [ 224 ] in file:line
2024-08-21 08:14:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:24:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: key ~ MODPATH\cards\classes\controller\cards.php [ 244 ] in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:244
2024-08-21 08:24:09 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(244): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 244, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search_any()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:244
2024-08-21 08:24:32 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: q ~ MODPATH\cards\classes\controller\cards.php [ 244 ] in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:244
2024-08-21 08:24:32 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php(244): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 244, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Cards->action_search_any()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cards))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\cards\classes\controller\cards.php:244
2024-08-21 08:39:08 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$countRow' (T_VARIABLE), expecting ',' or ';' ~ MODPATH\tuner\views\Setting\mainManual.php [ 320 ] in file:line
2024-08-21 08:39:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:41:08 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$a' (T_VARIABLE), expecting function (T_FUNCTION) ~ APPPATH\classes\constants.php [ 16 ] in file:line
2024-08-21 08:41:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:48:18 --- CRITICAL: ErrorException [ 2048 ]: Non-static method constants::getMax() should not be called statically ~ MODPATH\tuner\views\Setting\mainManual.php [ 321 ] in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:321
2024-08-21 08:48:18 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(321): Kohana_Core::error_handler(2048, 'Non-static meth...', 'C:\\xampp\\htdocs...', 321, Array)
#1 C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php(321): constants::getMax()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\crm2\application\views\template.php(94): Kohana_View->__toString()
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#9 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#14 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#15 {main} in C:\xampp\htdocs\crm2\modules\tuner\views\Setting\mainManual.php:321
2024-08-21 08:51:14 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'CONSTANT' ~ APPPATH\classes\constants.php [ 20 ] in file:line
2024-08-21 08:51:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:51:34 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'constants' ~ APPPATH\classes\constants.php [ 20 ] in file:line
2024-08-21 08:51:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:54:16 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID_MAX_LENGTH' ~ MODPATH\cards\i18n\ru\ru.php [ 38 ] in file:line
2024-08-21 08:54:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:54:58 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID_MAX_LENGTH' ~ MODPATH\cards\i18n\ru\ru.php [ 39 ] in file:line
2024-08-21 08:54:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:55:50 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID_MAX_LENGTH' ~ MODPATH\tuner\views\Setting\mainManual.php [ 318 ] in file:line
2024-08-21 08:55:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:56:04 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID_MAX_LENGTH' ~ APPPATH\classes\constants.php [ 20 ] in file:line
2024-08-21 08:56:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:56:17 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method constants::getMax() ~ MODPATH\tuner\views\Setting\mainManual.php [ 321 ] in file:line
2024-08-21 08:56:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:56:31 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID_MAX_LENGTH' ~ MODPATH\tuner\views\Setting\mainManual.php [ 338 ] in file:line
2024-08-21 08:56:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 08:58:50 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID_MAX_LENGTH' ~ MODPATH\stat\classes\model\Stat.php [ 148 ] in file:line
2024-08-21 08:58:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 09:04:12 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID_MAX_LENGTH' ~ MODPATH\stat\classes\model\Stat.php [ 148 ] in file:line
2024-08-21 09:04:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 09:04:29 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID_MAX_LENGTH' ~ MODPATH\stat\classes\model\Stat.php [ 148 ] in file:line
2024-08-21 09:04:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 09:10:44 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'RFID_MAX_LENGTH' ~ MODPATH\cards\classes\controller\cards.php [ 244 ] in file:line
2024-08-21 09:10:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 09:28:25 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ MODPATH\cards\classes\controller\cards.php [ 255 ] in file:line
2024-08-21 09:28:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 09:43:10 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ MODPATH\cards\classes\controller\cards.php [ 252 ] in file:line
2024-08-21 09:43:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 09:57:59 --- CRITICAL: ErrorException [ 1 ]: Cannot use [] for reading ~ MODPATH\cards\classes\controller\cards.php [ 289 ] in file:line
2024-08-21 09:57:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 10:24:53 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$var2' (T_VARIABLE) ~ MODPATH\cards\classes\controller\cards.php [ 288 ] in file:line
2024-08-21 10:24:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 10:25:09 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$var2' (T_VARIABLE) ~ MODPATH\cards\classes\controller\cards.php [ 288 ] in file:line
2024-08-21 10:25:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 11:24:36 --- CRITICAL: ErrorException [ 1 ]: Class 'Guest' not found ~ MODPATH\passoffice\views\passoffice\list.php [ 88 ] in file:line
2024-08-21 11:24:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 11:25:25 --- CRITICAL: ErrorException [ 1 ]: Class 'Guest' not found ~ MODPATH\passoffice\views\passoffice\list.php [ 88 ] in file:line
2024-08-21 11:25:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 11:58:42 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 312 ] in file:line
2024-08-21 11:58:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 12:17:15 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '9' (T_LNUMBER) ~ MODPATH\passoffice\classes\Guest.php [ 603 ] in file:line
2024-08-21 12:17:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 12:17:21 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '9' (T_LNUMBER) ~ MODPATH\passoffice\classes\Guest.php [ 603 ] in file:line
2024-08-21 12:17:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 12:19:22 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,19724,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:248
2024-08-21 12:21:13 --- DEBUG: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 10, char 6. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'12122121'
					,1
					,19724
					, '21.08.2024'
					,'22.08.2024'
					,':'
					,
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:377
2024-08-21 12:21:42 --- DEBUG: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 10, char 6. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'12181218'
					,1
					,19724
					, '21.08.2024'
					,'22.08.2024'
					,':'
					,
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:377
2024-08-21 12:28:18 --- DEBUG: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 10, char 6. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'12122121'
					,1
					,19724
					, '21.08.2024'
					,'22.08.2024'
					,':'
					,
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:376
2024-08-21 12:30:49 --- DEBUG: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 10, char 6. ,.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ INSERT INTO CARD (ID_CARD,ID_DB,ID_PEP, TIMESTART,TIMEEND,NOTE, STATUS,"ACTIVE",FLAG,ID_CARDTYPE)
					VALUES (
					'12122121'
					,1
					,19724
					, '21.08.2024'
					,'22.08.2024'
					,':'
					,
					,1
					,1
					,1
					) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:376
2024-08-21 12:32:10 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: arrAlert ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 391 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:391
2024-08-21 12:32:10 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(391): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 391, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:391
2024-08-21 12:32:34 --- CRITICAL: Exception [ 274 ]: Отказ в выдаче карты. Карта 12122121 зарегистрирована на гостя тестов1218   ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 403 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-21 12:32:34 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-21 12:35:42 --- DEBUG: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 11, char 1. WHERE.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ UPDATE PEOPLE
	SET 
    SURNAME = '������1218',
    NAME = '',
    PATRONYMIC = '',
     NUMDOC = NULL,
    DATEDOC = NULL,
    PLACEDOC = NULL,
    NOTE = '���'
   
WHERE (ID_PEP = 19724) AND (ID_DB = 1) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:321
2024-08-21 12:40:22 --- DEBUG: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 11, char 1. WHERE.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ UPDATE PEOPLE
	SET 
    SURNAME = '������1218',
    NAME = '',
    PATRONYMIC = '',
     NUMDOC = NULL,
    DATEDOC = NULL,
    PLACEDOC = NULL,
    NOTE = '4567',
   
WHERE (ID_PEP = 19724) AND (ID_DB = 1) ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:321
2024-08-21 13:12:58 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '=', expecting ')' ~ MODPATH\passoffice\views\passoffice\edit.php [ 463 ] in file:line
2024-08-21 13:12:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-08-21 17:16:36 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-21 17:16:48 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-08-21 17:17:54 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84