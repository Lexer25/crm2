
2024-07-04 16:07:33 --- CRITICAL: Exception [ 271 ]: Карта FA0C3B04 зарегистрирован успешно. ~ MODPATH\passoffice\classes\controller\Passoffices.php [ 313 ] in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-04 16:07:33 --- DEBUG: #0 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_save()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php:84
2024-07-04 16:09:03 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:857
2024-07-04 16:16:25 --- DEBUG: 178 SQLSTATE[23000]: Integrity constraint violation: -803 [Gemini InterBase ODBC Driver][INTERBASE]violation of PRIMARY or UNIQUE KEY constraint "UNQ_SS_ACCESSUSER" on table "SS_ACCESSUSER".  (SQLExecute[-803] at ext\pdo_odbc\odbc_stmt.c:254) [ INSERT INTO SS_ACCESSUSER (ID_DB,ID_PEP,ID_ACCESSNAME,USERNAME) VALUES (1,20509,10,'ADMIN') ] in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:207
2024-07-04 16:21:51 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 4, char 38. desc.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ select e.id_event from events e
            where e.datetime between '04.07.2024' and '05.07.2024'
            and e.id_eventtype in (50, 46, 65)
            and e.ess2 in (787, 788) desc ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-04 16:21:51 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select e.id_eve...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(679): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(71): Model_Passofficem->getEventsList('04.07.2024', '05.07.2024')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_events()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-04 16:21:51 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 4, char 38. desc.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ select e.id_event from events e
            where e.datetime between '04.07.2024' and '05.07.2024'
            and e.id_eventtype in (50, 46, 65)
            and e.ess2 in (787, 788) desc ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-04 16:21:51 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select e.id_eve...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(679): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(71): Model_Passofficem->getEventsList('04.07.2024', '05.07.2024')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_events()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-04 16:22:20 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 1, char 8. desc.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ select desc e.id_event from events e
            where e.datetime between '04.07.2024' and '05.07.2024'
            and e.id_eventtype in (50, 46, 65)
            and e.ess2 in (787, 788) ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-04 16:22:20 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select desc e.i...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(679): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(71): Model_Passofficem->getEventsList('04.07.2024', '05.07.2024')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_events()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-04 16:22:21 --- CRITICAL: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 0 [Gemini InterBase ODBC Driver][INTERBASE]Dynamic SQL Error. SQL error code = -104. Token unknown - line 1, char 8. desc.  (SQLPrepare[0] at ext\pdo_odbc\odbc_driver.c:206) [ select desc e.id_event from events e
            where e.datetime between '04.07.2024' and '05.07.2024'
            and e.id_eventtype in (50, 46, 65)
            and e.ess2 in (787, 788) ] ~ APPPATH\classes\Kohana\Database\PDO.php [ 159 ] in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-04 16:22:21 --- DEBUG: #0 C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php(255): Kohana_Database_PDO->query(1, 'select desc e.i...', false, Array)
#1 C:\xampp\htdocs\crm2\modules\passoffice\classes\model\Passofficem.php(679): Kohana_Database_Query->execute(Object(Database_PDO))
#2 C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php(71): Model_Passofficem->getEventsList('04.07.2024', '05.07.2024')
#3 C:\xampp\htdocs\crm2\system\classes\Kohana\Controller.php(84): Controller_Passoffices->action_events()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passoffices))
#6 C:\xampp\htdocs\crm2\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\crm2\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\crm2\index.php(120): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\crm2\application\classes\Kohana\Database\Query.php:255
2024-07-04 16:24:05 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:857
2024-07-04 16:41:21 --- DEBUG: 699 перенос гостя в Архив update people p2 set p2.id_org=788
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in (787, 788)
			where c.timeend<'now'
			)
			and p2.id_org=787 in C:\xampp\htdocs\crm2\modules\passoffice\classes\controller\Passoffices.php:857