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

<script type="text/javascript">
    // Передаем информацию о количестве бюро из PHP
    var countBuro = <?php echo $user->count_buro; ?>;
    
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
        var docTypeRadios = document.querySelectorAll('input[name="doc_type"]');
        var surnameField = document.getElementById('surname');
        var nameField = document.getElementById('name');
        var patronymicField = document.getElementById('patronymic');
        
        var searchTimeout;
        
        // Функция поиска гостя по документу
        function searchGuestByDocument() {
            var docnum1 = docnum1Field ? docnum1Field.value.trim() : '';
            var docnum2 = docnum2Field ? docnum2Field.value.trim() : '';
            
            // Проверяем, что оба поля заполнены
            if (docnum1 && docnum2) {
                // Отправляем AJAX запрос
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'order/searchByDocument', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            if (response.success && response.data) {
                                // Заполняем поля ФИО
                                if (surnameField) surnameField.value = response.data.surname || '';
                                if (nameField) nameField.value = response.data.name || '';
                                if (patronymicField) patronymicField.value = response.data.patronymic || '';
                                
                                // Показываем уведомление
                                showNotification('Данные гостя найдены и заполнены', 'success');
                            } else {
                                // Гость не найден - очищаем поля ФИО
                                if (surnameField) surnameField.value = '';
                                if (nameField) nameField.value = '';
                                if (patronymicField) patronymicField.value = '';
                                
                                showNotification(response.message || 'Гость не найден', 'info');
                            }
                        } catch (e) {
                            console.error('Ошибка обработки ответа:', e);
                            showNotification('Ошибка обработки ответа сервера', 'error');
                        }
                    }
                };
                
                var params = 'docnum1=' + encodeURIComponent(docnum1) + 
                           '&docnum2=' + encodeURIComponent(docnum2);
                xhr.send(params);
            }
        }
        
        // Добавляем обработчики событий
        if (docnum1Field) {
            docnum1Field.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(searchGuestByDocument, 1000); // Поиск через 1 секунду после остановки ввода
            });
        }
        
        if (docnum2Field) {
            docnum2Field.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(searchGuestByDocument, 1000);
            });
        }
        
        // Обработчик изменения типа документа больше не нужен, 
        // так как поиск происходит только по серии и номеру
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
        notification.style.cssText = 'position: fixed; top: 10px; right: 10px; padding: 10px 15px; border-radius: 4px; z-index: 1000; font-size: 14px; max-width: 300px;';
        
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


        var form = document.getElementById('main_form');
        if (form) {
            form.addEventListener('submit', function(event) {
                if (event.submitter && event.submitter.type !== 'submit') {
                    event.preventDefault(); // Блокируем отправку, если не нажата кнопка submit
                }
                
        // Для кнопки согласия пропускаем валидацию
        if (event.submitter && event.submitter.name === 'consent2') {
            return true; // Пропускаем валидацию для кнопки согласия
        }
        
            });
        }
    });

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

        // Валидация карты происходит только через HTML5 атрибуты при отправке формы
        // Никакой дополнительной валидации в JavaScript не нужно

        return isValid;
    }
</script>

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
        // Форма для newguestorder2 (идентична newguestorder)
        // echo Form::open('order/save');
        // echo Form::hidden('todo', 'newguestorder2');
        // echo Form::submit('newguestorder2', __('order.edit.nameNewguestorder2'), array(
        //     'class' => 'btn',
        //     'onclick' => "this.form.elements.todo.value='newguestorder2'; return confirm('Вы уверены, что хотите повторить заявку?');"
        // ));
        // echo Form::close();
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