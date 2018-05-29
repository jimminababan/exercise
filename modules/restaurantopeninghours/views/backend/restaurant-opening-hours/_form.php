<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RestaurantOpeningHours */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-opening-hours-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'restaurant_id')->textInput() ?>

    <?= $form->field($model, 'day_of_week')->textInput() ?>

    <?= $form->field($model, 'time_open')->textInput() ?>

    <?= $form->field($model, 'time_closed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
