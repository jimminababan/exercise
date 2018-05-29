<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\restaurantopeninghours\models\backend\RestaurantOpeningHoursSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-opening-hours-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'restaurant_id') ?>

    <?= $form->field($model, 'day_of_week') ?>

    <?= $form->field($model, 'time_open') ?>

    <?= $form->field($model, 'time_closed') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
