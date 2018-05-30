<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RestaurantOpeningHours */

$this->title = Yii::t('app', 'Create Restaurant Opening Hours');

if (\Yii::$app->request->get('restaurant_id')) {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restaurants'), 'url' => ['/restaurants/backend/restaurants']];
    $this->params['breadcrumbs'][] = ['label' => $model->restaurant->name, 'url' => ['/restaurants/backend/restaurants/view', 'id' => $model->restaurant->id]];
} else {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restaurant Opening Hours'), 'url' => ['index']];
}

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-opening-hours-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
