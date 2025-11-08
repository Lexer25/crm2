<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URL::site('scheduler');?>">Tasks</a></li>
                <li class="breadcrumb-item active"><?php echo  HTML::chars($task_name) ?></li>
            </ol>
        </nav>

        <div class="row">
            <!-- Основная информация -->
            <div class="col-md-6">
                <div class="card task-card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle"></i> Task Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <tr>
                                <th width="30%">Name:</th>
                                <td><?php echo  HTML::chars($task_name) ?></td>
                            </tr>
                            <tr>
                                <th>Class:</th>
                                <td><code><?php echo  HTML::chars($task['db_task']['class']) ?></code></td>
                            </tr>
                            <tr>
                                <th>Schedule:</th>
                                <td><code><?php echo  HTML::chars($task['schedule']) ?></code></td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <?php if ($task['db_task']['enabled']): ?>
                                        <span class="badge bg-success">Enabled</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Disabled</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Last Status:</th>
                                <td>
                                    <?php if ($task['last_status'] === 'success'): ?>
                                        <span class="badge bg-success">Success</span>
                                    <?php elseif ($task['last_status'] === 'error'): ?>
                                        <span class="badge bg-danger">Error</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Never run</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td><?php echo  HTML::chars($task['db_task']['created_at']) ?></td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td><?php echo  HTML::chars($task['db_task']['updated_at']) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Параметры -->
                <?php if (!empty($task['parameters'])): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-cog"></i> Parameters
                        </h5>
                    </div>
                    <div class="card-body">
                        <pre class="mb-0"><code><?php echo  json_encode($task['parameters'], JSON_PRETTY_PRINT) ?></code></pre>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Статистика и действия -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-line"></i> Execution Statistics
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="border rounded p-2">
                                    <h4 class="text-primary mb-0"><?php echo  $task['run_count'] ?></h4>
                                    <small class="text-muted">Total Runs</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded p-2">
                                    <h4 class="text-danger mb-0"><?php echo  $task['error_count'] ?></h4>
                                    <small class="text-muted">Errors</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded p-2">
                                    <h4 class="text-success mb-0">
                                        <?php echo  $task['run_count'] > 0 ? round(100 - ($task['error_count'] / $task['run_count'] * 100), 1) : 0 ?>%
                                    </h4>
                                    <small class="text-muted">Success Rate</small>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <table class="table table-sm">
                            <tr>
                                <th>Last Run:</th>
                                <td>
                                    <?php echo  $task['last_run'] ? date('Y-m-d H:i:s', $task['last_run']) : 'Never' ?>
                                    <?php if ($task['last_duration']): ?>
                                        <br><small class="text-muted">Duration: <?php echo  $task['last_duration'] ?>s</small>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Next Run:</th>
                                <td><?php echo  $task['next_run'] ? date('Y-m-d H:i:s', $task['next_run']) : 'Unknown' ?></td>
                            </tr>
                            <tr>
                                <th>Is Due:</th>
                                <td>
                                    <?php if ($task['last_run'] && time() >= $task['next_run']): ?>
                                        <span class="badge bg-warning">YES</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">NO</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Действия -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-play-circle"></i> Actions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary run-task-btn" data-task="<?php echo  HTML::chars($task_name) ?>">
                                <i class="fas fa-play"></i> Run Task Now
                            </button>
                            <a href="<?php echo URL::site('scheduler/logs?task_id='.$task['db_task']['id']); ?>" class="btn btn-info">
                                <i class="fas fa-history"></i> View Execution Logs
                            </a>
                            <div class="form-check form-switch">
                                <input class="form-check-input task-toggle" type="checkbox" 
                                       data-task="<?php echo  HTML::chars($task_name) ?>"
                                       <?php echo  $task['db_task']['enabled'] ? 'checked' : '' ?>>
                                <label class="form-check-label">
                                    <?php echo  $task['db_task']['enabled'] ? 'Disable Task' : 'Enable Task' ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Последние логи -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-history"></i> Recent Execution Logs
                </h5>
                <a href="<?php echo URL::site('scheduler/logs?task_id='.$task['db_task']['id']); ?>" class="btn btn-sm btn-outline-primary">
                    View All Logs
                </a>
            </div>
            <div class="card-body p-0">
                <?php if (empty($logs)): ?>
                    <div class="text-center p-4">
                        <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                        <p class="text-muted mb-0">No execution logs found for this task.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Duration</th>
                                    <th>Memory</th>
                                    <th>Output</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($logs as $log): ?>
                                <tr class="<?php echo  $log['status'] === 'success' ? 'log-success' : 'log-error' ?>">
                                    <td><?php echo  HTML::chars($log['created_at']) ?></td>
                                    <td>
                                        <?php if ($log['status'] === 'success'): ?>
                                            <span class="badge bg-success">Success</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Error</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo  HTML::chars($log['duration']) ?>s</td>
                                    <td><?php echo  round($log['memory_usage'] / 1024 / 1024, 2) ?> MB</td>
                                    <td>
                                        <?php if (!empty($log['output'])): ?>
                                            <button class="btn btn-sm btn-outline-secondary" 
                                                    onclick="alert($(this).parent().find('.log-output').text())">
                                                View Output
                                            </button>
                                            <div class="log-output d-none"><?php echo  HTML::chars($log['output']) ?></div>
                                        <?php else: ?>
                                            <span class="text-muted">No output</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>