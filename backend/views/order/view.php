<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'status',
            'first_name',
            'last_name',
            'email:email',
            'phone',
            'region',
            'city',
            'address',
            'index',
        ],
    ]) ?>


    <div class="row">
        <?php foreach ($model->orderProducts as $orderProduct){ ?>
        <div class="col-sm-6 col-md-4">

            <div class="thumbnail">
                <?= Html::img('/frontend/web/'.$orderProduct->product->productImages[0]->image->src) ?>
                <div class="caption">
                    <h3><?= $orderProduct->product->name ?></h3>
                    <p>...</p>
                    <p><?= Html::a('Удалить', ['order/delete-product', 'order_product_id' => $orderProduct->id]) ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>


</div>
