<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
	$ruid='history2'
	Модель "быстрого" отчета о событиях.
	
	Поля класса Report для напоминания
	public $titleReport='Шаблон отчета тестовый';//название отчета	
	public $dateCreated;	//дата создания отчета
	public $fileName='crm_report';//название файла с отчетом	
	public $fromUser='Администратор';	//от имени какого сотрудника создан отчет. Надо указать ФИО string
	public $org='ООО "Артсек"';//головная организация.
	public $depatment='Департамент';//организация, для которой сделан отчета, или где работает сотрудник, подготовивший отчет.
	public $titleColumn=array('column0','column1','column2','column3');//название колонок отчета
	public $rowData=array();//даныне отчета построчно.

	
*/

class Model_history2_report extends Model
{
	
	private $selectYear;
	private $selectMonth;

	public function getReport($post, $user){// Статистика
		
			//echo Debug::vars('12', $post, $user);exit;
			$report=new Report();
			$report->org=Kohana::$config->load('main')->get('orgname');
			$report->titleReport='Журнал событий за период с '.Arr::get($post, 'reportdatestart').' по '.Arr::get($post, 'reportdateend');
			$report->dateCreated=date('d.m.Y H:i:s');;
			$report->fileName='crm_history1_'.Arr::get($post, 'reportdatestart').'-'.Arr::get($post, 'reportdateend');
			
			// беру ФИО оператора
			$pep=new Contact($user->id_pep);
			
			$report->fromUser  = $pep->surname.' '.Text::limit_chars($pep->name, 1).'. '.Text::limit_chars($pep->patronymic, 1).'.';
			
			
			//беру название департамента оператора
			$org= new Company($user->id_orgctrl );
			$report->depatment  =  $org->name;
			
			//echo Debug::vars('43', $user);exit;
	
			
			if(true){
				//выбираю разрешенные организации.
				$sql='select distinct og.id_org from organization_getchild(1, '.$user->id_orgctrl. ') og';
				
				$query = DB::query(Database::SELECT, $sql)
				->execute(Database::instance('fb'))
				->as_array();
				//echo Debug::vars('53', count($query)); exit;
				if(count($query)>1500) throw new  ExceptionCRM('Количество аргументов SQL запроса превышает 1500. Запрос не может быть выполнен.');
				foreach ($query as $key=>$value){
					
					$org_list[]=Arr::get($value, 'ID_ORG');
				}
				
				
				//выбираю разрешенные точки прохода.
				$sql='select distinct dg.id_dev from DEVGROUP_GETCHILD(1, '.$user->id_devgroup.') dg
				where dg.id_dev is not null';
				//echo Debug::vars('62', $sql);exit;
				$query = DB::query(Database::SELECT, $sql)
				->execute(Database::instance('fb'))
				->as_array();
				//echo Debug::vars('53', count($query)); exit;
				if(count($query)>1500) throw new  ExceptionCRM('Количество аргументов SQL запроса превышает 1500. Запрос не может быть выполнен.');
				foreach ($query as $key=>$value){
					
					$dev_list[]=Arr::get($value, 'ID_DEV');
				}
				//echo Debug::vars('70', count($dev_list));
				//echo Debug::vars('57', implode("," ,$dev_list));exit;
				
				
				$sql='select first 10000
                     e.id_event,
                    e.datetime,
                    p.surname,
                    p.name,
                    p.patronymic,
                    p.post,
                    d.name as doorname,
                    et.name as eventname

                     from events e
                  join people p on p.id_pep=e.ess1
                 join device d on d.id_dev=e.id_dev
                 join eventtype et on et.id_eventtype=e.id_eventtype
                
				 
				
                 WHERE
					e.id_eventtype  in ('.implode(",", Arr::get($post, 'id_event')).')
					and e.datetime between \''.Arr::get($post, 'reportdatestart').'\' and \''.Arr::get($post, 'reportdateend').'\'
					and e.ess2 in ('.implode("," ,$org_list).')
					and e.id_dev in ('.implode("," , $dev_list).')
				ORDER BY
					e.id_event DESC';			
			
						
				//echo Debug::vars('21', $sql);exit;
				//Log::instance()->add(Log::DEBUG, Debug::vars($dev_list));
				//Log::instance()->add(Log::DEBUG, implode("," , $dev_list));
				//Log::instance()->add(Log::DEBUG, $sql);
				$query = DB::query(Database::SELECT, $sql)
				->execute(Database::instance('fb'))
				->as_array();
				foreach ($query as $key=>$value)
				{
					$query[$key]['SURNAME']=iconv('CP1251', 'UTF-8', Arr::get($value,'SURNAME'));
					$query[$key]['NAME']=iconv('CP1251', 'UTF-8', Arr::get($value,'NAME'));
					$query[$key]['PATRONYMIC']=iconv('CP1251', 'UTF-8', Arr::get($value,'PATRONYMIC'));
					$query[$key]['POST']=iconv('CP1251', 'UTF-8', Arr::get($value,'POST'));
					$query[$key]['DOORNAME']=iconv('CP1251', 'UTF-8', Arr::get($value,'DOORNAME'));
					$query[$key]['EVENTNAME']=iconv('CP1251', 'UTF-8', Arr::get($value,'EVENTNAME'));
					
				}
				
			} else {

				$query=array();
			}
			$report->titleColumn=array('Дата/время', 'Точка прохода', 'Событие', 'Имя, Фамилия','Должность');
			
			$report->rowData=$query;
			$report->view='report';//указание куда выводить отчет на экран
			
			return $report;
	}
	
	
}
	

