<?php defined('SYSPATH') OR die('No direct access allowed.');


class CardGuestorder
{
    protected $_table = 'GUESTCARDS';
    public $id_card;
    public $id_db;
    public $id_binding;
    public $id_guestorder;
    public $createdat;

    public $actionResult = 0;
    
    public function __construct($id_card = null, $id_db = null, $id_binding = null, $id_guestorder = null)
    {
        if ($id_card !== null) {
            $this->id_card = $id_card;
            $this->id_db = $id_db;
            $this->id_binding = $id_binding;
            $this->id_guestorder = $id_guestorder;
        }
    }
    
    public function add()
    {
        $sql = __('INSERT INTO '.$this->_table.' (id_card, id_db, id_binding, id_guestorder, createdat) 
                VALUES (\':id_card\', :id_db, :id_binding, :id_guestorder, \':createdat\')', array
            (
                ':id_card'      => $this->id_card,
                ':id_db'        => $this->id_db,
                ':id_binding'   => $this->id_binding ?: 'NULL',
                ':id_guestorder' => $this->id_guestorder ?: 'NULL',
                ':createdat'    => date('Y-m-d H:i:s')
            ));
        
        try {
            DB::query(Database::INSERT, $sql)
                ->execute(Database::instance('fb'));
            
            $this->actionResult = 0;
            return 0;
                
        } catch (Exception $e) {
            $this->actionResult = 3;
            Log::instance()->add(Log::DEBUG, 'Ошибка вставки в card_guestorders: '.$e->getMessage());
            return 3; 
        }
    }
    
    public function addRecord($id_card, $id_db, $id_binding = null, $id_guestorder = null)
    {
        $this->id_card = $id_card;
        $this->id_db = $id_db;
        $this->id_binding = $id_binding;
        $this->id_guestorder = $id_guestorder;
        
        return $this->add();
    }
    
    public function exists($id_card, $id_db, $id_binding = null, $id_guestorder = null)
    {
        $sql = 'SELECT COUNT(*) as cnt FROM '.$this->_table.' 
                WHERE id_card = \''.$id_card.'\' 
                AND id_db = '.$id_db;
        
        if ($id_binding !== null) {
            $sql .= ' AND id_binding = '.$id_binding;
        }
        
        if ($id_guestorder !== null) {
            $sql .= ' AND id_guestorder = '.$id_guestorder;
        }
        
        try {
            $count = DB::query(Database::SELECT, $sql)
                ->execute(Database::instance('fb'))
                ->get('cnt');
            
            return $count > 0;
            
        } catch (Exception $e) {
            Log::instance()->add(Log::DEBUG, 'Ошибка проверки существования: '.$e->getMessage());
            return false;
        }
    }
    
    public function deleteByCard($id_card, $id_db)
    {
        $sql = 'DELETE FROM '.$this->_table.' 
                WHERE id_card = \''.$id_card.'\' 
                AND id_db = '.$id_db;
        
        try {
            DB::query(Database::DELETE, $sql)
                ->execute(Database::instance('fb'));
            
            return 0;
            
        } catch (Exception $e) {
            Log::instance()->add(Log::DEBUG, 'Ошибка удаления: '.$e->getMessage());
            return 3;
        }
    }
}