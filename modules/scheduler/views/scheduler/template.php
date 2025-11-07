<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    
    <!-- Styles -->
    <?php foreach ($styles as $style): ?>
        <link href="<?= $style ?>" rel="stylesheet">
    <?php endforeach; ?>
    
    <style>
        .task-status-success { color: #198754; }
        .task-status-error { color: #dc3545; }
        .task-status-pending { color: #6c757d; }
        .task-enabled { color: #198754; }
        .task-disabled { color: #dc3545; }
        .log-success { background-color: #d1e7dd; }
        .log-error { background-color: #f8d7da; }
        .stats-card { transition: transform 0.2s; }
        .stats-card:hover { transform: translateY(-2px); }
        .task-card { border-left: 4px solid #0d6efd; }
        .task-card-success { border-left-color: #198754; }
        .task-card-error { border-left-color: #dc3545; }
        .task-card-warning { border-left-color: #ffc107; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/scheduler">
                <i class="fas fa-tasks"></i> Task Scheduler
            </a>
            
            <div class="navbar-nav">
                <a class="nav-link" href="/scheduler">
                    <i class="fas fa-list"></i> Tasks
                </a>
                <a class="nav-link" href="/scheduler/logs">
                    <i class="fas fa-history"></i> Execution Logs
                </a>
                <a class="nav-link" href="/scheduler/stats">
                    <i class="fas fa-chart-bar"></i> Statistics
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?= $content ?>
    </div>

    <!-- Scripts -->
    <?php foreach ($scripts as $script): ?>
        <script src="<?= $script ?>"></script>
    <?php endforeach; ?>
    
    <script>
    $(document).ready(function() {
        // AJAX запуск задачи
        $('.run-task-btn').on('click', function() {
            var btn = $(this);
            var taskName = btn.data('task');
            
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Running...');
            
            $.post('/scheduler/ajax/run_task', {task_name: taskName}, function(response) {
                if (response.success) {
                    btn.html('<i class="fas fa-check"></i> Success');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    btn.html('<i class="fas fa-times"></i> Failed').removeClass('btn-primary').addClass('btn-danger');
                }
            }).fail(function() {
                btn.html('<i class="fas fa-times"></i> Error').removeClass('btn-primary').addClass('btn-danger');
            });
        });
        
        // Переключение состояния задачи
        $('.task-toggle').on('change', function() {
            var checkbox = $(this);
            var taskName = checkbox.data('task');
            var enabled = checkbox.is(':checked');
            
            $.post('/scheduler/ajax/toggle_task', {
                task_name: taskName,
                enabled: enabled
            }, function(response) {
                if (!response.success) {
                    checkbox.prop('checked', !enabled);
                    alert('Error: ' + response.message);
                }
            });
        });
        
        // Автообновление статуса
        function updateTaskStatus(taskName, element) {
            $.post('/scheduler/ajax/get_task_status', {task_name: taskName}, function(response) {
                if (response.success && response.task) {
                    var task = response.task;
                    var statusHtml = '';
                    
                    if (task.last_status === 'success') {
                        statusHtml = '<span class="badge bg-success">Success</span>';
                    } else if (task.last_status === 'error') {
                        statusHtml = '<span class="badge bg-danger">Error</span>';
                    } else {
                        statusHtml = '<span class="badge bg-secondary">Never run</span>';
                    }
                    
                    element.html(statusHtml);
                }
            });
        }
        
        // Обновляем статус каждые 30 секунд
        setInterval(function() {
            $('.task-status').each(function() {
                var taskName = $(this).data('task');
                updateTaskStatus(taskName, $(this));
            });
        }, 30000);
    });
    </script>
</body>
</html>