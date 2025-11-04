<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Backup extends Controller {
    
    public function before()
    {
        parent::before();
        
        // Добавьте здесь проверку прав доступа!
        // if ( ! $this->_check_access()) {
        //     throw new HTTP_Exception_403('Access denied');
        // }
    }
    
    public function action_index()
    {
        $backup = Backup::instance();
        
        try {
            $result = $backup->create('Manual backup from web interface');
           
            $this->response->body(json_encode(array(
                'status' => 'success',
                'message' => 'Backup created successfully',
                'data' => $result
            )));
	    } catch (Exception $e) {
            $this->response->body(json_encode(array(
                'status' => 'error',
                'message' => $e->getMessage()
            )));
	    }
    }
    
    public function action_list()
    {
        $backup = Backup::instance();
        $backups = $backup->list_backups();
        
        $this->response->body(json_encode(array(
            'status' => 'success',
            'data' => $backups
        )));
    }
    
    public function action_restore()
    {
        $filename = $this->request->param('filename');

        if ( ! $filename)
        {
            $this->response->body(json_encode(array(
                'status' => 'error',
                'message' => 'Filename required'
            )));
            return;
        }
        
        $backup = Backup::instance();
        
        try {
            $result = $backup->restore($filename);
            
            $this->response->body(json_encode(array(
                'status' => 'success',
                'message' => 'Database restored successfully'
            )));
            
        } catch (Exception $e) {
            $this->response->body(json_encode(array(
                'status' => 'error',
                'message' => $e->getMessage()
            )));
        }
    }
    
    public function action_delete()
    {
        $filename = $this->request->param('filename');
		echo Debug::vars('80', $filename);exit;      
        if ( ! $filename)
        {
            $this->response->body(json_encode(array(
                'status' => 'error',
                'message' => 'Filename required'
            )));
            return;
        }
        
        $backup = Backup::instance();
        
        try {
            $result = $backup->delete_backup($filename);
            
            $this->response->body(json_encode(array(
                'status' => 'success',
                'message' => 'Backup deleted successfully'
            )));
            
        } catch (Exception $e) {
            $this->response->body(json_encode(array(
                'status' => 'error',
                'message' => $e->getMessage()
            )));
        }
    }
    
    protected function _check_access()
    {
        // Реализуйте проверку прав доступа
        // Например, проверка сессии или токена
        return TRUE;
    }
}
