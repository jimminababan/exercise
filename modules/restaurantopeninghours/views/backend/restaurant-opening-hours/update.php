<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RestaurantOpeningHours */

$this->title = Yii::t('app', 'Update Restaurant Opening Hours: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);

if (\Yii::$app->request->get('restaurant_id')) {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restaurants'), 'url' => ['/restaurants/backend/restaurants']];
    $this->params['breadcrumbs'][] = ['label' => $model->restaurant->name, 'url' => ['/restaurants/backend/restaurants/view', 'id' => $model->restaurant->id]];
} else {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restaurant Opening Hours'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
}

$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="restaurant-opening-hours-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
