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

class Model_Report_allGuestorder extends Model_Report_Base
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
        $this->_name = 'allGuestorder';
        $this->titleReport = 'Бюро пропусков. Список заявок';
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
			$_report->titleReport='Список заявок и выданных карт за период с '.Arr::get($post, 'reportdatestart').' по '.Arr::get($post, 'reportdateend');
			$_report->dateCreated=date('d.m.Y H:i:s');;
			$_report->fileName='allGuestorder_'.Arr::get($post, 'reportdatestart').'-'.Arr::get($post, 'reportdateend');
		
			// беру ФИО оператора
			$user=new User();
			//echo Debug::vars('71', $user); exit;
			$pep=new Contact($user->id_pep);
			$_report->fromUser  = $pep->surname.' '.Text::limit_chars($pep->name, 1).'. '.Text::limit_chars($pep->patronymic, 1).'.';
			
			
			//беру название департамента оператора
			$org= new Company($user->id_orgctrl);
				
			$_report->depatment  =  $org->name;
			
			// Первая колонка — Бюро
			$_report->titleColumn=array('Бюро', 'Оператор', 'Дата создания заявки', 'Гость', 'Организация','Время выдачи карты', 'Карта');
			
			// Формируем данные отчёта по переданному периоду
			$timeStart = time(true);

			$date_start = Arr::get($post, 'reportdatestart');
			$date_end   = Arr::get($post, 'reportdateend');

			$rows = DB::query(Database::SELECT,
				'SELECT
					go.id_buro,
					p2.surname || \' \' || p2.name || \' \' || p2.patronymic as fio,
					go.timeorder,
					p.surname || \' \' || p.name || \' \' || p.patronymic as guest_fio,
					o.name as org_name,
					gu.createdat,
					gu.id_card
				FROM guestorder go
				LEFT JOIN guestcards gu ON gu.id_guestorder = go.id_guestorder
				JOIN people p2 ON p2.id_pep = go.id_pep
				JOIN organization o ON o.id_org = go.id_org
				JOIN people p ON p.id_pep = go.id_guest
					AND p.id_org IN (2, 3)
				WHERE go.timeorder BETWEEN :date_start AND :date_end
				ORDER BY go.timeorder'
			)
				->param(':date_start', $date_start)
				->param(':date_end', $date_end)
				->execute(Database::instance('fb'))
				->as_array();

			// Маппинг id_buro -> название бюро через класс Buro
			$buro = new Buro();
			$buroCache = array();

			$query = array();
			foreach ($rows as $row) {
				$id_buro = Arr::get($row, 'ID_BURO', Arr::get($row, 'id_buro'));

				$buroName = '';
				if (!empty($id_buro)) {
					if (!isset($buroCache[$id_buro])) {
						$info = $buro->getBuroById($id_buro);
						$nameRaw = '';
						if (!empty($info) && isset($info[0]['name'])) {
							$nameRaw = $info[0]['name'];
						}
						// названия бюро уже приходят в корректной кодировке, не перекодируем
						$buroName = $nameRaw;
						$buroCache[$id_buro] = $buroName;
					} else {
						$buroName = $buroCache[$id_buro];
					}
				}

				$operatorRaw = Arr::get($row, 'FIO', Arr::get($row, 'fio', ''));
				$guestRaw    = Arr::get($row, 'GUEST_FIO', Arr::get($row, 'guest_fio', ''));
				$orgRaw      = Arr::get($row, 'ORG_NAME', Arr::get($row, 'org_name', ''));

				// конвертируем из WIN1251 в UTF-8
				$operator = is_string($operatorRaw) ? iconv('CP1251', 'UTF-8//IGNORE', $operatorRaw) : $operatorRaw;
				$guest    = is_string($guestRaw)    ? iconv('CP1251', 'UTF-8//IGNORE', $guestRaw)    : $guestRaw;
				$orgName  = is_string($orgRaw)      ? iconv('CP1251', 'UTF-8//IGNORE', $orgRaw)      : $orgRaw;

				$timeorder = Arr::get($row, 'TIMEORDER', Arr::get($row, 'timeorder', ''));
				$createdat = Arr::get($row, 'CREATEDAT', Arr::get($row, 'createdat', ''));
				$id_card   = Arr::get($row, 'ID_CARD', Arr::get($row, 'id_card', ''));

				$query[] = array(
					$buroName,
					$operator,
					$timeorder,
					$guest,
					$orgName,
					$createdat,
					$id_card,
				);
			}

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
