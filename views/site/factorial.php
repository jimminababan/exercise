<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

    <h1>Factorial Function </h1>

<?php
$form = ActiveForm::begin();
echo Html::label('Please enter the number :  ');
echo Html::textInput('number');
echo Html::submitButton();
ActiveForm::end();

if(Yii::$app->request->isPost){
    $number = $_POST['number'];
    $factorial = gmp_fact($number);
    echo "The Factorial for $number is : <h3>" . gmp_strval($factorial) . "</h3>";
}


?>