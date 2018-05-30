<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\restaurants\models\backend\RestaurantsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Restaurants');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurants-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Restaurants'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'format' => 'raw',
                'header' => Yii::t('app', 'Opening Hours'),
                'value' => function($model) {
                    $html = '';

                    foreach ($model->restaurantOpeningHours as $openingHour) {
                        $html .= $openingHour->getDayOfWeekName().' '.$openingHour->getTimeOpen().' - '.$openingHour->getTimeClosed().'<br />';
                    }

                    return $html;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
