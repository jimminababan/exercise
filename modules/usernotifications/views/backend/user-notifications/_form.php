<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserNotifications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-notifications-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_user_id')->widget(Select2::classname(), [
        'data' => $model->getFromUserIdOptions(),
        'options' => ['placeholder' => ''],
        'pluginOptions' => ['allowClear' => true],
    ]) ?>

    <?= $form->field($model, 'to_user_id')->widget(Select2::classname(), [
        'data' => $model->getToUserIdOptions(),
        'options' => ['placeholder' => ''],
        'pluginOptions' => ['allowClear' => true],
    ]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'read')->dropDownList($model->getReadOptions()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
