<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\restaurantopeninghours\models\backend\RestaurantOpeningHoursSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Restaurant Opening Hours');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-opening-hours-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Restaurant Opening Hours'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'restaurant_id',
            'day_of_week',
            'time_open',
            'time_closed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
