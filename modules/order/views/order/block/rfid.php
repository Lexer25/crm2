<?php
$key = new Keyk();
$cardlist = $key->getListByPeople($id_pep, 1);

// Проверяем настройки согласия
$require_consent = isset($app_settings['require_consent_for_card']) && $app_settings['require_consent_for_card'];

// Проверяем наличие согласия
$pd = new PD($id_pep);
$signature_file = $pd->checkSignatureSingle($id_pep);
$has_consent = ($signature_file !== false && file_exists($signature_file));

// Определяем, должно ли быть поле заблокировано
$should_block_card_field = $require_consent && !$has_consent;

// В режиме guest_mode, buro и neworder блокируем поле карты только если нет согласия
// Заполнение имени, организации и бюро будет отслеживаться JavaScript
if (isset($mode) && ($mode === 'guest_mode' || $mode === 'buro' || $mode === 'neworder')) {
    // Поле карты блокируется только JavaScript, не PHP
    $should_block_card_field = false;
}

if (count($cardlist) > 0) {
?>
<fieldset>
    <legend><?php echo __('Зарегистрированные RFID'); ?></legend>
    <?php
    $cardList = $guest->getTypeCardList(1);
    foreach ($cardList as $key1 => $value) {
        $card = new Keyk(Arr::get($value, 'ID_CARD'));
        echo $card->id_card . ' (' . $card->id_card_on_DEC . ')<br>';
    }
    echo 'Выдана: ' . date('d.m.Y H:i', strtotime($card->createdat));
    echo '<br>';
		
	if(isset($access) && is_array($access)){	
		$accessname = array_column($access, 'NAME');
		$count = count($accessname);
		$style = $count > 3 ? 'max-height: 60px; overflow-y: auto;' : '';

		echo 'Доступ:';
            echo '<div style="' . $style . '">';
            foreach ($accessname as $item) {
                echo '<li style="margin-left: 20px;">' . $item . '</li>';
            }
            echo '</div>';
            echo '</ul>';
	} else {
		echo 'Доступ: Нет';
		
	}
    ?>
</fieldset>
<?php } else { ?>
<fieldset>
    <legend><?php echo __('passoffices.regcard'); ?></legend>
    
    <?php if ($should_block_card_field) { ?>
    <div class="consent-warning" style="background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 4px; padding: 10px; margin-bottom: 15px; color: #856404;">
        Для выдачи карты требуется согласие на обработку персональных данных.
    </div>
    <?php } ?>
    
    <?php if (isset($mode) && ($mode === 'guest_mode' || $mode === 'buro' || $mode === 'neworder')) { ?>
    <div class="dynamic-warning" style="background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 4px; padding: 10px; margin-bottom: 15px; color: #856404; display: none;">
        Для выдачи карты необходимо заполнить поля "Фамилия", "Имя", "Куда идет" (организация) и получить согласие на ПД.
    </div>
    <?php } ?>
    
    <table>
        <tr>
            <th align="right" style="padding-right: 10px;">
                <label for="idcard"><?php echo __('contact.cardid'); ?></label>
            </th>
            <td>
                <div style="padding-bottom: 10px;">
                    <?php
                    $minlength = constants::RFID_MIN_LENGTH;
                    $maxlength = constants::RFID_MAX_LENGTH;
                    switch (Kohana::$config->load('system')->get('regFormatRfid')) {
                        case 0:
                            switch (Kohana::$config->load('system')->get('baseFormatRfid', 0)) {
                                case 0:
                                    $comment = __('contact.wait_hex8_number');
                                    $patternValid = constants::HEX8_VALID;
                                    $title = constants::RFID_MIN_LENGTH . '-' . constants::RFID_MAX_LENGTH . ' символов';
                                    break;
                                case 1:
                                    $comment = __('contact.wait_001A_number');
                                    $patternValid = constants::HEX001A_VALID;
                                    $title = constants::MAX_VALUE_001A . ' символов и буквы алфавита строго A-F';
                                    $minlength = constants::MAX_VALUE_001A;
                                    $maxlength = constants::MAX_VALUE_001A;
                                    break;
                                default:
                                    $comment = __('contact.wait_not_point_number');
                                    break;
                            }
                            break;
                        case 2:
                            $comment = __('contact.wait_dec10_number');
                            $patternValid = constants::DEC10_VALID;
                            $title = 'номер идентификатора';
                            $minlength = constants::RFID_DEC_MIN_LENGTH;
                            $maxlength = constants::RFID_DEC_MAX_LENGTH;
                            break;
                        default:
                            $comment = __('contact.check_reg_device_setting');
                            break;
                    }
                    
                    // Дополнительные атрибуты для поля карты
                    $field_attributes = 'id="idcard" name="idcard" title="' . $title . '" style="width: 120px;" maxlength="10"';
                    
                    if ($should_block_card_field) {
                        $field_attributes .= ' disabled readonly style="width: 120px; background-color: #f5f5f5; cursor: not-allowed;"';
                        $placeholder_text = 'Требуется согласие';
                    } else {
                        // В guest_mode, buro и neworder поле изначально заблокировано
                        if (isset($mode) && ($mode === 'guest_mode' || $mode === 'buro' || $mode === 'neworder')) {
                            $field_attributes .= ' disabled readonly style="width: 120px; background-color: #f5f5f5; cursor: not-allowed;"';
                            $placeholder_text = 'Заполните фамилию, имя, организацию и получите согласие на ПД';
                        } else {
                            // Только для разблокированного поля добавляем валидацию
                            $field_attributes .= ' pattern="^([0-9A-Fa-f]{10})?$" oninvalid="this.setCustomValidity(\'Введите 10-значный HEX-код (0-9, A-F)\')" oninput="this.setCustomValidity(\'\');"';
                            $placeholder_text = '';
                        }
                    }
                    
                    $field_value = '';
                    if (isset($card)) {
                        $field_value = Arr::get($card, 'ID_CARD');
                    }
                    ?>
                    
                    <input type="text" 
                           <?php echo $field_attributes; ?>
                           value="<?php echo $field_value; ?>"
                           placeholder="<?php echo $placeholder_text; ?>"
                    />
                    <br />
                    
                    
                    <?php echo Form::hidden('rfidmode', 0); ?>
                    
                    <?php if ($should_block_card_field || (isset($mode) && ($mode === 'guest_mode' || $mode === 'buro' || $mode === 'neworder'))) { ?>
                    <div class="field-explanation" style="font-size: 12px; color: #666; margin-top: 5px;">
                        <?php if (isset($mode) && ($mode === 'guest_mode' || $mode === 'buro' || $mode === 'neworder')) { ?>
                            Поле заблокировано. Заполните поля "Фамилия", "Имя", "Куда идет" и получите согласие на ПД для выдачи карты.
                        <?php } else { ?>
                            Поле заблокировано до получения согласия на обработку персональных данных.
                        <?php } ?>
                    </div>
                    <?php } ?>
                   
                    
                    <span class="error" id="error11" style="color: red; display: none;"><?php echo __('card.emptyid'); ?></span>
                    <span class="error" id="error12" style="color: red; display: none;"><?php echo __('card.wrongcharacter'); ?></span>
                    <span class="error" id="error13" style="color: red; display: none;"><?php echo __('card.wronglenght'); ?></span>
                </div>
            </td>
        </tr>
    </table>
</fieldset>

<script>
// Передаем информацию о наличии согласия из PHP в глобальную переменную
window.hasConsentFromPHP = <?php echo $has_consent ? 'true' : 'false'; ?>;

// Глобальная функция для проверки и разблокировки поля карты
window.checkCardFieldState = function() {
    const cardField = document.getElementById('idcard');
    const currentMode = document.getElementById('mode') ? document.getElementById('mode').value : '';
    
    if (!cardField) return;
    
    if (currentMode === 'guest_mode' || currentMode === 'buro' || currentMode === 'neworder') {
        const surnameField = document.getElementById('surname');
        const nameField = document.getElementById('name');
        const orgSelector = document.getElementById('org_selector');
        
        const isSurnameFilled = surnameField && surnameField.value.trim() !== '';
        const isNameFilled = nameField && nameField.value.trim() !== '';
        const isOrgSelected = orgSelector && orgSelector.value !== '';
        
        // Проверяем наличие согласия на ПД через разные способы
        // 1. Информация из PHP
        // 2. Кнопка "Просмотр подписи"
        // 3. Ссылка на файл согласия в блоке forPD (ищем ссылку с текстом файла)
        const viewSignatureButton = document.querySelector('a[href*="view_signature"]');
        
        // Ищем fieldset с legend содержащим "Наличие ПД" и проверяем наличие ссылки на файл
        let consentFileLink = null;
        const fieldsets = document.querySelectorAll('fieldset');
        for (let fieldset of fieldsets) {
            const legend = fieldset.querySelector('legend');
            if (legend && legend.textContent.includes('Наличие ПД')) {
                // Нашли нужный fieldset, ищем в нем ссылку на файл
                consentFileLink = fieldset.querySelector('a[href*=".pdf"], a[href*=".png"], a[href*=".jpg"], a[href*="signature"]');
                break;
            }
        }
        
        // Получаем информацию о согласии из PHP (если доступна)
        const hasConsentFromPHP = window.hasConsentFromPHP || false;
        
        const hasConsent = hasConsentFromPHP || 
                          (viewSignatureButton && viewSignatureButton.offsetParent !== null) ||
                          (consentFileLink && consentFileLink.offsetParent !== null);
        
        // Во всех режимах (guest_mode, buro, neworder) требуются: фамилия, имя, организация и согласие на ПД
        const canAddCard = isSurnameFilled && isNameFilled && isOrgSelected && hasConsent;
        const placeholderText = 'Заполните фамилию, имя, организацию и получите согласие на ПД';
        
        // Проверяем, есть ли значение в поле карты
        const hasCardValue = cardField && cardField.value.trim() !== '';
        
        if (canAddCard) {
            // Разблокируем поле карты
            cardField.disabled = false;
            cardField.readOnly = false;
            cardField.style.backgroundColor = '';
            cardField.style.cursor = '';
            cardField.placeholder = '';
            
            // Добавляем атрибуты валидации для guest_mode, buro и neworder
            cardField.setAttribute('pattern', '^([0-9A-Fa-f]{10})?$');
            cardField.setAttribute('maxlength', '10');
            cardField.setAttribute('oninvalid', 'this.setCustomValidity(\'Введите 10-значный HEX-код (0-9, A-F)\')');
            cardField.setAttribute('oninput', 'this.setCustomValidity(\'\');');
            
            // Скрываем предупреждения, если они есть
            const warningDiv = document.querySelector('.consent-warning');
            const dynamicWarningDiv = document.querySelector('.dynamic-warning');
            if (warningDiv) {
                warningDiv.style.display = 'none';
            }
            if (dynamicWarningDiv) {
                dynamicWarningDiv.style.display = 'none';
            }
            
        } else {
            // Блокируем поле карты
            cardField.disabled = true;
            cardField.readOnly = true;
            cardField.style.backgroundColor = '#f5f5f5';
            cardField.style.cursor = 'not-allowed';
            cardField.placeholder = placeholderText;
            
            // Убираем HTML5 атрибуты когда поле заблокировано
            cardField.removeAttribute('pattern');
            cardField.removeAttribute('minlength');
            cardField.removeAttribute('maxlength');
            cardField.removeAttribute('oninvalid');
            cardField.removeAttribute('oninput');
            
            // Показываем предупреждения, если они есть
            const warningDiv = document.querySelector('.consent-warning');
            const dynamicWarningDiv = document.querySelector('.dynamic-warning');
            if (warningDiv) {
                warningDiv.style.display = 'block';
            }
            if (dynamicWarningDiv) {
                dynamicWarningDiv.style.display = 'block';
            }
        }
    }
};

// Инициализация при загрузке DOM
document.addEventListener('DOMContentLoaded', function() {
    const cardField = document.getElementById('idcard');
    const currentMode = document.getElementById('mode') ? document.getElementById('mode').value : '';
    
    <?php if ($should_block_card_field) { ?>
    // Дополнительная защита через JavaScript
    if (cardField) {
        if (currentMode === 'guest_mode' || currentMode === 'buro' || currentMode === 'neworder') {
            cardField.addEventListener('focus', function() {
                alert('Для выдачи карты необходимо заполнить поля "Фамилия", "Имя", "Куда идет" и получить согласие на ПД');
                this.blur();
            });
        } else {
            cardField.addEventListener('focus', function() {
                alert('Для выдачи карты сначала необходимо получить согласие на обработку персональных данных');
                this.blur();
            });
        }
        
        cardField.addEventListener('input', function() {
            this.value = '';
        });
        
        // Блокируем копирование в поле
        cardField.addEventListener('paste', function(e) {
            e.preventDefault();
            if (currentMode === 'guest_mode' || currentMode === 'buro' || currentMode === 'neworder') {
                alert('Поле заблокировано. Заполните поля "Фамилия", "Имя", "Куда идет" и получите согласие на ПД');
            } else {
                alert('Поле заблокировано до получения согласия');
            }
        });
    }
    <?php } ?>
    
    // Функция для валидации карты только при вводе
    function validateCardField() {
        if (cardField && !cardField.disabled && !cardField.readOnly) {
            const cardValue = cardField.value.trim();
            
            if (cardValue !== '') {
                // Проверяем формат карты
                const cardPattern = /^[0-9A-Fa-f]{10}$/;
                if (!cardPattern.test(cardValue)) {
                    cardField.setCustomValidity('Введите 10-значный HEX-код (0-9, A-F)');
                    return false;
                } else {
                    cardField.setCustomValidity('');
                    return true;
                }
            } else {
                // Если поле пустое, убираем валидацию
                cardField.setCustomValidity('');
                return true;
            }
        }
        return true;
    }
    
    // Проверяем состояние при загрузке (только для разблокировки, не блокируем)
    // Добавляем небольшую задержку, чтобы все элементы успели загрузиться
    setTimeout(function() {
        checkCardFieldState();
        
        // Показываем динамическое предупреждение при загрузке, если поля не заполнены
        if (currentMode === 'guest_mode' || currentMode === 'buro' || currentMode === 'neworder') {
            const dynamicWarningDiv = document.querySelector('.dynamic-warning');
            if (dynamicWarningDiv) {
                const surnameField = document.getElementById('surname');
                const nameField = document.getElementById('name');
                const orgSelector = document.getElementById('org_selector');
                
                const isSurnameFilled = surnameField && surnameField.value.trim() !== '';
                const isNameFilled = nameField && nameField.value.trim() !== '';
                const isOrgSelected = orgSelector && orgSelector.value !== '';
                const hasConsent = window.hasConsentFromPHP;
                
                const canAddCard = isSurnameFilled && isNameFilled && isOrgSelected && hasConsent;
                
                if (!canAddCard) {
                    dynamicWarningDiv.style.display = 'block';
                }
            }
        }
    }, 100);
    
    // Добавляем обработчики изменений для полей фамилии, имени и организации
    const surnameField = document.getElementById('surname');
    const nameField = document.getElementById('name');
    const orgSelector = document.getElementById('org_selector');
    
    if (surnameField) {
        // Отслеживаем в реальном времени при вводе только для разблокировки карты
        surnameField.addEventListener('input', function() {
            setTimeout(checkCardFieldState, 10); // Небольшая задержка для обновления
        });
        surnameField.addEventListener('change', checkCardFieldState);
        surnameField.addEventListener('keyup', function() {
            setTimeout(checkCardFieldState, 10);
        });
    }
    
    if (nameField) {
        // Отслеживаем в реальном времени при вводе только для разблокировки карты
        nameField.addEventListener('input', function() {
            setTimeout(checkCardFieldState, 10); // Небольшая задержка для обновления
        });
        nameField.addEventListener('change', checkCardFieldState);
        nameField.addEventListener('keyup', function() {
            setTimeout(checkCardFieldState, 10);
        });
    }
    
    if (orgSelector) {
        // Для Select2 нужно использовать специальный обработчик
        orgSelector.addEventListener('change', function() {
            setTimeout(checkCardFieldState, 10);
        });
        
        // Дополнительный обработчик для Select2
        $(orgSelector).on('select2:select', function() {
            setTimeout(checkCardFieldState, 10);
        });
        
        $(orgSelector).on('select2:clear', function() {
            setTimeout(checkCardFieldState, 10);
        });
    }
    
    // Добавляем обработчики для бюро только для разблокировки карты
    const buroRadios = document.querySelectorAll('input[name="selected_buro"]');
    buroRadios.forEach(radio => {
        radio.addEventListener('change', checkCardFieldState);
    });
    
    // Добавляем обработчик для кнопки согласия
    const consentButton = document.querySelector('input[name="consent2"]');
    if (consentButton) {
        consentButton.addEventListener('click', function() {
            // После нажатия кнопки согласия обновляем состояние через небольшую задержку
            setTimeout(function() {
                window.hasConsentFromPHP = true; // Обновляем глобальный флаг согласия
                checkCardFieldState();
            }, 1000);
        });
    }
    
    // Валидация карты происходит только через HTML5 атрибуты при нажатии кнопки
    // Никаких дополнительных обработчиков не нужно
    
    // Убираем интервал - валидация карты только при изменении полей
});
</script>

<?php } ?>