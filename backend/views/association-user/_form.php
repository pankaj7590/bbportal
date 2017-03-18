<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\AssociationUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="association-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'association_id')->dropdownlist(ArrayHelper::map($associations, 'id', 'name'), ['prompt' => 'Select Association']); ?>

    <?= $form->field($model, 'user_id[]')->dropdownlist(ArrayHelper::map($users, 'id', 'name'), ['prompt' => 'Select Users', 'multiple' => 'multiple']) ?>

    <?= $form->field($model, 'status')->dropdownlist(Status::$label) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
