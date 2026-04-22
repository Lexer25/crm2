<?php defined('SYSPATH') or die('No direct script access.'); ?>
<script type="text/javascript" src="js/modal-window.js"></script>
<script type="text/javascript" src="js/modal-photo.js"></script>

<style>
    body { font-family: Arial; margin: 20px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    .control-panel { margin-bottom: 20px; padding: 10px; background: #f0f0f0; }
    .control-group { display: inline-block; margin-right: 15px; }
    #txtHint tr:hover { background-color: #f5f5f5; cursor: pointer; }
</style>

<?php include Kohana::find_file('views', 'alert'); ?>

<?php if ($alert): ?>
<div class="alert_success">
    <p><img alt="success" src="images/icon_accept.png" /> <?php echo htmlspecialchars($alert); ?></p>
</div>
<?php endif; ?>

<div class="onecolumn">
    <div class="header">
        <span>Монитор событий</span>
    </div>
    
    <div class="control-panel">
        <div class="control-group">
            <label>Количество:</label>
            <select id="selectsSize">
                <option value="10">10</option>
                <option value="20" selected>20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
        
        <div class="control-group">
            <label>
                <input type="checkbox" id="updatemonitor" /> Остановить
            </label>
        </div>
        
        <div class="control-group">
            <label>
                <input type="checkbox" id="photomonitor" checked /> Фото
            </label>
        </div>
        
        <button id="clearBtn" onclick="clearEvents()">Очистить</button>
        <span id="status" style="color: green;">● Работает</span>
    </div>
    
    <div style="overflow: auto; max-height: 70vh;">
        <table class="data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Тип</th>
                    <th>Дата/Время</th>
                    <th>Событие</th>
                    <th>Устройство</th>
                    <th>Сотрудник</th>
                    <th>Организация</th>
                </tr>
            </thead>
            <tbody id="txtHint">
                <tr><td colspan="7" style="text-align:center;">Загрузка событий...</td></tr>
            </tbody>
        </table>
    </div>
    
    <div id="debugInfo" style="margin-top: 10px; font-size: 11px; color: #666; border-top: 1px solid #ccc; padding-top: 5px;"></div>
</div>

<script>
// Простой и надежный скрипт для получения событий
var isRunning = true;
var lastId = 0;
var maxRows = 20;
var withPhoto = true;

// Получение настроек из куки
function loadSettings() {
    var sizeSelect = document.getElementById('selectsSize');
    if (sizeSelect) {
        maxRows = parseInt(sizeSelect.value);
    }
    var photoCheck = document.getElementById('photomonitor');
    if (photoCheck) {
        withPhoto = photoCheck.checked;
    }
}

// Обновление отладочной информации
function updateDebug(msg) {
    var debugDiv = document.getElementById('debugInfo');
    if (debugDiv) {
        var time = new Date().toLocaleTimeString();
        debugDiv.innerHTML = '[' + time + '] ' + msg + '<br>' + debugDiv.innerHTML;
        // Ограничиваем количество строк отладки
        var lines = debugDiv.innerHTML.split('<br>');
        if (lines.length > 10) {
            debugDiv.innerHTML = lines.slice(0, 10).join('<br>');
        }
    }
}

// Очистка таблицы
function clearEvents() {
    var tbody = document.getElementById('txtHint');
    if (tbody) {
        tbody.innerHTML = '';
        updateDebug('Таблица очищена');
    }
}

// Обновление счетчика событий
function updateEventCounter(count) {
    var counterEl = document.getElementById('eventCounter');
    if (!counterEl) {
        var infoDiv = document.getElementById('debugInfo');
        if (infoDiv && !document.getElementById('eventCounter')) {
            var span = document.createElement('span');
            span.id = 'eventCounter';
            span.style.marginLeft = '10px';
            infoDiv.parentNode.insertBefore(span, infoDiv);
        }
    }
    if (document.getElementById('eventCounter')) {
        document.getElementById('eventCounter').innerHTML = 'Всего: ' + count;
    }
}

// Добавление событий в таблицу
function addEventsToTable(html) {
    if (!html || html.trim() === '') return;
    
    var tbody = document.getElementById('txtHint');
    if (!tbody) return;
    
    // Удаляем сообщение "Загрузка..." если оно есть
    if (tbody.children.length === 1 && tbody.children[0].innerHTML.indexOf('Загрузка') !== -1) {
        tbody.innerHTML = '';
    }
    
    // Вставляем новые события в начало
    tbody.insertAdjacentHTML('afterbegin', html);
    
    // Ограничиваем количество строк
    while (tbody.rows.length > maxRows) {
        tbody.deleteRow(tbody.rows.length - 1);
    }
    
    // Анимация новых строк
    for (var i = 0; i < Math.min(3, tbody.rows.length); i++) {
        tbody.rows[i].style.backgroundColor = '#ffffcc';
        setTimeout(function(row) {
            return function() {
                if (row) row.style.backgroundColor = '';
            };
        }(tbody.rows[i]), 1000);
    }
    
    updateDebug('Добавлено событий: ' + (html.match(/<tr/g) || []).length);
}

// Получение событий от сервера
function fetchEvents() {
    if (!isRunning) return;
    
    var url = '/crm2/events/getEvent?photo=' + (withPhoto ? '1' : '0') + '&format=json&limit=' + maxRows;
    
    updateDebug('Запрос: ' + url);
    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    updateDebug('Ответ: success=' + response.success + ', events=' + (response.events ? response.events.length : 0));
                    
                    if (response.success && response.html) {
                        addEventsToTable(response.html);
                    } else if (response.success && response.events && response.events.length > 0) {
                        // Если нет HTML, но есть JSON события - рендерим вручную
                        var html = renderEventsToHtml(response.events);
                        addEventsToTable(html);
                    } else if (response.success) {
                        updateDebug('Новых событий нет');
                    } else {
                        updateDebug('Ошибка: ' + (response.error || 'Неизвестная ошибка'));
                    }
                } catch (e) {
                    updateDebug('Ошибка парсинга JSON: ' + e.message + ' | Ответ: ' + xhr.responseText.substring(0, 200));
                }
            } else {
                updateDebug('HTTP ошибка: ' + xhr.status);
            }
        }
    };
    xhr.onerror = function() {
        updateDebug('Сетевая ошибка');
    };
    xhr.send();
}

