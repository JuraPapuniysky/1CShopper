<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход на сайт';

?>

<main class="content" id="page-login">
    <div class="container">
        <div class="login-container">
            <div class="login-title-container">
                <span>Вход</span>
                <span></span>
            </div>
            <div class="login-inputs-container">
                <div class="local-login-form">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput([
                        'autofocus' => true,
                        'class' => 'login-mail-input',
                        'placeholder' => $model->getAttributeLabel('username'),
                    ])
                        ->label(false) ?>

                    <?= $form->field($model, 'password')->passwordInput([
                            'class' => 'login-password-input',
                            'placeholder' => $model->getAttributeLabel('password'),
                        ])
                        ->label(false) ?>


                    <div style="color:#999;margin:1em 0">
                        Если вы забыли свой пароль вы можете <?= Html::a('сбросить его', ['site/request-password-reset']) ?>.
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Войти', ['class' => 'auth-button yellow-bg', 'name' => 'login-button']) ?>
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
