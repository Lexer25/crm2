<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>

    <title>Поиск карты</title>
    <style>
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 5px;
        }
        .radio-group label {
            display: flex;
            align-items: center;
            font-weight: normal;
            cursor: pointer;
        }
        .radio-group input[type="radio"] {
            margin-right: 5px;
        }
        input[type="text"] {
            padding: 8px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: monospace;
        }
        input[type="text"]:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        input[readonly] {
            background-color: #f5f5f5;
            color: #999;
            cursor: not-allowed;
        }
        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
        .error.show {
            display: block;
        }
        .field-error {
            border-color: #e74c3c !important;
        }
        .form-error {
            background-color: #fdf2f2;
            border: 1px solid #e74c3c;
            border-radius: 4px;
            padding: 10px 15px;
            margin-bottom: 20px;
            color: #e74c3c;
            display: none;
        }
        .form-error.show {
            display: block;
        }
        button {
            padding: 10px 25px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #2980b9;
        }
        button:active {
            transform: translateY(1px);
        }
        .form-hint {
            font-size: 12px;
            color: #7f8c8d;
            margin-top: 3px;
        }
        .field-optional {
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div style="max-width: 500px; margin: 40px auto; padding: 20px; border: 1px solid #ecf0f1; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <h2 style="margin-top: 0; color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px;">Поиск карты</h2>
        
        <div class="form-error" id="form_error">Заполните хотя бы одно поле: HEX или DEC</div>
        
        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="form-error show">
                <?php foreach ($errors as $error): ?>
                    <div><?php echo HTML::chars($error); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo URL::site('cards/searchDeep'); ?>" id="searchForm">
            <!-- 1. Radio buttons -->
            <div class="form-group">
                <label>Тип карты:</label>
                <div class="radio-group">
                    <?php 
                    // Определяем выбранное значение
                    $checked_type = isset($form_data['type']) ? $form_data['type'] : 'RFID';
                    ?>
                    <label>
                        <input type="radio" name="type" value="RFID" <?php echo $checked_type == 'RFID' ? 'checked' : ''; ?>> RFID
                    </label>
                    <label>
                        <input type="radio" name="type" value="UHF" <?php echo $checked_type == 'UHF' ? 'checked' : ''; ?>> UHF
                    </label>
                    <label>
                        <input type="radio" name="type" value="GRZ" <?php echo $checked_type == 'GRZ' ? 'checked' : ''; ?>> GRZ
                    </label>
                </div>
            </div>
            
            <!-- 2. HEX field -->
            <div class="form-group">
                <label for="hex"><span class="field-optional">HEX шаблон (опционально):</span></label>
                <input type="text" 
                       id="hex" 
                       name="hex" 
                       value="<?php echo isset($form_data['hex']) ? HTML::chars($form_data['hex']) : ''; ?>"
                       maxlength="10"
                       placeholder="Например: A1B2C3"
                       class="<?php echo (isset($errors['hex'])) ? 'field-error' : ''; ?>">
                <div class="form-hint">Только цифры 0-9 и буквы A-F, не более 10 символов</div>
                <?php if (isset($errors['hex'])): ?>
                    <div class="error show"><?php echo HTML::chars($errors['hex']); ?></div>
                <?php else: ?>
                    <div class="error" id="hex_error"></div>
                <?php endif; ?>
            </div>
            
            <!-- 3. DEC field -->
            <div class="form-group">
                <label for="dec"><span class="field-optional">DEC (опционально):</span></label>
                <input type="text" 
                       id="dec" 
                       name="dec" 
                       value="<?php echo isset($form_data['dec']) ? HTML::chars($form_data['dec']) : ''; ?>"
                       maxlength="12"
                       placeholder="Например: 123456789012"
                       class="<?php echo (isset($errors['dec'])) ? 'field-error' : ''; ?>">
                <div class="form-hint">Только цифры 0-9, не более 12 символов</div>
                <?php if (isset($errors['dec'])): ?>
                    <div class="error show"><?php echo HTML::chars($errors['dec']); ?></div>
                <?php else: ?>
                    <div class="error" id="dec_error"></div>
                <?php endif; ?>
            </div>
            
            <div style="margin-top: 25px;">
                <button type="submit">Найти карту</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('searchForm');
            const hexInput = document.getElementById('hex');
            const decInput = document.getElementById('dec');
            const hexError = document.getElementById('hex_error');
            const decError = document.getElementById('dec_error');
            const formError = document.getElementById('form_error');
            
            // Функция для проверки HEX поля
            function validateHex(value) {
                // Если поле пустое - оно валидно (поле опциональное)
                if (value.trim() === '') {
                    return { valid: true, message: '' };
                }
                
                // Проверяем длину
                if (value.length > 10) {
                    return { 
                        valid: false, 
                        message: 'HEX поле не должно превышать 10 символов' 
                    };
                }
                
                // Проверяем допустимые символы
                const hexPattern = /^[0-9A-Fa-f]+$/;
                if (!hexPattern.test(value)) {
                    return { 
                        valid: false, 
                        message: 'HEX поле может содержать только цифры 0-9 и буквы A-F' 
                    };
                }
                
                return { valid: true, message: '' };
            }
            
            // Функция для проверки DEC поля
            function validateDec(value) {
                // Если поле пустое - оно валидно (поле опциональное)
                if (value.trim() === '') {
                    return { valid: true, message: '' };
                }
                
                // Проверяем длину
                if (value.length > 12) {
                    return { 
                        valid: false, 
                        message: 'DEC поле не должно превышать 12 символов' 
                    };
                }
                
                // Проверяем допустимые символы
                const decPattern = /^[0-9]+$/;
                if (!decPattern.test(value)) {
                    return { 
                        valid: false, 
                        message: 'DEC поле может содержать только цифры 0-9' 
                    };
                }
                
                return { valid: true, message: '' };
            }
            
            // Функция для взаимной блокировки полей
            function syncFields() {
                const hexValue = hexInput.value.trim();
                const decValue = decInput.value.trim();
                
                // Если HEX не пустое, блокируем DEC
                if (hexValue !== '') {
                    decInput.setAttribute('readonly', true);
                } else {
                    decInput.removeAttribute('readonly');
                }
                
                // Если DEC не пустое, блокируем HEX
                if (decValue !== '') {
                    hexInput.setAttribute('readonly', true);
                } else {
                    hexInput.removeAttribute('readonly');
                }
            }
            
            // Функция для проверки, что хотя бы одно поле заполнено
            function validateAtLeastOneField() {
                const hexValue = hexInput.value.trim();
                const decValue = decInput.value.trim();
                
                // Если оба поля пустые, показываем ошибку
                if (hexValue === '' && decValue === '') {
                    formError.textContent = 'Заполните хотя бы одно поле: HEX или DEC';
                    formError.classList.add('show');
                    return false;
                } else {
                    formError.classList.remove('show');
                    return true;
                }
            }
            
            // Валидация HEX поля при вводе
            hexInput.addEventListener('input', function() {
                const value = this.value;
                const result = validateHex(value);
                
                // Синхронизируем блокировку полей
                syncFields();
                
                if (!result.valid) {
                    hexError.textContent = result.message;
                    hexError.classList.add('show');
                    this.classList.add('field-error');
                } else {
                    hexError.textContent = '';
                    hexError.classList.remove('show');
                    this.classList.remove('field-error');
                }
                
                // Проверяем общее условие формы
                validateAtLeastOneField();
            });
            
            // Валидация DEC поля при вводе
            decInput.addEventListener('input', function() {
                const value = this.value;
                const result = validateDec(value);
                
                // Синхронизируем блокировку полей
                syncFields();
                
                if (!result.valid) {
                    decError.textContent = result.message;
                    decError.classList.add('show');
                    this.classList.add('field-error');
                } else {
                    decError.textContent = '';
                    decError.classList.remove('show');
                    this.classList.remove('field-error');
                }
                
                // Проверяем общее условие формы
                validateAtLeastOneField();
            });
            
            // Валидация всей формы при отправке
            form.addEventListener('submit', function(event) {
                let isValid = true;
                
                // Очищаем все сообщения об ошибках
                hexError.textContent = '';
                hexError.classList.remove('show');
                decError.textContent = '';
                decError.classList.remove('show');
                formError.classList.remove('show');
                hexInput.classList.remove('field-error');
                decInput.classList.remove('field-error');
                
                // Проверяем HEX поле (только если оно не пустое)
                const hexValue = hexInput.value;
                if (hexValue.trim() !== '') {
                    const hexResult = validateHex(hexValue);
                    if (!hexResult.valid) {
                        hexError.textContent = hexResult.message;
                        hexError.classList.add('show');
                        hexInput.classList.add('field-error');
                        isValid = false;
                    }
                }
                
                // Проверяем DEC поле (только если оно не пустое)
                const decValue = decInput.value;
                if (decValue.trim() !== '') {
                    const decResult = validateDec(decValue);
                    if (!decResult.valid) {
                        decError.textContent = decResult.message;
                        decError.classList.add('show');
                        decInput.classList.add('field-error');
                        isValid = false;
                    }
                }
                
                // Проверяем, что хотя бы одно поле заполнено
                if (!validateAtLeastOneField()) {
                    isValid = false;
                }
                
                if (!isValid) {
                    event.preventDefault();
                    // Прокручиваем к первой ошибке
                    const firstError = document.querySelector('.error.show, .form-error.show');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
            
            // Автоматическая проверка при загрузке страницы (если есть значения)
            if (hexInput.value.trim() !== '') {
                hexInput.dispatchEvent(new Event('input'));
            }
            if (decInput.value.trim() !== '') {
                decInput.dispatchEvent(new Event('input'));
            }
            
            // Инициализируем блокировку полей при загрузке
            syncFields();
        });
    </script>
