<?php defined('SYSPATH') or die('No direct script access.');

class Backup {
    
    protected $_config;
    protected $_driver;
    
    public static function instance($config_group = 'default')
    {
        static $instances = array();
        
        if ( ! isset($instances[$config_group]))
        {
            $config = Kohana::$config->load('backup')->get($config_group);
            $instances[$config_group] = new Backup($config);
        }
        
        return $instances[$config_group];
    }
    
	public function __construct($config)
	{
		$this->_config = $config;
		
		$driver_class = 'Backup_Database_'.ucfirst($this->_config['database']['type']);
		
		if ( ! class_exists($driver_class))
		{
			// Попробуем загрузить класс вручную
			$driver_file = 'Database/'.ucfirst($this->_config['database']['type']);
			if (Kohana::find_file('classes', $driver_file))
			{
				require_once Kohana::find_file('classes', $driver_file);
			}
			
			if ( ! class_exists($driver_class))
			{
				throw new Backup_Exception('Backup driver :driver not found', array(
					':driver' => $driver_class
				));
			}
		}
		
		$this->_driver = new $driver_class($this->_config);
	}
    
    public function create($description = '')
    {
        return $this->_driver->create_backup($description);
    }
    
    public function restore($filename)
    {
        return $this->_driver->restore_backup($filename);
    }
    
    public function list_backups()
    {
        return $this->_driver->list_backups();
    }
    
    public function delete_backup($filename)
    {
        return $this->_driver->delete_backup($filename);
    }
    
    public function cleanup()
    {
        return $this->_driver->cleanup();
    }
}
