
2024-07-05 10:20:50 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:20:50 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 10:20:50 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:30:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:30:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:30:11 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:30:12 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 1 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:31:46 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20524,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-05 10:40:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:40:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:50:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:50:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 10:53:20 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: card ~ MODPATH\passoffice\views\passoffice\list.php [ 151 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:151
2024-07-05 10:53:20 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php(151): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 151, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:151
2024-07-05 10:53:27 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: card ~ MODPATH\passoffice\views\passoffice\list.php [ 151 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:151
2024-07-05 10:53:27 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php(151): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 151, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:151
2024-07-05 10:53:27 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: card ~ MODPATH\passoffice\views\passoffice\list.php [ 151 ] in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:151
2024-07-05 10:53:27 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php(151): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 151, Array)
#1 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\crm2\application\views\template.php(52): Kohana_View->__toString()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#11 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\crm2\modules\passoffice\views\passoffice\list.php:151
2024-07-05 10:58:34 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:857
2024-07-05 11:00:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:00:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 11:00:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:00:59 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20527,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-05 11:07:13 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20529,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-05 11:10:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:10:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 11:10:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:20:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:20:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 11:20:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:30:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:30:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 11:30:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 1 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:35:52 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:35:52 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:37:43 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:37:43 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:38:13 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:38:13 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:38:31 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:38:31 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:38:58 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20530,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:208
2024-07-05 11:39:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:39:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:39:01 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: sql ~ MODPATH\passoffice\classes\model\Passofficem.php [ 478 ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php:478
2024-07-05 11:39:01 --- DEBUG: #0 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(478): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 478, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(150): Model_Passofficem->getList(NULL, 'issue')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php:478
2024-07-05 11:40:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:40:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 11:40:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:40:31 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:40:31 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:41:51 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:41:52 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:48:02 --- DEBUG: 297 <pre class="debug"><small>object</small> <span>PDOStatement(1)</span> <code>{
    <small>public</small> queryString => <small>string</small><span>(54)</span> "UPDATE people SET photo = ? 
				WHERE id_pep = 19831"
}</code></pre> in C:\xampp\htdocs\crm2\application\classes\Controller\contacts.php:84
2024-07-05 11:50:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:50:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 11:50:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 1 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 11:50:25 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 11:50:25 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:00:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:00:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 12:00:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 1 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:04:27 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: eventListNotView ~ APPPATH\classes\history.php [ 34 ] in C:\xampp\htdocs\crm2\application\classes\history.php:34
2024-07-05 12:04:27 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\history.php(34): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 34, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(411): History::getHistory('20530')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_history()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\history.php:34
2024-07-05 12:04:45 --- CRITICAL: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH\classes\history.php [ 34 ] in file:line
2024-07-05 12:04:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-05 12:04:55 --- CRITICAL: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH\classes\history.php [ 34 ] in file:line
2024-07-05 12:04:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-05 12:05:45 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: this ~ APPPATH\classes\history.php [ 12 ] in C:\xampp\htdocs\crm2\application\classes\history.php:12
2024-07-05 12:05:45 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\history.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 12, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(411): History::getHistory('20530')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_history()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\history.php:12
2024-07-05 12:09:48 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: this ~ APPPATH\classes\history.php [ 13 ] in C:\xampp\htdocs\crm2\application\classes\history.php:13
2024-07-05 12:09:48 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\history.php(13): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\\xampp\\htdocs...', 13, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(411): History::getHistory('20530')
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_history()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\crm2\application\classes\history.php:13
2024-07-05 12:10:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:10:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 12:10:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:10:13 --- CRITICAL: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH\classes\history.php [ 35 ] in file:line
2024-07-05 12:10:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-05 12:11:02 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:11:02 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:20:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:20:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 12:20:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 1 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:22:25 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ MODPATH\passoffice\views\passoffice\history.php [ 43 ] in file:line
2024-07-05 12:22:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-05 12:23:41 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:23:42 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:23:46 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:23:47 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:30:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:30:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 12:30:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:31:03 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:31:04 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:31:13 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:31:13 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:32:20 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20532,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:208
2024-07-05 12:32:23 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:32:23 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:34:49 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:34:49 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:35:24 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:35:25 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:40:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:40:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 12:40:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:44:06 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:06 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:10 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:11 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:15 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:15 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:24 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:24 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:33 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:33 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:42 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:44:43 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:45:24 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:45:27 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:45:27 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:45:30 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:45:30 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:45:43 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:45:43 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:45:51 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:45:52 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:46:25 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:46:25 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:46:32 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:46:32 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 12:50:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 12:50:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 12:50:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:00:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:00:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 13:00:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:10:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:10:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 13:10:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 1 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:19:21 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:19:21 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:20:00 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:20:00 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 13:20:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 1 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:24:49 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:24:50 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:25:26 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:25:26 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:26:58 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:26:59 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:27:21 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20534,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:208
2024-07-05 13:27:25 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:27:25 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:30:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:30:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 13:30:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:30:06 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:32:18 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:32:52 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:34:11 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:34:12 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:37:14 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20535,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:208
2024-07-05 13:39:09 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20536,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:208
2024-07-05 13:40:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:40:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 13:40:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:44:57 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:858
2024-07-05 13:50:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт начата in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 13:50:01 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\application\classes\Task\checkGuestCardExpired.php:31
2024-07-05 13:50:01 --- DEBUG: 178 checkGuestCardExpired Проверка гостевых карт завершена. Время исполнения: 0 in C:\xampp\htdocs\crm2\modules\minion\classes\Kohana\Minion\Task.php:250
2024-07-05 23:39:27 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-05 23:50:35 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\views\companies\list.php [ 180 ] in file:line
2024-07-05 23:50:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-05 23:55:44 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-05 23:56:13 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-05 23:56:25 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-05 23:56:30 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-05 23:56:59 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-05 23:57:07 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-05 23:57:36 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH\views\companies\list.php [ 193 ] in file:line
2024-07-05 23:57:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2024-07-05 23:58:15 --- DEBUG: 324 <pre class="debug"><small>array</small><span>(0)</span> </pre> in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84