<?php
/**
 * CLI Scheduler for Kohana 3.3
 * Usage: php scheduler.php [status|run]
 */

// Bootstrap Kohana
require 'index.php';

// Get command line arguments
$action = 'run';
if (isset($_SERVER['argv'][1]))
{
    $action = $_SERVER['argv'][1];
}

// Create and execute scheduler
try
{
    $scheduler = Scheduler::factory();
    
    switch ($action)
    {
        case 'status':
            $status = $scheduler->get_status();
            display_status($status);
            break;
            
        case 'run':
        default:
            echo "Starting scheduler...\n";
            $result = $scheduler->run();
            echo $result ? "Scheduler completed successfully.\n" : "Scheduler is already running.\n";
            break;
    }
}
catch (Exception $e)
{
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}

/**
 * Display tasks status
 */
function display_status($status)
{
    echo "Scheduler Tasks Status:\n";
    echo "=======================\n\n";
    
    foreach ($status as $task_name => $task_status)
    {
        echo "Task: {$task_name}\n";
        echo "Schedule: {$task_status['schedule']}\n";
        echo "Last run: " . ($task_status['last_run'] ? date('Y-m-d H:i:s', $task_status['last_run']) : 'Never') . "\n";
        echo "Next run: " . ($task_status['next_run'] ? date('Y-m-d H:i:s', $task_status['next_run']) : 'Unknown') . "\n";
        echo "Is due: " . ($task_status['is_due'] ? 'Yes' : 'No') . "\n";
        echo "---\n";
    }
}