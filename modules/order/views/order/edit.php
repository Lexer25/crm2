<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>

<?php
$flash_success = Session::instance()->get_once('flash_success');
$flash_error = Session::instance()->get_once('flash_error');
if ($flash_success) {
    echo '<div style="color: green; margin-bottom: 10px;">' . htmlspecialchars($flash_success) . '</div>';
}
if ($flash_error) {
    echo '<div style="color: red; margin-bottom: 10px;">' . htmlspecialchars($flash_error) . '</div>';
}

include Kohana::find_file('views', 'alert_line');

$guest = new Guest2($id_pep);
$id_card = isset($cardlist[0]['ID_CARD']) ? $cardlist[0]['ID_CARD'] : null;
$key = new Keyk($id_card);
$mode = isset($mode) ? $mode : 'guest_mode';
$user = new User();
?>

<style>
/* Стили для полей документа в одной строке */
.doc-fields-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
    flex-wrap: wrap;
}

/* Контейнер для уведомлений поиска - ПОД ПОЛЯМИ ДОКУМЕНТА */
.doc-search-notification-container {
    margin-top: 5px;
    margin-bottom: 10px;
    min-height: 30px;
}

.doc-search-notification {
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 13px;
    display: inline-block;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.doc-search-notification.info {
    background-color: #d1ecf1;
    color: #0c5460;
    border: 1px solid #bee5eb;
}

.doc-search-notification.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.doc-search-notification.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Стили для выпадающего списка результатов поиска */
#document-suggestions {
    position: absolute;
    background: white;
    border: 1px solid #ccc;
    border-radius: 3px;
    max-height: 250px;
    overflow-y: auto;
    width: 500px;
    z-index: 1000;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    font-size: 12px;
    line-height: 1.3;
}

#document-suggestions .suggestion-header {
    padding: 4px 8px;
    background: #f5f5f5;
    border-bottom: 1px solid #ddd;
    font-size: 11px;
    color: #666;
    font-weight: normal;
    cursor: default;
}

#document-suggestions .suggestion-item {
    padding: 4px 8px;
    cursor: pointer;
    border-bottom: 1px solid #f0f0f0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

#document-suggestions .suggestion-item:last-child {
    border-bottom: none;
}

#document-suggestions .suggestion-item:hover {
    background: #f0f7ff;
}

#document-suggestions .suggestion-item.selected {
    background: #e3f2fd;
}

#document-suggestions .suggestion-item.inactive {
    color: #999;
}

#document-suggestions .guest-name {
    font-weight: 500;
    margin-right: 8px;
}

#document-suggestions .guest-id {
    color: #888;
    font-size: 10px;
    margin-right: 8px;
}

#document-suggestions .guest-doc {
    color: #0066cc;
    font-size: 11px;
    margin-right: 8px;
    font-family: monospace;
    background: #e6f2ff;
    padding: 1px 4px;
    border-radius: 3px;
    display: inline-block;
}

#document-suggestions .guest-status {
    font-size: 10px;
    opacity: 0.8;
}

/* Компактный режим для заголовка */
#document-suggestions .suggestion-header {
    padding: 2px 8px;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Стили для кнопки настройки и индикатора */
.settings-btn {
    margin-bottom: 10px;
    text-align: right;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
}

.settings-btn button {
    padding: 5px 10px;
    background: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 3px;
    cursor: pointer;
}

.settings-btn button:hover {
    background: #e0e0e0;
}

.mode-indicator {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: bold;
}

.mode-document {
    background-color: #e3f2fd;
    color: #0d47a1;
    border: 1px solid #90caf9;
}

.mode-name {
    background-color: #f3e5f5;
    color: #4a148c;
    border: 1px solid #ce93d8;
}

/* Модальное окно */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 2000;
    justify-content: center;
    align-items: center;
}

