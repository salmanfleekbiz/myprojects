<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<h3 class="form-title">Login to your account</h3>
<div class="control-group">
<label class="control-label visible-ie8 visible-ie9">Username</label>
<div class="controls">
<div class="input-icon left">
<i class="icon-user"></i>
<?= $form->field($model, 'username')->textInput(['autocomplete' => 'off', 'class' => 'm-wrap placeholder-no-fix', 'placeholder' => 'Username'])->label(false); ?>
</div>
</div>
</div>
<div class="control-group">
<label class="control-label visible-ie8 visible-ie9">Password</label>
<div class="controls">
<div class="input-icon left">
<i class="icon-lock"></i>
<?= $form->field($model, 'password')->passwordInput(['autocomplete' => 'off', 'class' => 'm-wrap placeholder-no-fix', 'placeholder' => 'Password'])->label(false); ?>
</div>
</div>
</div>
<div class="form-actions">
<label class="checkbox">
<?= $form->field($model, 'rememberMe')->checkbox() ?>
</label>
<?= Html::submitButton('Login', ['class' => 'btn yellow pull-right', 'name' => 'login-button']) ?>
</div>
<?php ActiveForm::end(); ?>