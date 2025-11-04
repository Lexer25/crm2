<?php defined('SYSPATH') or die('No direct script access.');

class Backup_Database_Firebird {
    
    protected $_config;
    protected $_db_config;
    
    public function __construct($config)
    {
        $this->_config = $config;
        $this->_db_config = $config['database'];
        
        // Создаем директорию для бэкапов если не существует
        if ( ! is_dir($this->_config['backup']['path']))
        {
            mkdir($this->_config['backup']['path'], 0755, TRUE);
        }
    }
    
    public function create_backup($description = '')
    {
 		try {
            $filename = $this->_generate_filename($description);
            $backup_path = $this->_config['backup']['path'].$filename;
			
			            
            // Команда для создания бэкапа Firebird
            $command = $this->_build_backup_command($backup_path);
            
			
            // Выполняем команду
            exec($command, $output, $return_var);
           
            if ($return_var !== 0)
            {
                throw new Backup_Exception('Backup creation failed. Return code: :code', array(
                    ':code' => $return_var
                ));
            }
            
            // Если включено сжатие, сжимаем файл
            if ($this->_config['backup']['compress'])
            {
                $backup_path = $this->_compress_backup($backup_path);
            }
            
            // Очищаем старые бэкапы
            $this->cleanup();
            
            return array(
                'filename' => basename($backup_path),
                'path' => $backup_path,
                'size' => filesize($backup_path),
                'created' => time()
            );
            
        } catch (Exception $e) {
            throw new Backup_Exception('Backup creation error: :error', array(
                ':error' => $e->getMessage()
            ));
        }
    }
    
    public function restore_backup($filename)
    {
        try {
            $backup_path = $this->_config['backup']['path'].$filename;
            
            if ( ! file_exists($backup_path))
            {
                throw new Backup_Exception('Backup file not found: :file', array(
                    ':file' => $backup_path
                ));
            }
            
            // Если файл сжат, распаковываем
            if (pathinfo($backup_path, PATHINFO_EXTENSION) === 'gz')
            {
                $backup_path = $this->_decompress_backup($backup_path);
            }
            
            // Команда для восстановления Firebird
            $command = $this->_build_restore_command($backup_path);
            
            // Выполняем команду
            exec($command, $output, $return_var);
            
            if ($return_var !== 0)
            {
                throw new Backup_Exception('Restore failed. Return code: :code', array(
                    ':code' => $return_var
                ));
            }
            
            // Удаляем временный распакованный файл
            if (pathinfo($filename, PATHINFO_EXTENSION) === 'gz')
            {
                unlink($backup_path);
            }
            
            return TRUE;
            
        } catch (Exception $e) {
            throw new Backup_Exception('Restore error: :error', array(
                ':error' => $e->getMessage()
            ));
        }
    }
    
    public function list_backups()
    {
        $backups = array();
        $pattern = $this->_config['backup']['path'].$this->_config['backup']['prefix'].'*';
        
        $files = glob($pattern);
        
        foreach ($files as $file) {
            $backups[] = array(
                'filename' => basename($file),
                'path' => $file,
                'size' => filesize($file),
                'modified' => filemtime($file)
            );
        }
        
        // Сортируем по дате изменения (новые сверху)
        usort($backups, function($a, $b) {
            return $b['modified'] - $a['modified'];
        });
        
        return $backups;
    }
    
    public function delete_backup($filename)
    {
        $backup_path = $this->_config['backup']['path'].$filename;
        
        if (file_exists($backup_path))
        {
            return unlink($backup_path);
        }
        
        return FALSE;
    }
    
    public function cleanup()
    {
        $backups = $this->list_backups();
        $max_files = $this->_config['backup']['max_files'];
        
        if (count($backups) > $max_files)
        {
            $to_delete = array_slice($backups, $max_files);
            
            foreach ($to_delete as $backup) {
                $this->delete_backup($backup['filename']);
            }
        }
    }
    
    protected function _build_backup_command($backup_path)
    {
        $db = $this->_db_config;
                
		$command=__('":gbak" -b -v -user :user -password :password ":host::database" ":backup_path"', array(
			':gbak'=>$db['gbak'],
			':user'=>$db['username'],
			':password'=>$db['password'],
			':host'=>$db['host'],
			':database'=>$db['database'],
			':backup_path'=>$backup_path,
		
		));
        //echo Debug::vars('170', $command);exit;
        return $command;
    }
    
    protected function _build_restore_command($backup_path)
    {
        $db = $this->_db_config;
        
        // Восстановление из бэкапа Firebird
        // Сначала удаляем старую базу если существует
        if (file_exists($db['database']))
        {
            unlink($db['database']);
        }
        
        $command = "gbak -c -v -user {$db['username']} -password {$db['password']} ";
        $command .= "{$backup_path} {$db['database']}";
		
		$command=__('":gbak" -c -v -user :user -password :password :backup_path :database ', array(
			':gbak'=>$db['gbak'],
			':user'=>$db['username'],
			':password'=>$db['password'],
			':database'=>$db['database'].'111',
			':backup_path'=>$backup_path,
			));
			
        echo Debug::vars('203', BACKUP_PATH);
        echo Debug::vars('204', $command);exit;
        return $command;
    }
    
    protected function _generate_filename($description = '')
    {
        $prefix = $this->_config['backup']['prefix'];
        $timestamp = date('Y-m-d_H-i-s');
        $desc = $description ? '_'.preg_replace('/[^a-zA-Z0-9_-]/', '_', $description) : '';
        
        return $prefix.$timestamp.$desc.'.fbk';
    }
    
    protected function _compress_backup($backup_path)
    {
        $compressed_path = $backup_path.'.gz';
        
        // Читаем исходный файл
        $data = file_get_contents($backup_path);
        
        // Сжимаем
        $compressed = gzencode($data, 9);
        
        // Сохраняем сжатый файл
        file_put_contents($compressed_path, $compressed);
        
        // Удаляем исходный несжатый файл
        unlink($backup_path);
        
        return $compressed_path;
    }
    
    protected function _decompress_backup($backup_path)
    {
        $decompressed_path = str_replace('.gz', '', $backup_path);
        
        // Читаем сжатый файл
        $compressed = file_get_contents($backup_path);
        
        // Распаковываем
        $data = gzdecode($compressed);
        
        // Сохраняем распакованный файл
        file_put_contents($decompressed_path, $data);
        
        return $decompressed_path;
    }
}
