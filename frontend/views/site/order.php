<?php
/* @var $this \yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Параметры заказа'
?>

<main class="content" id="page-order-parameters">
    <div class="container">
        <div class="order-parameters-container">
            <div class="order-parameters-container-title">
                <div class="parameter-title-item">Корзина</div>
                <div class="parameter-title-item parameter-title-item-active">Параметры плательщика</div>
                <div class="parameter-title-item">Подтверждение заказа</div>
            </div>
            <div class="order-parameters-container-body">
                <div class="parameters-body-title">
                    <span>Форма заказа</span>
                    <span>(необязательно)</span>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                    <div class="parameters-inputs-container">
                        <div class="parameters-inputs-column main-inputs-column">
                            <label class="parameter-label">
                                <div class="parameter-label-title">Фамилия*</div>
                                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'class' => 'parameter-label-input'])->label(false) ?>
                            </label>
                            <label class="parameter-label">
                                <div class="parameter-label-title">Email*</div>
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'parameter-label-input'])->label(false) ?>
                            </label>
                            <label class="parameter-label">
                                <div class="parameter-label-title">Имя*</div>
                                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'class' => 'parameter-label-input'])->label(false) ?>
                            </label>
                            <label class="parameter-label">
                                <div class="parameter-label-title">Телефон*</div>
                                <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' =>'parameter-label-input'])->label(false) ?>
                            </label>
                        </div>
                        <div class="parameters-inputs-column additional-inputs-column">
                            <label class="parameter-label">
                                <div class="parameter-label-title">Регион</div>
                                <?= $form->field($model, 'region')->textInput(['maxlength' => true, 'class' => 'parameter-label-input'])->label(false) ?>
                            </label>
                            <label class="parameter-label">
                            </label>
                            <label class="parameter-label">
                                <div class="parameter-label-title">Город</div>
                                <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'class' => 'parameter-label-input'])->label(false) ?>
                            </label>
                            <label class="parameter-label">
                                <div class="parameter-label-title">Индекс</div>
                                <?= $form->field($model, 'index')->textInput(['maxlength' => true, 'class' => 'parameter-label-input'])->label(false) ?>
                            </label>
                            <label class="parameter-label">
                                <div class="parameter-label-title">Адрес</div>
                                <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'class' => 'parameter-label-input'])->label(false) ?>
                            </label>
                        </div>
                    </div>
                <?= Html::submitButton('Подтвердить заказ', ['class' => 'submit-order-button yellow-bg']) ?>
                <?php ActiveForm::end(); ?>





















                <div class="order-description-text">
                    This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
                </div>
            </div>
        </div>
    </div>
</main>
