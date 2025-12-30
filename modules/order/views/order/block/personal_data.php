<fieldset style="max-width: 400px;">
    <legend><?php echo __('Персональные данные'); ?></legend>
    <div>
        <label for="surname"><?php echo __('contact.surname'); ?> <span style="color: black;">*</span></label>
        <br />
        <input 
            type="text" 
            size="50" 
            name="surname" 
            id="surname" 
            value="<?php echo htmlspecialchars($guest->surname); ?>" 
            required
            maxlength="50"
            oninvalid="this.setCustomValidity('Пожалуйста, введите фамилию')"
            oninput="this.setCustomValidity('')"
        />
        <br />
        <span class="error" id="error1" style="color: red; display: none;">
            <?php echo __('contact.emptysurname'); ?></span>
    </div>
    <br />
    <div>
        <table align="left">
            <tr>
                <td>
                    <label for="name"><?php echo __('contact.name'); ?></label>
                    <br />
                    <input 
                        type="text" 
                        size="50" 
                        name="name" 
                        id="name" 
                        value="<?php echo htmlspecialchars($guest->name); ?>" 
                        maxlength="50"
                        style="width: 150px"
                    />
                    <br />
                    <span class="error" id="error_name" style="color: red; display: none;">
                        <?php echo __('Имя обязательно и не должно превышать 50 символов'); ?>
                    </span>
                </td>
                <td style="padding-left: 15px">
                    <label for="patronymic"><?php echo __('contact.patronymic'); ?></label>
                    <br />
                    <input 
                        type="text" 
                        size="50" 
                        name="patronymic" 
                        id="patronymic" 
                        value="<?php echo htmlspecialchars($guest->patronymic); ?>" 
                        maxlength="50"
                        style="width: 150px"
                    />
                    <br />
                    <span class="error" id="error_patronymic" style="color: red; display: none;">
                        <?php echo __('Отчество не должно превышать 50 символов'); ?>
                    </span>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <table align="left">
            <tr>
                <td>
                    <label for="numdoc"><?php echo __('contact.numdoc'); ?></label>
                    <br />
                    <?php
                    $docnum1 = '';
                    $docnum2 = '';
                    $currentDocType = '1'; // По умолчанию выбираем паспорт (ID = 1)
                    
                    if (!empty($guest->numdoc)) {
                        $parts = explode('@', $guest->numdoc, 2);
                        $doc_data = isset($parts[0]) ? $parts[0] : '';
                        $currentDocType = isset($parts[1]) ? $parts[1] : '1'; // Если нет типа, используем паспорт
                        
                        // Затем разделяем серию и номер по #
                        $doc_parts = explode('#', $doc_data);
                        $docnum1 = htmlspecialchars(isset($doc_parts[0]) ? $doc_parts[0] : '');
                        $docnum2 = isset($doc_parts[1]) ? htmlspecialchars($doc_parts[1]) : '';
                    }
                    ?>
                    <input type="text" size="8" name="docnum1" id="docnum1" value="<?php echo $docnum1; ?>" placeholder="Серия" />
                    <input type="text" size="8" name="docnum2" id="docnum2" value="<?php echo $docnum2; ?>" placeholder="Номер" />
                </td>
                <td style="padding-left: 15px">
                    <label for="datedoc"><?php echo __('contact.datedoc'); ?></label>
                    <br />
                    <input type="text" name="datedoc" id="datedoc" value="<?php 
                        if (!is_null($guest->docdate) && $guest->docdate) {
                            try {
                                $date = new DateTime($guest->docdate);
                                echo htmlspecialchars($date->format('d.m.Y'));
                            } catch (Exception $e) {
                                echo date('d.m.Y');
                            }
                        } else {
                            echo date('d.m.Y');
                        }
                    ?>" style="width: 100px;" />
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top: 10px;">
                    <label><?php echo __('Тип документа'); ?></label>
                    <div style="margin-left: 10px;">
                        <?php foreach (Documents::getDoc() as $id => $doc): ?>
                            <div style="display: inline-block; margin-right: 15px;">
                                <?php echo Form::radio(
                                    'doc_type', 
                                    $id, 
                                    $currentDocType == $id,
                                    array('id' => 'doctype_'.$id)
                                ); ?>
                                <label for="doctype_<?php echo $id; ?>" style="display: inline;"><?php echo htmlspecialchars($doc['docname']); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <br style="clear: both;" />
</fieldset>
* - поля обязательны к заполнению.

