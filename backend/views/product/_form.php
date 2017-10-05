<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'name'),
    [
            'id' => 'name',
            'prompt' => 'Выберите категори...',
    ])?>

    <?= $form->field($model, 'type_id')->widget(DepDrop::className(),[
        'options' => ['id' => 'city_id'],
        'pluginOptions' => [
            'depends' => ['name'],
            'placeholder' => 'Выберите тип...',
            'url' => Url::to(['product/types'])
        ]
    ])?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->widget(\dosamigos\ckeditor\CKEditor::className())?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
