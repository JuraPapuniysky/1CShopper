<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsPromotion */

$this->title = 'Create News Promotion';
$this->params['breadcrumbs'][] = ['label' => 'News Promotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-promotion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
