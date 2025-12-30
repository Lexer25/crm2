    <?php defined('SYSPATH') or die('No direct script access.');
     
    /**
     * Test class
     *24.12.2025
     * @author Бухаров
	 Будет вставлено событие 501 о выходе указанного гостя.
	 Если параметры не передавать, то они будут взяты из _options
	 
	 C:\xampp\php\php.exe c:\xampp\htdocs\crm2\modules\minion\minion --task=checkGuestNoExit --id_dev=484 --card=AAABBBCCC3
     */
	 
     
    class Task_checkGuestNoExit extends Minion_Task {
		
		
	 	    protected $_options = array(
       
        'flag'   => 1,
        'org_guest'   => 2,
        'card'   => 484,
		
       		);
		
        
        protected function _execute(array $params)
        {
			
			Log::instance()->add(Log::DEBUG, 'Line 29 Старт проверки списка гостей. Поиск просроченных карт.');	
			//получаю список карт, которые надо отметить на выход.
			$sql=__(' select c.id_card, c.id_pep from card c
                        where c.flag=1
                        and c.createdat<\'tomorrow\'');
						
						
			$sql=__(' select c.id_card, c.id_pep from card c
				join people p on c.id_pep=p.id_pep
                        where c.flag=:flag
                        and p.id_org=:org_guest
                          and c.timeend<\'now\'',
						array(
							':flag'=>Arr::get($params, 'flag'),
							':org_guest'=>Arr::get($params, 'org_guest'),
						));
						
				//echo Debug::vars('44', $sql); exit;		
				
				$query = DB::query(Database::SELECT, $sql)
			->execute(Database::instance('fb'))
			//->get('ID_PEP');
			->as_array();
			
			//echo Debug::vars('44', $query); exit;
			
			//формирую событие 501 (отметка о выходе поставлена вручную)
			foreach($query as $key=>$value)	{
				
				Log::instance()->add(Log::DEBUG, __('Удаляю гостя d_pep-:id_pep, card=:card',
					array(
						':id_pep'=>Arr::get($value, 'ID_PEP'),
						':card'=>Arr::get($value, 'ID_CARD')
						)));
				
				$sql=__('INSERT INTO EVENTS (ID_DB,ID_EVENTTYPE,ID_DEV,ID_PLAN,DATETIME,ID_CARD,NOTE,ID_VIDEO,ID_PEP,ESS1,ESS2)
					VALUES (1,501,NULL,NULL,\'now\',\':card\',NULL,NULL,1,:id_pep,NULL)', 
					array(
					
					':id_pep'=>Arr::get($value, 'ID_PEP'),
					':card'=>Arr::get($value, 'ID_CARD'),
					
					));
				//echo Debug::vars('57', $sql); //exit;
			
				Log::instance()->add(Log::DEBUG, 'Line 68 '. $sql);	
				$query = DB::query(Database::INSERT, $sql)
					->execute(Database::instance('fb'));
					
				//удаляю карту у гостя
				$sql=__('delete from card c
				where c.id_card=\':card\'', 
				array(':card'=>Arr::get($value, 'ID_CARD')));
			//	echo Debug::vars('67', $sql); //exit;
			
				//Log::instance()->add(Log::DEBUG, 'Line 23 '. $sql);	
				$query = DB::query(Database::DELETE, $sql)
					->execute(Database::instance('fb'));
				
				//перемещаю гостя в архив	
				$sql=__('update people p
					set p.id_org=3
					where p.id_pep=:id_pep', 
				array(':id_pep'=>Arr::get($value, 'ID_PEP')));
			//	echo Debug::vars('67', $sql); //exit;
			
				//Log::instance()->add(Log::DEBUG, 'Line 23 '. $sql);	
				$query = DB::query(Database::UPDATE, $sql)
					->execute(Database::instance('fb'));	

				//echo Debug::vars('84', $sql); exit;
					
			}
			
		}
    }