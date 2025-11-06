<?php defined('SYSPATH') or die('No direct script access.');

class Scheduler_Install {

    /**
     * Создание таблиц для планировщика
     */
    public static function install()
    {
        $db = Database::instance('scheduler_db');
        $db->begin();
        echo Debug::vars('12', $db);exit;
        try
        {
            // Таблица задач
            DB::query(NULL, "
                CREATE TABLE IF NOT EXISTS `scheduler_tasks` (
                    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
                    `name` VARCHAR(255) NOT NULL UNIQUE,
                    `class` VARCHAR(255) NOT NULL,
                    `schedule` VARCHAR(50) NOT NULL,
                    `parameters` TEXT NULL,
                    `enabled` TINYINT(1) DEFAULT 1,
                    `created_at` DATETIME NOT NULL,
                    `updated_at` DATETIME NOT NULL
                )
            ")->execute();
            
            // Таблица логов
            DB::query(NULL, "
                CREATE TABLE IF NOT EXISTS `scheduler_logs` (
                    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
                    `task_id` INTEGER NOT NULL,
                    `status` VARCHAR(20) NOT NULL,
                    `duration` FLOAT NOT NULL,
                    `memory_usage` INTEGER NOT NULL,
                    `output` TEXT NULL,
                    `parameters` TEXT NULL,
                    `created_at` DATETIME NOT NULL
                )
            ")->execute();
            
            // Таблица состояния
            DB::query(NULL, "
                CREATE TABLE IF NOT EXISTS `scheduler_state` (
                    `task_id` INTEGER PRIMARY KEY,
                    `last_run` DATETIME NULL,
                    `next_run` DATETIME NULL,
                    `last_duration` FLOAT NULL,
                    `last_status` VARCHAR(20) NULL,
                    `total_runs` INTEGER DEFAULT 0,
                    `total_errors` INTEGER DEFAULT 0,
                    `updated_at` DATETIME NOT NULL
                )
            ")->execute();
            
            // Таблица параметров
            DB::query(NULL, "
                CREATE TABLE IF NOT EXISTS `scheduler_parameters` (
                    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
                    `task_id` INTEGER NOT NULL,
                    `name` VARCHAR(100) NOT NULL,
                    `value` TEXT NULL,
                    `type` VARCHAR(20) DEFAULT 'string',
                    `description` TEXT NULL,
                    `is_required` TINYINT(1) DEFAULT 0,
                    `created_at` DATETIME NOT NULL,
                    `updated_at` DATETIME NOT NULL
                )
            ")->execute();
            
            // Создаем индексы
            DB::query(NULL, "CREATE INDEX IF NOT EXISTS `idx_scheduler_logs_task_id` ON `scheduler_logs` (`task_id`)")->execute();
            DB::query(NULL, "CREATE INDEX IF NOT EXISTS `idx_scheduler_logs_created_at` ON `scheduler_logs` (`created_at`)")->execute();
            DB::query(NULL, "CREATE INDEX IF NOT EXISTS `idx_scheduler_logs_status` ON `scheduler_logs` (`status`)")->execute();
            DB::query(NULL, "CREATE INDEX IF NOT EXISTS `idx_scheduler_parameters_task_id` ON `scheduler_parameters` (`task_id`)")->execute();
            DB::query(NULL, "CREATE UNIQUE INDEX IF NOT EXISTS `idx_scheduler_parameters_unique` ON `scheduler_parameters` (`task_id`, `name`)")->execute();
            
            $db->commit();
            
            return TRUE;
        }
        catch (Exception $e)
        {
            $db->rollback();
            throw $e;
        }
    }
    
    /**
     * Удаление таблиц планировщика
     */
    public static function uninstall()
    {
        $tables = array(
            'scheduler_parameters',
            'scheduler_state', 
            'scheduler_logs',
            'scheduler_tasks',
        );
        
        foreach ($tables as $table)
        {
            try
            {
                DB::query(NULL, "DROP TABLE IF EXISTS `{$table}`")->execute();
            }
            catch (Exception $e)
            {
                // Игнорируем ошибки при удалении
            }
        }
        
        return TRUE;
    }
    
    /**
     * Проверка установлены ли таблицы
     */
    public static function is_installed()
    {
        try
        {
            // Проверяем существование основной таблицы
            $result = DB::query(NULL, "SELECT 1 FROM `scheduler_tasks` LIMIT 1")->execute();
            return TRUE;
        }
        catch (Exception $e)
        {
            return FALSE;
        }
    }
    
    /**
     * Автоматическая установка при необходимости
     */
    public static function auto_install()
    {
        if (!self::is_installed())
        {
            try
            {
                self::install();
                Kohana::$log->add(Log::INFO, 'Scheduler tables installed successfully');
                return TRUE;
            }
            catch (Exception $e)
            {
                Kohana::$log->add(Log::ERROR, 'Scheduler installation failed: '.$e->getMessage());
                return FALSE;
            }
        }
        
        return TRUE;
    }
}
