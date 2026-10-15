<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Report_allContactsExport extends Model_Report_Base
{
	public $report_title='AllContactsExport';
	
	private $selectYear;
	private $selectMonth;
	public $titleReport;
	public $orgList;


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
        $this->_name = 'AllContactsExport';
        $this->titleReport = 'AllContactsExportTitlereport';
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
			$_report->titleReport='Список контактов';
			$_report->dateCreated=date('d.m.Y H:i:s');;
			$_report->fileName='crm_history1_'.Arr::get($post, 'reportdatestart').'-'.Arr::get($post, 'reportdateend');
		
			// беру ФИО оператора
			$user=new User();
			$pep=new Contact($user->id_pep);
			$_report->fromUser  = $pep->surname.' '.Text::limit_chars($pep->name, 1).'. '.Text::limit_chars($pep->patronymic, 1).'.';
			
			//беру название департамента оператора
			$org= new Company($user->id_orgctrl);
			
			$_report->depatment  =  $org->name;
			
			$_report->titleColumn=array('id', 'Фамилия', 'Имя', 'Отчество','Записи','Табельный номер', 'Дата регистрации', 'id_org', 'Отдел');
				
			$tempFile=new tempCSV;//в этот файл будут заноситься данные.Открыл файл.
			$tempFile->makeFile();
			$tempFile->addRow($_report->titleColumn);//сохранил заголовок отчета - первая строка.

			if(true){
				$timeStart=time(true);
				
											
				//строки будут выбираться в цикле по 100000 (Сто тысяч) и записываться в файл.
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
				
				$sql='select  first 1000000 skip 0 
                    p.id_pep, p.surname, p.name, p.patronymic, p.note, p.tabnum, p.time_stamp, p."ACTIVE", o.id_org, o.name
                    from people p
                    join organization o on o.id_org=p.id_org
                    join organization_getchild(1, '.Arr::get($post, 'id_org_select', $user->id_orgctrl).') og on p.id_org=og.id_org';
					
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
	

