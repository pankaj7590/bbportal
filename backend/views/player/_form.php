<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\enums\Position;
use common\models\Player;
use common\models\enums\Status;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Player */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->dropdownlist(Position::$label) ?>

    <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
		'options' => ['placeholder' => 'Enter birth date ...'],
		'pluginOptions' => [
			'autoclose'=>true,
			'format' => 'dd/mm/yyyy'
		]
	]); ?>

    <?= $form->field($model, 'gender')->dropdownlist(Player::$gender); ?>

    <?= $form->field($model, 'status')->dropdownlist(Status::$label) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
