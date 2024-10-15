<?php defined('SYSPATH') OR die('No direct access allowed.');
/*редакция 26.04.2024
* Класс моедль для работы с гостями
* в обработку добавлены условия поисков только в организациях, указанных в $idOrgGuest и $idOrgGuestArchive
*/

class Model_Passofficem extends Model
{
	
	public $idOrgGuest;//id_org организации, используемой в качестве гостевой
	public $idOrgGuestArchive;//id_org организации, используемой в качестве архива гостевой
	public $id_active;//Признак активности
	public $id;//номер бюро пропусков

	public $name = 'Бюро пропусков Щербинка';// название Бюро пропусков
	
	
	/**
	*12.11.2023 получение (Заполнение) конфигурационных параметров режима Гость
	*27.06.2024 Модель Бюро пропусков пытаюсь сделать как отдельный класс, который имеет свои параметры и хранит их в своей базе данных. См. класс passoffice	
	*/
	
	public function __construct($id_pep = null)
	{
		//Здесь надо бы сделать проверку, что настройки po_config соответсвует базе данных СКУД: указанные id_org, id_pep и id_dev существуют. 
	    /*$configcdf=Kohana::$config->load('guest');//загрузка данных из вспомогательной базы данных, хотя надо будет брать данные из настоящей БД СКУД
		if(Arr::get(Auth::instance()->get_user(), 'ID_PEP') != $configcdf->get('useridek')){
		$sql = 'select s.value_int from setting s  where s.name= \'idOrgGuest\'';
		
		$this->idOrgGuest = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->get('VALUE_INT');
		
		$sql = 'select s.value_int from setting s  where s.name= \'idOrgGuestArchive\'';
		
		$this->idOrgGuestArchive = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->get('VALUE_INT');
		} else {
		    $this->idOrgGuest=$configcdf->get('guestekorg');
		    $this->idOrgGuestArchive=$configcdf->get('guestekatchive');
		    
		}
			
			if(!is_null($id_pep)) $this->id_pep=$id_pep;
			
	   */
	   // $this->init(Arr::get(Auth::instance()->get_user(), 'ID_PEP'));
	
	}
	
	
	
	/**	
	*27.06.2024 Модель Бюро пропусков пытаюсь сделать как модель Kohana
	*если для указанного $id_pep нет записей, то результатом будет null
	*/
	
