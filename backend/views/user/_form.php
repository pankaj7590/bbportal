<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
		'options' => [
			'autocomplete' => 'off',
		],
	]); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'profile_pic')->fileInput() ?>
    <?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>
    <?= $form->field($model, 'mobile')->textInput() ?>
    <?= $form->field($model, 'designation')->textInput(['autocomplete'=>'off']) ?>
	<input type="text" style="opacity:0;position:absolute"/>
    <?= $form->field($model, 'password')->passwordInput(['autocomplete'=>'off']) ?>
    <?= $form->field($model, 'status')->dropdownlist(Status::$label) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
