<?php defined('SYSPATH') or die('No direct script access.');

class Minion_Task_SchedulerInstall extends Minion_Task {

    protected $_options = array(
        'install' => NULL,
        'uninstall' => NULL,
        'status' => NULL,
    );

    protected function _execute(array $params)
    {
        if ($params['install'])
        {
            return $this->_install();
        }
        
        if ($params['uninstall'])
        {
            return $this->_uninstall();
        }
        
        if ($params['status'])
        {
            return $this->_status();
        }
        
        Minion_CLI::write("Use --install, --uninstall or --status", 'yellow');
        return 1;
    }
    
    protected function _install()
    {
        try
        {
            Scheduler_Install::install();
            Minion_CLI::write("Scheduler tables installed successfully", 'green');
            
            // Авторегистрация задач после установки
            $registered = Model_Scheduler_Task::auto_register_tasks();
            if ($registered > 0)
            {
                Minion_CLI::write("Auto-registered {$registered} tasks", 'green');
            }
            
            return 0;
        }
        catch (Exception $e)
        {
            Minion_CLI::write("Installation failed: ".$e->getMessage(), 'red');
            return 1;
        }
    }
    
    protected function _uninstall()
    {
        if (Minion_CLI::read("Are you sure you want to uninstall scheduler? All data will be lost! (yes/no)", array('yes', 'no')) != 'yes')
        {
            Minion_CLI::write("Uninstall cancelled", 'yellow');
            return 1;
        }
        
        try
        {
            Scheduler_Install::uninstall();
            Minion_CLI::write("Scheduler tables uninstalled successfully", 'green');
            return 0;
        }
        catch (Exception $e)
        {
            Minion_CLI::write("Uninstall failed: ".$e->getMessage(), 'red');
            return 1;
        }
    }
    
    protected function _status()
    {
        $is_installed = Scheduler_Install::is_installed();
        
        if ($is_installed)
        {
            Minion_CLI::write("Scheduler is INSTALLED", 'green');
            
            // Показываем статистику таблиц
            $tables = array('scheduler_tasks', 'scheduler_logs', 'scheduler_state', 'scheduler_parameters');
            
            foreach ($tables as $table)
            {
                try
                {
                    $count = DB::query(Database::SELECT, "SELECT COUNT(*) as count FROM `{$table}`")
                        ->execute()
                        ->get('count');
                    
                    Minion_CLI::write("  {$table}: {$count} records");
                }
                catch (Exception $e)
                {
                    Minion_CLI::write("  {$table}: ERROR - ".$e->getMessage(), 'red');
                }
            }
        }
        else
        {
            Minion_CLI::write("Scheduler is NOT INSTALLED", 'red');
            Minion_CLI::write("Run: php minion schedulerinstall --install", 'yellow');
        }
        
        return 0;
    }
}