	public function init($id_pep = null)
	{
		$configcdf=Kohana::$config->load('guest');//загрузка данных из вспомогательной базы данных, хотя надо будет брать данные из настоящей БД СКУД
		$sql='select poc.id, poc.name, poc.id_org_guest, poc.id_org_archive, poc.is_active from po_config poc
            join po_user pou on poc.id=pou.id_po
            where pou.id_user='.$id_pep;
		
		$query = Arr::flatten(DB::query(Database::SELECT, $sql)
		->execute(Database::instance('pocfg'))
		    ->as_array()
		);
		//echo Debug::vars('62', $sql, $query);// проверка результата выборки информации по бюро пропусков
		$this->name=Arr::get($query, 'name');
		$this->idOrgGuest=Arr::get($query, 'id_org_guest');
		$this->idOrgGuestArchive=Arr::get($query, 'id_org_archive');
		$this->id_active=Arr::get($query, 'is_active');
		$this->id=Arr::get($query, 'id');
		
		//echo Debug::vars('68', $this->name, $this->idOrgGuest, $this->idOrgGuestArchive, $this->id_active); exit;

	
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
	
	public function saveconfig()
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
	
	

	
	
	/*
	
	Количествво пиплов в указанной организации
	*/
	
	
	public function getCountByOrg($org)
	{
		$sql = 'SELECT COUNT (*) FROM people WHERE id_org = ' . $org;
		
		$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->current();
			
		return $query['COUNT'];
	}
	
	/*
	17.08.2023 
	Сверка категориий доступа контакта и родительской организации.
	0 - совпадает,
	1 - больше, чем в организации.
	2 - меньше, чем в организации
	*/
	public function check_acl($id_pep)
	{
		if($id_pep>0)
		{
			$peopleacl=array();
			$orgacl=array();
			$sql='select ssa.id_accessname from ss_accessuser ssa
				where ssa.id_pep='.$id_pep;
			$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->as_array();
			foreach($query as $key=>$value)
			{
				$peopleacl[]=Arr::get($value, 'ID_ACCESSNAME');
			}
		
			$sql='select sso.id_accessname from ss_accessorg sso
			join people p on p.id_org=sso.id_org
			where p.id_pep='.$id_pep;
			
			$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->as_array();
			foreach($query as $key=>$value)
			{
				$orgacl[]=Arr::get($value, 'ID_ACCESSNAME');
			}
			
			$diff1=	count(array_diff($peopleacl, $orgacl));//на сколько категорий контакта больше, чем у организации
			$diff2=	count(array_diff($orgacl, $peopleacl));//на сколько категорий больше в организации, чем у контакта
			$res=-1;
			if(($diff1==0) and ($diff2 == 0)) $res=0;//все совпадает.
			if(($diff1>0) and ($diff2 == 0)) $res=1;//категорий контакта больше, чем у организации
			if(($diff1==0) and ($diff2 > 0)) $res=2;//категорий больше в организации, чем у контакта
			if(($diff1>0) and ($diff2 > 0)) $res=3;//количество категорий контакта совпадает с количество категорий организации, но они разные
			
			//echo Debug::vars('49',$id_pep, $peopleacl, $orgacl, count(array_diff($peopleacl, $orgacl)),  count(array_diff($orgacl, $peopleacl))); exit;
		} else {
			$res=-1;
		}
		return $res;
	}
	/*
	8.08.2023 
	Список категорий доступа, выданных пиплу
	*/
	public function contact_acl($id_pep)
	{
		$sql = 'select ssa.id_accessuser, ssa.id_pep, ssa.id_accessname, ssa.username, an.name from ss_accessuser ssa
				join accessname an on ssa.id_accessname=an.id_accessname
                where ssa.id_pep=' . $id_pep;
		
		$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->as_array();
			
		return $query;
	}
	
	/*
	8.08.2023 
	Добавление категории доступа для пипла в таблицу ss_accessuser
	*/
	public function add_contact_acl($id_pep, $id_accessname)
	{
		//echo Debug::vars('40',$id_pep, $id_accessname, Arr::get(Auth::instance()->get_user(), 'LOGIN')); exit;
		$sql = 'INSERT INTO SS_ACCESSUSER (ID_DB, ID_PEP, ID_ACCESSNAME, USERNAME)
					VALUES ( 1, '.$id_pep.', '.$id_accessname.', \''.Arr::get(Auth::instance()->get_user(), 'LOGIN').'\')';
		
		$query = DB::query(Database::INSERT, $sql)
			->execute(Database::instance('fb'));
		
		return $query;
	}
	
	/*
	9.08.2023 
	Удаление указанной категории доступа для пипла из таблицу ss_accessuser
	*/
	public function del_contact_acl($id_pep, $id_accessname)
	{
		$sql = 'delete from ss_accessuser  ssa
				where ssa.id_pep='.$id_pep.'
				and ssa.id_accessname='.$id_accessname;
		
		//echo Debug::vars('42',$id_pep, $id_accessname, $sql, Arr::get(Auth::instance()->get_user(), 'LOGIN')); exit;
		
		$query = DB::query(Database::DELETE, $sql)
			->execute(Database::instance('fb'));
				
		return $query;
	}
	
	/*
	9.08.2023 
	Удаление всех категорий доступа для пипла из таблицу ss_accessuser
	*/
	public function clear_contact_acl($id_pep)
	{
		$sql = 'delete from ss_accessuser  ssa
				where ssa.id_pep='.$id_pep;
				
		
		$query = DB::query(Database::DELETE, $sql)
			->execute(Database::instance('fb'));
				
		return $query;
	}
	
	
	/*
	11.08.2023 
	Устанвока категорий доступа для пипла по умолчанию (от родительской организации)
	*/
	public function setInheritAcl($id_pep) //Устанвока категорий доступа для пипла по умолчанию (от родительской организации)
	{
		$sql = 'select first 1 ssa.id_accessname from ss_accessorg ssa
				join people p on ssa.id_org=p.id_org
				where p.id_pep='.$id_pep.'
				order by ssa.id_accessname';

		$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->as_array();
		
		if($query)
		{
			foreach($query as $key=>$value)
			{
				//echo Debug::vars('100', $id_pep, Arr::get($value, 'ID_ACCESSNAME'));exit;	
				$this->add_contact_acl($id_pep,  Arr::get($value, 'ID_ACCESSNAME'));
			}
		}
				
		return $query;
	}
	
	
	/*
	12.11.2023 
	Устанвока организации как Гость
	*/
	public function setGuestOrg($id_pep)
	{
		$sql = 'update people p
				set p.id_org= '.$this->idOrgGuest.'
				where p.id_pep='.$id_pep;

		$query = DB::query(Database::UPDATE, $sql)
			->execute(Database::instance('fb'));
		try
			{
			$query = DB::query(Database::UPDATE, $sql)
			->execute(Database::instance('fb'));
			} catch (Exception $e) {
				HTTP::redirect('errorpage?err=l386_'.Text::limit_chars($e->getMessage(), 50));
			}
	
	}
	
	
	/*
	25.12.2023 
	Устанвока организации как Архив
	*/
	public function setArchiveOrg($id_pep)
	{
		$sql = 'update people p
				set p.id_org='.$this->idOrgGuestArchive.'
				where p.id_pep='.$id_pep;
				
	
		$query = DB::query(Database::UPDATE, $sql)
			->execute(Database::instance('fb'));
		try
			{
			$query = DB::query(Database::UPDATE, $sql)
			->execute(Database::instance('fb'));
			} catch (Exception $e) {
				HTTP::redirect('errorpage?err=l386_'.Text::limit_chars($e->getMessage(), 50));
			}
	
	}
	
	
	/*
	подготовка счетчика записей. Количество записей зависит от режима работы: гость, архив или заявки.
	режим заявок пока не реализован.
	*/
	
	public function getCountAdmin($filter, $mode='guest_mode')
	{
		//проверяю режим работы: архив или оперативный
	switch ($mode){
		case 'archive_mode': //режим Архив
			$sql = 'SELECT COUNT (*) FROM people p
				join organization o on p.id_org=o.id_org
				where o.id_org='.$this->idOrgGuestArchive.'
	' . ($filter ? " and upper(p.surname) containing upper('$filter') OR upper(p.name) containing upper('$filter')" : '');
		break;
		
		case 'guest_mode':
		
		
		
		default:
       $sql = 'SELECT COUNT (*) FROM people p
				join organization o on p.id_org=o.id_org
				where o.id_org='.$this->idOrgGuest.'
				' . ($filter ? " and p.surname containing '$filter' OR p.name containing '$filter'" : '');
		
		
		
	}
		//$sql = 'SELECT COUNT (*) FROM people ' . ($filter ? " WHERE surname containing '$filter' OR name containing '$filter'" : ' WHERE id_org=2');
		//echo Debug::vars('197', $sql, $mode); exit;
		$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->current();
		
		return $query['COUNT'];
	}
	

	
	/*
	подготовка массива записей. Количество записей зависит от режима работы: гость, архив или заявки.
	режим заявок пока не реализован.
	*/
	public function getListF($user, $page = 1, $perpage = 10, $filter, $mode='guest_mode')
	{
		$g = array();
		$s = "SELECT DISTINCT id_group FROM users_groups WHERE id_user = $user";
		$q = DB::query(Database::SELECT, $s)
			->execute(Database::instance('default'));
		foreach ($q->as_array() as $key => $value) {
			$g[] = $value['id_group'];
		}

		$sql =	'SELECT FIRST ' . $perpage . ' SKIP ' . ($page - 1) * $perpage . ' p.*, o.name AS oname ' . 
    			'FROM organization o INNER JOIN people p  ON (p.id_org = o.id_org) ' .
				'WHERE o.id_group IN (' . join(', ', $g) . ') ' . ($filter ? " AND (p.surname containing '$filter' OR p.name containing '$filter')" : '') .
				'ORDER BY id_pep';
		
		$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'));
		
		return $query->as_array();
	}
	
	public function getListByOrg($page = 1, $perpage = 10, $org)
	{
		
		if (Auth::instance()->logged_in('admin'))
		$sql =  'SELECT FIRST ' . $perpage . ' SKIP ' . ($page - 1) * $perpage . ' p.*, o.name AS oname, 1 AS canedit ' .
				'FROM people p INNER JOIN organization o ON p.id_org = o.id_org ' .
				'WHERE p.id_org = ' . $org .  
				' ORDER BY id_pep'; 
		else
		$sql = '
				SELECT FIRST ' . $perpage . ' SKIP ' . ($page - 1) * $perpage . '
    				o.id_org,
    				o.name AS oname,
    				ug."P_EDIT" AS canedit,
    				ug."P_DELETE" AS candelete,
    				p.id_pep,
    				p.tabnum,
    				p.surname,
    				p.name
    			FROM
    				usersgroups ug
    				INNER JOIN organizationgroup og ON (ug.id_group = og.id_group)
    				INNER JOIN organization o ON (og.id_org = o.id_org)
    				INNER JOIN people p ON p.id_org = o.id_org
    			WHERE
    				ug.id_user = ' . Auth::instance()->get_user() . '
    				AND p.id_org = ' . $org . '
    				AND (ug."O_VIEW" + ug."P_EDIT" + ug."P_ADD" + ug."P_DELETE" > 0) ' . '
				ORDER BY
					p.id_pep';
//echo "<hr>$sql<hr>";
		$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'));
		
		return $query->as_array();
	}
	
	/**
	*23.06.2024
	Подготовка списка гостей.
	 
	*/
	public function getList($filter, $mode=null)
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
             				
            $sql = 'SELECT p.id_pep, o.id_org from people p ' .
		  		    'join organization o on p.id_org=o.id_org
    				where o.id_org in('.$this->idOrgGuest.')'
    				    .($filter ? " and p.surname containing '$filter' OR p.name containing '$filter'" : '') .
    				    ' ORDER BY p.time_stamp desc'; 
				
				
		break;
		
		
	}
	
	   //echo Debug::vars('401', $sql); //exit;
	   $query = DB::query(Database::SELECT, iconv('UTF-8', 'CP1251',$sql))
		      	->execute(Database::instance('fb'));
		
		  return $query->as_array();
	}
	
