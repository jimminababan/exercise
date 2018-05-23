<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Json;

?>

    <h1>Sort Array Function </h1>

<?php
$form = ActiveForm::begin();
echo Html::label('Please enter the array number separated with comma :  ');
echo '<br />';
echo Html::textInput('number');
echo Html::submitButton();
ActiveForm::end();


if(Yii::$app->request->isPost){
    echo $unique;
    echo '<br />';
    echo $unique == 'YES' ? Json::encode($arr) : null;
}



?>