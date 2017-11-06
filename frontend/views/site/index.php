<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <?= \common\widgets\Slider::widget() ?>

    <?= \common\widgets\Catalog::widget() ?>

</div>
