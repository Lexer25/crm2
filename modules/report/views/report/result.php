<!DOCTYPE html>
<html>
<head>
    <title>Report Result - <?php echo ucfirst($report_name); ?></title>
    <style>
        .result-container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .header { background: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .success-message { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; 
                          margin-bottom: 20px; border: 1px solid #c3e6cb; }
        .error-message { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; 
                        margin-bottom: 20px; border: 1px solid #f5c6cb; }
        .actions { margin: 20px 0; }
        .btn { display: inline-block; padding: 10px 20px; margin-right: 10px; 
              text-decoration: none; border-radius: 5px; border: none; cursor: pointer; }
        .btn-primary { background: #007bff; color: white; }
        .btn-success { background: #28a745; color: white; }
        .btn-secondary { background: #6c757d; color: white; }
        .report-content { background: white; border: 1px solid #dee2e6; border-radius: 5px; 
                         padding: 20px; margin-top: 20px; }
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table th, .info-table td { padding: 10px; text-align: left; border-bottom: 1px solid #dee2e6; }
        .info-table th { background: #f8f9fa; font-weight: bold; }
    </style>
</head>
<body>
    <div class="result-container">
        <div class="header">
            <h1>📊 Report Result: <?php echo ucfirst($report_name); ?></h1>
            <p>Report generation completed</p>
        </div>

        <?php if (isset($saved) && $saved): ?>
        <div class="success-message">
            <h3>✅ Report Saved Successfully!</h3>
            <p>Report has been saved as: <strong><?php echo HTML::chars($filename); ?></strong></p>
            <p>Saved at: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
        <?php endif; ?>

        <?php if (isset($error) && $error): ?>
        <div class="error-message">
            <h3>❌ Error Generating Report</h3>
            <p><?php echo HTML::chars($error_message); ?></p>
        </div>
        <?php endif; ?>

        <div class="actions">
            <a href="<?php echo URL::site('reports/'.$report_name); ?>" class="btn btn-secondary">
                ↶ Generate New Report
            </a>
            
            <a href="<?php echo URL::site('reports'); ?>" class="btn btn-secondary">
                📋 Back to Reports List
            </a>
            
            <?php if (isset($filename)): ?>
            <a href="<?php echo URL::site('reports/'.$report_name.'/download'); ?>" class="btn btn-primary">
                ⬇️ Download Report
            </a>
            <?php endif; ?>
            
            <button onclick="window.print()" class="btn btn-success">
                🖨️ Print Report
            </button>
        </div>

        <?php if (isset($report_info)): ?>
        <table class="info-table">
            <tr>
                <th>Report Name:</th>
                <td><?php echo HTML::chars($report_info['title']); ?></td>
            </tr>
            <tr>
                <th>Generated:</th>
                <td><?php echo date('Y-m-d H:i:s'); ?></td>
            </tr>
            <tr>
                <th>Time Taken:</th>
                <td><?php echo isset($generation_time) ? number_format($generation_time, 3) . ' seconds' : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Records Found:</th>
                <td><?php echo isset($records_count) ? $records_count : 'N/A'; ?></td>
            </tr>
        </table>
        <?php endif; ?>

        <div class="report-content">
            <?php if (isset($report_content) && !empty($report_content)): ?>
                <?php echo $report_content; ?>
            <?php else: ?>
                <div style="text-align: center; padding: 40px; color: #6c757d;">
                    <h3>No data available for this report</h3>
                    <p>Please adjust your parameters and try again</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="actions" style="margin-top: 30px;">
            <form action="<?php echo URL::site('reports/'.$report_name.'/email'); ?>" method="post" style="display: inline-block;">
                <?php echo Form::csrf(); ?>
                <input type="email" name="email" placeholder="Enter email" required style="padding: 8px;">
                <button type="submit" class="btn btn-primary">📧 Send via Email</button>
            </form>
        </div>
    </div>
</body>
</html>