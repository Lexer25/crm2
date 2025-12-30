<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    Create New Task
                    <small>Task Scheduler</small>
                    <a href="<?php echo URL::site('scheduler'); ?>" class="btn btn-default pull-right">
                        <i class="glyphicon glyphicon-arrow-left"></i> Back to Tasks
                    </a>
                </h1>
            </div>

            <?php 
			if (isset($errors) && !empty($errors)): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><i class="glyphicon glyphicon-warning-sign"></i> Please fix the following errors:</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                    <li><?php echo HTML::chars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Task Configuration</h3>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal">
                        <?php //echo Form::csrf(); ?>
                        
                        <!-- Task Name -->
                        <div class="form-group <?php echo (isset($errors['name']) ? 'has-error' : ''); ?>">
                            <label for="name" class="col-sm-3 control-label">
                                Task Name *
                                <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" 
                                   title="Unique identifier for the task (letters, numbers, underscores only)"></i>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="<?php echo isset($task['name']) ? HTML::chars($task['name']) : 'my_backup_task'; ?>" 
                                       placeholder="my_backup_task" required
                                       pattern="[a-zA-Z0-9_]+"
                                       title="Only letters, numbers and underscores are allowed">
                                <?php if (isset($errors['name'])): ?>
                                <span class="help-block"><?php echo HTML::chars($errors['name']); ?></span>
                                <?php else: ?>
                                <span class="help-block">Unique identifier (a-z, 0-9, _ only)</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="description" name="description" 
                                          rows="2" placeholder="Optional task description"><?php echo isset($task['description']) ? HTML::chars($task['description']) : ''; ?></textarea>
                            </div>
                        </div>
						
						<!-- Параметры -->
                        <div class="form-group">
                            <label for="param" class="col-sm-3 control-label">param</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="param" name="param" 
                                          rows="2" placeholder="Optional task param"><?php echo isset($task['param']) ? HTML::chars($task['param']) : ''; ?></textarea>
                            </div>
                        </div>
						
						

                        <!-- Schedule Type -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Schedule Type *</label>
                            <div class="col-sm-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="schedule_type" value="cron" 
                                               <?php echo (!isset($task['schedule_type']) || $task['schedule_type'] == 'cron') ? 'checked' : ''; ?>> 
                                        Cron Expression
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="schedule_type" value="interval"
                                               <?php echo (isset($task['schedule_type']) && $task['schedule_type'] == 'interval') ? 'checked' : ''; ?>> 
                                        Time Interval
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Schedule Input -->
                        <div class="form-group <?php echo (isset($errors['schedule']) ? 'has-error' : ''); ?>">
                            <label for="schedule" class="col-sm-3 control-label">
                                Schedule *
                                <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" 
                                   title="Cron expression or time interval in seconds"></i>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="schedule" name="schedule" 
                                       value="<?php echo isset($task['schedule']) ? HTML::chars($task['schedule']) : '*/5 * * * *'; ?>" 
                                       placeholder="*/5 * * * *" required>
                                <?php if (isset($errors['schedule'])): ?>
                                <span class="help-block"><?php echo HTML::chars($errors['schedule']); ?></span>
                                <?php else: ?>
                                <span class="help-block" id="schedule-help">
                                    Cron format: minute hour day month weekday
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#cronHelpModal">
                                    <i class="glyphicon glyphicon-question-sign"></i> Cron Help
                                </button>
                            </div>
                        </div>

                        <!-- Quick Schedule Presets -->
                        <div class="form-group" id="cron-presets" style="display: none;">
                            <label class="col-sm-3 control-label">Quick Presets</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="cron-preset-select">
                                    <option value="">-- Select a preset --</option>
                                    <option value="*/5 * * * *">Every 5 minutes</option>
                                    <option value="*/15 * * * *">Every 15 minutes</option>
                                    <option value="0 * * * *">Every hour</option>
                                    <option value="0 */2 * * *">Every 2 hours</option>
                                    <option value="0 0 * * *">Daily at midnight</option>
                                    <option value="0 2 * * *">Daily at 2:00 AM</option>
                                    <option value="0 9 * * 1-5">Weekdays at 9:00 AM</option>
                                    <option value="0 0 * * 0">Weekly on Sunday</option>
                                    <option value="0 0 1 * *">Monthly on 1st</option>
                                </select>
                            </div>
                        </div>

                        <!-- Callback -->
                        <div class="form-group <?php echo (isset($errors['callback']) ? 'has-error' : ''); ?>">
                            <label for="callback" class="col-sm-3 control-label">
                                Callback *
                                <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" 
                                   title="Class::method or function name to execute"></i>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="callback" name="callback" 
                                       value="<?php echo isset($task['callback']) ? HTML::chars($task['callback']) : 'Task_Example'; ?>" 
                                       placeholder="Task_Backup::run" required>
                                <?php if (isset($errors['callback'])): ?>
                                <span class="help-block"><?php echo HTML::chars($errors['callback']); ?></span>
                                <?php else: ?>
                                <span class="help-block">Format: Class::method or function_name</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Task Options -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Task Options</label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="enabled" value="1" 
                                               <?php echo (!isset($task['enabled']) || $task['enabled']) ? 'checked' : ''; ?>> 
                                        <strong>Enable task</strong>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="overlap" value="1"
                                               <?php echo (isset($task['overlap']) && $task['overlap']) ? 'checked' : ''; ?>> 
                                        Allow task overlap
                                        <small class="text-muted">(run multiple instances simultaneously)</small>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Timeout -->
                        <div class="form-group <?php echo (isset($errors['timeout']) ? 'has-error' : ''); ?>">
                            <label for="timeout" class="col-sm-3 control-label">
                                Timeout
                                <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" 
                                   title="Maximum execution time in seconds (0 = no timeout)"></i>
                            </label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="timeout" name="timeout" 
                                           value="<?php echo isset($task['timeout']) ? HTML::chars($task['timeout']) : '3600'; ?>" 
                                           min="0" step="1" placeholder="3600">
                                    <span class="input-group-addon">seconds</span>
                                </div>
                                <?php if (isset($errors['timeout'])): ?>
                                <span class="help-block"><?php echo HTML::chars($errors['timeout']); ?></span>
                                <?php else: ?>
                                <span class="help-block">0 = no timeout limit</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="glyphicon glyphicon-plus"></i> Create Task
                                </button>
                                <button type="reset" class="btn btn-default">
                                    <i class="glyphicon glyphicon-refresh"></i> Reset
                                </button>
                                <a href="<?php echo URL::site('scheduler'); ?>" class="btn btn-link">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quick Help -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="glyphicon glyphicon-info-sign"></i> Quick Help
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Callback Examples:</h5>
                            <ul>
                                <li><code>Task_Backup::database</code> - Static method</li>
                                <li><code>Task_Cleanup::temp_files</code> - Static method</li>
                                <li><code>my_custom_function</code> - Global function</li>
                                <li><code>Model_Report::generate_daily</code> - Static method</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Common Time Intervals:</h5>
                            <ul>
                                <li><code>300</code> - 5 minutes</li>
                                <li><code>900</code> - 15 minutes</li>
                                <li><code>3600</code> - 1 hour</li>
                                <li><code>86400</code> - 1 day</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cron Help Modal -->