.modal-window {
    background: white;
    padding: 20px;
    border-radius: 5px;
    width: 300px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.modal-window h3 {
    margin-top: 0;
}

.modal-options {
    margin: 15px 0;
}

.modal-options label {
    display: block;
    margin-bottom: 8px;
}

.modal-buttons {
    text-align: right;
}

.modal-buttons button {
    padding: 5px 10px;
    margin-left: 5px;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 3px;
}
</style>

<script type="text/javascript">
    // Чтение куки
    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    // Установка куки
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + encodeURIComponent(value) + expires + "; path=/";
    }

    // Обновление индикатора режима
    function updateModeIndicator(mode) {
        var indicator = document.getElementById('search-mode-indicator');
        if (!indicator) return;
        
        if (mode === 'name') {
            indicator.className = 'mode-indicator mode-name';
            indicator.innerHTML = '🟣 Поиск по фамилии';
        } else {
            indicator.className = 'mode-indicator mode-document';
            indicator.innerHTML = '🔵 Поиск по документу';
        }
    }

    // Текущий режим поиска из куки (по умолчанию 'document')
    var searchMode = getCookie('search_mode') || 'document';
    // Флаг для поиска по фамилии (true - включен, false - отключен)
    var ENABLE_NAME_SEARCH = (searchMode === 'name');

    // Передаем информацию о количестве бюро из PHP
    var countBuro = <?php echo (int)$user->count_buro; ?>;
    
    document.addEventListener('DOMContentLoaded', function() {
        // Создаем контейнер для уведомлений под полями документа
        var notificationContainer = document.createElement('div');
        notificationContainer.id = 'doc-search-notification-container';
        notificationContainer.className = 'doc-search-notification-container';
        
        // Находим контейнер с полями документа и вставляем уведомления после него
        var docFieldsRow = document.querySelector('.doc-fields-row');
        if (docFieldsRow) {
            docFieldsRow.parentNode.insertBefore(notificationContainer, docFieldsRow.nextSibling);
        }
        
        var fields = [
            'surname',
            'name',
            'patronymic',
            'docnum1',
            'docnum2',
            'datedoc'
        ];

        // Добавляем обработчик для каждого поля
        fields.forEach(function(fieldId, index) {
            var field = document.getElementById(fieldId);
            if (field) {
                field.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault(); 
                        var nextIndex = index + 1;
                        if (nextIndex < fields.length) {
                            var nextField = document.getElementById(fields[nextIndex]);
                            if (nextField) {
                                nextField.focus();
                            }
                        }
                    }
                });
            }
        });

        // Автозаполнение ФИО по номеру документа
        var currentMode = document.getElementById('mode') ? document.getElementById('mode').value : '';
        
        // Проверяем, что мы в нужных режимах
        if (currentMode === 'buro' || currentMode === 'guest_mode' || currentMode === 'neworder') {
            setupDocumentAutoFill();
        }

        // Настройка модального окна
        var modalOverlay = document.getElementById('settings-modal');
        var settingsBtn = document.getElementById('settings-button');
        var closeBtn = document.getElementById('modal-close');
        var saveBtn = document.getElementById('modal-save');
        var nameRadio = document.getElementById('mode-name');
        var docRadio = document.getElementById('mode-document');

        // Устанавливаем текущий режим в радиокнопках
        if (searchMode === 'name') {
            nameRadio.checked = true;
        } else {
            docRadio.checked = true;
        }

        // Обновляем индикатор при загрузке
        updateModeIndicator(searchMode);

        if (settingsBtn) {
            settingsBtn.addEventListener('click', function() {
                modalOverlay.style.display = 'flex';
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                modalOverlay.style.display = 'none';
            });
        }

        if (saveBtn) {
            saveBtn.addEventListener('click', function() {
                var newMode = nameRadio.checked ? 'name' : 'document';
                setCookie('search_mode', newMode, 365);
                searchMode = newMode;
                ENABLE_NAME_SEARCH = (newMode === 'name');
                modalOverlay.style.display = 'none';
                
                // Обновляем индикатор
                updateModeIndicator(newMode);
                
                showNotification('Режим поиска изменен', 'info');
            });
        }

        // Закрытие по клику на фон
        if (modalOverlay) {
            modalOverlay.addEventListener('click', function(e) {
                if (e.target === modalOverlay) {
                    modalOverlay.style.display = 'none';
                }
            });
        }
    });

    // Функция для настройки автозаполнения по документу
    function setupDocumentAutoFill() {
        // Получаем ссылки на поля
        var docnum1Field = document.getElementById('docnum1');
        var docnum2Field = document.getElementById('docnum2');
        var surnameField = document.getElementById('surname');
        var nameField = document.getElementById('name');
        var patronymicField = document.getElementById('patronymic');
        
        var searchTimeout;
        var selectedIndex = -1;
        var currentResults = [];
        
        // Создаем контейнер для результатов поиска
        var suggestionsContainer = document.createElement('div');
        suggestionsContainer.id = 'document-suggestions';
        
        // Добавляем контейнер после поля номера документа
        if (docnum2Field) {
            var parent = docnum2Field.parentNode;
            var computedStyle = window.getComputedStyle(parent);
            if (computedStyle.position === 'static') {
                parent.style.position = 'relative';
            }
            parent.appendChild(suggestionsContainer);
        }
        
        // Функция поиска гостей по документу
        function searchGuestsByDocument() {
            var docnum1 = docnum1Field ? String(docnum1Field.value).trim() : '';
            var docnum2 = docnum2Field ? String(docnum2Field.value).trim() : '';
            
            if (docnum1 && docnum2) {
                // Показываем уведомление "Поиск..." под полями документа
                showNotification('🔍 Поиск...', 'info');
                
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'order/searchByDocument', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            try {
                                var response = JSON.parse(xhr.responseText);
                                currentResults = response.data || [];
                                
                                // Скрываем список перед обновлением
                                hideSuggestions();
                                
                                if (response.success && response.data && response.data.length > 0) {
                                    showSuggestions(response);
                                    clearNotification();
                                } else {
                                    showNotification('❌ Гость не найден', 'error');
                                    // Очищаем ФИО и скрытое поле, если ничего не найдено
                                    surnameField.value = '';
                                    nameField.value = '';
                                    patronymicField.value = '';
                                    var idField = document.getElementById('selected_guest_id');
                                    if (idField) idField.value = '';
                                }
                            } catch (e) {
                                hideSuggestions();
                                showNotification('❌ Ошибка обработки данных', 'error');
                            }
                        } else {
                            hideSuggestions();
                            showNotification('❌ Ошибка сервера: ' + xhr.status, 'error');
                        }
                    }
                };
                
                var params = 'docnum1=' + encodeURIComponent(docnum1) + 
                           '&docnum2=' + encodeURIComponent(docnum2);
                xhr.send(params);
            } else {
                hideSuggestions();
                clearNotification();
            }
        }
        
        // Функция поиска по фамилии (будет доступна, если включен флаг)
        function searchByFio(surname) {
            if (surname.length < 3) return;
            
            showNotification('🔍 Поиск по фамилии...', 'info');
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'order/searchByFio', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            currentResults = response.data || [];
                            
                            hideSuggestions();
                            
                            if (response.success && response.data && response.data.length > 0) {
                                showSuggestions(response);
                                clearNotification();
                            } else {
                                showNotification('❌ Гости с такой фамилией не найдены', 'error');
                            }
                        } catch (e) {
                            hideSuggestions();
                            showNotification('❌ Ошибка обработки данных', 'error');
                        }
                    } else {
                        hideSuggestions();
                        showNotification('❌ Ошибка сервера: ' + xhr.status, 'error');
                    }
                }
            };
            
            var params = 'surname=' + encodeURIComponent(surname);
            xhr.send(params);
        }
        
        // Функция отображения результатов (общая для обоих поисков)
        function showSuggestions(response) {
            suggestionsContainer.innerHTML = '';
            selectedIndex = -1;
            
            if (response.success && response.data && response.data.length > 0) {
                var results = response.data;
                
                // Заголовок
                var header = document.createElement('div');
                header.className = 'suggestion-header';
                header.textContent = 'Найдено: ' + results.length;
                suggestionsContainer.appendChild(header);
                
                // Создаем элементы для каждого гостя
                results.forEach(function(guest, index) {
                    var item = document.createElement('div');
                    item.className = 'suggestion-item';
                    item.setAttribute('data-index', index);
                    
                    // Формируем ФИО одной строкой
                    var fullName = [guest.surname, guest.name, guest.patronymic]
                        .filter(function(part) { return part && part.trim() !== ''; })
                        .join(' ');
                    
                    // Извлекаем серию и номер документа из numdoc
                    var docDisplay = '';
                    if (guest.numdoc && guest.numdoc !== '#@') {
                        var parts = guest.numdoc.split('#');
                        if (parts.length > 0) {
                            var docSeries = parts[0];
                            if (parts.length > 1) {
                                var numberParts = parts[1].split('@');
                                var docNumber = numberParts[0];
                                docDisplay = docSeries + ' ' + docNumber;
                            }
                        }
                    }
                    
                    // Индикатор активности
                    var statusMarker = guest.is_active ? '🟢' : '⚪';
                    
                    // Формируем строку: ФИО + документ + ID + статус
                    item.innerHTML = '<span class="guest-name">' + fullName + '</span> ' +
                                    '<span class="guest-doc">' + docDisplay + '</span> ' +
                                    '<span class="guest-id">ID:' + guest.id_pep + '</span> ' +
                                    '<span class="guest-status">' + statusMarker + '</span>';
                    
                    if (!guest.is_active) {
                        item.classList.add('inactive');
                    }
                    
                    item.onclick = function() {
                        selectGuest(guest);
                    };
                    
                    suggestionsContainer.appendChild(item);
                });
                
                suggestionsContainer.style.display = 'block';
                
                // Добавляем обработчик клавиш для навигации
                docnum2Field.addEventListener('keydown', handleSuggestionKeydown);
            }
        }
        
        // Функция выбора гостя
        function selectGuest(guest) {
            surnameField.value = guest.surname || '';
            nameField.value = guest.name || '';
            patronymicField.value = guest.patronymic || '';
            
            // Парсим numdoc для заполнения полей документа
            if (guest.numdoc && guest.numdoc !== '#@') {
                var parts = guest.numdoc.split('#');
                
                // Серия документа (docnum1)
                if (parts.length > 0) {
                    docnum1Field.value = parts[0] || '';
                }
                
                // Номер и тип документа (docnum2 и doc_type)
                if (parts.length > 1) {
                    var numberParts = parts[1].split('@');
                    // Номер документа (docnum2)
                    if (numberParts.length > 0) {
                        docnum2Field.value = numberParts[0] || '';
                    }
                    // Тип документа (doc_type)
                    if (numberParts.length > 1) {
                        var docTypeField = document.getElementById('doc_type');
                        if (docTypeField) {
                            docTypeField.value = numberParts[1];
                        }
                    }
                }
            }
            
            // Добавляем или обновляем скрытое поле с ID гостя
            var idField = document.getElementById('selected_guest_id');
            if (!idField) {
                idField = document.createElement('input');
                idField.type = 'hidden';
                idField.name = 'selected_guest_id';
                idField.id = 'selected_guest_id';
                document.getElementById('main_form').appendChild(idField);
            }
            idField.value = guest.id_pep;
            
            // Показываем уведомление об успешном выборе
            var fullName = [guest.surname, guest.name, guest.patronymic]
                .filter(function(part) { return part && part.trim() !== ''; })
                .join(' ');
            showNotification('✅ Выбран: ' + fullName, 'success');
            
            hideSuggestions();
            docnum2Field.removeEventListener('keydown', handleSuggestionKeydown);
        }
        
        // Функция обработки клавиш для навигации по списку
        function handleSuggestionKeydown(event) {
            var items = suggestionsContainer.querySelectorAll('.suggestion-item:not(.suggestion-header)');
            
            if (items.length === 0) return;
            
            switch(event.key) {
                case 'ArrowDown':
                    event.preventDefault();
                    selectedIndex = (selectedIndex + 1) % items.length;
                    updateSelectedItem(items);
                    break;
                    
                case 'ArrowUp':
                    event.preventDefault();
                    selectedIndex = selectedIndex <= 0 ? items.length - 1 : selectedIndex - 1;
                    updateSelectedItem(items);
                    break;
                    
                case 'Enter':
                    event.preventDefault();
                    if (selectedIndex >= 0 && selectedIndex < items.length) {
                        var index = items[selectedIndex].getAttribute('data-index');
                        if (index !== null && currentResults[index]) {
                            selectGuest(currentResults[index]);
                        }
                    }
                    break;
                    
                case 'Escape':
                    event.preventDefault();
                    hideSuggestions();
                    break;
            }
        }
        
        // Функция обновления выделенного элемента
        function updateSelectedItem(items) {
            items.forEach(function(item) {
                item.classList.remove('selected');
            });
            
            if (selectedIndex >= 0 && selectedIndex < items.length) {
                items[selectedIndex].classList.add('selected');
                items[selectedIndex].scrollIntoView({ block: 'nearest' });
            }
        }
        
        // Функция скрытия результатов
        function hideSuggestions() {
            if (suggestionsContainer) {
                suggestionsContainer.style.display = 'none';
                suggestionsContainer.innerHTML = '';
            }
            selectedIndex = -1;
            if (docnum2Field) {
                docnum2Field.removeEventListener('keydown', handleSuggestionKeydown);
            }
        }
        
        // Добавляем обработчики событий для полей документа
        if (docnum1Field) {
            docnum1Field.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                hideSuggestions();
                clearNotification();
                // Очищаем ФИО при новом вводе
                surnameField.value = '';
                nameField.value = '';
                patronymicField.value = '';
                var idField = document.getElementById('selected_guest_id');
                if (idField) idField.value = '';
                
                searchTimeout = setTimeout(function() {
                    searchGuestsByDocument();
                }, 1000);
            });
            
            docnum1Field.addEventListener('focus', function() {
                var idField = document.getElementById('selected_guest_id');
                if (idField) {
                    idField.value = '';
                }
            });
        }
        
        if (docnum2Field) {
            docnum2Field.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                hideSuggestions();
                clearNotification();
                // Очищаем ФИО при новом вводе
                surnameField.value = '';
                nameField.value = '';
                patronymicField.value = '';
                var idField = document.getElementById('selected_guest_id');
                if (idField) idField.value = '';
                
                searchTimeout = setTimeout(function() {
                    searchGuestsByDocument();
                }, 1000);
            });
            
            docnum2Field.addEventListener('focus', function() {
                var idField = document.getElementById('selected_guest_id');
                if (idField) {
                    idField.value = '';
                }
            });
        }
        
        // Добавляем обработчик поиска по фамилии (внутри проверяем флаг)
        if (surnameField) {
            surnameField.addEventListener('input', function() {
                var val = this.value.trim();
                clearTimeout(searchTimeout);
                hideSuggestions();
                clearNotification();
                
                if (ENABLE_NAME_SEARCH && val.length >= 3) {
                    searchTimeout = setTimeout(function() {
                        searchByFio(val);
                    }, 1000);
                }
            });
        }
        
        // Закрывать список при клике вне его
        document.addEventListener('click', function(event) {
            if (suggestionsContainer && !suggestionsContainer.contains(event.target) && 
                event.target !== docnum1Field && 
                event.target !== docnum2Field) {
                hideSuggestions();
            }
        });
        
        // Очищаем скрытое поле при ручном изменении ФИО
        [surnameField, nameField, patronymicField].forEach(function(field) {
            if (field) {
                field.addEventListener('input', function() {
                    var idField = document.getElementById('selected_guest_id');
                    if (idField && idField.value) {
                        idField.value = '';
                    }
                });
            }
        });
    }
    
    // Функция для очистки уведомления
    function clearNotification() {
        var container = document.getElementById('doc-search-notification-container');
        if (container) {
            container.innerHTML = '';
        }
    }
    
    // Функция для показа уведомлений под полями документа
    function showNotification(message, type) {
        var container = document.getElementById('doc-search-notification-container');
        if (!container) return;
        
        // Очищаем контейнер
        container.innerHTML = '';
        
        // Создаем новое уведомление
        var notification = document.createElement('div');
        notification.className = 'doc-search-notification ' + type;
        notification.textContent = message;
        
        container.appendChild(notification);
        
        // Автоматически удаляем уведомление через 3 секунды
        setTimeout(function() {
            if (notification && notification.parentNode) {
                notification.remove();
            }
        }, 3000);
    }
    
    // Защита от ошибки с updateAdditionalInfo
    if (typeof updateAdditionalInfo === 'undefined') {
        window.updateAdditionalInfo = function() {
            return true;
        };
    }

    // Валидация формы
    function validate() {
        var surname = document.getElementById('surname').value.trim();
        var name = document.getElementById('name').value.trim();
        var error1 = document.getElementById('error1');
        var error_name = document.getElementById('error_name');
        var error_patronymic = document.getElementById('error_patronymic');
        var error_org = document.getElementById('error_org');
        var error_buro = document.getElementById('error_buro');
        var error_consent = document.getElementById('error_consent');

        var isValid = true;
        
        var currentMode = document.getElementById('mode') ? document.getElementById('mode').value : '';
        var isConsentButton = event && event.submitter && event.submitter.name === 'consent2';
        
        // Управляем атрибутом required в зависимости от режима и кнопки
        var surnameField = document.getElementById('surname');
        var nameField = document.getElementById('name');
        var orgSelector = document.getElementById('org_selector');
        
        if (isConsentButton) {
            if (surnameField) surnameField.removeAttribute('required');
            if (nameField) nameField.removeAttribute('required');
            if (orgSelector) orgSelector.removeAttribute('required');
            
            var buroRadios = document.querySelectorAll('input[name="selected_buro"]');
            buroRadios.forEach(function(radio) {
                radio.removeAttribute('required');
            });
        } else {
            if (currentMode === 'neworder') {
                if (surnameField) surnameField.setAttribute('required', 'required');
                
                var buroRadios = document.querySelectorAll('input[name="selected_buro"]');
                if (countBuro > 1) {
                    buroRadios.forEach(function(radio) {
                        radio.setAttribute('required', 'required');
                    });
                } else {
                    buroRadios.forEach(function(radio) {
                        radio.removeAttribute('required');
                    });
                }
            } else {
                if (surnameField) surnameField.removeAttribute('required');
                
                var buroRadios = document.querySelectorAll('input[name="selected_buro"]');
                buroRadios.forEach(function(radio) {
                    radio.removeAttribute('required');
                });
            }
            
            if (nameField) nameField.removeAttribute('required');
            if (orgSelector) orgSelector.removeAttribute('required');
        }

        if (currentMode === 'neworder' && surname === '') {
            error1.style.display = 'block';
            isValid = false;
        } else {
            error1.style.display = 'none';
        }

        if (name.length > 50) {
            error_name.style.display = 'block';
            isValid = false;
        } else {
            error_name.style.display = 'none';
        }

        var patronymic = document.getElementById('patronymic').value.trim();
        if (patronymic.length > 50) {
            error_patronymic.style.display = 'block';
            isValid = false;
        } else {
            error_patronymic.style.display = 'none';
        }

        if (error_org) {
            error_org.style.display = 'none';
        }
        
        if (currentMode === 'neworder' && countBuro > 1) {
            var selectedBuro = document.querySelector('input[name="selected_buro"]:checked');
            if (!selectedBuro) {
                if (error_buro) {
                    error_buro.style.display = 'block';
                }
                isValid = false;
            } else {
                if (error_buro) {
                    error_buro.style.display = 'none';
                }
            }
        } else {
            if (error_buro) {
                error_buro.style.display = 'none';
            }
        }

        var error_consent = document.getElementById('error_consent');
        if (error_consent) {
            error_consent.style.display = 'none';
        }

        return isValid;
    }
