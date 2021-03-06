<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NewsPromotion */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News Promotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-promotion-view">

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
            'title',
            'description',
            //'text:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

<div class="image-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($uploadForm, 'imageFiles')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?php $uploadForm->productId = $model->id;?><?= $form->field($uploadForm, 'productId')->textInput(['hidden' => 'hidden']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
