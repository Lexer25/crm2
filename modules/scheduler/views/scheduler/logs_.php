<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-history"></i> Execution Logs
            </h1>
            <a href="/scheduler" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Back to Tasks
            </a>
        </div>

        <!-- Фильтры -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="get" class="row g-3">
                    <div class="col-md-6">
                        <label for="task_filter" class="form-label">Filter by Task:</label>
                        <select name="task_id" id="task_filter" class="form-select" onchange="this.form.submit()">
                            <option value="">All Tasks</option>
                            <?php foreach ($tasks as $task): ?>
                                <option value="<?= $task['id'] ?>" <?= $current_task_id == $task['id'] ? 'selected' : '' ?>>
                                    <?= HTML::chars($task['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Total Logs:</label>
                        <div class="form-control-plaintext"><?= $total_logs ?> records</div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Таблица логов -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-list"></i> Execution History
                </h5>
            </div>
            <div class="card-body p-0">
                <?php if (empty($logs)): ?>
                    <div class="text-center p-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5>No execution logs found</h5>
                        <p class="text-muted">No task executions have been logged yet.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Time</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Duration</th>
                                    <th>Memory</th>
                                    <th>Output</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($logs as $log): ?>
                                <tr class="<?= $log['status'] === 'success' ? 'log-success' : 'log-error' ?>">
                                    <td><?= HTML::chars($log['created_at']) ?></td>
                                    <td>
                                        <?php if ($log['task_name']): ?>
                                            <a href="/scheduler/task/<?= URL::title($log['task_name']) ?>">
                                                <?= HTML::chars($log['task_name']) ?>
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">Unknown Task</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($log['status'] === 'success'): ?>
                                            <span class="badge bg-success">Success</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Error</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= HTML::chars($log['duration']) ?>s</td>
                                    <td><?= round($log['memory_usage'] / 1024 / 1024, 2) ?> MB</td>
                                    <td>
                                        <?php if (!empty($log['output'])): ?>
                                            <button class="btn btn-sm btn-outline-secondary" 
                                                    onclick="$(this).next('.log-details').toggle()">
                                                View Output
                                            </button>
                                            <div class="log-details d-none mt-2 p-2 bg-light border rounded">
                                                <pre class="mb-0 small"><?= HTML::chars($log['output']) ?></pre>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-muted">No output</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Пагинация -->
                    <?php if ($total_pages > 1): ?>
                    <div class="card-footer">
                        <nav aria-label="Logs pagination">
                            <ul class="pagination justify-content-center mb-0">
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= $i == $current_page ? 'active' : '' ?>">
                                        <a class="page-link" href="/scheduler/logs?page=<?= $i ?><?= $current_task_id ? '&task_id='.$current_task_id : '' ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>