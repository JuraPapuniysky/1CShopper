<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InfoTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Info Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-table-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Info Table', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'main_phone',
            'phone1',
            'phone2',
            'email:email',
            // 'city',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
