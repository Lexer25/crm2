<?php if (!empty($buro_list) && ($user->id_role == 1 || $user->id_role == 2 || $user->id_role == 3)): ?>
<div class="buro-selection" style="margin-bottom: 15px;">
    <fieldset>
        <legend>
            <?php echo __('Выберите бюро'); ?>
            <?php if (isset($mode) && $mode === 'neworder' && $user->count_buro > 1): ?>
                <span style="color: red;">*</span>
            <?php endif; ?>
        </legend>
        <?php foreach ($buro_list as $buro_item): ?>
            <label style="display: block; margin: 5px 0; padding: 5px; background: #f5f5f5; border-radius: 4px;">
                <?php if ($user->count_buro == 1): ?>
                    <input type="hidden" name="selected_buro" value="<?php echo $buro_item['id_buro']; ?>">
                    <input 
                        type="radio" 
                        name="selected_buro_display" 
                        value="<?php echo $buro_item['id_buro']; ?>"
                        checked
                        disabled
                    >
                <?php else: ?>
                    <input 
                        type="radio" 
                        name="selected_buro" 
                        value="<?php echo $buro_item['id_buro']; ?>"
                        <?php echo (!empty($_POST['selected_buro']) && $_POST['selected_buro'] == $buro_item['id_buro']) ? 'checked' : ''; ?>
                        <?php if (isset($mode) && $mode === 'neworder' && $user->count_buro > 1): ?>
                            required
                        <?php endif; ?>
                    >
                <?php endif; ?>
                <?php echo htmlspecialchars($buro_item['buro_name']); ?>
            </label>
        <?php endforeach; ?>
        <br />
        <span class="error" id="error_buro" style="color: red; display: none;">
            <?php echo __('Выберите бюро пропусков'); ?>
        </span>
    </fieldset>
</div>
<?php endif; ?>