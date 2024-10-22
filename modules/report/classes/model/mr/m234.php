<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
	отчет 234.
	Модель для работы с конфигурацией как с единым целым
*/

class Model_mr_m234 extends Model
{
	
	public function getReport1($post, $user){// Статистика
		
			$report=new Report();
			$report->org=Kohana::$config->load('main')->get('orgname');
			$report->titleReport='Количество зарегистрированных сотрудников за последние '.Arr::get($post, 'howManyMonce').' месяцев';
			
			// беру ФИО оператора
			$pep=new Contact($user->id_pep);
			//echo Debug::vars('16', $user);exit;
			$report->fromUser  = $pep->surname.' '.Text::limit_chars($pep->name, 1).'. '.Text::limit_chars($pep->patronymic, 1).'.';
			//$report->fromUser  = $pep->surname.' '.Text::limit_chars($pep->surname, 1).'. '.Text::limit_chars($pep->patronymic, 1).'.';
			//$report->fromUser  = 'bla';
			
			//беру название департамента оператора
			$org= new Company($user->id_orgctrl );
			$report->depatment  =  $org->name;
			
			
			$month=20;
			$ttime=time()-60*60*24*30*$month;
			$timeFrom=date('Y-m-d', mktime(0, 0, 0, date('m', $ttime), 1, date('Y', $ttime)));

			$sql='SELECT EXTRACT(year from p.time_stamp) as yearFrom, EXTRACT(month from p.time_stamp) as montFrom, count(*) FROM people p
			join organization_getchild(1, '.Arr::get(Auth::instance()->get_user(), 'ID_ORGCTRL').') og on og.id_org=p.id_org
			where p.time_stamp>\''.$timeFrom.'\'
				GROUP BY 1, 2
				order by 1,2';
			//echo Debug::vars('21', $sql);exit;
			$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			->as_array();
			//заменяю номер месяца на его название
			$monthes = array('NullMonth', 'Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь', 'Декабрь');
			foreach ($query as $key=>$value)
			{
				
				$query[$key]['MONTFROM']=Arr::get($monthes, $value['MONTFROM']).' ('.$value['MONTFROM'].')';

				
				
			}
			// добавляю нижнюю, заключительную, строку.
		/* 	$query[]=array(
					'234'=>'',
					'567'=>'Всего зарегистрировано',
					'890'=>890,
			
					); */
			//echo Debug::vars('34', $query);exit;
			$report->titleColumn=array('YEARFROM', 'MONTFROM', 'COUNT' );
			$report->rowData=$query;
			//echo Debug::vars('48', $report);exit;
			return $report;
	}
	
}
	

