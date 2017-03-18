<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\enums\Level;
use common\models\enums\TournamentType;
use common\models\enums\Status;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Tournament */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tournament-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->dropdownlist(Level::$label) ?>

    <?= $form->field($model, 'type')->dropdownlist(TournamentType::$label) ?>

    <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
		'options' => ['placeholder' => 'Enter start date ...'],
		'pluginOptions' => [
			'autoclose'=>true,
			'format' => 'dd/mm/yyyy'
		]
	]) ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
		'options' => ['placeholder' => 'Enter end date ...'],
		'pluginOptions' => [
			'autoclose'=>true,
			'format' => 'dd/mm/yyyy'
		]
	]) ?>

    <?= $form->field($model, 'reporting_time')->textInput() ?>

    <?= $form->field($model, 'fees')->textInput() ?>

    <?= $form->field($model, 'status')->dropdownlist(Status::$label) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
