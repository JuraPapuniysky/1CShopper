<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Сброс пароля';

?>


<main class="content" id="page-login">
    <div class="container">
        <div class="login-container">
            <div class="login-title-container">
                <span>Сброс пароля</span>
                <span></span>
            </div>
            <div class="login-inputs-container">
                <div class="local-login-form">
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'auth-button yellow-bg']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
                <div class="connection-word">

                </div>
                <div class="social-login-form">

                </div>
            </div>
        </div>
    </div>
</main>


