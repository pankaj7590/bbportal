<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\AssociationPlayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="association-player-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'association_id')->dropdownlist(ArrayHelper::map($associations, 'id', 'name'), ['prompt' => 'Select Association']); ?>

    <?= $form->field($model, 'player_id[]')->dropdownlist(ArrayHelper::map($players, 'id', 'name'), ['prompt' => 'Select Players', 'multiple' => 'multiple']) ?>

    <?= $form->field($model, 'status')->dropdownlist(Status::$label); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
