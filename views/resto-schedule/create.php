<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RestoSchedule */

$this->title = 'Create Resto Schedule';
$this->params['breadcrumbs'][] = ['label' => 'Resto Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resto-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
