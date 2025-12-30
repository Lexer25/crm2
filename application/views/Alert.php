<?php
/**
 * Файл для вывода списка сообщений (alert), которые передаются как массив
 */

// Проверяем существование переменной $arrAlert
if (isset($arrAlert)) { 
    // Если массив не пустой
    if (!empty($arrAlert)) {
        // Подключаем файл с состояниями алертов
        $alertStateFile = Kohana::find_file('views', 'alertState');
        if ($alertStateFile) {
            include $alertStateFile;
        } else {
            $arrayType = [];
            $arrayImage = [];
            $arrayAlt = [];
        }

        // Выводим все сообщения
        foreach ($arrAlert as $index => $value) {
            // Получаем тип результата действия
            $actionResult = Arr::get($value, 'actionResult');
            
            // Получаем соответствующие данные
            $divClass = Arr::get($arrayType, $actionResult, '');
            $imagePath = Arr::get($arrayImage, $actionResult, '');
            $imageAlt = Arr::get($arrayAlt, $actionResult, '');
            $message = Arr::get($value, 'actionDesc', '');
            
            // Добавляем ID для возможности скрытия
            $alertId = 'alert-' . $index . '-' . uniqid();
            
            // Формируем HTML для одного сообщения
            echo '<div id="' . $alertId . '" class="alert-message ' . HTML::chars($divClass) . '"><p>';
            
            if ($imagePath) {
                echo HTML::image($imagePath, [
                    'class' => 'mid_align', 
                    'alt' => HTML::chars($imageAlt)
                ]);
            }
            
            echo HTML::chars($message);
            echo '</p></div>';
            
            // JavaScript для скрытия конкретного сообщения через 5 секунд
            echo '<script>
                setTimeout(function() {
                    var alertEl = document.getElementById("' . $alertId . '");
                    if (alertEl) {
                        alertEl.style.transition = "opacity 0.5s ease";
                        alertEl.style.opacity = "0";
                        setTimeout(function() {
                            if (alertEl.parentNode) {
                                alertEl.parentNode.removeChild(alertEl);
                            }
                        }, 500);
                    }
                }, 5000);
            </script>';
        }
    } else {
       // echo '<div class="info-alert"><p>' . __('no_alerts') . '</p></div>';
    }
} else {
    //echo '<div class="error-alert"><p>' . __('no_arrAlert') . '</p></div>';
}
?>