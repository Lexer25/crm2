<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Scheduler extends Controller_Template {
    
    
    public $viewDir = 'deep';
	public $template = 'scheduler/deep/template';
    protected $_db_connection = 'scheduler_db';
    
    public function before()
    {
        parent::before();
		
		$session = Session::instance();
		//echo Debug::vars('15', $session);
        if($session->get('fview', 0)){//переключение между папками с формами
			$this->viewDir='deep';

		} else {
		
			$this->viewDir='bs'; 
		
		}
		 $this->template->set_filename('scheduler/'.$this->viewDir.'/template');
		 
        // Проверка авторизации (раскомментируйте если нужно)
        // if (!Auth::instance()->logged_in()) {
        //     $this->redirect('login');
        // }
        
        // Проверка прав (раскомментируйте если нужно)
        // if (!Auth::instance()->logged_in('admin')) {
        //     throw new HTTP_Exception_403('Access denied');
        // }
       
        $this->template->title = 'Scheduler Tasks';
        $this->template->content = '';
        $this->template->styles = array(
            '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css',
            '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'
        );
		
		 // $this->template->styles = array(
            // 'static/513/css/bootstrap.min.css',
            // 'static/513/css/all.min.css',
  
        // );
		
		
        $this->template->scripts = array(
            '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
            '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'
        );
		
		
		
    }
    
    /**
     * Получить соединение с БД планировщика
     */
    protected function _get_db()
    {
        try
        {
            return Database::instance($this->_db_connection);
        }
        catch (Exception $e)
        {
            // Если соединение 'scheduler' не настроено, используем 'default'
            return Database::instance();
        }
    }
    
    /**
     * Главная страница - список задач
     */
    public function action_index()
    {
        try {
            $scheduler = Scheduler::factory();
            $tasks = $scheduler->get_tasks();
            $status = $scheduler->get_status();
            $statistics = $scheduler->get_statistics();
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/index')
                ->set('tasks', $tasks)
                ->set('status', $status)
                ->set('stats', $statistics);
                
        } catch (Exception $e) {
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/error')
                ->set('error', $e->getMessage());
        }
    }
    
    /**
     * Детальная информация о задаче
     */
    public function action_task()
    {
	       
	   $task_name = $this->request->param('id');
         try {
            $scheduler = Scheduler::factory();
            $task = $scheduler->get_task($task_name);
   // echo Debug::vars('84', $task);exit;        
            if (!$task) {
                throw new Exception("Task not found: {$task_name}");
            }
            
            // Получаем логи выполнения
            $logs = $this->_get_task_logs($task['db_task']['id']);
       
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/task')
                ->set('task', $task)
                ->set('logs', $logs)
                ->set('task_name', $task_name);
                
        } catch (Exception $e) {
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/error')
                ->set('error', $e->getMessage());
        }
    }
    
    /**
     * Логи выполнения задач
     */
    public function action_logs()
    {
		/* echo Debug::vars('108', $this->request->query('task_id'));
		echo Debug::vars('108', $this->request->param('page', 1));exit; */
		$task_id = $this->request->query('task_id');
		//$page = (int) $this->request->param('page', 1);
		$page = $this->request->param('page', 1);
        //$page=1;
		$limit = 50;
        $offset = ($page - 1) * $limit;
        
        try {
            $db = $this->_get_db();
            
            // Общее количество логов
            $total_logs_query = "SELECT COUNT(*) as count FROM `scheduler_logs`";
            $total_logs_params = array();
        
            if ($task_id) {
                $total_logs_query .= " WHERE task_id = :task_id";
                $total_logs_params[':task_id'] = $task_id;
            }
            
            $total_logs = $db->query(Database::SELECT, __($total_logs_query, $total_logs_params))->get('count');
        
            // Получаем логи
            $logs_query = "
                SELECT l.*, t.name as task_name 
                FROM `scheduler_logs` l 
                LEFT JOIN `scheduler_tasks` t ON l.task_id = t.id 
            ";
            $logs_params = array(
                ':limit' => $limit,
                ':offset' => $offset
            );
            
            if ($task_id) {
                $logs_query .= " WHERE l.task_id = :task_id";
                $logs_params[':task_id'] = $task_id;
            }
            
            $logs_query .= " ORDER BY l.created_at DESC LIMIT :limit OFFSET :offset";
            
            $logs = $db->query(Database::SELECT, __($logs_query, $logs_params))->as_array();
            
            // Получаем список задач для фильтра
            $tasks = $db->query(Database::SELECT, "
                SELECT id, name FROM `scheduler_tasks` ORDER BY name
            ")->as_array();
            
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/logs')
                ->set('logs', $logs)
                ->set('tasks', $tasks)
                ->set('current_task_id', $task_id)
                ->set('current_page', $page)
                ->set('total_pages', ceil($total_logs / $limit))
                ->set('total_logs', $total_logs);
                
        } catch (Exception $e) {
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/error')
                ->set('error', $e->getMessage());
        }
    }
    
    /**
     * Статистика выполнения
     */
    public function action_stats()
    {
		 try {
            $db = $this->_get_db();
            
            // Общая статистика
            $total_stats = $db->query(Database::SELECT, "
                SELECT 
                    COUNT(*) as total_tasks,
                    SUM(s.total_runs) as total_executions,
                    SUM(s.total_errors) as total_errors,
                    AVG(s.last_duration) as avg_duration,
                    MAX(s.last_duration) as max_duration
                FROM `scheduler_tasks` t
                LEFT JOIN `scheduler_state` s ON t.id = s.task_id
                WHERE t.enabled = 1
            ")->current();
            
            // Статистика по дням
            $daily_stats = $db->query(Database::SELECT, "
                SELECT 
                    DATE(created_at) as date,
                    COUNT(*) as executions,
                    SUM(CASE WHEN status = 'success' THEN 1 ELSE 0 END) as successes,
                    SUM(CASE WHEN status = 'error' THEN 1 ELSE 0 END) as errors,
                    AVG(duration) as avg_duration
                FROM `scheduler_logs`
                WHERE created_at >= DATE('now', '-30 days')
                GROUP BY DATE(created_at)
                ORDER BY date DESC
            ")->as_array();
            
            // Топ задач по количеству выполнений
            $top_tasks = $db->query(Database::SELECT, "
                SELECT 
                    t.name,
                    s.total_runs as executions,
                    s.total_errors as errors,
                    s.last_duration as last_duration,
                    s.last_status as last_status
                FROM `scheduler_tasks` t
                LEFT JOIN `scheduler_state` s ON t.id = s.task_id
                WHERE t.enabled = 1
                ORDER BY s.total_runs DESC
                LIMIT 10
            ")->as_array();
            
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/stats')
                ->set('total_stats', $total_stats)
                ->set('daily_stats', $daily_stats)
                ->set('top_tasks', $top_tasks);
                
        } catch (Exception $e) {
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/error')
                ->set('error', $e->getMessage());
        }
    }
    
    /**
     * AJAX действия
     */
    public function action_ajax()
    {
 	   $this->auto_render = FALSE;
        
        $action = $this->request->param('id');
        $response = array('success' => FALSE);
        
        try {
            switch ($action) {
                case 'run_task':
                    $task_name = $this->request->post('task_name');
                    $scheduler = Scheduler::factory();
                    $result = $scheduler->run_task($task_name);
                    $response = array('success' => $result, 'message' => $result ? 'Task started' : 'Task failed');
                    break;
                    
                case 'toggle_task':
				    $task_name = $this->request->post('task_name');
					$enabled = $this->request->post('enabled');
				    $this->_toggle_task($task_name, $enabled);
                    $response = array('success' => TRUE, 'message' => 'Task updated');
                    break;
                    
                case 'get_task_status':
                    $task_name = $this->request->post('task_name');
                    $scheduler = Scheduler::factory();
                    $task = $scheduler->get_task($task_name);
                    $response = array('success' => TRUE, 'task' => $task);
                    break;
                    
                default:
                    $response = array('success' => FALSE, 'message' => 'Unknown action');
                    break;
            }
        } catch (Exception $e) {
            $response = array('success' => FALSE, 'message' => $e->getMessage());
        }
        
        $this->response->headers('Content-Type', 'application/json');
        $this->response->body(json_encode($response));
    }
    
    /**
     * Включение/выключение задачи
     */
    protected function _toggle_task($task_name, $enabled)
    {
      $db = $this->_get_db();
/*         $db->query(Database::UPDATE, __("
            UPDATE `scheduler_tasks` 
            SET enabled = :enabled, updated_at = :updated_at 
            WHERE name = :name
        ", array(
            ':enabled' => (int)$enabled,
            ':updated_at' => '\''.date('Y-m-d H:i:s').'\'',
            ':name' => '\''.$task_name.'\''
        ))); */
		
		$db->query(Database::UPDATE, __("
            UPDATE `scheduler_tasks` 
			SET enabled = 1 - enabled,
				updated_at = :updated_at 
			WHERE name = :name
        ", array(
            ':enabled' => (int)$enabled,
            ':updated_at' => '\''.date('Y-m-d H:i:s').'\'',
            ':name' => '\''.$task_name.'\''
        )));
		
		
    }
    
    /**
     * Получение логов задачи
     */
    protected function _get_task_logs($task_id, $limit = 20)
    {
        $db = $this->_get_db();
         return $db->query(Database::SELECT, __("
            SELECT * FROM `scheduler_logs` 
            WHERE task_id = :task_id 
            ORDER BY created_at DESC 
            LIMIT :limit
        ", array(
            ':task_id' => $task_id,
            ':limit' => $limit
        )))->as_array();
     

 	
	}
    
    /**
     * переключение формы
     */
   public function action_toggleView()
    {
        // Получаем текущее значение триггера из сессии
        $current_value = $this->session->get('fview', 0);
        
        // Меняем значение на противоположное (0->1, 1->0)
        $new_value = ($current_value == 0) ? 1 : 0;
        
        // Сохраняем новое значение в сессии
        $this->session->set('fview', $new_value);
        
               
        // Или перенаправить куда-то
         $this->redirect('scheduler');
    }
    
   /**
     * Создание новой задачи (форма)
     */
    public function action_create()
    {
       if ($this->request->method() === 'POST') {
            $this->_create_task_from_post();
        } else {
            $this->_show_create_form();
        }
    }
    
    /**
     * Показать форму создания задачи
     */
    protected function _show_create_form()
    {
        $available_classes = $this->_get_available_task_classes();
        
        $this->template->content = View::factory('scheduler/'.$this->viewDir.'/create')
            ->set('available_classes', $available_classes)
            ->set('errors', array());
    }
    
    /**
     * Создать задачу из POST данных
     */
    protected function _create_task_from_post()
    {
  // echo Debug::vars('355', $_POST);exit;
		$errors = array();
        $available_classes = $this->_get_available_task_classes();
        
        $name = $this->request->post('name');
        $description = $this->request->post('description');
        $parameters = $this->request->post('param');
        $schedule_type = $this->request->post('schedule_type');
        $class = $this->request->post('callback');
        $schedule = $this->request->post('schedule');
        $enabled = (bool) $this->request->post('enabled', 1);
        //$parameters = $this->request->post('parameters');
        $timeout = $this->request->post('timeout');
        
        // Валидация
        if (empty($name)) {
            $errors[] = 'Task name is required';
        }
        
        if (empty($class)) {
            $errors[] = 'Task class is required';
        } elseif (!in_array($class, $available_classes)) {
            $errors[] = 'Invalid task class';
        }
        
        if (empty($schedule)) {
            $errors[] = 'Schedule is required';
        } elseif (!$this->_validate_cron_schedule($schedule)) {
            $errors[] = 'Invalid cron schedule format';
        }
     
        // Парсим параметры
        $parameters_array = array();
        if (!empty($parameters)) {
            $parameters_array = json_decode($parameters, TRUE);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $errors[] = 'Invalid JSON parameters: ' . json_last_error_msg();
            }
        }
  //echo Debug::vars('397', $name, $class, $schedule, $enabled, $parameters_array, $description);exit; 
        if (empty($errors)) {
			try {
                $scheduler = Scheduler::factory();
                $result = $scheduler->add_task($name, $class, $schedule, $enabled, $parameters_array, $description);
               
            } catch (Exception $e) {
                $errors[] = 'Error creating task: ' . $e->getMessage();
				$result=false;
            }
        }
		
		 if ($result) {
					$this->redirect('/scheduler/task/' . urlencode($name));
				} else {
                    $errors[] = 'Failed to create task';
                }
				
				
        $this->template->content = View::factory('scheduler/'.$this->viewDir.'/create')
            ->set('available_classes', $available_classes)
            ->set('errors', $errors)
            ->set('form_data', array(
                'name' => $name,
                'class' => $class,
                'schedule' => $schedule,
                'enabled' => $enabled,
                'parameters' => $parameters
            ));
    }
    
    /**
     * Получить доступные классы задач
     */
    protected function _get_available_task_classes()
    {
        $classes = array();
        $task_files = Kohana::list_files('classes/Task');
        
        foreach ($task_files as $file) {
            if (is_array($file)) {
                foreach ($file as $sub_file) {
                    if (is_string($sub_file)) {
                        $class_name = $this->_file_to_class_name($sub_file);
                        if ($class_name && class_exists($class_name)) {
                            $classes[] = $class_name;
                        }
                    }
                }
            } else {
                $class_name = $this->_file_to_class_name($file);
                if ($class_name && class_exists($class_name)) {
                    $classes[] = $class_name;
                }
            }
        }
        
        return array_unique($classes);
    }
    
    /**
     * Конвертация пути к файлу в имя класса
     */
    protected function _file_to_class_name($file_path)
    {
        $file_path = str_replace('\\', '/', $file_path);
        $file_name = basename($file_path, '.php');
        
        if (strpos($file_path, 'classes/Task/') !== FALSE) {
            return 'Task_' . $file_name;
        }
        
        return NULL;
    }
    
    /**
     * Валидация cron расписания
     */
    protected function _validate_cron_schedule($schedule)
    {
        $parts = preg_split('/\s+/', trim($schedule));
        return count($parts) === 5;
    }
    
    /**
     * Удаление задачи
     */
    public function action_delete()
    {
        $task_name = $this->request->param('id');
       if ($this->request->method() === 'POST') {
          
		   $this->_delete_task($task_name);
        } else {
			
            $this->_show_delete_confirmation($task_name);
        }
    }
    
    /**
     * Показать подтверждение удаления
     */
    protected function _show_delete_confirmation($task_name)
    {
        try {
            $scheduler = Scheduler::factory();
            $task = $scheduler->get_task($task_name);
   
            if (!$task) {
                throw new Exception("Task not found: {$task_name}");
            }
            
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/delete')
                ->set('task_name', $task_name)
                ->set('task', $task);
                
        } catch (Exception $e) {
            $this->template->content = View::factory('scheduler/'.$this->viewDir.'/error')
                ->set('error', $e->getMessage());
        }
    }
    
    /**
     * Удалить задачу
     */
    protected function _delete_task($task_name)
    {
   
	 try {
			$scheduler = Scheduler::factory();
            $task = $scheduler->get_task($task_name);
         
            if (!$task) {
                throw new Exception("Task not found: {$task_name}");
            }
            
            $db = $this->_get_db();
            $task_id = $task['db_task']['id'];
        
            // Удаляем логи
            $db->query(Database::DELETE, __("DELETE FROM `scheduler_logs` WHERE task_id = :task_id", 
                      array(':task_id' => $task_id)));
            
            // Удаляем состояние
            $db->query(Database::DELETE, __("DELETE FROM `scheduler_state` WHERE task_id = :task_id", 
                      array(':task_id' => $task_id)));
            
            // Удаляем задачу
            $db->query(Database::DELETE, __("DELETE FROM `scheduler_tasks` WHERE id = :task_id", 
                      array(':task_id' => $task_id)));
     
            
         
        } catch (Exception $e) {
			$this->template->content = View::factory('scheduler/'.$this->viewDir.'/error')
                ->set('error', $e->getMessage());
        }
		$this->redirect('scheduler');
    }
}
