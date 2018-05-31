<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Restaurants */

$this->title = Yii::t('app', 'Create Restaurants');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restaurants'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
