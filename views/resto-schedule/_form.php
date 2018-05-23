<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RestoSchedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resto-schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'resto_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resto_open_time')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
