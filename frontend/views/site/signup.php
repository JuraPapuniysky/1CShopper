<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация на сайте';

?>

<main class="content page-registration" id="page-registration">
    <div class="container">
        <div class="login-container">
            <div class="login-title-container">
                <span>Регистрация</span>
                <span>Используйте соц. сеть</span>
            </div>
            <div class="registration-inputs-container">
                <div class="local-login-form">

                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'username')->textInput([
                                'autofocus' => true,
                            'class' => 'login-mail-input',
                            'placeholder' => $model->getAttributeLabel('username')
                        ])->label(false) ?>

                        <?= $form->field($model, 'email')->textInput(['class' => 'login-mail-input', 'placeholder' => $model->getAttributeLabel('email')])->label(false) ?>

                        <?= $form->field($model, 'password')->passwordInput(['class' => 'login-password-input', 'placeholder' => $model->getAttributeLabel('password')])->label(false) ?>

                    <label class="registration-input-label">
                        <span class="checkbox-text">Получать новости о....</span>
                        <input type="checkbox" class="checkbox-default" />
                        <span class="checkbox-custom"></span>
                    </label>
                    <label class="registration-input-label">
                        <span class="checkbox-text">Получать рассылку о....</span>
                        <input type="checkbox" class="checkbox-default" />
                        <span class="checkbox-custom"></span>
                    </label>

                        <div class="form-group">
                            <?= Html::submitButton('Зарегистрироваться', ['class' => 'auth-button yellow-bg', 'name' => 'signup-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>


                </div>
                <div class="connection-word">
                    или
                </div>
                <div class="social-login-form">
                    <button class="social-login-link"><img src="img/footer-icon-gplus.png"><span>Гугл аккаунт</span></button>
                    <button class="social-login-link"><img src="img/footer-icon-vk.png"><span>Вконтакте</span></button>
                    <button class="social-login-link"><img src="img/footer-icon-tw.png"><span>Твиттер</span></button>
                    <button class="social-login-link"><img src="img/footer-icon-ok.png"><span>Одноклассники</span></button>
                    <button class="social-login-link"><img src="img/footer-icon-fb.png"><span>Фейсбук</span></button>
                </div>
            </div>
        </div>
    </div>
</main>
