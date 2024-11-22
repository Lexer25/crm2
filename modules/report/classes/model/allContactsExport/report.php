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

class Model_allContactsExport_report extends Model
{
	
	private $selectYear;
	private $selectMonth;

	public function getReport($post, $user){// Статистика
		
			//echo Debug::vars('12', $post, $user);exit;
			$report=new Report();
			$report->org=Kohana::$config->load('main')->get('orgname');
			$report->titleReport='Список сотрудников';
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
				$sql='select * from people p
				join organization_getchild(1, '.$user->id_orgctrl .') og on og.id_org=p.id_org';
			
				$sql='select o.name as orgname, p.surname, p.name, p.patronymic, c.id_card, an.name as acname, p.time_stamp  from people p
					join organization o on p.id_org=o.id_org
					left join card c on c.id_pep=p.id_pep
					left join ss_accessuser ssa on ssa.id_pep=p.id_pep
					left join accessname an on an.id_accessname=ssa.id_accessname
					join organization_getchild(1, '.$user->id_orgctrl .') og on og.id_org=p.id_org
					 join accessuser au on au.id_accessname=ssa.id_accessname and au.id_pep='.$user->id_pep.'
					where p."ACTIVE">0';
			
						
						
				//echo Debug::vars('21', $sql);exit;
				$query = DB::query(Database::SELECT, $sql)
				->execute(Database::instance('fb'))
				->as_array();
				foreach ($query as $key=>$value)
				{
					$query[$key]['SURNAME']=iconv('CP1251', 'UTF-8', Arr::get($value,'SURNAME'));
					$query[$key]['NAME']=iconv('CP1251', 'UTF-8', Arr::get($value,'NAME'));
					$query[$key]['PATRONYMIC']=iconv('CP1251', 'UTF-8', Arr::get($value,'PATRONYMIC'));
					$query[$key]['ORGNAME']=iconv('CP1251', 'UTF-8', Arr::get($value,'ORGNAME'));
					$query[$key]['ACNAME']=iconv('CP1251', 'UTF-8', Arr::get($value,'ACNAME'));
										
				}
				
			} else {

				$query=array();
			}
			$report->titleColumn=array('Орагнизация', 'ФИО сотрудника', 'Код карточки', 'Категория','Дата регистрации');
			
			$report->rowData=$query;
			$report->view='report';//указание куда выводить отчет на экран
			
			return $report;
	}
	
	
}
	

