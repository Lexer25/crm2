<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>

<script type="text/javascript">
    $(function() {        
        $("#tablesorter").tablesorter({ headers: { 3:{sorter: false}}, widgets: ['zebra']});
    });

    function toggleDetails(rowId) {
        var detailsRow = $('#details-' + rowId);
        if (detailsRow.is(':visible')) {
            detailsRow.hide();
        } else {
            $('.details-row').hide();
            detailsRow.show();
        }
    }
    
    function exportToPDF() {
        var filters = {
            table_filter: $('select[name="table_filter"]').val(),
            operation_filter: $('select[name="operation_filter"]').val(),
            username_filter: $('input[name="username_filter"]').val(),
            key_filter: $('input[name="key_filter"]').val()
        };
        
        var queryString = $.param(filters);
        window.location.href = 'auditlog/export_pdf?' + queryString;
    }
    
    function changeLimit() {
        var limit = $('#limit_select').val();
        var url = window.location.pathname + '?limit=' + limit;
        window.location.href = url;
    }
</script>

<style>
    .details-row {
        display: none;
        background-color: #f9f9f9;
    }
    .details-row td {
        padding: 10px !important;
    }
    .details-table {
        width: 95%;
        margin: 0 auto;
        border-collapse: collapse;
    }
    .details-table th {
        background-color: #e0e0e0;
        border: 1px solid #ccc;
        padding: 6px;
        font-weight: bold;
    }
    .details-table td {
        border: 1px solid #ccc;
        padding: 5px;
    }
    .clickable-row {
        cursor: pointer;
    }
    .clickable-row:hover {
        background-color: #f5f5f5 !important;
    }
</style>

<div class="onecolumn">
    <div class="header">
        <span><?php echo __('Журнал аудита'); ?> <?php echo __('(всего записей: :count)', array(':count' => $total_count)); ?></span>
        
        <button type="button" class="btn" onclick="exportToPDF()" style="float: right; margin-left: 10px;">Экспорт в PDF</button>
        <a href="auditlog" class="btn" style="float: right; margin-left: 10px;">Сбросить</a>
    </div>
    <br class="clear"/>
    <div class="content">
        
        <!-- Строка поиска и фильтров -->
        <div id="search" style="text-align: center; margin: 10px 0 15px;">
            <form action="auditlog" method="get" style="display: inline-block; margin: 0 auto;">
                <select name="table_filter" style="padding: 6px 10px; margin-right: 5px;">
                    <option value=""><?php echo __('Все таблицы'); ?></option>
                    <option value="PEOPLE" <?php echo (isset($_GET['table_filter']) && $_GET['table_filter'] == 'PEOPLE') ? 'selected' : ''; ?>>PEOPLE</option>
                    <option value="GUEST" <?php echo (isset($_GET['table_filter']) && $_GET['table_filter'] == 'GUEST') ? 'selected' : ''; ?>>GUEST</option>
                </select>
                
                <select name="operation_filter" style="padding: 6px 10px; margin-right: 5px;">
                    <option value=""><?php echo __('Все операции'); ?></option>
                    <option value="I" <?php echo (isset($_GET['operation_filter']) && $_GET['operation_filter'] == 'I') ? 'selected' : ''; ?>>INSERT</option>
                    <option value="U" <?php echo (isset($_GET['operation_filter']) && $_GET['operation_filter'] == 'U') ? 'selected' : ''; ?>>UPDATE</option>
                </select>
                
                <input
                    type="text"
                    name="username_filter"
                    placeholder="Пользователь"
                    value="<?php echo isset($_GET['username_filter']) ? HTML::chars($_GET['username_filter']) : ''; ?>"
                    style="padding: 6px 10px; width: 150px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"
                />
                
                <input
                    type="text"
                    name="key_filter"
                    placeholder="ID записи"
                    value="<?php echo isset($_GET['key_filter']) ? HTML::chars($_GET['key_filter']) : ''; ?>"
                    style="padding: 6px 10px; width: 100px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"
                />
                
                <input type="submit" class="btn" value="Найти"/>
                <button type="button" class="btn" onclick="exportToPDF()">Экспорт в PDF</button>
                <a href="auditlog" class="btn">Очистить</a>
                
                <select id="limit_select" style="padding: 6px 10px; margin-left: 10px; border: 1px solid #ccc; border-radius: 4px;" onchange="changeLimit()">
                    <option value="10" <?php echo ($limit == 10) ? 'selected' : ''; ?>>Показать 10</option>
                    <option value="20" <?php echo ($limit == 20) ? 'selected' : ''; ?>>Показать 20</option>
                    <option value="30" <?php echo ($limit == 30) ? 'selected' : ''; ?>>Показать 30</option>
                </select>
            </form>
        </div>
        
        <?php if (count($audit_data) > 0) { ?>
            <form id="form_data" name="form_data" action="" method="post">
                <table class="data tablesorter-blue" width="100%" cellpadding="0" cellspacing="0" id="tablesorter">
                    <thead>
                        <tr>
                            <th>ID лога</th>
                            <th>Таблица</th>
                            <th>Операция</th>
                            <th>Дата и время</th>
                            <th>ID записи</th>
                            <th>Пользователь</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($audit_data as $record): ?>
                        <tr class="clickable-row" onclick="toggleDetails(<?php echo $record['LOG_TABLES_ID']; ?>)" style="cursor: pointer;">
                            <td><?php echo isset($record['LOG_TABLES_ID']) ? HTML::chars($record['LOG_TABLES_ID']) : '' ?></td>
                            <td><?php echo isset($record['TABLE_NAME']) ? HTML::chars($record['TABLE_NAME']) : ''; ?></td>
                            <td><?php echo isset($record['OPERATION']) ? HTML::chars($record['OPERATION']) : ''; ?></td>
                            <td><?php echo isset($record['DATE_TIME']) ? HTML::chars($record['DATE_TIME']) : ''; ?></td>
                            <td><?php echo isset($record['KEY_VALUE']) ? HTML::chars($record['KEY_VALUE']) : ''; ?></td>
                            <td><?php echo isset($record['USERNAME']) ? HTML::chars($record['USERNAME']) : ''; ?></td>
                        </tr>
                        <tr id="details-<?php echo $record['LOG_TABLES_ID']; ?>" class="details-row">
                            <td colspan="6">
                                <table class="details-table">
                                    <thead>
                                        <tr>
                                            <th width="30%">Поле</th>
                                            <th width="35%">Старое значение</th>
                                            <th width="35%">Новое значение</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $details = isset($record['details']) ? $record['details'] : array();
                                        if (!empty($details)) {
                                            foreach ($details as $field) {
                                                echo '<tr>';
                                                echo '<td>' . htmlspecialchars($field['FIELD_NAME']) . '</td>';
                                                echo '<td>' . (htmlspecialchars($field['OLD_VALUE']) ?: '&nbsp;') . '</td>';
                                                echo '<td>' . (htmlspecialchars($field['NEW_VALUE']) ?: '&nbsp;') . '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="3" style="text-align: center;">Нет данных об изменениях</td><\/tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        <?php } else { ?>
            <div style="margin: 100px 0; text-align: center;">
                Нет данных для отображения<br /><br />
            </div>
        <?php } ?>
    </div>
</div>

<?php 
echo 'mod version ' . (defined('AUDITLOG_MODULE_VERSION') ? AUDITLOG_MODULE_VERSION : 'unknown');
?>