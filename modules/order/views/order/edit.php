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
#document-suggestions {
    position: absolute;
    background: white;
    border: 1px solid #ccc;
    border-radius: 4px;
    max-height: 250px;
    overflow-y: auto;
    width: 350px;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    font-size: 13px;
}

#document-suggestions div {
    padding: 8px 10px;
    cursor: pointer;
    border-bottom: 1px solid #eee;
    transition: background 0.2s;
}

#document-suggestions div:last-child {
    border-bottom: none;
}

#document-suggestions div:hover {
    background: #f5f9ff;
}

#document-suggestions div.selected {
    background: #e3f2fd;
}

#document-suggestions .suggestion-header {
    padding: 8px 10px;
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    font-weight: bold;
    color: #495057;
    cursor: default;
}

#document-suggestions .suggestion-header:hover {
    background: #f8f9fa;
}

#document-suggestions .inactive-guest {
    color: #999;
    font-style: italic;
}

#document-suggestions .guest-id {
    color: #6c757d;
    font-size: 11px;
    margin-top: 2px;
}

#document-suggestions .guest-status {
    display: inline-block;
    padding: 2px 6px;
    border-radius: 3px;
    font-size: 10px;
    margin-left: 5px;
}

#document-suggestions .status-active {
    background: #d4edda;
    color: #155724;
}

#document-suggestions .status-inactive {
    background: #f8d7da;
    color: #721c24;
}
</style>

