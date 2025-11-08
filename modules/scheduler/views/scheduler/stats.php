<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-chart-bar"></i> Scheduler Statistics
            </h1>
            <a href="/scheduler" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Back to Tasks
            </a>
        </div>

        <!-- Общая статистика -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stats-card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4><?= $total_stats['total_tasks'] ?></h4>
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
                                <h4><?= $total_stats['total_executions'] ?></h4>
                                <p class="mb-0">Total Executions</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-play-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card bg-danger text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4><?= $total_stats['total_errors'] ?></h4>
                                <p class="mb-0">Total Errors</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-exclamation-triangle fa-2x"></i>
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
                                <h4><?= round($total_stats['avg_duration'], 2) ?>s</h4>
                                <p class="mb-0">Avg Duration</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Топ задач -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-trophy"></i> Top Tasks by Executions
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <?php if (empty($top_tasks)): ?>
                            <div class="text-center p-4">
                                <p class="text-muted mb-0">No task execution data available.</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Task</th>
                                            <th>Executions</th>
                                            <th>Errors</th>
                                            <th>Last Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($top_tasks as $task): ?>
                                        <tr>
                                            <td><?= HTML::chars($task['name']) ?></td>
                                            <td><?= $task['executions'] ?></td>
                                            <td>
                                                <span class="<?= $task['errors'] > 0 ? 'text-danger' : 'text-success' ?>">
                                                    <?= $task['errors'] ?>
                                                </span>
                                            </td>
                                            <td><?= $task['last_duration'] ? round($task['last_duration'], 2).'s' : 'N/A' ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-calendar"></i> Daily Statistics (Last 30 days)
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <?php if (empty($daily_stats)): ?>
                            <div class="text-center p-4">
                                <p class="text-muted mb-0">No daily statistics available.</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Executions</th>
                                            <th>Success</th>
                                            <th>Errors</th>
                                            <th>Avg Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($daily_stats as $day): ?>
                                        <tr>
                                            <td><?= HTML::chars($day['date']) ?></td>
                                            <td><?= $day['executions'] ?></td>
                                            <td class="text-success"><?= $day['successes'] ?></td>
                                            <td class="text-danger"><?= $day['errors'] ?></td>
                                            <td><?= round($day['avg_duration'], 2) ?>s</td>
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
    </div>
</div>