	public function getPicture($id)
	{
		$sql = 'SELECT photo FROM people WHERE id_pep =' .$id;
		
		$res = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->get('PHOTO');
		//echo Debug::vars('271', $sql, $res); exit;
		return $res;
	} 
	

	
	public function getContact($id)
	{
		if (!is_numeric($id)) return false;
		
		$sql='SELECT people.*, 1 AS canedit FROM people WHERE id_pep ='. $id;
		if (Auth::instance()->logged_in('admin'))
			$query = DB::query(Database::SELECT, $sql)				
				->execute(Database::instance('fb'));
		else
			$query = DB::query(Database::SELECT,
				'SELECT p.*, ug."P_EDIT" AS canedit ' .
    			'FROM usersgroups ug ' .
    			'INNER JOIN organizationgroup og ON (ug.id_group = og.id_group) ' .
    			'INNER JOIN organization o ON (og.id_org = o.id_org) ' .
    			'INNER JOIN people p ON p.id_org = o.id_org ' .
    			'WHERE ug.id_user = ' . Auth::instance()->get_user() . ' ' .
    			'AND (ug."O_VIEW" + ug."O_EDIT" + ug."O_ADD" + ug."O_DELETE" > 0) ' .
				'AND p.id_pep = :id')
				->param(':id', $id)
				->execute(Database::instance('fb'));
		
		if ($query->count() == 0) return false;
		return $query->current();
	}
	