<div class="modal fade" id="cronHelpModal" tabindex="-1" role="dialog" aria-labelledby="cronHelpModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="cronHelpModalLabel">
                    <i class="glyphicon glyphicon-time"></i> Cron Expression Help
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Cron Format:</h5>
                        <pre>┌────────── minute (0-59)
│ ┌──────── hour (0-23)
│ │ ┌────── day of month (1-31)
│ │ │ ┌──── month (1-12 or JAN-DEC)
│ │ │ │ ┌── day of week (0-6 or SUN-SAT)
│ │ │ │ │
* * * * *</pre>
                    </div>
                    <div class="col-md-6">
                        <h5>Special Characters:</h5>
                        <ul class="list-unstyled">
                            <li><code>*</code> - Any value</li>
                            <li><code>,</code> - Value list separator</li>
                            <li><code>-</code> - Range of values</li>
                            <li><code>/</code> - Step values</li>
                            <li><code>?</code> - No specific value</li>
                        </ul>
                    </div>
                </div>

                <h5>Common Examples:</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr class="active">
                                <th>Expression</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>*/5 * * * *</code></td>
                                <td>Every 5 minutes</td>
                            </tr>
                            <tr>
                                <td><code>0 */2 * * *</code></td>
                                <td>Every 2 hours</td>
                            </tr>
                            <tr>
                                <td><code>0 2 * * *</code></td>
                                <td>Daily at 2:00 AM</td>
                            </tr>
                            <tr>
                                <td><code>0 9-17 * * 1-5</code></td>
                                <td>Hourly from 9 AM to 5 PM on weekdays</td>
                            </tr>
                            <tr>
                                <td><code>0 0 * * 0</code></td>
                                <td>Weekly on Sunday</td>
                            </tr>
                            <tr>
                                <td><code>0 0 1 * *</code></td>
                                <td>Monthly on 1st</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5>Field Details:</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr class="active">
                                <th>Field</th>
                                <th>Values</th>
                                <th>Special Chars</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Minute</td>
                                <td>0-59</td>
                                <td><code>* , - /</code></td>
                            </tr>
                            <tr>
                                <td>Hour</td>
                                <td>0-23</td>
                                <td><code>* , - /</code></td>
                            </tr>
                            <tr>
                                <td>Day of Month</td>
                                <td>1-31</td>
                                <td><code>* , - / ? L W</code></td>
                            </tr>
                            <tr>
                                <td>Month</td>
                                <td>1-12 or JAN-DEC</td>
                                <td><code>* , - /</code></td>
                            </tr>
                            <tr>
                                <td>Day of Week</td>
                                <td>0-6 or SUN-SAT</td>
                                <td><code>* , - / ? L #</code></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Got it!</button>
            </div>
        </div>
    </div>
