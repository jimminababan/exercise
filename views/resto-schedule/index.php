<?php

use kartik\form\ActiveForm;
use kartik\widgets\DateTimePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RestoScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resto Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resto-schedule-index">


    <div>
        <?php

        $form = ActiveForm::begin();

        echo DateTimePicker::widget([
            'name' => 'dp_1',
            'type' => DateTimePicker::TYPE_INPUT,
            'value' => '23-Feb-1982 10:10',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy hh:ii'
            ]
        ]);

        echo Html::submitButton();
        ActiveForm::end();


        if (Yii::$app->request->isPost) {
            $date = $_POST['dp_1'];
            $hourmin = strtotime(date('H:i', strtotime($date)));
            echo $hourmin;
            echo '<br />';
        }


        ?>


    </div>


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Resto Schedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'resto_schedule',
            'resto_name',
            [
                'attribute' => 'resto_open_time',
                'value' => function ($data) {
                    return $data->resto_open_time;
                }
            ],
            [
                'attribute' => 'day',
                'value' => function ($data) {
                    return $data->day;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
