<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
	$ruid='allCard'
	Модель отчета по идентификаторам.
	Выводит список идентификаторов с указанием номера, типа, срока дейтсвия и даты последнего прохода
	
	Поля класса Report для напоминания
	public $titleReport='Шаблон отчета тестовый';//название отчета	
	public $dateCreated;	//дата создания отчета
	public $fileName='crm_report';//название файла с отчетом	
	public $fromUser='Администратор';	//от имени какого сотрудника создан отчет. Надо указать ФИО string
	public $org='ООО "Артсек"';//головная организация.
	public $depatment='Департамент';//организация, для которой сделан отчета, или где работает сотрудник, подготовивший отчет.
	public $titlecolumnHist=array('columnHist0','columnHist1','columnHist2','columnHist3');//название колонок отчета
	public $rowData=array();//даныне отчета построчно.

	
*/

class Model_Report_allCard extends Model_Report_Base
{
	public $report_title='Идентификаторы';
	
	private $selectYear;
	private $selectMonth;
	public $titleReport;
	public $orgList;

	
	/**22.01.2026 класс подготовки отчета Идентификаторы.
	*входные параметры - массив $data, в котором ожидаю переменные
	*$date_from - с какой даты сделать отчет
	*$date_to по какую дату сделать отчет
	*$select_org - какая организация была выбрана для отчета
	*/
	 public function __construct($report_name, $data=null)
    {
        parent::__construct();
	//echo Debug::vars('39', $data);exit;	
		 $this->_name = $report_name;
		$result=array(
			'report_title'=>'report_title_'.$this->_name,
			'data'=>$data,
		);
		$this->set('report', $result);
		
		
		$user=new User();//получил данные текущего авторизованного юзера
        $this->_name = 'allCard';
        $this->titleReport = 'Идентификаторы';
		$orgList=Model::factory('company')->getOrgListForOnce($user->id_orgctrl);
		$params=array('org'=>$orgList, 'user'=>$user,'data'=>$data);
		$this->set_params($params);//этот набор параметров будет передан в form для организации таблицы ввода данных
    }

	//public function getReport($post, $user){// 
		public function generate($post=array()){
//============= подготовка самого отчета============================

			$t1=microtime(true);
			echo Debug::vars('12', $_POST);//exit;
			$_report=new Report();
			$_report->org=Kohana::$config->load('main')->get('orgname');
			$_report->titleReport='Идентификаторы';
			$_report->dateCreated=date('d.m.Y H:i:s');;
			$_report->fileName='crm_history1_'.Arr::get($post, 'reportdatestart').'-'.Arr::get($post, 'reportdateend');
		
			// беру ФИО оператора
			$user=new User();
			//echo Debug::vars('71', $user); exit;
			$pep=new Contact($user->id_pep);
			$_report->fromUser  = $pep->surname.' '.Text::limit_chars($pep->name, 1).'. '.Text::limit_chars($pep->patronymic, 1).'.';
			
			//запиманию в кеш текущие параметры отчета
		
			//беру название департамента оператора
			$org= new Company($user->id_orgctrl);
			
			$_report->depatment  =  $org->name;
			
			$_report->titleColumn=array('Идентификатор', 'Зарегистрирован', 'Действует с', 'Действует до','Активен', 'Флаг', 'Тип'
			,'id_pep', 'Табельный номер', 'Фамилия', 'Имя', 'Отчество'
			,'id_org', 'Организация'
			,'Событие'
			);
			
			$tempFile=new tempCSV;//в этот файл будут заноситься данные.Открыл файл.
			$tempFile->makeFile();
			$tempFile->addRow($_report->titleColumn);//сохранил заголовок отчета - первая строка.

			if(true){
				$timeStart=time(true);
				//таблица о последних проходах каждой карты
				
				$sql='select e.id_card, max(e.datetime) from events e
					where e.id_eventtype in (46, 50, 65, 70, 71)
					group by e.id_card';
				
				$lastTime = DB::query(Database::SELECT, $sql)
				->execute(Database::instance('fb'))
				->as_array();
				
				$lastTime=array_column($lastTime, null, 'ID_CARD');
				
				//echo Debug::vars('53', $lastTime); exit;
								
				//события будут выбираться в цикле по 100000 (Сто тысяч) и записываться в файл.
								
				$rowCount=100000*10;//количество строк в sql запросе
				$sqlCount=$rowCount;//количество полученных строк в SQL запросе. Начальное значение равно максимальному, чтобы выполнился первый SQL запрос.
				$page=0;//количество итерация SQL запросов
				$totalCountRow=0;//общее количесвто строк с данными.
				
							
				//echo Debug::vars('97', implode(",", Arr::get($post, 'id_event')));exit;
				while($sqlCount==$rowCount)
				{
					
				$sql='select first 100000 skip 0
					c.id_card, c.timestart, c.timeend, c.status, c."ACTIVE", c.flag, ct.smallname, c.createdat
					,p.id_pep, p.surname, p.name, p.patronymic, p.id_org
					,o.name as orgname from card c
					join cardtype ct on c.id_cardtype=ct.id
					join people p on c.id_pep=p.id_pep
					join organization o on p.id_org=o.id_org
					order by c.id_card
					';
	
				$t2=microtime(true);
					$query = DB::query(Database::SELECT, $sql)
					->execute(Database::instance('fb'))
					->as_array();
				foreach($query as $key=>$value)
				{
				
					
					$query[$key]['lastTime']=Arr::get(Arr::get($lastTime,Arr::get($value, 'ID_CARD')), 'MAX', 'no');

				}					
//echo Debug::vars('136', $query);exit;
					$sqlCount=count($query);//считаю какое количество строк получено в последнем запросе.
					$totalCountRow=$totalCountRow + $sqlCount;//считаю общую сумму строк в отчете.
					$page++;
					
					//if($page>7) exit;
					$t2=microtime(true);
					$result=array();
					
					
					foreach ($query as $key=>$value)
					{
						foreach($value as $key2=>$value2)
						{
							
							$result[]=iconv('CP1251', 'UTF-8//IGNORE', $value2);
							
						}
					
					
					if($result) $tempFile->addRow($result);//сохранил строку файла
					$result=array();//очистил строку с результатом.
					}

					//echo Debug::vars('166');exit;
					$query=array();
				}
				
				$_report->totalCountRow=$totalCountRow;
				$_report->timeExecute=(time(true) - $timeStart);
				
			} else {

				$query=array();
			}
			//$report->rowData=$query;
			$tempFile->closeFile();

		$this->set('report', $_report);//передача результата 
			
			$_report->view='result';
			$_report->fileName=$tempFile->fileName;//имя файла с сохраненными данными
			
			return $_report;
	}
	
	
}
	

