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
			$report->fileName='crm2_contact_list';
			
			// беру ФИО оператора
			$pep=new Contact($user->id_pep);
			
			$report->fromUser  = $pep->surname.' '.Text::limit_chars($pep->name, 1).'. '.Text::limit_chars($pep->patronymic, 1).'.';
			
			
			//беру название департамента оператора
			$org= new Company($user->id_orgctrl );
			$report->depatment  =  $org->name;
			
			//echo Debug::vars('43', $user);exit;
	
			
			if(true){
							
				$sql='select o.name as orgname, p.surname||\' \'|| p.name ||\' \'|| p.patronymic as FIO, p.time_stamp,an.name as acname,\'\', 
						c.id_card, ct.smallname, c."ACTIVE", c.timestart, c.timeend
						 from people p
                    join organization o on p.id_org=o.id_org
                    left join card c on c.id_pep=p.id_pep
                    join cardtype ct on c.id_cardtype=ct.id
                    left join ss_accessuser ssa on ssa.id_pep=p.id_pep
                    left join accessname an on an.id_accessname=ssa.id_accessname
					join organization_getchild(1, '.$user->id_orgctrl .') og on og.id_org=p.id_org
					 join accessuser au on au.id_accessname=ssa.id_accessname and au.id_pep='.$user->id_pep.'
					where p."ACTIVE">0';
			
									
						
				//echo Debug::vars('21', $sql);exit;
				$query = DB::query(Database::SELECT, $sql)
				->execute(Database::instance('fb'))
				->as_array();
				//все данные, кроме метки времени, преобразую в UTF-8
				$result=array();
				foreach ($query as $key=>$value)
				{
					//преобразую все к UTF-8					
					foreach($value as $key2=>$value2)
					{
						
						$result[$key][Arr::get($value,$key2)]=iconv('CP1251', 'UTF-8', $value2);
						
					}
								
				}
				
			} else {

				$result=array();
			}
			//echo Debug::vars('87', $result);exit;
			$report->titleColumn=array('Орагнизация', 'ФИО сотрудника','Дата регистрации контакта', 'Категория доступа','', 'Код идентификатора','Тип идентификатора', 'Активность идентификатора', 'Дата начала идентификатора', 'Дата завершения идентификатора');
			
			$report->rowData=$result;
			$report->view='report';//указание куда выводить отчет на экран
			
			return $report;
	}
	
	
}
	

