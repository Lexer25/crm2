<?php
// echo Debug::vars('2', $report_name);//exit;
// echo Debug::vars('3', $params);//exit;
//echo Debug::vars('4', $form_content);
//echo Debug::vars('5', $result_content);
//echo Debug::vars('6', $user);

/* if(isset($params)){
	echo Debug::vars('9', $params);
} else {
	echo Debug::vars('11 нет params');
} */

?>

   
   <style>
        .report-container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .tabs { margin-bottom: 20px; }
        .tab { display: inline-block; padding: 10px 20px; background: #f0f0f0; 
               border: 1px solid #ccc; margin-right: 5px; cursor: pointer; }
        .tab.active { background: #fff; border-bottom: 1px solid #fff; }
        .tab-content { border: 1px solid #ccc; padding: 20px; background: #fff; }
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 8px; border: 1px solid #ddd; }
        .btn { padding: 10px 20px; border: none; cursor: pointer; }
        .btn-primary { background: #007bff; color: white; }
        .btn-success { background: #28a745; color: white; }
        .result-actions { margin: 20px 0; }
        .hidden { display: none; }
    </style>

    <div class="report-container">
        <h1><?php echo __($report_title); ?></h1>
        
        <div class="tabs">
            <div class="tab <?php echo $active_tab == 'form' ? 'active' : ''; ?>" 
                 onclick="showTab('form')"><?php echo __('Parameters');?></div>
            <div class="tab <?php echo $active_tab == 'result' ? 'active' : ''; ?>" 
                 onclick="showTab('result')"><?php echo __('Result');?></div>
        </div>
        
        <div class="tab-content">
            <div id="form-tab" class="tab-pane <?php echo $active_tab == 'form' ? '' : 'hidden'; ?>">
                <?php echo $form_content; //вывод формы ввода данных отчета?>
            </div>
            
            <div id="result-tab" class="tab-pane <?php echo $active_tab == 'result' ? '' : 'hidden'; ?>">
                <?php if (!empty($result_content)): ?>
                    <div class="result-actions">
                        <form method="post" action="<?php echo URL::site('report/'.$report_name.'/save'); ?>">
                            <button type="submit" class="btn btn-success">
                                <i class="icon-save"></i> <?php echo __('Save Report');?>
                            </button>
                        </form>
                    </div>
                    
                    <div class="report-result">
                        <?php echo $result_content; ?>
                    </div>
                <?php else: ?>
                    <p>
					<?php echo __('noDataForReport');?>
					</p>
                <?php endif; ?>
            </div>
					<?php 
					echo __('Report ver :ver', array(':ver'=>Kohana::$config->load('config')->get('ver', 0)));
					?>
        </div>
    </div>
    <script>
        function showTab(tabName) {
            document.getElementById('form-tab').classList.add('hidden');
            document.getElementById('result-tab').classList.add('hidden');
            document.getElementById(tabName + '-tab').classList.remove('hidden');
            
            // Обновляем активные табы
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            document.querySelector('.tab[onclick="showTab(\'' + tabName + '\')"]').classList.add('active');
        }
    </script>
