<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>



<div class="site-index">

    <div class="jumbotron">

        <div class="form-row">
            <?php $form = ActiveForm::begin(); ?>

            <div class="form-group col-md-6">
                <?= Html::submitButton("Сформировать", ['class' => 'btn btn-success']) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $form->field($model, 'groupGoods')->dropDownList($uniqueIDs)->label(false) ?>
            </div>
            <div class="form-group col-md-6">
                    <?= $form->field($model, 'stringItems')->label(false) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $form->field($model, 'stringSizes')->label(false) ?>
            </div>
<!--            <div class="form-group col-md-12">-->
<!--                --><?//= $form->field($model, 'onlySale')->label(false)->checkbox(['Вывести распродажные модели']) ?>
<!--            </div>-->
<!--            <div class="form-group col-md-12">-->
<!--                --><?//= $form->field($model, 'unSale')->label(false)->checkbox(['Вывести распродажные модели']) ?>
<!--            </div>-->

            <?php ActiveForm::end(); ?>
        </div>


        <br><br>


    </div>

    <div class="body-content">


    </div>
</div>
