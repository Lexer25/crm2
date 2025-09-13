<!DOCTYPE html>
<html>
<head>
    <title>Report Result - <?php echo ucfirst($report_name); ?></title>
    <style>
        /* Стили из предыдущего примера */
        .result-container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .header { background: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .success-message { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; 
                          margin-bottom: 20px; border: 1px solid #c3e6cb; }
        /* ... остальные стили ... */
        
        .export-options { background: #e9ecef; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table th, .data-table td { padding: 12px; border: 1px solid #dee2e6; }
        .data-table th { background: #007bff; color: white; }
        .data-table tr:nth-child(even) { background: #f8f9fa; }
    </style>
</head>
<body>
    <div class="result-container">
        <div class="header">
            <h1>📊 Report Result: <?php echo ucfirst($report_name); ?></h1>
            <p>Generated on: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>

        <?php if (isset($saved) && $saved): ?>
        <div class="success-message">
            <h3>✅ Report Saved Successfully!</h3>
            <p>Filename: <strong><?php echo HTML::chars($filename); ?></strong></p>
            <p>Location: <?php echo HTML::chars($file_path); ?></p>
        </div>
        <?php endif; ?>

        <div class="actions">
            <button onclick="window.history.back()" class="btn btn-secondary">← Back</button>
            <button onclick="window.print()" class="btn btn-success">🖨️ Print</button>
            <a href="<?php echo URL::site('reports/'.$report_name.'/download/pdf'); ?>" class="btn btn-primary">📄 PDF</a>
            <a href="<?php echo URL::site('reports/'.$report_name.'/download/excel'); ?>" class="btn btn-primary">📊 Excel</a>
            <a href="<?php echo URL::site('reports/'.$report_name.'/download/csv'); ?>" class="btn btn-primary">📝 CSV</a>
        </div>

        <div class="export-options">
            <h3>📋 Report Summary</h3>
            <table class="info-table">
                <tr>
                    <th>Report Type:</th>
                    <td><?php echo HTML::chars($report_name); ?></td>
                    <th>Generation Time:</th>
                    <td><?php echo isset($stats['generation_time']) ? $stats['generation_time'] : 'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Date Range:</th>
                    <td><?php echo isset($params['date_from']) ? $params['date_from'] : 'N/A'; ?> 
                        to <?php echo isset($params['date_to']) ? $params['date_to'] : 'N/A'; ?></td>
                    <th>Total Records:</th>
                    <td><?php echo isset($stats['total_records']) ? number_format($stats['total_records']) : '0'; ?></td>
                </tr>
            </table>
        </div>

        <div class="report-content">
            <h3>📈 Report Data</h3>
            
            <?php if (isset($report_data) && is_array($report_data) && count($report_data) > 0): ?>
                
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <?php foreach (array_keys($report_data[0]) as $column): ?>
                                <th><?php echo HTML::chars(ucfirst(str_replace('_', ' ', $column))); ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($report_data as $row): ?>
                            <tr>
                                <?php foreach ($row as $value): ?>
                                <td><?php echo HTML::chars($value); ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 20px; text-align: center;">
                    <p>Showing <?php echo count($report_data); ?> of <?php echo $stats['total_records']; ?> records</p>
                </div>

            <?php else: ?>
                <div style="text-align: center; padding: 40px; color: #6c757d;">
                    <h3>📭 No Data Found</h3>
                    <p>No records match your criteria. Please adjust your parameters and try again.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="actions" style="margin-top: 30px; text-align: center;">
            <form action="<?php echo URL::site('reports/'.$report_name.'/save'); ?>" method="post">
                <?php echo Form::csrf(); ?>
                <button type="submit" class="btn btn-success">💾 Save to Database</button>
                <span style="margin: 0 10px;">or</span>
                <a href="<?php echo URL::site('reports/'.$report_name); ?>" class="btn btn-primary">
                    🔄 Generate New Report
                </a>
            </form>
        </div>
    </div>

    <script>
        // JavaScript для дополнительной функциональности
        document.addEventListener('DOMContentLoaded', function() {
            // Экспорт данных
            document.querySelectorAll('.export-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const format = this.dataset.format;
                    window.location.href = '<?php echo URL::site('reports/'.$report_name.'/download'); ?>/' + format;
                });
            });

            // Поиск в таблице
            const searchInput = document.createElement('input');
            searchInput.type = 'text';
            searchInput.placeholder = 'Search in report...';
            searchInput.style.cssText = 'padding: 8px; width: 300px; margin: 10px 0;';
            
            document.querySelector('.report-content').prepend(searchInput);
        });
    </script>
</body>
</html>