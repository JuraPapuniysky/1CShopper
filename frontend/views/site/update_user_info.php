<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\UserInfo */



use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Редактирование профиля '.\common\models\User::findOne($model->user_id)->username;
?>

<main class="content page-registration" id="page-registration">
    <div class="container">
        <div class="login-container">
            <div class="login-title-container">
                <span><?= $this->title ?></span>

            </div>
            <div class="registration-inputs-container">
                <div class="local-login-form">

                    <?php $form = ActiveForm::begin(['id' => 'form-user-info']); ?>

                    <?= $form->field($model, 'first_name')->textInput([
                        'autofocus' => true,
                        'class' => 'login-mail-input',
                        'placeholder' => $model->getAttributeLabel('first_name')
                    ])->label(false) ?>

                    <?= $form->field($model, 'last_name')->textInput(['class' => 'login-mail-input', 'placeholder' => $model->getAttributeLabel('last_name')])->label(false) ?>

                    <?= $form->field($model, 'phone')->textInput(['class' => 'login-password-input', 'placeholder' => $model->getAttributeLabel('phone')])->label(false) ?>


                    <div class="form-group">
                        <?= Html::submitButton('Редактировать', ['class' => 'auth-button yellow-bg', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>


                </div>

            </div>
        </div>
    </div>
</main>

