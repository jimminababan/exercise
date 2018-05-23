<?php

use yii\helpers\Html;use yii\helpers\Url;$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to Glints Solution Test</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <h2>Menu</h2>
            <table class="table table-bordered">
                <tr>
                    <th><?= Html::a('Factorial',Url::toRoute('/site/factorial'))?></th>
                </tr>
                <tr>
                    <th><?= Html::a('Sort Array',Url::toRoute('/site/sortarray'))?></th>
                </tr>
                <tr>
                    <th><?= Html::a('2D Matrix Rotation',Url::toRoute('/site/arrayrotation'))?></th>
                </tr>
            </table>

        </div>

    </div>
</div>