// Рендеринг событий в HTML (если сервер не вернул HTML)
function renderEventsToHtml(events) {
    var html = '';
    for (var i = 0; i < events.length; i++) {
        var e = events[i];
        html += '<tr>';
        html += '<td>' + (e.id_event || '') + '</td>';
        html += '<td>' + (e.id_eventtype || '') + '</td>';
        html += '<td>' + (e.datetime || '') + '</td>';
        html += '<td>' + escapeHtml(e.eventtype_name || '') + '</td>';
        html += '<td>' + escapeHtml(e.device_name || '') + '</td>';
        html += '<td>' + escapeHtml(e.people_name || '') + '</td>';
        html += '<td>' + escapeHtml(e.organization_name || '') + '</td>';
        html += '</tr>';
    }
    return html;
}

// Функция экранирования HTML
function escapeHtml(text) {
    if (!text) return '';
    var div = document.createElement('div');
    div.appendChild(document.createTextNode(text));
    return div.innerHTML;
}

// Настройка обработчиков событий
function setupEventHandlers() {
    var stopCheckbox = document.getElementById('updatemonitor');
    if (stopCheckbox) {
        stopCheckbox.onchange = function() {
            isRunning = !this.checked;
            var statusSpan = document.getElementById('status');
            if (statusSpan) {
                statusSpan.innerHTML = isRunning ? '● Работает' : '○ Остановлен';
                statusSpan.style.color = isRunning ? 'green' : 'red';
            }
            updateDebug(isRunning ? 'Монитор запущен' : 'Монитор остановлен');
            if (isRunning) {
                fetchEvents();
            }
        };
    }
    
    var sizeSelect = document.getElementById('selectsSize');
    if (sizeSelect) {
        sizeSelect.onchange = function() {
            maxRows = parseInt(this.value);
            updateDebug('Максимум строк: ' + maxRows);
            // Ограничиваем существующие строки
            var tbody = document.getElementById('txtHint');
            if (tbody) {
                while (tbody.rows.length > maxRows) {
                    tbody.deleteRow(tbody.rows.length - 1);
                }
            }
        };
    }
    
    var photoCheckbox = document.getElementById('photomonitor');
    if (photoCheckbox) {
        photoCheckbox.onchange = function() {
            withPhoto = this.checked;
            updateDebug('Фото: ' + (withPhoto ? 'вкл' : 'выкл'));
        };
    }
    
    // Пробел для остановки/запуска
    document.onkeypress = function(e) {
        if (e.keyCode === 32 || e.key === ' ') {
            if (stopCheckbox) {
                stopCheckbox.checked = !stopCheckbox.checked;
                stopCheckbox.onchange();
            }
            e.preventDefault();
        }
    };
}

// Запуск монитора
function startMonitor() {
    loadSettings();
    setupEventHandlers();
    
    // Первый запрос сразу
    fetchEvents();
    
    // Запускаем интервал
    var intervalTime = (window.timeUpdate || 2) * 1000;
    setInterval(function() {
        if (isRunning) {
            fetchEvents();
        }
    }, intervalTime);
    
    updateDebug('Монитор запущен, интервал: ' + intervalTime + 'ms');
}

// Запускаем при загрузке страницы
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', startMonitor);
} else {
    startMonitor();
}
</script>