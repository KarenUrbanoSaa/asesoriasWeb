<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';

?>
<div class="container m-5">
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Ingresa tu usuario y contraseña</p>

    <div class="row p-lg-5 m-lg-4">
        <div class="">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    ¿Olvidaste tu contraseña <?= Html::a('Reestablecer', ['site/request-password-reset']) ?>.
                    <br>
                    Si no recibiste el correo haz click <?= Html::a('Reenviar', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-outline-info col-12', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>