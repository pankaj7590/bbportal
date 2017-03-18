<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\enums\Level;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\Association */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="association-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->dropDownList(Level::$label,['prompt' => 'Select Level']) ?>

    <?= $form->field($model, 'status')->dropDownList(Status::$label) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
