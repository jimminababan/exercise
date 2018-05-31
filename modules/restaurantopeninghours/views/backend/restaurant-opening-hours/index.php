<?php

use app\models\RestaurantOpeningHours;
use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\Html;

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

            [
                'attribute' => 'restaurant_name',
                'value' => 'restaurant.name',
            ],
            [
                'attribute' => 'day_of_week',
                'filter' => Select2::widget([
                    'attribute' => 'day_of_week',
                    'data' => (new RestaurantOpeningHours)->getDayOfWeekOptions(),
                    'model' => $searchModel,
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => ['allowClear' => true],
                ]),
                'value' => 'dayOfWeekName',
            ],
            ['attribute' => 'time_open', 'value' => 'timeOpen'],
            ['attribute' => 'time_closed', 'value' => 'timeClosed'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