	public function save($surname, $name, $patronymic, $datebirth, $numdoc, $datedoc, $workstart, $workend, $active, $peptype, $post, $tabnum, $org, $login, $password, $note)
	{
		$query = DB::query(Database::SELECT,
			'SELECT gen_id(gen_people_id, 1) FROM rdb$database')
			->execute(Database::instance('fb'));
		$result = $query->current();
		//echo Debug::vars('210-0', Arr::get($result, 'GEN_ID'), $surname, $name, $patronymic, $datebirth, $numdoc, 'ttt='. $datedoc, $workstart, $workend, $active, $peptype, $post, $tabnum, $org, $login, $password, $note);  //exit;
		if($numdoc =='' or $datedoc == '') {
			$sql=__('INSERT INTO people (id_pep, id_db, surname, name, patronymic, id_org, note) VALUES (:id,1, \':surname\', \':name\', \':patronymic\',:org,  \':note\')', array
			(
				':id'			=> Arr::get($result, 'GEN_ID'),
				':surname'		=> iconv('UTF-8', 'CP1251',$surname),
				':name'			=> iconv('UTF-8', 'CP1251',$name),
				':patronymic'	=> iconv('UTF-8', 'CP1251',$patronymic),
				//':datebirth'	=> $datebirth,
				':datebirth'	=> 'now',
				':numdoc'		=> $numdoc,
				':datedoc'		=> $datedoc,
				//':datedoc'		=> 'now',
				':workstart'	=> $workstart,
				':workend'		=> $workend,
				':active'		=> $active,
				':peptype'		=> $peptype,
				':post'			=> iconv('UTF-8', 'CP1251',$post),
				':tabnum'		=> 'tabnum_'.Arr::get($result, 'GEN_ID'),
				':org'			=> $org,
				':login'		=> iconv('UTF-8', 'CP1251','USER'.Arr::get($result, 'GEN_ID')),
				':password'		=> iconv('UTF-8', 'CP1251',$password),
				':note'			=> iconv('UTF-8', 'CP1251',$note))
				);
			
		} else {
		$sql=__('INSERT INTO people (id_pep, id_db, surname, name, patronymic, numdoc, datedoc,id_org, note) VALUES (:id,1, \':surname\', \':name\', \':patronymic\',\':numdoc\', \':datedoc\',:org,  \':note\')', array
			(
				':id'			=> Arr::get($result, 'GEN_ID'),
				':surname'		=> iconv('UTF-8', 'CP1251',$surname),
				':name'			=> iconv('UTF-8', 'CP1251',$name),
				':patronymic'	=> iconv('UTF-8', 'CP1251',$patronymic),
				//':datebirth'	=> $datebirth,
				':datebirth'	=> 'now',
				':numdoc'		=> $numdoc,
				':datedoc'		=> $datedoc,
				//':datedoc'		=> 'now',
				':workstart'	=> $workstart,
				':workend'		=> $workend,
				':active'		=> $active,
				':peptype'		=> $peptype,
				':post'			=> iconv('UTF-8', 'CP1251',$post),
				':tabnum'		=> 'tabnum_'.Arr::get($result, 'GEN_ID'),
				':org'			=> $org,
				':login'		=> iconv('UTF-8', 'CP1251','USER'.Arr::get($result, 'GEN_ID')),
				':password'		=> iconv('UTF-8', 'CP1251',$password),
				':note'			=> iconv('UTF-8', 'CP1251',$note))
				);
		};
				//echo Debug::vars('496', $sql); exit; 
				$query = DB::query(Database::INSERT, $sql)
				->execute(Database::instance('fb'));
		
	
		return $result['GEN_ID'];
	}
	