</script>

<!-- Модальное окно настроек -->
<div class="modal-overlay" id="settings-modal">
    <div class="modal-window">
        <h3>Настройки поиска</h3>
        <div class="modal-options">
            <label>
                <input type="radio" name="searchMode" id="mode-document" value="document" checked>
                Поиск по номеру документа
            </label>
            <label>
                <input type="radio" name="searchMode" id="mode-name" value="name">
                Поиск по фамилии
            </label>
        </div>
        <div class="modal-buttons">
            <button type="button" id="modal-close">Отмена</button>
            <button type="button" id="modal-save">Сохранить</button>
        </div>
    </div>
</div>

<div class="onecolumn">
    <div class="header">
        <span>
            <?php
            switch ($mode) {
                case 'newguest':
                case 'neworder':
                    echo '<span>' . __('guest.registration') . '</span>';
                    break;
                case 'guest_mode':
                    echo $id_pep ? __('guest.title') . ': ' . htmlspecialchars($guest->surname) . ' ' . htmlspecialchars($guest->name) . (!empty($guest->patronymic) ? ' ' . htmlspecialchars($guest->patronymic) : '') : '';
                    break;
                case 'archive_mode':
                    echo $id_pep ? __('guest.titleinArchive') . ': ' . htmlspecialchars($guest->surname) . ' ' . htmlspecialchars($guest->name) . (!empty($guest->patronymic) ? ' ' . htmlspecialchars($guest->patronymic) : '') : '';
                    break;
                case 'buro':
                    echo $id_pep ? __('guest.title') . ': ' . htmlspecialchars($guest->surname) . ' ' . htmlspecialchars($guest->name) . ' ' . htmlspecialchars($guest->patronymic) : '';
                    break;
            }
            ?>
        </span>
    </div>
    <br class="clear" />
    <div class="content">
        <!-- Кнопка настройки и индикатор -->
        <div class="settings-btn">
            <span id="search-mode-indicator" class="mode-indicator mode-document">🔵 Поиск по документу</span>
            <button type="button" id="settings-button">⚙️ Настройка</button>
        </div>

        <form action="order/save" method="post" id="main_form" onsubmit="return validate()">
            <input type="hidden" name="hidden" value="form_sent" />
            <input type="hidden" name="id_pep" value="<?php echo $id_pep; ?>" />
            <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" />

            <table style="margin: 0">
                <tr>
                    <td>
                        <?php
                        switch ($mode) {
                            case 'newguest':
                            case 'guest_mode':
                            case 'archive_mode':
                            case 'buro':
                            case 'neworder':
                                include Kohana::find_file('views', 'order/block/personal_data');
                                break;
                        }
                        ?>
                    </td>
                    <td style="padding-left: 40px; vertical-align: top;">
                        <?php
                        switch ($mode) {
                            case 'newguest':
                                include Kohana::find_file('views', 'order/block/card_dates');
                                echo '<br>';
                                $selectOrgView = View::factory('order/block/selectOrg');
                                $selectOrgView->set('current_org_id', $current_org_id);
                                $selectOrgView->set('mode', $mode);
                                $selectOrgView->set('org', $org);
                                echo $selectOrgView->render();
                                echo '<br>';
                                include Kohana::find_file('views', 'order/block/selectBuro');
                                break;
                            case 'guest_mode':  
                                if ($user->id_role == 1 || $user->id_role == 2) {
                                    include Kohana::find_file('views', 'order/block/rfid');
                                    echo '<br>';
                                    include Kohana::find_file('views', 'order/block/card_dates');
                                    echo '<br>';
                                    $selectOrgView = View::factory('order/block/selectOrg');
                                    $selectOrgView->set('current_org_id', $current_org_id);
                                    $selectOrgView->set('mode', $mode);
                                    $selectOrgView->set('org', $org);
                                    echo $selectOrgView->render();
                                    echo '<br>';
                                    include Kohana::find_file('views', 'order/block/forPD');
                                } elseif ($user->id_role == 3) {
                                    if (!empty($cardlist[0]['ID_CARD'])) {
                                        include Kohana::find_file('views', 'order/block/rfid');
                                        echo '<br>';
                                    }
                                    include Kohana::find_file('views', 'order/block/card_dates');
                                }
                                break;
                            case 'archive_mode':
                                if (!empty($cardlist[0]['ID_CARD'])) {
                                    include Kohana::find_file('views', 'order/block/rfid');
                                }
                                include Kohana::find_file('views', 'order/block/card_dates');
                                echo '<br>';
                                include Kohana::find_file('views', 'order/block/forPD');
                                echo '<br>';
                                $selectOrgView = View::factory('order/block/selectOrg');
                                $selectOrgView->set('current_org_id', $current_org_id);
                                $selectOrgView->set('mode', $mode);
                                $selectOrgView->set('org', $org);
                                echo $selectOrgView->render();
                                echo '<br>';
                                include Kohana::find_file('views', 'order/block/selectBuro');
                                break;
                            case 'neworder':
                                include Kohana::find_file('views', 'order/block/rfid');
                                echo '<br>';
                                include Kohana::find_file('views', 'order/block/card_dates');
                                echo '<br>';
                                $selectOrgView = View::factory('order/block/selectOrg');
                                $selectOrgView->set('current_org_id', $current_org_id);
                                $selectOrgView->set('mode', $mode);
                                $selectOrgView->set('org', $org);
                                echo $selectOrgView->render();
                                echo '<br>';
                                include Kohana::find_file('views', 'order/block/selectBuro');
                                echo '<br>';
                                include Kohana::find_file('views', 'order/block/forPD');
                                break;
                            case 'buro':
                                include Kohana::find_file('views', 'order/block/rfid');
                                echo '<br>';
                                include Kohana::find_file('views', 'order/block/card_dates');
                                echo '<br>';
                                $selectOrgView = View::factory('order/block/selectOrg');
                                $selectOrgView->set('current_org_id', $current_org_id);
                                $selectOrgView->set('mode', $mode);
                                $selectOrgView->set('org', $org);
                                echo $selectOrgView->render();
                                echo '<br>';
                                include Kohana::find_file('views', 'order/block/forPD');
                                break;
                        }
                        ?>
                    </td>
                    <td style="padding-left: 40px; vertical-align: top;">
                        <?php
                        switch ($mode) {
                            case 'newguest':
                            case 'guest_mode':
                            case 'archive_mode':
                            case 'neworder':
                            case 'buro':
                                include Kohana::find_file('views', 'order/block/note');
                                if (($mode == 'buro' || $mode == 'neworder' || $mode == 'guest_mode') && ($user->id_role == 2 || $user->id_role == 1)) {
                                    echo '<br>';
                                    include Kohana::find_file('views', 'order/block/access_checkboxes');
                                }
                                break;
                        }
                        ?>
                    </td>
                </tr>
            </table>
            
            <br />
            <?php
            switch ($mode) {
                case 'neworder':
    if ($user->id_role == 1 || $user->id_role == 2) {
        echo Form::open('order/save');
        echo Form::hidden('todo', 'savenewwithcard'); 
        echo Form::submit('savenewwithcard', __('order.edit.nameAddGuestWithCardBtn'), array(
            'class' => 'btn',
            'onclick' => "this.form.elements.todo.value='savenewwithcard'; document.getElementById('org_selector').removeAttribute('required'); return true;"
        ));
        
        $pd = new PD($id_pep);
        $signature_file = $pd->checkSignatureSingle($id_pep);
        if ($signature_file === false || !file_exists($signature_file)) {
        echo Form::submit('consent2', __('order.edit.nameConsentBtn'), array(
            'class' => 'btn',
            'onclick' => "this.form.elements.todo.value='consent2'; document.getElementById('org_selector').removeAttribute('required'); document.getElementById('name').removeAttribute('required'); return true;"
        ));
        } else {
            if ($mode !== 'neworder') {
                echo '<a href="/index.php/order/view_signature/' . htmlspecialchars($id_pep) . '" class="btn">' . __('order.edit.nameViewSignature') . '</a>';
            }
        }
        
        echo '<br /><span class="error" id="error_consent" style="color: red; display: none;">' . __('Требуется согласие на обработку персональных данных') . '</span>';
        
        if (!empty($cardlist[0]['ID_CARD'])) {
            echo Form::submit('forceexit', __('order.edit.nameForceexitBtn'), array(
                'class' => 'btn',
                'onclick' => "this.form.elements.todo.value='forceexit'; document.getElementById('org_selector').removeAttribute('required');"
            ));
        }
        echo Form::close();
    } else {
        echo Form::open('order/save');
        echo Form::hidden('todo', 'update');
        echo Form::submit('update', __('Обновить гостя'), array(
            'class' => 'btn',
            'onclick' => "this.form.elements.todo.value='update';"
        ));
        echo Form::close();
    }
    break;
                case 'newguest':
                    echo Form::hidden('todo', 'savenew');
                    echo Form::submit('savenew', __('order.edit.nameAddGuestBtn'));
                    break;
                case 'guest_mode':
                    if ($user->id_role == 1 || $user->id_role == 2) {
                        echo Form::hidden('todo', 'reissue'); 
                        echo Form::submit('reissue', __('order.edit.nameUpdateBtn'), array(
                            'onclick' => "this.form.elements.todo.value='reissue'"
                        ));
                        if (!empty($cardlist[0]['ID_CARD'])) {
                            echo Form::open();
                            echo Form::hidden('todo', 'forceexit');
                            echo Form::submit('forceexit', __('order.edit.nameForceexitBtn'), array(
                                'onclick' => "this.form.elements.todo.value='forceexit'"
                            ));
                        }
                        echo Form::close();
                        
                        $pd = new PD($id_pep);
                        $signature_file = $pd->checkSignatureSingle($id_pep);
                        if ($signature_file === false || !file_exists($signature_file)) {
                            echo Form::open('order/PersonalData/' . $id_pep, array('class'=>'consent'));
                            echo Form::hidden('todo', 'consent');
                            echo Form::submit('consent', __('order.edit.nameConsentBtn'), array(
                                'onclick' => "this.form.elements.todo.value='consent'"
                            ));
                            echo Form::close();
                        } else {
                            if ($mode !== 'neworder') {
                                echo Form::open('order/view_signature_page/'. $id_pep, array('class'=>'signature'));
                                echo Form::hidden('todo', 'signature');
                                echo Form::submit('signature', __('order.edit.nameViewSignature'), array(
                                    'onclick'=> "this.form.elements.todo.value='signature'"
                                ));
                                echo Form::close();
                            }
                        }
                        
                    }
                    echo Form::close();
                    echo Form::open('order/historyGuest/' . $id_pep, array('class' => 'history-form'));
                    echo Form::hidden('todo', 'viewhistory');
                    echo Form::submit('viewhistory', __('order.edit.nameHistoryBtn'), array(
                        'class' => 'btn',
                        'onclick' => "this.form.elements.todo.value='viewhistory';"
                    ));
                    echo Form::close();
                    break;
                case 'archive_mode':
    if ($user->id_role == 1 || $user->id_role == 2) {
        if (!empty($cardlist[0]['ID_CARD'])) {
            echo Form::open('order/save');
            echo Form::hidden('todo', 'forceexit');
            echo Form::submit('forceexit', __('order.edit.nameForceexitBtn'), array(
                'class' => 'btn'
            ));
            echo Form::close();
            echo '<br>';
        }
        echo Form::open('order/save');
        echo Form::hidden('todo', 'newguestorder3');
        echo Form::submit('newguestorder3', __('order.edit.nameRepeatOrderBtn'), array(
            'class' => 'btn',
            'onclick' => "this.form.elements.todo.value='newguestorder3'; return confirm('Вы уверены, что хотите повторить заявку?');"
        ));
        echo Form::close();
    } elseif ($user->id_role == 2 || $user->id_role == 3) {
        echo Form::open('order/save');
        echo Form::hidden('todo', 'newguestorder');
        echo Form::submit('newguestorder', __('Повторить заявку'), array(
            'class' => 'btn',
            'onclick' => "this.form.elements.todo.value='newguestorder'; return confirm('Вы уверены, что хотите повторить заявку?');"
        ));
        echo Form::close();
    }
    echo '<br>';
    echo Form::open('order/historyGuest/' . $id_pep, array('class' => 'history-form'));
    echo Form::hidden('todo', 'viewhistory');
    echo Form::submit('viewhistory', __('order.edit.nameHistoryBtn'), array(
        'class' => 'btn',
        'onclick' => "this.form.elements.todo.value='viewhistory';"
    ));
    echo Form::close();
    break;
                case 'buro':
                    if ($user->id_role == 1 || $user->id_role == 2) {
                        echo Form::hidden('todo', 'reissue'); 
                        echo Form::submit('reissue', __('order.edit.nameUpdateBtn'), array(
                            'onclick' => "this.form.elements.todo.value='reissue'"
                        ));
                        if (!empty($cardlist[0]['ID_CARD'])) {
                            echo Form::open();
                            echo Form::hidden('todo', 'forceexit');
                            echo Form::submit('forceexit', __('order.edit.nameForceexitBtn'), array(
                                'onclick' => "this.form.elements.todo.value='forceexit'"
                            ));
                        }
                        echo Form::close();
                        
                        $pd = new PD($id_pep);
                        $signature_file = $pd->checkSignatureSingle($id_pep);
                        if ($signature_file === false || !file_exists($signature_file)) {
                            echo Form::open('order/PersonalData/' . $id_pep, array('class'=>'consent'));
                            echo Form::hidden('todo', 'consent');
                            echo Form::submit('consent', __('order.edit.nameConsentBtn'), array(
                                'onclick' => "this.form.elements.todo.value='consent'"
                            ));
                            echo Form::close();
                        } else {
                            if ($mode !== 'neworder') {
                                echo Form::open('order/view_signature_page/'. $id_pep, array('class'=>'signature'));
                                echo Form::hidden('todo', 'signature');
                                echo Form::submit('signature', __('order.edit.nameViewSignature'), array(
                                    'onclick'=> "this.form.elements.todo.value='signature'"
                                ));
                                echo Form::close();
                            }
                        }
                        
                    } else {
                        echo Form::hidden('todo', 'update');
                        echo Form::submit('update', __('Обновить гостя'));
                    }
                    echo Form::close();
                    echo Form::open('order/historyGuest/' . $id_pep, array('class' => 'history-form'));
                    echo Form::hidden('todo', 'viewhistory');
                    echo Form::submit('viewhistory', __('order.edit.nameHistoryBtn'), array(
                        'class' => 'btn',
                        'onclick' => "this.form.elements.todo.value='viewhistory';"
                    ));
                    echo Form::close();
                    break;
                default:
                    break;
            }
            if ($mode != 'archive_mode') {
                echo Form::close();
            }
            ?>

            <?php
            echo 'id_pep=' . $guest->id_pep;
            echo '<br>';
            echo 'mode=' . $mode;
            ?>
        </form>
    </div>
</div>