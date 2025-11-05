<?php defined('SYSPATH') or die('No direct script access.');

class Model_Scheduler_Task extends ORM {

  protected $_table_name = 'scheduler_tasks';
    protected $_primary_key = 'id';
    
    protected $_has_many = array(
        'logs' => array(
            'model' => 'Scheduler_Log',
            'foreign_key' => 'task_id',
        ),
        'parameters' => array(
            'model' => 'Scheduler_Parameter',
            'foreign_key' => 'task_id',
        ),
    );
    
    protected $_has_one = array(
        'state' => array(
            'model' => 'Scheduler_State',
            'foreign_key' => 'task_id',
        ),
    );
    
    public function __construct($id = NULL)
    {
        // Автоматическая установка таблиц при первом использовании
        Scheduler_Install::auto_install();
        
        parent::__construct($id);
    }
    
    public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 255)),
            ),
            'class' => array(
                array('not_empty'),
                array('max_length', array(':value', 255)),
            ),
            'schedule' => array(
                array('not_empty'),
                array('max_length', array(':value', 50)),
            ),
        );
    }
    
    public function filters()
    {
        return array(
            'enabled' => array(
                array('intval'),
            ),
        );
    }
    
    /**
     * Получить задачу по имени
     */
    public static function get_by_name($name)
    {
        return ORM::factory('Scheduler_Task')
            ->where('name', '=', $name)
            ->find();
    }
    
    /**
     * Получить все активные задачи
     */
    public static function get_enabled_tasks()
    {
        return ORM::factory('Scheduler_Task')
            ->where('enabled', '=', 1)
            ->find_all();
    }
    
    /**
     * Создать или обновить задачу из конфигурации
     */
    public static function sync_from_config($name, $config)
    {
        $task = self::get_by_name($name);
        
        if (!$task->loaded())
        {
            $task = ORM::factory('Scheduler_Task');
            $task->name = $name;
            $task->created_at = date('Y-m-d H:i:s');
        }
        
        $task->class = $config['class'];
        $task->schedule = $config['schedule'];
        $task->enabled = (int)$config['enabled'];
        $task->updated_at = date('Y-m-d H:i:s');
        
        return $task->save();
    }
	
	/**
     * Получить параметры задачи как массив
     */
    public function get_parameters()
    {
        if (!empty($this->parameters))
        {
            return json_decode($this->parameters, TRUE);
        }
        
        return array();
    }
    
    /**
     * Установить параметры задачи
     */
    public function set_parameters(array $parameters)
    {
        $this->parameters = json_encode($parameters);
        return $this;
    }
    
    /**
     * Получить параметр задачи
     */
    public function get_parameter($name, $default = NULL)
    {
        $parameters = $this->get_parameters();
        return isset($parameters[$name]) ? $parameters[$name] : $default;
    }
    
    /**
     * Установить параметр задачи
     */
    public function set_parameter($name, $value)
    {
        $parameters = $this->get_parameters();
        $parameters[$name] = $value;
        return $this->set_parameters($parameters);
    }
    
    /**
     * Получить шаблоны параметров
     */
    public function get_parameter_templates()
    {
        return $this->parameters->find_all();
    }
    
    /**
     * Создать или обновить задачу с параметрами
     */
    public static function sync_from_config($name, $config)
    {
        $task = self::get_by_name($name);
        
        if (!$task->loaded())
        {
            $task = ORM::factory('Scheduler_Task');
            $task->name = $name;
            $task->created_at = date('Y-m-d H:i:s');
        }
        
        $task->class = $config['class'];
        $task->schedule = $config['schedule'];
        $task->enabled = (int)$config['enabled'];
        
        // Сохраняем параметры из конфигурации
        if (isset($config['parameters']) && is_array($config['parameters']))
        {
            $task->set_parameters($config['parameters']);
        }
        
        $task->updated_at = date('Y-m-d H:i:s');
        
        return $task->save();
    }
    
    /**
     * Получить задачи с параметрами
     */
    public static function get_tasks_with_parameters()
    {
        return ORM::factory('Scheduler_Task')
            ->where('enabled', '=', 1)
            ->find_all();
    }
	
	/**
     * Автоматическая регистрация задач при первом запуске
     */
    public static function auto_register_tasks()
    {
        $config = Kohana::$config->load('scheduler');
        $auto_tasks = $config->get('auto_register_tasks', array());
        $registered = 0;
        
        foreach ($auto_tasks as $name => $task_config)
        {
            $task = self::get_by_name($name);
            
            if (!$task->loaded())
            {
                $task = ORM::factory('Scheduler_Task');
                $task->name = $name;
                $task->class = $task_config['class'];
                $task->schedule = $task_config['schedule'];
                $task->enabled = (int)$task_config['enabled'];
                
                if (isset($task_config['parameters']))
                {
                    $task->set_parameters($task_config['parameters']);
                }
                
                $task->created_at = date('Y-m-d H:i:s');
                $task->updated_at = date('Y-m-d H:i:s');
                
                if ($task->save())
                {
                    $registered++;
                    
                    // Создаем начальное состояние задачи
                    Model_Scheduler_State::init_state($task->id);
                }
            }
        }
        
        return $registered;
    }
    
    /**
     * Получить все активные задачи из базы данных
     */
    public static function get_enabled_tasks()
    {
        // Авторегистрация при первом обращении
        self::check_auto_registration();
        
        return ORM::factory('Scheduler_Task')
            ->where('enabled', '=', 1)
            ->find_all();
    }
    
    /**
     * Проверка и выполнение авторегистрации
     */
    protected static function check_auto_registration()
    {
        $config = Kohana::$config->load('scheduler');
        
        if ($config->get('auto_register_tasks'))
        {
            $lock_file = APPPATH.'cache/scheduler_auto_register.lock';
            
            // Проверяем, не выполнялась ли уже авторегистрация
            if (!file_exists($lock_file))
            {
                $registered = self::auto_register_tasks();
                
                if ($registered > 0)
                {
                    Kohana::$log->add(Log::INFO, "Auto-registered {$registered} scheduler tasks");
                }
                
                // Создаем файл-маркер, что авторегистрация выполнена
                file_put_contents($lock_file, date('Y-m-d H:i:s'));
            }
        }
    }
    
    /**
     * Создать новую задачу
     */
    public static function create_task($name, $class, $schedule, $enabled = TRUE, $parameters = array())
    {
        $task = self::get_by_name($name);
        
        if ($task->loaded())
        {
            throw new Exception("Task already exists: {$name}");
        }
        
        if (!class_exists($class))
        {
            throw new Exception("Task class not found: {$class}");
        }
        
        $task = ORM::factory('Scheduler_Task');
        $task->name = $name;
        $task->class = $class;
        $task->schedule = $schedule;
        $task->enabled = (int)$enabled;
        $task->set_parameters($parameters);
        $task->created_at = date('Y-m-d H:i:s');
        $task->updated_at = date('Y-m-d H:i:s');
        
        if ($task->save())
        {
            // Создаем начальное состояние
            Model_Scheduler_State::init_state($task->id);
            return $task;
        }
        
        return FALSE;
    }
    
    /**
     * Обновить задачу
     */
    public function update_task($schedule = NULL, $enabled = NULL, $parameters = NULL)
    {
        if ($schedule !== NULL)
        {
            $this->schedule = $schedule;
        }
        
        if ($enabled !== NULL)
        {
            $this->enabled = (int)$enabled;
        }
        
        if ($parameters !== NULL)
        {
            $this->set_parameters($parameters);
        }
        
        $this->updated_at = date('Y-m-d H:i:s');
        
        return $this->save();
    }
    
    /**
     * Удалить задачу и связанные данные
     */
    public function delete_task()
    {
        $task_id = $this->id;
        
        // Удаляем логи
        DB::delete('scheduler_logs')
            ->where('task_id', '=', $task_id)
            ->execute();
            
        // Удаляем состояние
        DB::delete('scheduler_state')
            ->where('task_id', '=', $task_id)
            ->execute();
            
        // Удаляем параметры
        DB::delete('scheduler_parameters')
            ->where('task_id', '=', $task_id)
            ->execute();
            
        // Удаляем саму задачу
        return parent::delete();
    }
}
