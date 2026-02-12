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
	public $titlecolumnHist=array('columnHist0','columnHist1','columnHist2','columnHist3');//название колонок отчета
	public $rowData=array();//даныне отчета построчно.

	
*/

class Model_Report_history extends Model_Report_Base
{
	public $report_title='History21';
	
	private $selectYear;
	private $selectMonth;
	public $titleReport;
	public $orgList;

	
	/**12.09.2025 класс подготовки отчета Журнал рабочего времени.
	*входные параметры - массив $data, в котором ожидаю переменные
	*$date_from - с какой даты сделать отчет
	*$date_to по какую дату сделать отчет
	*$select_org - какая организация была выбрана для отчета
	*/
	 public function __construct($report_name, $data=null)
    {
        parent::__construct();
		
		 $this->_name = $report_name;
		$result=array(
			'report_title'=>'report_title_'.$this->_name,
			'data'=>$data,
		);
		$this->set('report', $result);
		
		
		$user=new User();//получил данные текущего авторизованного юзера
        $this->_name = 'history';
        $this->titleReport = 'Журнал событий';
		$orgList=Model::factory('company')->getOrgListForOnce($user->id_orgctrl);
		$params=array('org'=>$orgList, 'user'=>$user,'data'=>$data);
		$this->set_params($params);//этот набор параметров будет передан в form для организации таблицы ввода данных
    }

	//public function getReport($post, $user){// 
		public function generate($post=array()){
//============= подготовка самого отчета============================
	


			$t1=microtime(true);
			//echo Debug::vars('12', $post);exit;
			$_report=new Report();
			$_report->org=Kohana::$config->load('main')->get('orgname');
			$_report->titleReport='Журнал событий за период с '.Arr::get($post, 'reportdatestart').' по '.Arr::get($post, 'reportdateend');
			$_report->dateCreated=date('d.m.Y H:i:s');;
			$_report->fileName='crm_history1_'.Arr::get($post, 'reportdatestart').'-'.Arr::get($post, 'reportdateend');
		
			// беру ФИО оператора
			$user=new User();
			//echo Debug::vars('71', $user); exit;
			$pep=new Contact($user->id_pep);
			$_report->fromUser  = $pep->surname.' '.Text::limit_chars($pep->name, 1).'. '.Text::limit_chars($pep->patronymic, 1).'.';
			
			//запиманию в кеш текущие параметры отчета
	// Cache::instance()->set($user->id_pep.'_'.$this->report_title.'_reportdatestart',Arr::get($post, 'reportdatestart'));
	// Cache::instance()->set($user->id_pep.'_'.$this->report_title.'_reportdateend',Arr::get($post, 'reportdateend'));
	// Cache::instance()->set($user->id_pep.'_'.$this->report_title.'_id_orgctrl',$user->id_orgctrl);
	
			//беру название департамента оператора
			$org= new Company($user->id_orgctrl);
			
			$_report->depatment  =  $org->name;
			
			$_report->titleColumn=array('Дата/время', 'Точка прохода', 'Событие', 'Имя, Фамилия','Должность', 'Отдел');
				
			$tempFile=new tempCSV;//в этот файл будут заноситься данные.Открыл файл.
			$tempFile->makeFile();
			$tempFile->addRow($_report->titleColumn);//сохранил заголовок отчета - первая строка.

			if(true){
				$timeStart=time(true);
				//выбираю разрешенные организации.
				//$sql='select distinct og.id_org from organization_getchild(1, '.$user->id_orgctrl. ') og';
				$sql='select distinct og.id_org from organization_getchild(1, '.Arr::get($post, 'id_org_select', $user->id_orgctrl). ') og';
				
				$query = DB::query(Database::SELECT, $sql)
				->execute(Database::instance('fb'))
				->as_array();
				//echo Debug::vars('53', $sql);
				//echo Debug::vars('53', count($query)); exit;
				if(count($query)>1500) throw new  ExceptionCRM('Количество аргументов SQL запроса превышает 1500. Запрос не может быть выполнен.');
				foreach ($query as $key=>$value){
					
					$org_list[]=Arr::get($value, 'ID_ORG');
				}
				
				
				//выбираю разрешенные точки прохода.
				
				if(is_null($user->id_devgroup)){
					$devGroup= 1;
				} else {
					$devGroup=$user->id_devgroup;
				}
				//$sql='select distinct dg.id_dev from DEVGROUP_GETCHILD(1, '.$user->id_devgroup.') dg
				$sql='select distinct dg.id_dev from DEVGROUP_GETCHILD(1, '.$devGroup.') dg
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
								
				//события будут выбираться в цикле по 100000 (Сто тысяч) и записываться в файл.
				//т.о. можно будет избежать потребность в большом количестве выделяемой оперативной памяти.
				
				$rowCount=100000*10;//количество строк в sql запросе
				$sqlCount=$rowCount;//количество полученных строк в SQL запросе. Начальное значение равно максимальному, чтобы выполнился первый SQL запрос.
				$page=0;//количество итерация SQL запросов
				$totalCountRow=0;//общее количесвто строк с данными.
				
				$post['id_event']=array(50, 65);
				
				//echo Debug::vars('97', implode(",", Arr::get($post, 'id_event')));exit;
				while($sqlCount==$rowCount)
				{
					
				//$sql='select  first '.$rowCount.' skip '.$page*$rowCount.'   distinct
				$sql='select  first '.$rowCount.' skip '.$page*$rowCount.' 
					e.datetime,
					d.name as doorname,
					et.name as eventname,
					p.surname||\' \'||p.name||\' \'||p.patronymic,
					p.post ,
                    o.name
                    from device d
					join events e on e.id_dev=d.id_dev and e.datetime between \''.Arr::get($post, 'reportdatestart').'\' and \''.Arr::get($post, 'reportdateend').'\'
					join people p on p.id_pep=e.ess1
					join eventtype et on et.id_eventtype=e.id_eventtype
					 join organization o on o.id_org=p.id_org

					where d.id_dev in ('.implode("," , $dev_list).')
					and e.ess2 in ('.implode("," ,$org_list).')
					and e.id_eventtype  in ('.implode(",", Arr::get($post, 'id_event')).')
					 ';
			
				$t2=microtime(true);
					$query = DB::query(Database::SELECT, $sql)
					->execute(Database::instance('fb'))
					->as_array();
					

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
	

