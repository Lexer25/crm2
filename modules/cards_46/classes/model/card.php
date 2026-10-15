<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Card extends Model
{
	
	

	public function getCountAdmin($filter)
	{
		$sql = 'SELECT COUNT (*) FROM card WHERE id_accessname IS  null' . ($filter ? " AND id_card containing '$filter'" : '');
		
		
		$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->current();
		
		return $query['COUNT'];
	}
	
	public function getcatdTypelist()
	{
			$sql='select ct.id, ct.name, ct.description, ct.smallname  from cardtype ct';
			$query = DB::query(Database::SELECT, $sql)
				->execute(Database::instance('fb'));
				foreach($query as $val=>$value){
					
				$res[Arr::get($value, 'ID')]['id'] = Arr::get($value, 'ID');
				$res[Arr::get($value, 'ID')]['name'] = Arr::get($value, 'NAME');
				$res[Arr::get($value, 'ID')]['description'] = Arr::get($value, 'DESCRIPTION');
				$res[Arr::get($value, 'ID')]['smallname'] = Arr::get($value, 'SMALLNAME');
				}
			return $res;
	}
	
	
	public function getListAdmin($page = 1, $perpage = 10, $filter)
	{
		$sql = 'SELECT FIRST ' . $perpage . ' SKIP ' . ($page - 1) * $perpage . '
					c.id_card,
					c.id_db,
					c.id_pep,
					c.id_accessname,
					c.timestart,
					c.timeend,
					c.note,
					c.status,
					c."ACTIVE",
					c.flag,
					p.id_org,
					p.name,
					p.surname,
					o.name AS cname,
					c.id_cardtype
				FROM organization o
					INNER JOIN people p ON (o.id_org = p.id_org)
					INNER JOIN card c ON (p.id_pep = c.id_pep)
				WHERE
					c.id_accessname IS null' .
				($filter ? " AND c.id_card containing '$filter' " : '') . '
				ORDER BY
					c.id_card';

			$query = DB::query(Database::SELECT, $sql)
				->execute(Database::instance('fb'));
			//echo Debug::vars('48',$sql, $query ); exit;	
			return $query->as_array();
	}
	
		
	/**
	 * Подготовка списка идентификторов, доступных для текущего оператора.
	 * @param unknown $id_org
	 * @param number $page
	 * @param number $perpage
	 * @param unknown $filter
	 * @param number $id_cardtype
	 * @return unknown
	 */
	
	public function getListUser($id_org, $page = 1, $perpage = 10, $filter, $id_cardtype=1)
	{

					
		if(is_null($filter) or $filter=='') {// если фильтра нет, то выбираем всех пиплов из родительской и подчиненной организаций
				 
			$sql='select FIRST ' . $perpage . ' SKIP ' . ($page - 1) * $perpage . ' 
					c.id_card, c.id_cardtype, c.flag, c.status, c.timestart, c.timeend, c."ACTIVE", c.id_pep, p.surname, p.name, p.patronymic, p.post, o.id_org, o.name as orgName
                    from people p
                    join card c on c.id_pep=p.id_pep
        join organization o on o.id_org=p.id_org
		join organization_getchild (1, ' . $id_org . ') og on og.id_org = p.id_org';
		// where c.id_cardtype='.$id_cardtype;
		 
		 
		 
		} else {
			$sql='select FIRST ' . $perpage . ' SKIP ' . ($page - 1) * $perpage . ' 
				c.id_card, c.id_cardtype, c.flag, c.status, c.timestart, c.timeend, c."ACTIVE", c.id_pep, p.surname, p.name, p.patronymic, p.post, o.id_org, o.name as orgName
                    from people p
                    join card c on c.id_pep=p.id_pep
        join organization o on o.id_org=p.id_org
		join organization_getchild (1, ' . $id_org . ') og on og.id_org = p.id_org
            where c.id_card= \''.$filter.'\'';
          //   and c.id_cardtype='.$id_cardtype;
			
			
		}
	//	echo Debug::vars('48',$sql ); //exit;	
		
	
		$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->as_array();
		
		//получаю формат хранения карт в базе данных
		$baseFormatRfid=Kohana::$config->load('system')->get('baseFormatRfid', 0);
		
		foreach(array_slice($query, 0, 10) as $key=>$value){
			//echo Debug::vars('119',$key,  $value);//exit;	
			//echo Debug::vars('120',$baseFormatRfid);exit;	
		//дополняю массив преобразованием в десятичный вид
			if(Arr::get($value, 'ID_CARDTYPE') ==1){//обработка идентификаторов RFID
				if($baseFormatRfid==0){//в базе данных номера карт хранятся в формате HEX 8 байт
							$result=Model::factory('stat')->hexToDec(Arr::get($value, 'ID_CARD'));
				}
				if($baseFormatRfid==1){//в базе данных номера карт хранятся в формате 001A
							$result=Model::factory('stat')->conv001AToDec(Arr::get($value, 'ID_CARD'));
				}
				//сохранил десятичный вид для RFID
				$query[$key]['ID_CARD_ON_SCREEN']=$result;
				//$query[$key]['ID_CARD_ON_SCREEN']='130';
				
			}
			//echo Debug::vars('132', $query[$key]);exit;
		}
		//echo Debug::vars('116', array_slice($query, 0, 10));exit;	
		return $query;
	}
	
	
	/**20.08.2024 преобразование номера идентификатора от формата хранения в базе данных в десятичный вид.
	*/
	public function makeDecFromBase($pattern)
	{
			
			$bf=$this->baseFormatRfid;
			$sf=$this->screenFormatRFID;
			$result='';
		//echo Debug::vars('138', $this->id_cardtype, $pattern, $bf, $sf); //exit;	
			if($this->id_cardtype ==1){//обработка идентификаторов RFID
			
			
			if($bf==0){//в базе данных номера карт хранятся в формате HEX 8 байт
				
						$result=Model::factory('stat')->hexToDec($pattern);
				
			}
			
			if($bf==1){//в базе данных номера карт хранятся в формате 001A
				
						$result=Model::factory('stat')->conv001AToDec($pattern);

			}
		}	
		
		//echo Debug::vars('218', $result);exit;
		return $result;
	}
	
	
	/**
	5.12.2023 выборка карт для авторизованного пользователя
	$id_org - родительская организация
	$filter - номер карта для поиска
	
	*/
	public function getCountUser($id_org, $filter, $id_cardtype=1)
	{
		//echo Debug::vars('186', $id_org, $filter,  $filter=''); exit;
		
		if(is_null($filter) or $filter=='') {// если фильтра нет, то выбираем все карты из родительской и подчиненной организаций
		$sql='select count(c.id_card) from people p
		join card c on c.id_pep=p.id_pep
		join organization_getchild (1, ' . $id_org . ') og on og.id_org = p.id_org
		 where c.id_cardtype='.$id_cardtype;
		} else {
			$sql='select count(c.id_card) from people p
		join card c on c.id_pep=p.id_pep
		join organization_getchild (1, ' . $id_org . ') og on og.id_org = p.id_org
            where c.id_card = \''.$filter.'\'
			 and c.id_cardtype='.$id_cardtype;
            ;
		}
		
		
		//echo Debug::vars('190', $sql); exit;
		$res = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->get('COUNT');
			
		return $res;
		

			}
	
	public function getCountByPeople($id)
	{
		$query = DB::query(Database::SELECT, 
			'SELECT COUNT (*) FROM card WHERE id_pep = :id')
			->param(':id', $id)
			->execute(Database::instance('fb'))
			->current();
		
		return $query['COUNT'];
	}

	public function getCard($id)
	{
		$query = DB::query(Database::SELECT, 
			'SELECT * FROM card WHERE id_card = :id')
			->param(':id', $id)
			->execute(Database::instance('fb'));

		if ($query->count() == 0) return false;
		return $query->current();
	} 
	
	public function getCardByPeople($id)
	{
		$query = DB::query(Database::SELECT, 
			'SELECT * FROM card WHERE id_pep = :id')
			->param(':id', $id)
			->execute(Database::instance('fb'));
			
		if ($query->count() == 0) return false;
		return $query->current();
	}
	
	public function getListByPeople($id)
	{
		$query = DB::query(Database::SELECT, 
			'SELECT * FROM card WHERE id_pep = :id')
			->param(':id', $id)
			->execute(Database::instance('fb'));
		
		return $query->as_array();
	}

	public function save($idpeople, $idcard, $datestart, $dateend, $useenddate, $state, $isactive, $idaccess, $id_cardtype, $note)
	{
		//echo Debug::vars('159', $idpeople, $idcard, $datestart, $dateend, $useenddate, $state, $isactive, $idaccess);
		$sql= __('INSERT INTO card (id_pep, id_card, timestart, timeend, flag, status, "ACTIVE", id_accessname, id_cardtype, note) ' .
			'VALUES (:people, \':card\', \':tstart\', \':tend\', :flag, :status, :active, :access, :id_cardtype, \':note\')',
			array(
				':people'		=> $idpeople,
				':card'			=> $idcard,
				':tstart'		=> $datestart,
				':tend'			=> $dateend == '' ? null : $dateend,
				':flag'			=> $useenddate,
				':status'		=> $state,
				':active'		=> $isactive,
				':access'		=> 'null',
				':id_cardtype'		=> $id_cardtype,
				':note'		=> $note
			)); 
			//echo Debug::vars('172', $sql);EXIT;
		try
		{
			$query=DB::query(Database::INSERT, iconv('UTF-8', 'CP1251',$sql))
			->execute(Database::instance('fb'));
		} catch (Exception $e) {
			Log::instance()->add(Log::DEBUG, '178 '.$e->getMessage());
			
		}
	}
	
	public function update($idpeople, $idcard, $datestart, $dateend, $useenddate, $cardstate, $isactive, $idaccess, $note)
	{
			//echo Debug::vars('185', $idpeople, $idcard, $datestart, $dateend, $useenddate, $cardstate, $isactive, $idaccess, $note); exit;
			
			$sql=__('UPDATE card SET timestart = \':start\', timeend = \':end\', flag = :flag, status = :status, "ACTIVE" = :active, note =\':note\' WHERE id_card = \':card\'', 
			array(
				':people' 	=> $idpeople,
				':start'	=> $datestart,
				':end'		=> $dateend == '' ? null : $dateend,
				':flag'		=> $useenddate,
				':status'	=> $cardstate,
				':active'	=> $isactive,
				':note'	=> $note,
				':card'		=> $idcard));
				
				echo Debug::vars('185',$sql); exit;
			DB::query(Database::UPDATE, iconv('UTF-8', 'CP1251', $sql))
			->execute(Database::instance('fb'));
			
	}
	
	public function getLoads($id)
	{
		
		$sql='select distinct c.id_card,d.id_dev, d.name, cd.load_time, cd.load_result, d."ACTIVE", cd.time_stamp, cdv.operation, cdv.attempts from card c
				join ss_accessuser ssa on ssa.id_pep=c.id_pep
				left join access a on a.id_accessname=ssa.id_accessname
				left join device d on d.id_dev=a.id_dev
				left join cardidx cd on (cd.id_dev=a.id_dev  and cd.id_card=c.id_card)
				left join cardindev cdv on (cdv.id_dev=a.id_dev  and cdv.id_card=c.id_card)
				where c.id_card=\''.$id.'\' 
				order by d.name';

			//echo Debug::vars('210', $sql); exit;
		$query = DB::query(Database::SELECT,$sql)
			
			
			->execute(Database::instance('fb')); 
		
		return $query->as_array();
	}
	
	public function delete($id)
	{
		$query = DB::query(Database::DELETE, 
			'DELETE FROM card WHERE id_card = :id')
			->param(':id', $id)
			->execute(Database::instance('fb'));
	}
	
	
	/*
	1.10.2023
	Обовление даты в таблице cardidx с целью инициировать загрузку карты в контроллеры.
	*/
	public function reload($id)
	{
		$sql='UPDATE CARDIDX
				SET TIME_STAMP = \'now\'
				WHERE ID_CARD = \''.$id.'\'';

		DB::query(Database::UPDATE, $sql)
			->execute(Database::instance('fb'));
	}
	
	public function toggleCard($id, $newvalue)
	{
		DB::query(Database::UPDATE, 
			'UPDATE card SET "ACTIVE" = :active WHERE id_card = :id')
			->parameters(array(
			':id'		=> $id,
			':active'	=> $newvalue))
			->execute(Database::instance('fb'));
		
	}
	
	/** 2.07.2024 Выборка идентификаторов с истекшим сроком действия
	*/
	
	public function getExpired($id_org)
	{

				
		$sql='select c.id_card from card c
			join people p on p.id_pep=c.id_pep
			join organization_getchild (1, ' . $id_org . ') og on og.id_org = p.id_org
			where c.timeend<current_time';

		$query = DB::query(Database::SELECT,$sql)
			
			
			->execute(Database::instance('fb')); 
		
		return $query->as_array();
	}
	
	
}
