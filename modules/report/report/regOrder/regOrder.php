<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
	$ruid='regOrder'
	Модель отчета о количестве выданных пропусков.
	
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

class Model_Report_regOrder extends Model_Report_Base
{
	public $report_title='Отчет по Бюро пропусков';
	
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
        $this->_name = 'regOrder';
        $this->titleReport = 'Бюро пропусков. Отчет о выданных пропусках';
		$orgList=Model::factory('company')->getOrgListForOnce($user->id_orgctrl);
		$params=array('org'=>$orgList, 'user'=>$user,'data'=>$data);
		$this->set_params($params);//этот набор параметров будет передан в form для организации таблицы ввода данных
    }

	
		public function generate($post=array()){
//============= подготовка самого отчета============================
	
	/* $post=Validation::factory($post)
		->rule('reportdatestart', 'date')
		->rule('reportdateend', 'date'); */

			$t1=microtime(true);
			//echo Debug::vars('12', $post);exit;
			$_report=new Report();
			$_report->org=Kohana::$config->load('main')->get('orgname');
			$_report->titleReport='Выданные пропуска за период с '.Arr::get($post, 'reportdatestart').' по '.Arr::get($post, 'reportdateend');
			$_report->dateCreated=date('d.m.Y H:i:s');;
			$_report->fileName='regOrder_'.Arr::get($post, 'reportdatestart').'-'.Arr::get($post, 'reportdateend');
		
			// беру ФИО оператора
			$user=new User();
			//echo Debug::vars('71', $user); exit;
			$pep=new Contact($user->id_pep);
			$_report->fromUser  = $pep->surname.' '.Text::limit_chars($pep->name, 1).'. '.Text::limit_chars($pep->patronymic, 1).'.';
			
			
			//беру название департамента оператора
			$org= new Company($user->id_orgctrl);
			
			$_report->depatment  =  $org->name;
			
			$_report->titleColumn=array('Дата/время', 'Точка прохода', 'Событие', 'Имя, Фамилия','Должность', 'Отдел');
				
			$tempFile=new tempCSV;//в этот файл будут заноситься данные.Открыл файл.
			$tempFile->makeFile();
			$tempFile->addRow($_report->titleColumn);//сохранил заголовок отчета - первая строка.

			if(true){
				$timeStart=time(true);
				
				// 1) Заказы (кол-во зарегистрированных заявок) + ФИО
				$queryOrders = DB::query(Database::SELECT,
					'select
						p.surname || \' \' || p.name || \' \' || p.patronymic as fio,
						p.id_pep,
						count(go.id_guestorder) as ordered_count
					from guestorder go
					join people p on p.id_pep = go.id_pep
					where go.timeorder between :date_start and :date_end
					group by p.id_pep, p.surname, p.name, p.patronymic'
				)
					->param(':date_start', Arr::get($post, 'reportdatestart'))
					->param(':date_end', Arr::get($post, 'reportdateend'))
					->execute(Database::instance('fb'))
					->as_array();

				// 2) Карты (кол-во выданных пропусков)
				$queryCards = DB::query(Database::SELECT,
					'select
						p2.id_pep,
						count(distinct e.id_event) as issued_count
					from events e
					join people p on p.id_pep = e.ess1
					join guestorder go on e.ess1 = go.id_guest
					join people p2 on p2.id_pep = go.id_pep
					where e.datetime between :date_start and :date_end
						and e.id_eventtype = 17
						and p.id_org in (2,3)
					group by p2.id_pep'
				)
					->param(':date_start', Arr::get($post, 'reportdatestart'))
					->param(':date_end', Arr::get($post, 'reportdateend'))
					->execute(Database::instance('fb'))
					->as_array();

				// Соединяю по id_pep. В итоговом отчёте id_pep не выводим.
				$byPep = array(); // id_pep => ['fio' => ..., 'ordered_count' => 0, 'issued_count' => 0]
				foreach ($queryOrders as $row) {
					$id_pep = Arr::get($row, 'ID_PEP', Arr::get($row, 'id_pep'));
					if ($id_pep === null) continue;
					$fioRaw = Arr::get($row, 'FIO', Arr::get($row, 'fio'));
					// Для отчётов все входные строки должны быть в UTF-8 (см. tempCSV).
					// Firebird часто отдаёт win-1251, поэтому конвертируем.
					$fio = is_string($fioRaw) ? iconv('CP1251', 'UTF-8//IGNORE', $fioRaw) : $fioRaw;
					$byPep[$id_pep] = array(
						'fio' => $fio,
						'ordered_count' => (int) Arr::get($row, 'ORDERED_COUNT', Arr::get($row, 'ordered_count', 0)),
						'issued_count' => 0,
					);
				}

				foreach ($queryCards as $row) {
					$id_pep = Arr::get($row, 'ID_PEP', Arr::get($row, 'id_pep'));
					if ($id_pep === null) continue;
					if (!isset($byPep[$id_pep])) {
						$byPep[$id_pep] = array(
							'fio' => '',
							'ordered_count' => 0,
							'issued_count' => 0,
						);
					}
					$byPep[$id_pep]['issued_count'] = (int) Arr::get($row, 'ISSUED_COUNT', Arr::get($row, 'issued_count', 0));
				}

				// Преобразую в массив строк в фиксированном порядке колонок
				$query = array();
				foreach ($byPep as $id_pep => $row) {
					$query[] = array(
						Arr::get($row, 'fio', ''),
						Arr::get($row, 'ordered_count', 0),
						Arr::get($row, 'issued_count', 0),
					);
				}
				
				
			
			$_report->titleColumn=array('Оператор', 'Количество зарегистрированных заявок', 'Количество выданных пропусков' );
			$_report->rowData=$query;
			$_report->totalCountRow=count($query);
			//==========================
			$result=array();
			$tempFile=new tempCSV;//в этот файл будут заноситься данные.Открыл файл.
			$tempFile->makeFile();
			$tempFile->addRow($_report->titleColumn);//сохранил заголовок отчета - первая строка.
			//echo Debug::vars('76', $query);exit;
			foreach ($query as $key=>$value)
			{
									
				foreach($value as $key2=>$value2)
				{
					$result[]=$value2;
				}
					//тут добавить запись преобразованной строки в файл. Тогда не надо будет хранить в памяти массив $result
					//или в сессию писать... дописывать. какая разница?	
					//echo Debug::vars('86', $result);exit;
				if($result) $tempFile->addRow($result);//сохранил строку файла
				$result=array();//очистил строку с результатом.
			}
				$tempFile->closeFile();
				
			
		
			
			//$report->rowData=$result;
			$_report->view='result';//указание куда выводить отчет на экран
			$_report->timeExecute=(microtime(true)-$t1);//указание куда выводить отчет на экран
			$_report->fileName=$tempFile->fileName;//ссылка на файл список контактов
			
			//==========================
			$this->set('report', $_report);
			//echo Debug::vars('139', $_report);exit;
			return $_report;
	
	
	
	}
	
}
}
