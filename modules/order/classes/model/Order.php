<?php defined('SYSPATH') OR die('No direct access allowed.');
/*редакция 26.04.2024
* Класс модель для работы с гостями
* в обработку добавлены условия поисков только в организациях, указанных в $idOrgGuest и $idOrgGuestArchive
*/

class Model_Order extends Model
{
	
	public $idOrgGuest;//id_org организации, используемой в качестве гостевой
	public $idOrgGuestArchive;//id_org организации, используемой в качестве архива гостевой

	public $idGuest;
	public $id_active;//Признак активности
	public $id;//номер бюро пропусков

	public $name = 'Бюро пропусков Щербинка';// название Бюро пропусков
	
	
	/**
	*12.11.2023 получение (Заполнение) конфигурационных параметров режима Гость
	*27.06.2024 Модель Бюро пропусков пытаюсь сделать как отдельный класс, который имеет свои параметры и хранит их в своей базе данных. См. класс passoffice	
	*/
	
		
	
	/**	
	*27.06.2024 Модель Бюро пропусков пытаюсь сделать как модель Kohana
	*если для указанного $id_pep нет записей, то результатом будет null
	*/
public function checkSignature($id_pep = null)
{
    $pd = new PD(0);
    return $pd->checkSignature($id_pep);
}
public function getListNowOrder($id_pep, $mode = null, $user_role = null, $buro_filter = '', $show_all = false)
{
    $start = microtime(true);

    $baseWhere = '';
    $user_buro_ids = array();

    // Загружаем настройки (используем ваш метод getSettings, но адаптированный для модели)
    $settings = $this->getSettings();

    if ($user_role == 1) {
        // админ — все записи
        $baseWhere = '1=1';
    } elseif ($user_role == 2) {
        $buro = new Buro();
        $user_buros = $buro->getIdBuroForUser($id_pep);
        $user_buro_ids = array_map('intval', Arr::pluck($user_buros, 'id_buro'));

        if (empty($user_buro_ids)) {
            //Log::instance()->add(Log::DEBUG, 'No buros for user ' . $id_pep);
            return array();
        }

        // Для user_role == 2 проверяем режим и настройку archive_visibility
        if ($mode === 'archive_mode') {
            if ($settings['archive_visibility'] === 'all') {
                $baseWhere = '1=1';  // Видят весь архив
            } else {
                $baseWhere = 'gu.id_buro IN (' . implode(',', $user_buro_ids) . ')';  // Видят только по своему бюро
            }
        } else {
            // Для guest_mode всегда фильтрация по бюро
            $baseWhere = 'gu.id_buro IN (' . implode(',', $user_buro_ids) . ')';
        }
    } else {
        $baseWhere = 'gu.id_org = :id_org';
    }

    $sql = 'SELECT 
        gu.id_guestorder, 
        g."ID_PEP" AS id_guest, 
        g."SURNAME" AS guest_surname, 
        g."NAME" AS guest_name, 
        g."PATRONYMIC" AS guest_patronymic, 
        o.id_org, 
        o."NAME" AS org_name, 
        p."SURNAME" AS p_surname,
        g."NUMDOC" AS numdoc, 
        g.time_stamp,
        gu.timeplan,
        gu.timeorder,
        gu.is_active,
        gu.id_buro,
        gu.id_pep AS id_pep,
        c_g.id_card AS guest_card_number,
        c_g."CREATEDAT" AS createdat
    FROM guestorder gu
    JOIN people g ON gu.id_guest = g.id_pep
    JOIN organization o ON gu.id_org = o.id_org
    JOIN people p ON gu.id_pep = p.id_pep
    LEFT JOIN card c_g ON g.id_pep = c_g.id_pep
    WHERE :baseWhere
    AND gu.id_guestorder = (
        SELECT MAX(g2.id_guestorder)
        FROM guestorder g2
        JOIN people p2 ON g2.id_guest = p2.id_pep
        WHERE g2.id_guest = gu.id_guest';

    if ($mode === 'guest_mode') {
        if ($show_all) {
            $sql .= ' AND g2.timeplan < CURRENT_DATE + 1';
        } else {
            $sql .= ' AND ((g2.timeplan >= CURRENT_DATE AND g2.timeplan < CURRENT_DATE + 1)
                OR (g2.timeplan < CURRENT_DATE 
                    AND EXISTS (SELECT 1 FROM card c WHERE c.id_pep = g2.id_guest)))';
        }
        $sql .= ' AND p2.id_org = 2';
        $sql .= ' AND g2.is_active = 1';
    } elseif ($mode === 'archive_mode') {
        $sql .= ' AND g2.timeplan < CURRENT_DATE + 1';
        $sql .= ' AND p2.id_org = 3';
        $sql .= ' AND (g2.is_active IS NULL OR g2.is_active <> 1)';
    }

    $sql .= ')';

    if ($mode === 'guest_mode') {
        $sql .= ' ORDER BY gu.timeorder DESC';
    } elseif ($mode === 'archive_mode') {
        $sql .= ' ORDER BY gu.timeorder DESC';
    }

    // Выполняем основной запрос (на fb)
    $sql_for_exec = str_replace(':baseWhere', $baseWhere, $sql);
    Log::instance()->add(Log::DEBUG, 'SQL Query: ' . $sql_for_exec);

    $query = DB::query(Database::SELECT, $sql_for_exec);

    if ($user_role == 3) {
        $user = new User();
        $query->param(':id_org', $user->id_org);
    }

    $rows = $query->execute(Database::instance('fb'))->as_array();

    $result = array();

    if (empty($rows)) {
        Log::instance()->add(Log::DEBUG, 'Execution Time: ' . (microtime(true) - $start));
        return $result;
    }

    // Собираем уникальные id_buro из результатов
    $buro_ids = array_filter(array_unique(array_map(function($row) {
        return isset($row['ID_BURO']) ? $row['ID_BURO'] : null;
    }, $rows)));

    // Запрашиваем названия бюро из bu_buro
    $buro_map = array();
    if (!empty($buro_ids)) {
        $buro_sql = 'SELECT id, name FROM bu_buro WHERE id IN (' . implode(',', array_map(function($id) {
            return is_numeric($id) ? (int)$id : "'".addslashes($id)."'";
        }, $buro_ids)) . ')';
        //Log::instance()->add(Log::DEBUG, 'Buro SQL Query: ' . $buro_sql);

        $buro_rows = DB::query(Database::SELECT, $buro_sql)
            ->execute(Database::instance('bucfg'))
            ->as_array();

        //Log::instance()->add(Log::DEBUG, 'Buro Rows: ' . print_r($buro_rows, true));

        foreach ($buro_rows as $buro_row) {
            $buro_id = isset($buro_row['id']) ? $buro_row['id'] : (isset($buro_row['ID']) ? $buro_row['ID'] : null);
            $buro_name = isset($buro_row['name']) ? $buro_row['name'] : (isset($buro_row['NAME']) ? $buro_row['NAME'] : '');
            if ($buro_id !== null && $buro_name !== '') {
                $buro_map[$buro_id] = $buro_name;
            }
        }
    }

    foreach ($rows as $row) {
        $row_buro_id = isset($row['ID_BURO']) ? $row['ID_BURO'] : null;
        $row['buro_name'] = ($row_buro_id !== null && isset($buro_map[$row_buro_id])) 
            ? $buro_map[$row_buro_id] 
            : 'Не указано';

        //Log::instance()->add(Log::DEBUG, 'Row ID_BURO: ' . $row_buro_id . ', Buro Name: ' . $row['buro_name']);

        $result[] = $row;
    }

    // archive_mode: проверяем подпись
    if ($mode === 'archive_mode' && !empty($result)) {
        $pd = new PD(0);
        
        // Получаем все ID и имена файлов, имеющих подписи
        $settings = $this->getSettings();
        $upload_dir = $pd->normalizePath($settings['upload_dir']);
        
        $filelist = array(); // массив id => filename
        if (is_dir($upload_dir) && is_readable($upload_dir)) {
            try {
                $iterator = new DirectoryIterator($upload_dir);
                foreach ($iterator as $fileInfo) {
                    if ($fileInfo->isFile()) {
                        $filename = $fileInfo->getFilename();
                        // Проверяем что это jpg файл и извлекаем ID
                        if (strtolower(pathinfo($filename, PATHINFO_EXTENSION)) === 'jpg') {
                            $id_part = explode("_", $filename)[0];
                            if (is_numeric($id_part)) {
                                $filelist[(int)$id_part] = $filename; // id => filename
                            }
                        }
                    }
                }
            } catch (Exception $e) {
                Log::instance()->add(Log::DEBUG, 'Error scanning directory for signatures: ' . $e->getMessage());
            }
        }
        
        // Быстрая проверка наличия подписи через array_key_exists и добавление filename
        foreach ($result as &$r) {
            $check_id = array_key_exists('id_guest', $r) ? $r['id_guest'] : 
                       (array_key_exists('ID_GUEST', $r) ? $r['ID_GUEST'] : null);
            
            if ($check_id !== null && array_key_exists($check_id, $filelist)) {
                $r['has_signature'] = true;
                $r['signature_filename'] = $filelist[$check_id]; // добавляем название файла в результат
            } else {
                $r['has_signature'] = false;
                $r['signature_filename'] = null;
            }
        }
        unset($r);
    }

    Log::instance()->add(Log::DEBUG, 'Execution Time: ' . (microtime(true) - $start));
    return $result;
}

public function getListNowOrder2($id_pep, $mode = null, $user_role = null, $buro_filter = '', $show_all = false)
{
    $start = microtime(true);

    $baseWhere = '';
    $user_buro_ids = array();

    // Загружаем настройки (используем ваш метод getSettings, но адаптированный для модели)
    $settings = $this->getSettings();

    if ($user_role == 1) {
        // админ — все записи
        $baseWhere = '1=1';
    } elseif ($user_role == 2) {
        $buro = new Buro();
        $user_buros = $buro->getIdBuroForUser($id_pep);
        $user_buro_ids = array_map('intval', Arr::pluck($user_buros, 'id_buro'));

        if (empty($user_buro_ids)) {
            //Log::instance()->add(Log::DEBUG, 'No buros for user ' . $id_pep);
            return array();
        }

        // Для user_role == 2 проверяем режим и настройку archive_visibility
        if ($mode === 'archive_mode') {
            if ($settings['archive_visibility'] === 'all') {
                $baseWhere = '1=1';  // Видят весь архив
            } else {
                $baseWhere = 'gu.id_buro IN (' . implode(',', $user_buro_ids) . ')';  // Видят только по своему бюро
            }
        } else {
            // Для guest_mode всегда фильтрация по бюро
            $baseWhere = 'gu.id_buro IN (' . implode(',', $user_buro_ids) . ')';
        }
    } else {
        $baseWhere = 'gu.id_org = :id_org';
    }

    $sql = 'SELECT 
        gu.id_guestorder, 
        g."ID_PEP" AS id_guest, 
        g."SURNAME" AS guest_surname, 
        g."NAME" AS guest_name, 
        g."PATRONYMIC" AS guest_patronymic, 
        o.id_org, 
        o."NAME" AS org_name, 
        p."SURNAME" AS p_surname,
        g."NUMDOC" AS numdoc, 
        g.time_stamp,
        gu.timeplan,
        gu.timeorder,
        gu.is_active,
        gu.id_buro,
        gu.id_pep AS id_pep,
        c_g.id_card AS guest_card_number,
        c_g."CREATEDAT" AS createdat
    FROM guestorder gu
    JOIN people g ON gu.id_guest = g.id_pep
    JOIN organization o ON gu.id_org = o.id_org
    JOIN people p ON gu.id_pep = p.id_pep
    LEFT JOIN card c_g ON g.id_pep = c_g.id_pep
    WHERE :baseWhere
    AND gu.id_guestorder = (
        SELECT MAX(g2.id_guestorder)
        FROM guestorder g2
        JOIN people p2 ON g2.id_guest = p2.id_pep
        WHERE g2.id_guest = gu.id_guest';

    if ($mode === 'guest_mode') {
        if ($show_all) {
            $sql .= ' AND g2.timeplan < CURRENT_DATE + 1';
        } else {
            $sql .= ' AND ((g2.timeplan >= CURRENT_DATE AND g2.timeplan < CURRENT_DATE + 1)
                OR (g2.timeplan < CURRENT_DATE 
                    AND EXISTS (SELECT 1 FROM card c WHERE c.id_pep = g2.id_guest)))';
        }
        $sql .= ' AND p2.id_org = 2';
        $sql .= ' AND g2.is_active = 1';
    } elseif ($mode === 'archive_mode') {
        $sql .= ' AND g2.timeplan < CURRENT_DATE + 1';
        $sql .= ' AND p2.id_org = 3';
        $sql .= ' AND (g2.is_active IS NULL OR g2.is_active <> 1)';
    }

    $sql .= ')';

    if ($mode === 'guest_mode') {
        $sql .= ' ORDER BY gu.timeplan ASC';
    } elseif ($mode === 'archive_mode') {
        $sql .= ' ORDER BY gu.timeorder DESC';
    }

    // Выполняем основной запрос (на fb)
    $sql_for_exec = str_replace(':baseWhere', $baseWhere, $sql);
    Log::instance()->add(Log::DEBUG, 'SQL Query: ' . $sql_for_exec);

    $query = DB::query(Database::SELECT, $sql_for_exec);

    if ($user_role == 3) {
        $user = new User();
        $query->param(':id_org', $user->id_org);
    }

    $rows = $query->execute(Database::instance('fb'))->as_array();

    $result = array();

    if (empty($rows)) {
        Log::instance()->add(Log::DEBUG, 'Execution Time: ' . (microtime(true) - $start));
        return $result;
    }

    // Собираем уникальные id_buro из результатов
    $buro_ids = array_filter(array_unique(array_map(function($row) {
        return isset($row['ID_BURO']) ? $row['ID_BURO'] : null;
    }, $rows)));

    // Запрашиваем названия бюро из bu_buro
    $buro_map = array();
    if (!empty($buro_ids)) {
        $buro_sql = 'SELECT id, name FROM bu_buro WHERE id IN (' . implode(',', array_map(function($id) {
            return is_numeric($id) ? (int)$id : "'".addslashes($id)."'";
        }, $buro_ids)) . ')';
        //Log::instance()->add(Log::DEBUG, 'Buro SQL Query: ' . $buro_sql);

        $buro_rows = DB::query(Database::SELECT, $buro_sql)
            ->execute(Database::instance('bucfg'))
            ->as_array();

        //Log::instance()->add(Log::DEBUG, 'Buro Rows: ' . print_r($buro_rows, true));

        foreach ($buro_rows as $buro_row) {
            $buro_id = isset($buro_row['id']) ? $buro_row['id'] : (isset($buro_row['ID']) ? $buro_row['ID'] : null);
            $buro_name = isset($buro_row['name']) ? $buro_row['name'] : (isset($buro_row['NAME']) ? $buro_row['NAME'] : '');
            if ($buro_id !== null && $buro_name !== '') {
                $buro_map[$buro_id] = $buro_name;
            }
        }
    }

    foreach ($rows as $row) {
        $row_buro_id = isset($row['ID_BURO']) ? $row['ID_BURO'] : null;
        $row['buro_name'] = ($row_buro_id !== null && isset($buro_map[$row_buro_id])) 
            ? $buro_map[$row_buro_id] 
            : 'Не указано';

        //Log::instance()->add(Log::DEBUG, 'Row ID_BURO: ' . $row_buro_id . ', Buro Name: ' . $row['buro_name']);

        $result[] = $row;
    }

    // archive_mode: проверяем подпись
	Log::instance()->add(Log::DEBUG, 'Execution Time 1: ' . (microtime(true) - $start));
	
	//Тимофей! СДелай прямо тут чтение названия всех файлов директории, где согласия хранятся.
	//не получится так просто сделать, упираемся в кодировки файлов, я изначально выводилл вообще только англ названия у себя
	//момент! deepseek предлагает так:
	
	//$directory = 'C:\xampp\htdocs\crm2\PersonalData';

//$iterator = new DirectoryIterator($directory);
//foreach ($iterator as $fileInfo) {
  //  if ($fileInfo->isFile()) {
       
    //    $filelist[explode("_", $fileInfo->getFilename())[0]] = $fileInfo->getFilename();//списко id, имеющих согласие
    //}
//}
//echo Debug::vars('195',(microtime(true) - $start), $filelist);exit; 

 //foreach ($result as &$r) {

            //$check_id = array_key_exists('id_guest', $r) ? $r['id_guest'] : 
              //         (array_key_exists('ID_GUEST', $r) ? $r['ID_GUEST'] : null);
            
            //$r['has_signature'] = ($check_id !== null && array_key_exists($check_id, $filelist)) ? true : false;
        //}

//echo Debug::vars('195', $r); //exit; извини... продолжай
Log::instance()->add(Log::DEBUG, 'Execution Time 2: ' . (microtime(true) - $start)); exit;
//давай посмотрим что получится. Отредактируй путь к директории
    if ($mode === 'archive_mode' && !empty($result)) {
        $pd = new PD(0);
        
        // Получаем все ID и имена файлов, имеющих подписи
        $settings = $this->getSettings();
        $upload_dir = $pd->normalizePath($settings['upload_dir']);
        
        $filelist = array(); // массив id => filename
        if (is_dir($upload_dir) && is_readable($upload_dir)) {
            try {
                $iterator = new DirectoryIterator($upload_dir);
                foreach ($iterator as $fileInfo) {
                    if ($fileInfo->isFile()) {
                        $filename = $fileInfo->getFilename();
                        // Проверяем что это jpg файл и извлекаем ID
                        if (strtolower(pathinfo($filename, PATHINFO_EXTENSION)) === 'jpg') {
                            $id_part = explode("_", $filename)[0];
                            if (is_numeric($id_part)) {
                                $filelist[(int)$id_part] = $filename; // id => filename
                            }
                        }
                    }
                }
            } catch (Exception $e) {
            }
        }

    Log::instance()->add(Log::DEBUG, 'Execution Time: ' . (microtime(true) - $start));
	echo Debug::vars('246', $result);exit;
    return $result;
}
}

private function getSettings() {
    $settings_file = APPPATH . 'config' . DIRECTORY_SEPARATOR . 'app_settings.php';
    $default_settings = array(
        'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']) . DIRECTORY_SEPARATOR . 'signatures',
        'consent_text' => 'Я даю согласие на обработку персональных данных...',
        'require_consent_for_card' => false,
        'archive_visibility' => 'all'  // Дефолт для новой настройки
    );
    
    if (file_exists($settings_file)) {
        $saved_settings = include $settings_file;
        return array_merge($default_settings, $saved_settings);
    }
    
    return $default_settings;
}

	
	
	
	
	/**
	*12.11.2023 Сохранинение конфигурационных параметров в БД СКУД в таблицу setting
	*26.06.2024 Сохранинение конфигурационных параметров в БД СКУД в таблицу пока непонятно какую, где надо будет хранить информацию про разные Бюро пропусков
	*тут где-то надо добавить номер бюро пропусков...
	*получится набор таблиц:
	*po_config (от PassOffice) - таблица с названиями различныз бюро пропусков, их id, id_org Гостя, id_org Архива. При записи организации в эту таблицу ей надо будет устанавливать flag=1
	*po_gate - группа точек прохода либо группа устройств, выход через которые будет автоматически удалять карту.
	*po_access - набор категорий доступа, которые можно выдавать на этом бюро пропусков. Возможно, что набор категорий не будет зависить от личных прав оператора Бюро пропусков.
	*po_user - связь id_pep операторов с Бюро пропусков. Один оператор - одно Бюро пропусков.
	*триггер на вставку события с типом 50: если точка прохода входит в po_gate и card имеет flag=1, то удалять карту и автоматически переводит в id_org архива.
	*но если отказаться от триггера в базе данных, то можно не добавлять новых таблиц. При этом проверку выхода надо будет делать своей службой. 
	*/
	
	public function Wsaveconfig()
	{
	   	    
	    $sql = 'update po_config
            set name=\''.$this->name.'\',
            id_org_guest='.$this->idOrgGuest.',
            id_org_archive='.$this->idOrgGuestArchive.',
            is_active='.$this->id_active.'
            where id='.$this->id;
		
		//echo Debug::vars('105', $sql); exit;
	try{
    	   $query = DB::query(Database::UPDATE, $sql)
			 ->execute(Database::instance('pocfg'));
            return 0;
        }  catch (Exception $e)  {
            return 3;
        }
		
	
		
		
	}
	
		
	/**
	*23.06.2024
	Подготовка списка гостей.
	 
	*/
	public function WgetList($filter, $mode=null)
	{
		
	switch ($mode){
		case 'archive_mode': //режим Архив
						
			 $sql = 'SELECT p.id_pep, o.id_org from people p ' .
				'join organization o on p.id_org=o.id_org
				where o.id_org in('.$this->idOrgGuestArchive.')'
				.($filter ? " and p.surname containing '$filter' OR p.name containing '$filter'" : '') . 
				' ORDER BY p.time_stamp desc'; 
				
				
				
		break;
		
		case 'guest_mode'://режим Гость (работа с активными гостями)
		
		default:// режиме НЕ архив
             				

			$sql = 'SELECT gu.id_guestorder, g.id_guest, o.id_org from guestorder gu' .
						'join guest g on gu.id_guest=g.id_guest
						where g.id_guest in('.$this->idGuest.')'.
						'join organization o on gu.id_org=o.id_org
						where o.id_org in('.$this->idOrgGuest.')';
						

            // $sql = 'SELECT p.id_pep, o.id_org from people p ' .
		  	// 	    'join organization o on p.id_org=o.id_org
    		// 		where o.id_org in('.$this->idOrgGuest.')'
    		// 		    .($filter ? " and p.surname containing '$filter' OR p.name containing '$filter'" : '') .
    		// 		    ' ORDER BY p.time_stamp desc'; 
				
				
		break;
		
		
	}
	
	   //echo Debug::vars('401', $sql); //exit;
	   $query = DB::query(Database::SELECT, iconv('UTF-8', 'CP1251',$sql))
		      	->execute(Database::instance('fb'));
		
		  return $query->as_array();
	}
	
	
	public function update($id_guestorder, $timeplan, $timevalid)
{
        $sql = 'UPDATE GUESTORDER 
                SET TIMEPLAN = :timeplan' . ($timevalid !== null ? ', TIMEVALID = :timevalid' : '') . ' 
                WHERE ID_GUESTORDER = :id_guestorder';
        
        $query = DB::query(Database::UPDATE, $sql)
            ->parameters(array(
                ':id_guestorder' => $id_guestorder,
                ':timeplan' => $timeplan,
                ':timevalid' => $timevalid
            ))
            ->execute(Database::instance('fb'));
			return $query->as_array();
			}

	

	public function Wdelete($id)
	{
		$query = DB::query(Database::DELETE,
			'DELETE FROM people WHERE id_pep = :id')
			->param(':id', $id)
			->execute(Database::instance('fb'));
	}
	
	
	
	/** 2.07.2024 журнал событий за текущие сутки
	 * 
	 */
	
	public function WgetEventsList($from, $to)
	{
	   
	    
	    
	    $sql='select e.id_event from events e
            where e.datetime between \''.$from.'\' and \''.$to.'\'
            and e.id_eventtype in (50, 46, 65)
            and e.ess2 in ('.$this->idOrgGuest.', '.$this->idOrgGuestArchive.')
			order by e.id_event desc';
	    
	    $sql_test='select e.id_event from events e
            where e.datetime between \'23.06.2024\' and \'26.06.2024\'
            and e.id_eventtype in (50, 46, 65)
            and e.ess2 in ('.$this->idOrgGuest.', '.$this->idOrgGuestArchive.')
			desc';
	    
	    
	   // echo Debug::vars('692', $sql); exit;
	 
	    $query = DB::query(Database::SELECT, $sql)
	    ->execute(Database::instance('fb'))
	    ->as_array();
	    //echo Debug::vars('673', $sql, $query); exit;
	    return $query;
	    
	}
	
	
	/** 4.07.2024 Перемещение госте в Архив. Перемещаются те, у кого срок действия карты истек.
	
	*/
	public function WremoveFromGuestToArchiveTimeExpired($orgFrom, $orgTo)
	{
		$sql='update people p2 set p2.id_org='.$orgTo.'
			where p2.id_pep in (
			select p.id_pep from card c
			join people p on p.id_pep=c.id_pep and p.id_org in ('.$orgFrom.', '.$orgTo.')
			where c.timeend<\'now\'
			)
			and p2.id_org='.$orgFrom;
			//echo Debug::vars('698', $sql); exit;
			Log::instance()->add(Log::DEBUG, '699 перенос гостя в Архив '. $sql);
			try{
    	   $query = DB::query(Database::UPDATE, $sql)
			 ->execute(Database::instance('fb'));
            return 0;
        }  catch (Exception $e)  {
            return 3;
        }
	}
	
	/** 4.07.2024 Удаление карт у гостей в Архиве
	* id_org Архива передается как параметр
	
	*/
	public function WdelExpiredCardArchive($idOrgGuestArchive)
	{
		$sql='delete from card c3
            where c3.id_card in (
            select c.id_card from card c
            join people p on p.id_pep=c.id_pep and p.id_org ='.$idOrgGuestArchive.'
            where c.timeend<\'now\'
            )';
			//echo Debug::vars('720', $sql); exit;
			
			try{
    	   $query = DB::query(Database::DELETE, $sql)
			 ->execute(Database::instance('fb'));
            return 0;
        }  catch (Exception $e)  {
			echo Debug::vars('726', $e);
            return 3;
        }
	}
	
	
	/** 10.07.2024 Получить список Бюро пропусков
	
	*/
		public function WgetPassOfficeList()
		{
			$sql='select id from po_config order by id';
		  $query = DB::query(Database::SELECT, $sql)	
			->execute(Database::instance('pocfg'));
			
			return $query;
			
		}
}
	
	
	