</div>

<style>
.form-horizontal .control-label {
    padding-top: 7px;
}
.help-block {
    margin-bottom: 0;
}
.panel {
    margin-bottom: 20px;
}
</style>

<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Schedule type toggle
    function updateScheduleType() {
        var scheduleType = $('input[name="schedule_type"]:checked').val();
        var $scheduleInput = $('#schedule');
        var $presets = $('#cron-presets');
        var $help = $('#schedule-help');

        if (scheduleType === 'interval') {
            $scheduleInput.attr('placeholder', '3600');
            $scheduleInput.attr('type', 'number');
            $scheduleInput.attr('min', '1');
            $scheduleInput.attr('step', '1');
            $help.text('Time interval in seconds');
            $presets.hide();
        } else {
            $scheduleInput.attr('placeholder', '*/5 * * * *');
            $scheduleInput.attr('type', 'text');
            $scheduleInput.removeAttr('min');
            $scheduleInput.removeAttr('step');
            $help.text('Cron format: minute hour day month weekday');
            $presets.show();
        }
    }

    $('input[name="schedule_type"]').change(updateScheduleType);
    updateScheduleType(); // Initialize on page load

    // Cron preset selection
    $('#cron-preset-select').change(function() {
        var preset = $(this).val();
        if (preset) {
            $('#schedule').val(preset);
        }
    });

    // Form validation
    $('form').submit(function(e) {
        var name = $('#name').val().trim();
        var schedule = $('#schedule').val().trim();
        var callback = $('#callback').val().trim();
        var isValid = true;

        // Validate task name
        if (!name.match(/^[a-zA-Z0-9_]+$/)) {
            alert('Task name can only contain letters, numbers and underscores');
            isValid = false;
        }

        // Validate callback format
        if (!callback.match(/^[a-zA-Z0-9_]+::[a-zA-Z0-9_]+$/) && !callback.match(/^[a-zA-Z0-9_]+$/)) {
            alert('Callback must be in format Class::method or function_name (letters, numbers, underscores only)');
            isValid = false;
        }

        // Validate schedule based on type
        var scheduleType = $('input[name="schedule_type"]:checked').val();
        if (scheduleType === 'interval') {
            if (!schedule.match(/^\d+$/) || parseInt(schedule) <= 0) {
                alert('Time interval must be a positive number');
                isValid = false;
            }
        } else {
            if (!schedule.match(/^[\d*,\-\/\?LW#\s]+$/)) {
                alert('Please enter a valid cron expression');
                isValid = false;
            }
        }

        if (!isValid) {
            e.preventDefault();
            return false;
        }
    });

    // Auto-format task name
    $('#name').on('blur', function() {
        var value = $(this).val();
        value = value.replace(/[^a-zA-Z0-9_]/g, '_');
        value = value.replace(/_+/g, '_');
        value = value.replace(/^_|_$/g, '');
        $(this).val(value);
    });
});
</script>