	public function update($id, $surname, $name, $patronymic, $datebirth, $numdoc, $datedoc, $workstart, $workend, $active, $peptype, $post, $tabnum, $org, $login, $password, $note)
	{
		
		$query = DB::query(Database::UPDATE,
			'UPDATE people SET surname = :surname, name = :name, patronymic = :patronymic, datebirth = :datebirth, numdoc = :numdoc, datedoc = :datedoc, ' .
			'workstart = :workstart, workend = :workend, "ACTIVE" = :active, peptype = :peptype, post = :post, login = :login, pswd = :password, id_org = :org, note = :note
			WHERE id_pep = :id')
			->parameters(array(
				':surname'		=> iconv('UTF-8', 'CP1251',$surname),
				':name'			=> iconv('UTF-8', 'CP1251',$name),
				':patronymic'	=> iconv('UTF-8', 'CP1251',$patronymic),
				//':datebirth'	=> $datebirth,
				':datebirth'	=> 'now',
				':numdoc'		=> $numdoc,
				':datedoc'		=> $datedoc,
				':datedoc'		=> 'now',
				':workstart'	=> $workstart,
				':workend'		=> $workend,
				':active'		=> $active,
				':peptype'		=> $peptype,
				':post'			=> iconv('UTF-8', 'CP1251',$post),
				':tabnum'		=> $tabnum,
				':org'			=> $org,
				':login'		=> iconv('UTF-8', 'CP1251',$login),
				':password'		=> iconv('UTF-8', 'CP1251',$password),
				':note'			=> iconv('UTF-8', 'CP1251',$note),
				':id'			=> $id))
			->execute(Database::instance('fb'));
	}

	public function reissuecard($id, $surname, $name, $patronymic, $datebirth, $numdoc, $datedoc, $workstart, $workend, $active, $peptype, $post, $tabnum, $org, $login, $password, $note)
	{
		
		$query = DB::query(Database::UPDATE,
			'UPDATE people SET surname = :surname, name = :name, patronymic = :patronymic, datebirth = :datebirth, numdoc = :numdoc, datedoc = :datedoc, ' .
			'workstart = :workstart, workend = :workend, "ACTIVE" = :active, peptype = :peptype, post = :post, login = :login, pswd = :password, id_org = :org, note = :note
			WHERE id_pep = :id')
			->parameters(array(
				':surname'		=> iconv('UTF-8', 'CP1251',$surname),
				':name'			=> iconv('UTF-8', 'CP1251',$name),
				':patronymic'	=> iconv('UTF-8', 'CP1251',$patronymic),
				//':datebirth'	=> $datebirth,
				':datebirth'	=> 'now',
				':numdoc'		=> $numdoc,
				':datedoc'		=> $datedoc,
				':datedoc'		=> 'now',
				':workstart'	=> $workstart,
				':workend'		=> $workend,
				':active'		=> $active,
				':peptype'		=> $peptype,
				':post'			=> iconv('UTF-8', 'CP1251',$post),
				':tabnum'		=> $tabnum,
				':org'			=> $org,
				':login'		=> iconv('UTF-8', 'CP1251',$login),
				':password'		=> iconv('UTF-8', 'CP1251',$password),
				':note'			=> iconv('UTF-8', 'CP1251',$note),
				':id'			=> $id))
			->execute(Database::instance('fb'));
	}

	public function delete($id)
	{
		$query = DB::query(Database::DELETE,
			'DELETE FROM people WHERE id_pep = :id')
			->param(':id', $id)
			->execute(Database::instance('fb'));
	}
	
	
	
	/** 2.07.2024 журнал событий за текущие сутки
	 * 
	 */
	
	public function getEventsList($from, $to)
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
	public function removeFromGuestToArchiveTimeExpired($orgFrom, $orgTo)
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
	public function delExpiredCardArchive($idOrgGuestArchive)
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
		public function getPassOfficeList()
		{
			$sql='select id from po_config order by id';
		  $query = DB::query(Database::SELECT, $sql)	
			->execute(Database::instance('pocfg'));
			
			return $query;
			
		}
}
	
	
	
