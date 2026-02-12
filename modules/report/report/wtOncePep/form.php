<?php
// Устанавливаем значения по умолчанию

$date_from = isset($params['report_name']) ? $params['date_from'] : 'example7';
$date_from = isset($params['date_from']) ? $params['date_from'] : date('Y-m-01');
$date_to = isset($params['date_to']) ? $params['date_to'] : date('Y-m-d');
$department = isset($params['department']) ? $params['department'] : '';

?>

<form method="get" action="<?php echo URL::site('reports/'.$report_name.'/generate'); ?>" class="report-form">
    <input type="hidden" name="report" value="<?php echo $report_name; ?>">
    
    <div class="form-group">
        <label for="date_from">Date From:</label>
        <input type="date" name="date_from" id="date_from" 
               value="<?php echo HTML::chars($date_from); ?>" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="date_to">Date To:</label>
        <input type="date" name="date_to" id="date_to" 
               value="<?php echo HTML::chars($date_to); ?>" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="department">Department:</label>
        <select name="department" id="department" class="form-control">
            <option value="">All Departments</option>
            <option value="sales" <?php echo $department == 'sales' ? 'selected' : ''; ?>>Sales</option>
            <option value="marketing" <?php echo $department == 'marketing' ? 'selected' : ''; ?>>Marketing</option>
            <option value="support" <?php echo $department == 'support' ? 'selected' : ''; ?>>Support</option>
        </select>
    </div>
    
    <div class="form-actions">
        <button type="submit" name="action" value="prepare" class="btn btn-primary">
            <i class="icon-refresh"></i> Prepare Report
        </button>
    </div>
</form>
