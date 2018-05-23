<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RestoSchedule */

$this->title = 'Update Resto Schedule: ' . $model->resto_schedule;
$this->params['breadcrumbs'][] = ['label' => 'Resto Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->resto_schedule, 'url' => ['view', 'id' => $model->resto_schedule]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resto-schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
