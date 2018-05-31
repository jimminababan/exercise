<?php

use app\models\Restaurants;
use kartik\select2\Select2;
use kartik\widgets\TimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RestaurantOpeningHours */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-opening-hours-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (\Yii::$app->request->get('restaurant_id')) : ?>
        <?= $form->field($model, 'restaurant_id')->hiddenInput()->label(false) ?>
    <?php else : ?>
        <?= $form->field($model, 'restaurant_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Restaurants::find()->all(), 'id', 'name'),
            'options' => ['placeholder' => ''],
            'pluginOptions' => ['allowClear' => true],
        ]) ?>
    <?php endif ?>

    <?= $form->field($model, 'day_of_week')->widget(Select2::classname(), [
        'data' => $model->getDayOfWeekOptions(),
        'options' => ['placeholder' => ''],
        'pluginOptions' => ['allowClear' => true],
    ]) ?>

    <?= $form->field($model, 'time_open')->widget(TimePicker::classname(), [
        'pluginOptions' => ['showMeridian' => false],
    ]) ?>

    <?= $form->field($model, 'time_closed')->widget(TimePicker::classname(), [
        'pluginOptions' => ['showMeridian' => false],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
