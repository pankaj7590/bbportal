<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Akhand</b> Sports Club</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
		<div class="site-request-password-reset">
			<h3><?= Html::encode($this->title) ?></h3>

			<p>Please fill out your email. A link to reset password will be sent there.</p>

			<div class="row">
				<div class="col-lg-5">
					<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

						<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

						<div class="form-group">
							<?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
						</div>

					<?php ActiveForm::end(); ?>
					
					<?= Html::a('Back to login', ['site/login']) ?>
				</div>
			</div>
		</div>
	</div>
</div>
