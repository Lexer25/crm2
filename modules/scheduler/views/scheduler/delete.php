<?php defined('SYSPATH') or die('No direct script access.'); 
//echo Debug::vars('2', $task);//exit;
//echo Debug::vars('3', $task->name);//exit;
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="glyphicon glyphicon-warning-sign"></i> Delete Task
                    </h3>
                </div>
                <div class="panel-body">
                    <?php if (isset($task) && $task): ?>
                        <div class="alert alert-warning">
                            <h4>
                                <i class="glyphicon glyphicon-exclamation-sign"></i>
                                Confirm Deletion
                            </h4>
                            <p>You are about to delete the following task. This action cannot be undone.</p>
                        </div>

                        <div class="well">
                            <h5>Task Details:</h5>
                            <table class="table table-condensed">
                                <tr>
                                    <th width="30%">Name:</th>
                                    <td><strong><?php echo HTML::chars($task['db_task']['name']); ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Schedule:</th>
                                    <td><code><?php echo HTML::chars($task['schedule']); ?></code></td>
                                </tr>
                                <tr>
                                    <th>Callback (class):</th>
                                    <td><code><?php echo HTML::chars($task['db_task']['class']); ?></code></td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        <span class="label label-<?php echo $task['db_task']['enabled'] ? 'success' : 'default'; ?>">
                                            <?php echo $task['db_task']['enabled'] ? 'Enabled' : 'Disabled'; ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php if (isset($task['last_run']) && $task['last_run']): ?>
                                <tr>
                                    <th>Last Run:</th>
                                    <td>
                                        <?php echo date('Y-m-d H:i:s', $task['last_run']); ?>
                                        <small class="text-muted">
                                            (<?php echo Date::fuzzy_span($task['last_run']); ?>)
                                        </small>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php if (isset($task['description']) && $task['description']): ?>
                                <tr>
                                    <th>Description:</th>
                                    <td><?php echo HTML::chars($task['description']); ?></td>
                                </tr>
                                <?php endif; ?>
                            </table>
                        </div>

                        <div class="alert alert-info">
                            <h5>
                                <i class="glyphicon glyphicon-info-sign"></i>
                                What will be affected:
                            </h5>
                            <ul>
                                <li>Task will be removed from the scheduler</li>
                                <li>Task will no longer run automatically</li>
                                <li>Task execution history will be preserved</li>
                                <li>This action is irreversible</li>
                            </ul>
                        </div>

                        <form method="post" class="form-horizontal">
                            <?php //echo Form::csrf(); ?>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="confirm_delete" value="1" required>
                                            <strong>I understand that this action cannot be undone</strong>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-danger btn-lg btn-block" 
                                            id="delete-btn" disabled-->
                                        <i class="glyphicon glyphicon-trash"></i> Delete Task Permanently
                                    </button>
                                </div>
                            </div>
                        </form>

                    <?php else: ?>
                        <div class="alert alert-danger">
                            <h4>
                                <i class="glyphicon glyphicon-remove-sign"></i>
                                Task Not Found
                            </h4>
                            <p>The task you are trying to delete does not exist or has already been deleted.</p>
                        </div>
                    <?php endif; ?>

                    <div class="text-center">
                        <a href="<?php echo URL::site('scheduler'); ?>" class="btn btn-default">
                            <i class="glyphicon glyphicon-arrow-left"></i> Back to Task List
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional warning for active tasks -->
            <?php if (isset($task) && $task && $task['db_task']['enabled']): ?>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="glyphicon glyphicon-alert"></i> Important Note
                    </h4>
                </div>
                <div class="panel-body">
                    <p class="text-warning">
                        <strong>This task is currently enabled and running on schedule.</strong> 
                        Deleting it will stop all future executions immediately.
                    </p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.panel {
    margin-top: 20px;
}
.well {
    background-color: #f8f8f8;
    border-left: 4px solid #ddd;
}
.btn-block {
    margin-bottom: 10px;
}
.table th {
    background-color: transparent;
}
</style>

<script>
$(document).ready(function() {
    // Enable delete button only when checkbox is checked
    $('input[name="confirm_delete"]').change(function() {
        $('#delete-btn').prop('disabled', !$(this).is(':checked'));
    });

    // Double confirmation for delete
    $('form').submit(function(e) {
        var taskName = '<?php echo isset($task["name"]) ? addslashes($task["name"]) : ""; ?>';
        
        if (!confirm('Are you absolutely sure you want to delete the task "' + taskName + '"?')) {
            e.preventDefault();
            return false;
        }

        // Show loading state
        var $btn = $('#delete-btn');
        $btn.html('<i class="glyphicon glyphicon-refresh glyphicon-spin"></i> Deleting...');
        $btn.prop('disabled', true);
    });

    // Add some visual feedback
    $('#delete-btn').hover(
        function() {
            if (!$(this).prop('disabled')) {
                $(this).addClass('btn-danger-dark');
            }
        },
        function() {
            $(this).removeClass('btn-danger-dark');
        }
    );
});
</script>