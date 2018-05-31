<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserNotifications */

$this->title = Yii::t('app', 'Create User Notifications');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Notifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-notifications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
