<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\FilterItem;

$this->title = 'Pattern';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>


    <?php
    /* @var $group FilterItem */
    var_dump($group);


    ?>


    <?php $listProperties = array() ?>

    <?php foreach ($group as $groups => $section): ?>

        <?php echo $groups ?> <br>
        <?php $value = explode(',', $section[1]['ImageURLs(x,y,z..)']); ?>
        <img width="300" src=' <?= $value[0] ?> '><br>


        <?php foreach ($section as $header => $value) {
            $listProperties[$value['Color']][$value['Size']] = [$value['Size']];
        } ?>

        <?php foreach ($listProperties as $name => $color) {
            echo $name . '<br>';
            foreach ($color as $item => $size) {
                echo $item . ', ';
            }
            echo '<br>';

        } ?>

        <?php unset($listProperties) ?>


        <br>
        <?php $list[$groups] = $value['Wholesale price'] . ' руб.' ?>
        <br>
        <br>
    <?php endforeach ?>

    <br>

    <code><?= __FILE__ ?></code>
</div>
