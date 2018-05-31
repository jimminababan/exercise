<?php

use app\models\RestaurantOpeningHours;
use kartik\select2\Select2;
use kartik\widgets\TimePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Restaurants */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restaurants'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurants-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
        ],
    ]) ?>

    <p>
        <?= Html::a(
            Yii::t('app', 'Create Restaurant Opening Hours'),
            ['/restaurantopeninghours/backend/restaurant-opening-hours/create', 'restaurant_id' => $model->id],
            ['class' => 'btn btn-success']
        ) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'day_of_week',
                'filter' => Select2::widget([
                    'attribute' => 'day_of_week',
                    'data' => (new RestaurantOpeningHours)->getDayOfWeekOptions(),
                    'model' => $searchModel2,
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => ['allowClear' => true],
                ]),
                'value' => 'dayOfWeekName',
            ],
            ['attribute' => 'time_open', 'value' => 'timeOpen'],
            ['attribute' => 'time_closed', 'value' => 'timeClosed'],

            [
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            Url::to(['/restaurantopeninghours/backend/restaurant-opening-hours/update', 'id' => $model->id, 'restaurant_id' => $model->restaurant_id]),
                            ['title' => Yii::t('app', 'Update')]
                        );
                    },
                    'delete' => function($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            Url::to(['/restaurantopeninghours/backend/restaurant-opening-hours/delete', 'id' => $model->id, 'restaurant_id' => $model->restaurant_id]),
                            ['title' => Yii::t('app', 'Delete'), 'data-confirm' => Yii::t('app', 'Are you sure you want to delete this Record?'), 'data-method' => 'post']
                        );
                    }
                ],
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
