<?php

// ...

?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- ... -->
    <?= $form->field($model, 'date')->textInput(['type' => 'date', 'min' => date('Y-m-d')])->label('Дата') ?>
    <?= $form->field($model, 'time')->dropDownList($model->timeDropdown, ['prompt' => 'Выберите часы'])->label('Время') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
