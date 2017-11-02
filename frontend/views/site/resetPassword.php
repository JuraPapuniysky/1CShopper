<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="content" id="page-login">
    <div class="container">
        <div class="login-container">
            <div class="login-title-container">
                <span>Пожалуйста введите новый пароль</span>
                <span></span>
            </div>
            <div class="login-inputs-container">
                <div class="local-login-form">
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'auth-button yellow-bg']) ?>
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


