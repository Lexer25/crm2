<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auditlog extends Controller_Template {

    public function before()
    {
        parent::before();
        // Проверка авторизации
        $this->user = Auth::instance()->get_user();
        if (!$this->user) {
            HTTP::redirect('auth/login');
        }
    }

	public function action_index($filter = null)
	{
		$auditlog = new Model_AuditLog();
		$all_data = $auditlog->getAuditLog();
		
		// Получаем детали для каждой записи
		foreach ($all_data as $key => $record) {
			$details = $auditlog->getAuditLogDetails($record['LOG_TABLES_ID']);
			
			// Раскодируем детали
			foreach ($details as &$detail) {
				foreach ($detail as $k => &$v) {
					if ($v !== null && !empty($v) && is_string($v)) {
						$decoded = @iconv('Windows-1251', 'UTF-8//IGNORE', $v);
						if ($decoded !== false && $decoded != $v) {
							$v = $decoded;
						}
					}
				}
			}
			
			$all_data[$key]['details'] = $details;
		}
		
		$total_count = count($all_data);
		
		// Получаем лимит (по умолчанию 10)
		$limit = $this->request->query('limit');
		if (!in_array($limit, array(10, 20, 30))) {
			$limit = 10;
		}
		
		// Обрезаем данные
		$audit_data = array_slice($all_data, 0, $limit);
		
		$this->template->content = View::factory('auditlog/view')
			->bind('audit_data', $audit_data)
			->bind('total_count', $total_count)
			->bind('limit', $limit);
	}

    public function action_details()
    {
        $this->auto_render = false;
        $log_tables_id = $this->request->param('id');
        
        if (!$log_tables_id) {
            echo json_encode(array('error' => 'Missing log_tables_id'));
            return;
        }
        
        $auditlog = new Model_AuditLog();
        $details = $auditlog->getAuditLogDetails($log_tables_id);
        
        // Раскодируем русские символы из WIN1251 в UTF-8
        foreach ($details as &$record) {
            foreach ($record as $key => &$value) {
                if ($value !== null && !empty($value) && is_string($value)) {
                    $decoded = @iconv('Windows-1251', 'UTF-8//IGNORE', $value);
                    if ($decoded !== false && $decoded != $value) {
                        $value = $decoded;
                    }
                }
            }
        }
        
        echo json_encode($details);
    }

    public function action_export_pdf()
	{
		$auditlog = new Model_AuditLog();
		$audit_data = $auditlog->getAuditLog();
		
		// Получаем детали для каждой записи
		foreach ($audit_data as $key => $record) {
			$details = $auditlog->getAuditLogDetails($record['LOG_TABLES_ID']);
			
			// Раскодируем детали
			foreach ($details as &$detail) {
				foreach ($detail as $k => &$v) {
					if ($v !== null && !empty($v) && is_string($v)) {
						$decoded = @iconv('Windows-1251', 'UTF-8//IGNORE', $v);
						if ($decoded !== false && $decoded != $v) {
							$v = $decoded;
						}
					}
				}
			}
			$audit_data[$key]['details'] = $details;
		}
		
		// Устанавливаем заголовки для скачивания как .html
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="audit_log_' . date('Y-m-d_H-i-s') . '.html"');
		
		// Выводим HTML
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Журнал аудита</title>
			<style>
				body { font-family: Arial, sans-serif; margin: 20px; font-size: 12px; }
				h2 { text-align: center; }
				.info { margin-bottom: 20px; }
				table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
				th, td { border: 1px solid #000; padding: 6px; text-align: left; vertical-align: top; }
				th { background-color: #f0f0f0; }
				.details-table { width: 100%; border-collapse: collapse; margin: 5px 0; }
				.details-table td, .details-table th { border: 1px solid #ccc; }
				.details-table th { background-color: #e0e0e0; }
				.record-separator { margin-top: 20px; }
			</style>
		</head>
		<body>
			<h2>Журнал аудита</h2>
			<div class="info">
				<strong>Дата выгрузки:</strong> <?php echo date('d.m.Y H:i:s'); ?><br>
				<strong>Всего записей:</strong> <?php echo count($audit_data); ?>
			</div>
			
			<?php foreach ($audit_data as $record): ?>
			<table>
				<thead>
					<tr style="background-color: #d3d3d3;">
						<th width="10%">ID лога</th>
						<th width="15%">Таблица</th>
						<th width="10%">Операция</th>
						<th width="20%">Дата и время</th>
						<th width="15%">ID записи</th>
						<th width="30%">Пользователь</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo htmlspecialchars($record['LOG_TABLES_ID']); ?></td>
						<td><?php echo htmlspecialchars($record['TABLE_NAME']); ?></td>
						<td><?php echo htmlspecialchars($record['OPERATION']); ?></td>
						<td><?php echo htmlspecialchars($record['DATE_TIME']); ?></td>
						<td><?php echo htmlspecialchars($record['KEY_VALUE']); ?></td>
						<td><?php echo htmlspecialchars($record['USERNAME']); ?></td>
					</tr>
					
					<?php if (!empty($record['details'])): ?>
					<tr>
						<td colspan="6" style="padding: 10px; background-color: #f9f9f9;">
							<table class="details-table" style="width: 95%; margin: 0 auto; border-collapse: collapse;">
								<thead>
									<tr>
										<th width="30%">Поле</th>
										<th width="35%">Старое значение</th>
										<th width="35%">Новое значение</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($record['details'] as $field): ?>
									<tr>
										<td><?php echo htmlspecialchars($field['FIELD_NAME']); ?></td>
										<td><?php echo htmlspecialchars($field['OLD_VALUE']) ?: '&nbsp;'; ?></td>
										<td><?php echo htmlspecialchars($field['NEW_VALUE']) ?: '&nbsp;'; ?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</td>
					</tr>
					<?php endif; ?>
				</tbody>
			</table>
			<?php endforeach; ?>
			
			<div style="margin-top: 30px; text-align: center; font-size: 10px; color: #666;">
				Сгенерировано автоматически
			</div>
		</body>
		</html>
		<?php
		exit;
	}
}
