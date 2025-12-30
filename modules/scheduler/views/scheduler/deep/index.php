<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-tasks"></i> Scheduled Tasks
            </h1>
            <div class="btn-group">
                <a href="<?php echo URL::site('scheduler/stats');?>" class="btn btn-outline-info">
                    <i class="fas fa-chart-bar"></i> Statistics
                </a>
                <a href="<?php echo URL::site('scheduler/logs')?>" class="btn btn-outline-secondary">
                    <i class="fas fa-history"></i> View Logs
                </a>
				 <a href="<?php echo URL::site('scheduler/create');?>" class="btn btn-outline-success">
                    <i class="fas fa-plus"></i> Create Task
                </a>
				<a href="<?php echo URL::site('scheduler/toggleView');?>" class="btn btn-outline-success">
                    <i class="fas fa-plus"></i> toggleView
                </a>
				
				
            </div>
        </div>
        
        <!-- Статистика -->
        <?php if ($stats): ?>
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stats-card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4><?= $stats['total_tasks'] ?></h4>
                                <p class="mb-0">Total Tasks</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-tasks fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4><?= $stats['enabled_tasks'] ?></h4>
                                <p class="mb-0">Enabled</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-play-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4><?= $stats['due_tasks'] ?></h4>
                                <p class="mb-0">Due Now</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4><?= $stats['total_runs'] ?></h4>
                                <p class="mb-0">Total Runs</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-sync-alt fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Список задач -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-list"></i> Registered Tasks
                </h5>
            </div>
            <div class="card-body p-0">
                <?php if (empty($tasks)): ?>
                    <div class="text-center p-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5>No tasks found</h5>
                        <p class="text-muted">No scheduled tasks are registered in the system.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Schedule</th>
                                    <th>Status</th>
                                    <th>Last Run</th>
                                    <th>Next Run</th>
                                    <th>Statistics</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								//echo Debug::vars('118', $tasks);
								foreach ($tasks as $name => $task): ?>
                                <?php 
                                    $task_status = $status[$name];
                                    $is_due = $task_status['is_due'];
                                    $last_run = $task_status['last_run'] ? date('Y-m-d H:i:s', $task_status['last_run']) : 'Never';
                                    $next_run = $task_status['next_run'] ? date('Y-m-d H:i:s', $task_status['next_run']) : 'Unknown';
                                ?>
                                <tr class="<?= $is_due ? 'table-warning' : '' ?>">
                                    <td>
                                        <strong><?= HTML::chars($name) ?></strong>
                                        <br>
                                        <small class="text-muted"><?= HTML::chars($task_status['class']) ?></small>
                                        <div class="form-check form-switch">
                                         	<input class="form-check-input task-toggle" type="checkbox" 
                                                   data-task="<?= HTML::chars($name) ?>"
                                                   <?= $task['db_task']['enabled'] ? 'checked' : '' ?>>
											
                                            <label class="form-check-label small">
                                                <?= $task['db_task']['enabled'] ? 'Enabled' : 'Disabled' ?>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <code><?= HTML::chars($task_status['schedule']) ?></code>
                                        <?php if ($is_due): ?>
                                            <span class="badge bg-warning ms-1">Due</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="task-status" data-task="<?= HTML::chars($name) ?>">
                                        <?php if ($task_status['last_status'] === 'success'): ?>
                                            <span class="badge bg-success">Success</span>
                                        <?php elseif ($task_status['last_status'] === 'error'): ?>
                                            <span class="badge bg-danger">Error</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Never run</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= HTML::chars($last_run) ?>
                                        <?php if ($task_status['last_duration']): ?>
                                            <br>
                                            <small class="text-muted"><?= $task_status['last_duration'] ?>s</small>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= HTML::chars($next_run) ?></td>
                                    <td>
                                        <small>
                                            Runs: <strong><?= $task_status['run_count'] ?></strong><br>
                                            Errors: <strong class="<?= $task_status['error_count'] > 0 ? 'text-danger' : 'text-success' ?>">
                                                <?= $task_status['error_count'] ?>
                                            </strong>
                                        </small>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
										<?php 
										echo HTML::anchor('/scheduler/task/'.$name, '<i class="fas fa-eye"></i>Detail', array(
												'class' => 'btn btn-outline-info', 
												'title' => 'View Details'
											));
										
										?>
										
                                           
                                            <button class="btn btn-outline-primary run-task-btn" 
                                                    data-task="<?= HTML::chars($name) ?>" 
                                                    title="Run Now">
                                                <i class="fas fa-play"></i>Run
                                            </button>
											
										<?php 
										echo HTML::anchor('/scheduler/logs?task_id='.$task['db_task']['id'], '<i class="fas fa-history"></i>Log', array(
												'class' => 'btn btn-outline-secondary', 
												'title' => 'View Logs'
											));
										
										?>
										
										
										<a href="<?php echo URL::site('scheduler/delete/'.$name); ?>" class="btn btn-danger"
											   title="Delete" onclick="return confirm('Are you sure?')">
												<i class="glyphicon glyphicon-trash"></i>Delete
											</a>
                                          
                                        </div>
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