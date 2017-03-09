<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Set */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="set-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uniqueid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'match_id')->textInput() ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'first_team_points')->textInput() ?>

    <?= $form->field($model, 'second_team_points')->textInput() ?>

    <?= $form->field($model, 'winning_team_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
