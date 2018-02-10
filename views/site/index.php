<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Pattern';
?>


<div class="site-index">

    <div class="jumbotron">

        <div class="form-row">
            <?php $form = ActiveForm::begin(['options'=>['target'=>'_blank']]); ?>

            <div class="form-group col-md-6">
                <?= Html::submitButton("Сформировать", ['class' => 'btn btn-success']) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $form->field($model, 'groupGoods')->dropDownList($uniqueIDs)->label(false) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $form->field($model, 'stringItems')->label(false)->textInput(['placeholder' => 'Фильтр по артикулам - через запятую']) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $form->field($model, 'stringSizes')->label(false)->textInput(['placeholder' => 'Фильтр по размерам - через запятую']) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $form->field($model, 'color')->label(false)->textInput(['placeholder' => 'Цвет']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>


        <br><br>


    </div>

    <div class="body-content">


    </div>
</div>
