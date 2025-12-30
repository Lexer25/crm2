<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<fieldset>
    <legend><?php echo __('Куда следует'); ?></legend>
    <div>
        <select name="org_selector" id="org_selector" 
                style="color: #000; background: #fff; padding: 5px; width: 300px; font-family: Arial, sans-serif;">
            <option value="" disabled selected>Выберите организацию</option>
            <?php foreach ($org as $item): ?>
                <?php 
                    $name = !empty($item['NAME']) 
                        ? mb_convert_encoding($item['NAME'], 'UTF-8', 'Windows-1251') 
                        : 'Организация #' . $item['ID_ORG'];
                    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                    // Выбираем организацию ТОЛЬКО из GUESTORDER
                    $selected = '';
                    if (isset($current_org_id) && $current_org_id == $item['ID_ORG']) {
                        $selected = 'selected';
                    }
                ?>
                <option value="<?php echo $item['ID_ORG']; ?>" <?php echo $selected; ?>><?php echo $name; ?></option>
            <?php endforeach; ?>
        </select>
        <br />
        <span class="error" id="error_org" style="color: red; display: none;">
            <?php echo __('Выберите организацию'); ?>
        </span>
    </div>
</fieldset>

<script>
$(document).ready(function(){
    $("#org_selector").select2({
        placeholder: "Выберите организацию",
        allowClear: false,
        language: "ru",
        width: '300px',
        theme: 'default'
    });

    // Обработка изменения required для Select2
    $('#savenewwithcard, #forceexit').on('click', function() {
        $('#org_selector').removeAttr('required');
        // Переинициализация Select2
        $('#org_selector').select2('destroy').select2({
            placeholder: "Выберите организацию",
            allowClear: false,
            language: "ru",
            width: '300px',
            theme: 'default'
        });
    });
    $('#consent1').on('click', function() {
        $('#org_selector').removeAttr('required');
        // Переинициализация Select2
        $('#org_selector').select2('destroy').select2({
            placeholder: "Выберите организацию",
            allowClear: false,
            language: "ru",
            width: '300px',
            theme: 'default'
        });
    });

    // $('#consent1').on('click', function() {
    //     $('#org_selector').removeAttr('required');
    //     // Переинициализация Select2
    //     $('#org_selector').select2('destroy').select2({
    //         placeholder: "Выберите организацию",
    //         allowClear: false,
    //         language: "ru",
    //         width: '300px',
    //         theme: 'default'
    //     });
    // });
});
</script>