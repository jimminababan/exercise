<?php

use app\models\RestaurantOpeningHours;
use kartik\select2\Select2;
use kartik\widgets\TimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\restaurants\models\backend\RestaurantsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurants-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <div class="row">
        <div class="col-md-4 col-xs-4">
            <?= $form->field($model, 'restaurant_opening_hours_day_of_week')->widget(Select2::classname(), [
                'data' => (new RestaurantOpeningHours)->getDayOfWeekOptions(),
                'options' => ['placeholder' => ''],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
        </div>
        <div class="col-md-4 col-xs-4">
            <?= $form->field($model, 'restaurant_opening_hours_time_open') ?>
        </div>
        <div class="col-md-4 col-xs-4">
            <?= $form->field($model, 'restaurant_opening_hours_time_closed') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
