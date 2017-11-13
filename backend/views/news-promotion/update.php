<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NewsPromotion */

$this->title = 'Update News Promotion: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News Promotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-promotion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
