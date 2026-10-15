<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auditlog extends Controller_Template{

public function before()
    {
        parent::before();
        // Проверка авторизации
        $this->user = Auth::instance()->get_user();
        if (!$this->user) {
            HTTP::redirect('auth/login');
        }
    }

    public function action_index($filter = null)
{
    $auditlog = new Model_AuditLog();
    $list = $auditlog->getAuditLog();
    
    // Раскодируем русские символы из WIN1251 в UTF-8
    foreach ($list as &$record) {
        foreach ($record as $key => &$value) {
            if ($value !== null && !empty($value) && is_string($value)) {
                $decoded = @iconv('Windows-1251', 'UTF-8//IGNORE', $value);
                if ($decoded !== false && $decoded != $value) {
                    $value = $decoded;
                }
            }
        }
    }
    
    //echo Debug::vars('7', $list);exit;
    $this->template->content = View::factory('auditlog/view')
        // ->bind('mode', $mode)
        // ->bind('people', $list)
         ->bind('alert', $alert)
         ->bind('arrAlert', $arrAlert)
        // ->bind('filter', $filter)
        // ->bind('user', $user)
        // ->bind('org', $org)
        ->bind('audit_data', $list)
        ->bind('pagination', $pagination);
}

    public function action_details()
{
    $this->auto_render = false;
    $log_tables_id = $this->request->param('id');
    
    if (!$log_tables_id) {
        echo json_encode(array('error' => 'Missing log_tables_id'));
        return;
    }
    
    $auditlog = new Model_AuditLog();
    $details = $auditlog->getAuditLogDetails($log_tables_id);
    
    // Раскодируем русские символы из WIN1251 в UTF-8
    foreach ($details as &$record) {
        foreach ($record as $key => &$value) {
            if ($value !== null && !empty($value) && is_string($value)) {
                $decoded = @iconv('Windows-1251', 'UTF-8//IGNORE', $value);
                if ($decoded !== false && $decoded != $value) {
                    $value = $decoded;
                }
            }
        }
    }
    
    echo json_encode($details);
}
}