<script type="text/javascript">
    // Передаем информацию о количестве бюро из PHP
    var countBuro = <?php echo (int)$user->count_buro; ?>;
    
    document.addEventListener('DOMContentLoaded', function() {
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
    });

    // Функция для настройки автозаполнения по документу
    function setupDocumentAutoFill() {
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
            // Убеждаемся, что родительский элемент имеет позиционирование
            var parent = docnum2Field.parentNode;
            var computedStyle = window.getComputedStyle(parent);
            if (computedStyle.position === 'static') {
                parent.style.position = 'relative';
            }
            parent.appendChild(suggestionsContainer);
        }
        
        // Функция поиска гостей по документу
        function searchGuestsByDocument() {
            var docnum1 = docnum1Field ? docnum1Field.value.trim() : '';
            var docnum2 = docnum2Field ? docnum2Field.value.trim() : '';
            
            if (docnum1 && docnum2) {
                // Показываем индикатор загрузки
                showSuggestionsLoading();
                
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'order/searchByDocument', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            try {
                                var response = JSON.parse(xhr.responseText);
                                currentResults = response.data || [];
                                showSuggestions(response);
                            } catch (e) {
                                console.error('Ошибка обработки ответа:', e);
                                showSuggestionsError('Ошибка обработки данных');
                            }
                        } else {
                            showSuggestionsError('Ошибка сервера: ' + xhr.status);
                        }
                    }
                };
                
                var params = 'docnum1=' + encodeURIComponent(docnum1) + 
                           '&docnum2=' + encodeURIComponent(docnum2);
                xhr.send(params);
            } else {
                hideSuggestions();
            }
        }
        
        // Функция отображения индикатора загрузки
        function showSuggestionsLoading() {
            suggestionsContainer.innerHTML = '';
            
            var loadingItem = document.createElement('div');
            loadingItem.style.cssText = 'padding: 15px; text-align: center; color: #666;';
            loadingItem.innerHTML = 'Поиск... <span style="font-size: 11px;">(идет загрузка)</span>';
            suggestionsContainer.appendChild(loadingItem);
            suggestionsContainer.style.display = 'block';
        }
        
        // Функция отображения ошибки
        function showSuggestionsError(message) {
            suggestionsContainer.innerHTML = '';
            
            var errorItem = document.createElement('div');
            errorItem.style.cssText = 'padding: 15px; text-align: center; color: #dc3545;';
            errorItem.textContent = message;
            suggestionsContainer.appendChild(errorItem);
            suggestionsContainer.style.display = 'block';
            
            setTimeout(hideSuggestions, 2000);
        }
        
        // Функция отображения результатов
        function showSuggestions(response) {
            suggestionsContainer.innerHTML = '';
            selectedIndex = -1;
            
            if (response.success && response.data && response.data.length > 0) {
                var results = response.data;
                
                // Заголовок с количеством результатов
                var header = document.createElement('div');
                header.className = 'suggestion-header';
                header.textContent = 'Найдено гостей: ' + results.length;
                suggestionsContainer.appendChild(header);
                
                // Создаем элементы для каждого гостя
                results.forEach(function(guest, index) {
                    var item = document.createElement('div');
                    item.setAttribute('data-index', index);
                    
                    // Формируем ФИО
                    var fullName = [guest.surname, guest.name, guest.patronymic]
                        .filter(function(part) { return part && part.trim() !== ''; })
                        .join(' ');
                    
                    // Добавляем класс для неактивных гостей
                    if (!guest.is_active) {
                        item.classList.add('inactive-guest');
                    }
                    
                    // Формируем содержимое
                    var statusHtml = guest.is_active ? 
                        '<span class="guest-status status-active">Активен</span>' : 
                        '<span class="guest-status status-inactive">Неактивен</span>';
                    
                    item.innerHTML = '<strong>' + fullName + '</strong> ' + statusHtml + 
                                    '<div class="guest-id">ID: ' + guest.id_pep + '</div>';
                    
                    // При клике заполняем поля
                    item.onclick = function() {
                        selectGuest(guest);
                    };
                    
                    suggestionsContainer.appendChild(item);
                });
                
                suggestionsContainer.style.display = 'block';
                
                // Добавляем обработчик клавиш для навигации
                docnum2Field.addEventListener('keydown', handleSuggestionKeydown);
                
            } else if (response.message) {
                // Показываем сообщение, если гостей не найдено
                var message = document.createElement('div');
                message.style.cssText = 'padding: 15px; text-align: center; color: #666;';
                message.textContent = response.message || 'Гости не найдены';
                suggestionsContainer.appendChild(message);
                suggestionsContainer.style.display = 'block';
                
                setTimeout(hideSuggestions, 2000);
            } else {
                hideSuggestions();
            }
        }
        
        // Функция выбора гостя
        function selectGuest(guest) {
            surnameField.value = guest.surname || '';
            nameField.value = guest.name || '';
            patronymicField.value = guest.patronymic || '';
            
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
            
            // Показываем уведомление
            var fullName = [guest.surname, guest.name, guest.patronymic]
                .filter(function(part) { return part && part.trim() !== ''; })
                .join(' ');
            showNotification('Выбран гость: ' + fullName, 'success');
            
            // Скрываем список
            hideSuggestions();
            
            // Удаляем обработчик клавиш
            docnum2Field.removeEventListener('keydown', handleSuggestionKeydown);
        }
        
        // Функция обработки клавиш для навигации по списку
        function handleSuggestionKeydown(event) {
            var items = suggestionsContainer.querySelectorAll('div[data-index]');
            
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
                        items[selectedIndex].click();
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
            // Убираем выделение со всех
            items.forEach(function(item) {
                item.classList.remove('selected');
            });
            
            // Выделяем текущий
            if (selectedIndex >= 0 && selectedIndex < items.length) {
                items[selectedIndex].classList.add('selected');
                items[selectedIndex].scrollIntoView({ block: 'nearest' });
            }
        }
        
        // Функция скрытия результатов
        function hideSuggestions() {
            suggestionsContainer.style.display = 'none';
            suggestionsContainer.innerHTML = '';
            selectedIndex = -1;
            docnum2Field.removeEventListener('keydown', handleSuggestionKeydown);
        }
        
        // Добавляем обработчики событий для полей ввода
        if (docnum1Field) {
            docnum1Field.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                hideSuggestions();
                searchTimeout = setTimeout(searchGuestsByDocument, 1000);
            });
            
            // Очищаем скрытое поле при изменении документа
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
                searchTimeout = setTimeout(searchGuestsByDocument, 1000);
            });
            
            docnum2Field.addEventListener('focus', function() {
                var idField = document.getElementById('selected_guest_id');
                if (idField) {
                    idField.value = '';
                }
            });
        }
        
        // Закрывать список при клике вне его
        document.addEventListener('click', function(event) {
            if (!suggestionsContainer.contains(event.target) && 
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
                        // Если пользователь вручную меняет ФИО, сбрасываем связанного гостя
                        idField.value = '';
                    }
                });
            }
        });
    }
    
    // Функция для показа уведомлений
    function showNotification(message, type) {
        // Удаляем предыдущее уведомление
        var existingNotification = document.getElementById('doc-search-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Создаем новое уведомление
        var notification = document.createElement('div');
        notification.id = 'doc-search-notification';
        notification.style.cssText = 'position: fixed; top: 10px; right: 10px; padding: 10px 15px; border-radius: 4px; z-index: 1000; font-size: 14px; max-width: 300px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);';
        
        // Устанавливаем стиль в зависимости от типа
        switch (type) {
            case 'success':
                notification.style.backgroundColor = '#d4edda';
                notification.style.color = '#155724';
                notification.style.border = '1px solid #c3e6cb';
                break;
            case 'error':
                notification.style.backgroundColor = '#f8d7da';
                notification.style.color = '#721c24';
                notification.style.border = '1px solid #f5c6cb';
                break;
            case 'info':
            default:
                notification.style.backgroundColor = '#d1ecf1';
                notification.style.color = '#0c5460';
                notification.style.border = '1px solid #bee5eb';
                break;
        }
        
        notification.textContent = message;
        document.body.appendChild(notification);
        
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
            // Пустая функция для предотвращения ошибок
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
            // Для кнопки согласия убираем required
            if (surnameField) surnameField.removeAttribute('required');
            if (nameField) nameField.removeAttribute('required');
            if (orgSelector) orgSelector.removeAttribute('required');
            
            // Убираем required с бюро для кнопки согласия
            var buroRadios = document.querySelectorAll('input[name="selected_buro"]');
            buroRadios.forEach(function(radio) {
                radio.removeAttribute('required');
            });
        } else {
            // Для других кнопок управляем required в зависимости от режима
            if (currentMode === 'neworder') {
                // В neworder фамилия обязательна
                if (surnameField) surnameField.setAttribute('required', 'required');
                
                // Бюро обязательно, если бюро больше одного
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
                // В других режимах фамилия не обязательна
                if (surnameField) surnameField.removeAttribute('required');
                
                // Убираем required с бюро в других режимах
                var buroRadios = document.querySelectorAll('input[name="selected_buro"]');
                buroRadios.forEach(function(radio) {
                    radio.removeAttribute('required');
                });
            }
            
            // Имя и организация не обязательны
            if (nameField) nameField.removeAttribute('required');
            if (orgSelector) orgSelector.removeAttribute('required');
        }

        // Фамилия обязательна в режиме neworder
        if (currentMode === 'neworder' && surname === '') {
            error1.style.display = 'block';
            isValid = false;
        } else {
            error1.style.display = 'none';
        }

        // Имя проверяем только на длину (не обязательно)
        if (name.length > 50) {
            error_name.style.display = 'block';
            isValid = false;
        } else {
            error_name.style.display = 'none';
        }

        // Отчество проверяем только на длину
        var patronymic = document.getElementById('patronymic').value.trim();
        if (patronymic.length > 50) {
            error_patronymic.style.display = 'block';
            isValid = false;
        } else {
            error_patronymic.style.display = 'none';
        }

        // Организация не обязательна
        if (error_org) {
            error_org.style.display = 'none';
        }
        
        // Бюро обязательно в neworder, если бюро больше одного
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
            // В других случаях бюро не обязательно
            if (error_buro) {
                error_buro.style.display = 'none';
            }
        }

        // Согласие на ПД не проверяем в валидации формы
        var error_consent = document.getElementById('error_consent');
        if (error_consent) {
            error_consent.style.display = 'none';
        }

        return isValid;
    }
</script>

<!-- Далее идет HTML/PHP часть формы (она остается без изменений) -->
<?php if ($user->id_orgctrl == 1) {
    switch ($mode) {
        case 'buro':
            break;
    }
} ?>

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
        
        // Добавляем сообщение об ошибке для ПД
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
                        
                    } else {
                        // echo Form::hidden('todo', 'update');
                        // echo Form::submit('update', __('Обновить гостя'));
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
        // Форма для forceexit
        if (!empty($cardlist[0]['ID_CARD'])) {
            echo Form::open('order/save');
            echo Form::hidden('todo', 'forceexit');
            echo Form::submit('forceexit', __('order.edit.nameForceexitBtn'), array(
                'class' => 'btn'
            ));
            echo Form::close();
            echo '<br>';
        }
        // Форма для newguestorder
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