<script type="text/javascript">
(function() {
    var isRequesting = false;
    var requestTimeout = null;
    var foundPersonIdPep = null; // Сохраняем ID найденного человека
    
    // Получаем режим из PHP переменной, если она существует
    var currentMode = '<?php echo isset($mode) ? $mode : "guest_mode"; ?>';
    console.log('Current mode:', currentMode);

    function fetchPersonDataByDocument() {
        // Проверяем режим - автозаполнение работает только в neworder
        if (currentMode !== 'neworder') {
            console.log('Автозаполнение отключено - режим не neworder');
            return;
        }
        
        var docnum1 = document.getElementById('docnum1').value.trim();
        var docnum2 = document.getElementById('docnum2').value.trim();
        var docType = document.querySelector('input[name="doc_type"]:checked');
        
        if (!docnum1 || !docnum2 || !docType) {
            // Очищаем контейнер согласия если поля не заполнены
            var container = document.getElementById('consent-form-container');
            if (container) {
                container.innerHTML = '';
            }
            foundPersonIdPep = null;
            return;
        }

        var docTypeValue = docType.value;

        if (requestTimeout) {
            clearTimeout(requestTimeout);
        }

        requestTimeout = setTimeout(function() {
            if (isRequesting) {
                return;
            }

            isRequesting = true;

            var formData = new FormData();
            formData.append('docnum1', docnum1);
            formData.append('docnum2', docnum2);
            formData.append('doc_type', docTypeValue);

            showLoadingIndicator();

            var xhr = new XMLHttpRequest();
            // Используем относительный путь или полный URL в зависимости от структуры
            var url = '<?php echo URL::site("order/get_person_by_document"); ?>';
            console.log('Requesting URL:', url);
            xhr.open('POST', url, true);
            
            xhr.onload = function() {
                isRequesting = false;
                hideLoadingIndicator();

                if (xhr.status === 200) {
                    console.log('Response text:', xhr.responseText);
                    
                    try {
                        var response = JSON.parse(xhr.responseText);
                        console.log('Parsed response:', response);
                        
                        if (response.success && response.data) {
                            // Заполняем поля ФИО
                            document.getElementById('surname').value = response.data.surname || '';
                            document.getElementById('name').value = response.data.name || '';
                            document.getElementById('patronymic').value = response.data.patronymic || '';
                            
                            if (response.data.docdate && document.getElementById('datedoc')) {
                                document.getElementById('datedoc').value = response.data.docdate;
                            }

                            // Сохраняем ID найденного человека
                            foundPersonIdPep = response.data.id_pep;
                            console.log('Сохранен ID найденного человека:', foundPersonIdPep);
                            
                            // Показываем сообщение
                            showMessage('Данные о госте найдены', 'success');
                            
                            // Загружаем форму согласия только в режиме neworder
                            if (currentMode === 'neworder') {
                                loadConsentForm(foundPersonIdPep);
                            }
                            
                        } else {
                            // Человек не найден - остаемся на текущей странице
                            if (response.message) {
                                showMessage(response.message, 'error');
                            }
                        }
                    } catch (e) {
                        console.error('Ошибка парсинга ответа:', e);
                        console.error('Response text was:', xhr.responseText.substring(0, 500));
                        showMessage('Ошибка обработки данных. Проверьте консоль.', 'error');
                    }
                } else {
                    console.error('Ошибка запроса:', xhr.status);
                    console.error('Response:', xhr.responseText);
                    showMessage('Ошибка загрузки данных (код ' + xhr.status + ')', 'error');
                }
            };

            xhr.onerror = function() {
                isRequesting = false;
                hideLoadingIndicator();
                console.error('Ошибка соединения');
                showMessage('Ошибка соединения', 'error');
            };

            xhr.send(formData);
        }, 500);
    }

    function showLoadingIndicator() {
        var indicator = document.getElementById('loading-indicator');
        if (!indicator) {
            indicator = document.createElement('span');
            indicator.id = 'loading-indicator';
            indicator.style.marginLeft = '10px';
            indicator.style.color = '#666';
            //indicator.innerHTML = '&#8987; Загрузка...';
            document.getElementById('docnum2').parentNode.appendChild(indicator);
        }
        indicator.style.display = 'inline';
    }

    function hideLoadingIndicator() {
        var indicator = document.getElementById('loading-indicator');
        if (indicator) {
            indicator.style.display = 'none';
        }
    }

    function showMessage(message, type) {
        var messageBox = document.getElementById('autofill-message');
        if (!messageBox) {
            messageBox = document.createElement('div');
            messageBox.id = 'autofill-message';
            messageBox.style.padding = '10px';
            messageBox.style.marginTop = '10px';
            messageBox.style.borderRadius = '4px';
            messageBox.style.display = 'none';
            document.getElementById('docnum2').parentNode.appendChild(messageBox);
        }

        var colors = {
            'success': '#d4edda',
            'error': '#f8d7da',
            'info': '#d1ecf1'
        };
        
        var textColors = {
            'success': '#000',
            'error': '#721c24',
            'info': '#000'
        };

        messageBox.style.backgroundColor = colors[type] || colors['info'];
        messageBox.style.color = textColors[type] || textColors['info'];
        messageBox.innerHTML = message;
        messageBox.style.display = 'block';

        setTimeout(function() {
            messageBox.style.display = 'none';
        }, 3000);
    }

    function loadConsentForm(idPep) {
        // Ищем существующий блок forPD на странице
        var existingForPD = null;
        var fieldsets = document.querySelectorAll('fieldset');
        for (var i = 0; i < fieldsets.length; i++) {
            var legend = fieldsets[i].querySelector('legend');
            if (legend && legend.textContent.includes('Наличие ПД')) {
                existingForPD = fieldsets[i];
                break;
            }
        }

        if (!existingForPD) {
            console.log('Блок forPD не найден на странице');
            return;
        }

        var xhr = new XMLHttpRequest();
        var url = '<?php echo URL::site("order/get_consent_form"); ?>/' + idPep;
        console.log('Loading consent form from:', url);
        xhr.open('GET', url, true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Создаем временный контейнер для парсинга ответа
                var tempDiv = document.createElement('div');
                tempDiv.innerHTML = xhr.responseText;
                
                // Ищем блок forPD в полученном ответе
                var newForPD = null;
                var tempFieldsets = tempDiv.querySelectorAll('fieldset');
                for (var i = 0; i < tempFieldsets.length; i++) {
                    var legend = tempFieldsets[i].querySelector('legend');
                    if (legend && legend.textContent.includes('Наличие ПД')) {
                        newForPD = tempFieldsets[i];
                        break;
                    }
                }
                
                if (newForPD) {
                    // Обновляем содержимое существующего блока forPD
                    existingForPD.innerHTML = newForPD.innerHTML;
                    console.log('Блок forPD обновлен');
                    
                    // Проверяем, есть ли согласие (проверяем наличие ссылки на файл)
                    var consentLink = existingForPD.querySelector('a[href*=".pdf"], a[href*=".png"], a[href*=".jpg"], a[href*="signature"]');
                    var hasConsent = consentLink !== null;
                    
                    if (hasConsent) {
                        // Согласие есть
                        console.log('Обнаружено согласие, изменяем поведение формы');
                        
                        // Обновляем глобальную переменную согласия
                        if (typeof window.hasConsentFromPHP !== 'undefined') {
                            window.hasConsentFromPHP = true;
                            console.log('Глобальная переменная hasConsentFromPHP установлена в true');
                        }
                        
                        // Скрываем кнопку согласия
                        hideConsentButton();
                        
                        // Изменяем кнопку "Добавить гостя" на "Повторная заявка"
                        changeAddGuestButtonToRepeatOrder();
                        
                        // Триггерим проверку состояния карты (если функция существует)
                        if (typeof window.checkCardFieldState !== 'undefined') {
                            setTimeout(function() {
                                window.checkCardFieldState();
                            }, 100);
                        }
                    } else {
                        // Согласия нет
                        console.log('Согласие не обнаружено');
                        
                        // Обновляем глобальную переменную согласия
                        if (typeof window.hasConsentFromPHP !== 'undefined') {
                            window.hasConsentFromPHP = false;
                            console.log('Глобальная переменная hasConsentFromPHP установлена в false');
                        }
                        
                        // Триггерим проверку состояния карты
                        if (typeof window.checkCardFieldState !== 'undefined') {
                            setTimeout(function() {
                                window.checkCardFieldState();
                            }, 100);
                        }
                    }
                } else {
                    console.log('Блок forPD не найден в ответе сервера');
                }
            } else {
                console.error('Ошибка загрузки формы согласия:', xhr.status);
            }
        };

        xhr.onerror = function() {
            console.error('Ошибка соединения при загрузке формы согласия');
        };

        xhr.send();
    }

    function hideConsentButton() {
        // Ищем кнопку согласия по разным вариантам
        var consentBtn = document.querySelector('input[name="consent2"]');
        if (consentBtn) {
            consentBtn.style.display = 'none';
            console.log('Кнопка согласия скрыта (consent2)');
        }
        
        var consentBtn2 = document.querySelector('input[name="consent"]');
        if (consentBtn2) {
            consentBtn2.style.display = 'none';
            console.log('Кнопка согласия скрыта (consent)');
        }
        
        // Также скрываем форму с классом consent
        var consentForm = document.querySelector('form.consent');
        if (consentForm) {
            consentForm.style.display = 'none';
            console.log('Форма согласия скрыта');
        }
    }

    function changeAddGuestButtonToRepeatOrder() {
        // Находим кнопку "Добавить гостя с картой"
        var addGuestBtn = document.querySelector('input[name="savenewwithcard"]');
        if (!addGuestBtn) {
            console.log('Кнопка добавления гостя не найдена');
            return;
        }
        
        if (!foundPersonIdPep) {
            console.log('ID человека не найден, невозможно изменить кнопку');
            return;
        }
        
        console.log('Изменяем кнопку на повторную заявку для ID:', foundPersonIdPep);
        
        // Находим форму кнопки
        var form = addGuestBtn.form;
        if (!form) {
            console.log('Форма кнопки не найдена');
            return;
        }
        
        // Изменяем action формы на /order/save
        form.action = '<?php echo URL::site("order/save"); ?>';
        
        // Находим или создаем скрытое поле id_pep
        var idPepInput = form.querySelector('input[name="id_pep"]');
        if (!idPepInput) {
            idPepInput = document.createElement('input');
            idPepInput.type = 'hidden';
            idPepInput.name = 'id_pep';
            form.appendChild(idPepInput);
        }
        idPepInput.value = foundPersonIdPep;
        
        // Находим скрытое поле todo
        var todoInput = form.querySelector('input[name="todo"]');
        if (todoInput) {
            todoInput.value = 'newguestorder2';
        }
        
        // Изменяем onclick кнопки
        addGuestBtn.onclick = function() {
            this.form.elements.todo.value = 'newguestorder2';
            document.getElementById('org_selector').removeAttribute('required');
            return true;
        };
        
        // Изменяем значение кнопки (текст)
        addGuestBtn.value = '<?php echo __("order.edit.nameRepeatOrderBtn"); ?>';
        
        console.log('Кнопка успешно изменена на повторную заявку');
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAutofill);
    } else {
        initAutofill();
    }

    function initAutofill() {
        var docnum1 = document.getElementById('docnum1');
        var docnum2 = document.getElementById('docnum2');
        var docTypeRadios = document.querySelectorAll('input[name="doc_type"]');
        var surnameField = document.getElementById('surname');
        var nameField = document.getElementById('name');
        var patronymicField = document.getElementById('patronymic');
        var datedocField = document.getElementById('datedoc');
        
        // Флаг для отслеживания, прошли ли мы уже цепочку ФИО
        var fioCompleted = false;

        if (docnum1) {
            docnum1.addEventListener('input', fetchPersonDataByDocument);
            docnum1.addEventListener('blur', fetchPersonDataByDocument);
            
            // Обработчик Enter: серия -> номер
            docnum1.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    e.preventDefault();
                    if (docnum2) {
                        docnum2.focus();
                    }
                }
            });
        }

        if (docnum2) {
            docnum2.addEventListener('input', fetchPersonDataByDocument);
            docnum2.addEventListener('blur', fetchPersonDataByDocument);
            
            // Обработчик Enter: номер -> фамилия (если ФИО не пройдено) или дата (если пройдено)
            docnum2.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    e.preventDefault();
                    if (!fioCompleted && surnameField) {
                        surnameField.focus();
                    } else if (datedocField) {
                        datedocField.focus();
                    }
                }
            });
        }

        // Обработчик Enter: фамилия -> имя
        if (surnameField) {
            surnameField.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    e.preventDefault();
                    if (nameField) {
                        nameField.focus();
                    }
                }
            });
        }

        // Обработчик Enter: имя -> отчество
        if (nameField) {
            nameField.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    e.preventDefault();
                    if (patronymicField) {
                        patronymicField.focus();
                    }
                }
            });
        }

        // Обработчик Enter: отчество -> серия паспорта
        if (patronymicField) {
            patronymicField.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    e.preventDefault();
                    fioCompleted = true; // Отмечаем, что ФИО завершено
                    if (docnum1) {
                        docnum1.focus();
                    }
                }
            });
        }

        docTypeRadios.forEach(function(radio) {
            radio.addEventListener('change', fetchPersonDataByDocument);
        });
        
        // Устанавливаем автофокус на поле "Серия" в режиме neworder
        if (currentMode === 'neworder' && docnum1) {
            setTimeout(function() {
                docnum1.focus();
            }, 100);
        }
    }
})();
</script>