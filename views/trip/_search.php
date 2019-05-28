<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="row">
    <?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'get',]); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'airport')->textInput(['placeholder' => 'Airport'])->label('') ?>
    </div>
    <div class="col-md-6">
        <br>
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Reset', '/trip', ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

