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
	
public function getListNowOrder($id_pep, $mode = null, $user_role = null, $buro_filter = '', $show_all = false)
    {
        $start = microtime(true);
        $baseWhere = '';
        if ($user_role == 1) {
            $baseWhere = '1=1';
        } elseif ($user_role == 2) {
            $buro = new Buro();
            $user_buros = $buro->getIdBuroForUser($id_pep);
            $buro_ids = array_map('intval', Arr::pluck($user_buros, 'id_buro'));
            
            if (!empty($buro_ids)) {
                $sql_guests = 'SELECT DISTINCT id_pep FROM bu_guest WHERE id_buro IN (' . implode(',', $buro_ids) . ')';
                $guest_ids = DB::query(Database::SELECT, $sql_guests)
                    ->execute(Database::instance('bucfg'))
                    ->as_array(null, 'id_pep');
                
                if (!empty($guest_ids)) {
                    $guest_ids = array_map('intval', $guest_ids);
                    $baseWhere = 'gu.id_guest IN (' . implode(',', $guest_ids) . ')';
                } else {
                    $baseWhere = '1=0';
                }
            } else {
                $baseWhere = '1=0';
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
            p."ID_PEP" AS id_pep,
            c_g.id_card AS guest_card_number,
            c_g."CREATEDAT" AS createdat
        FROM guestorder gu
        JOIN people g ON gu.id_guest = g.id_pep
        JOIN organization o ON gu.id_org = o.id_org
        JOIN people p ON gu.id_pep = p.id_pep
        LEFT JOIN card c_g ON g.id_pep = c_g.id_pep
        WHERE ' . $baseWhere . '
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

        $query = DB::query(Database::SELECT, $sql);
        
        Log::instance()->add(Log::DEBUG, 'SQL Query: ' . $sql);
        if ($user_role == 3) {
            $user = new User();
            $query->param(':id_org', $user->id_org);
        }

        $result = $query->execute(Database::instance('fb'))->as_array();

        if (!empty($result)) {
            $guest_ids = array_column($result, 'ID_GUEST');
            
            $buro_sql = 'SELECT 
                            bg.id_pep,
                            bb.name as buro_name
                        FROM bu_guest bg
                        JOIN bu_buro bb ON bg.id_buro = bb.id
                        WHERE bg.id_pep IN (' . implode(',', $guest_ids) . ')';
            //echo Debug::vars('134', $buro_sql);exit;
            $buro_results = DB::query(Database::SELECT, $buro_sql)
                ->execute(Database::instance('bucfg'))
                ->as_array();
                //echo Debug::vars('138', $buro_results);exit;
            
            $buro_map = [];
            
            foreach ($buro_results as $buro_item) {
                $buro_map[$buro_item['id_pep']] = $buro_item['buro_name'];
            }
            //echo Debug::vars('140', $buro_map);exit;
            
            // Добавляем информацию о бюро в основной результат
            foreach ($result as &$row) {
                $row['buro_name'] = isset($buro_map[$row['ID_GUEST']]) 
                    ? $buro_map[$row['ID_GUEST']] 
                    : 'Не указано';
            }
            //echo Debug::vars('152', $result);exit;
        }

        if ($mode === 'archive_mode') {
            $pd = new PD(0);
            foreach ($result as &$row) {
                $row['has_signature'] = $pd->checkSignature($row['ID_GUEST']) !== false ? true : false;
            }
        }

        Log::instance()->add(Log::DEBUG, 'Execution Time: ' . (microtime(true) - $start));
        return $result;
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
	
	
	
