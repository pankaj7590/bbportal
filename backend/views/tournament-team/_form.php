<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tournament-team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tournament_id')->dropdownlist(ArrayHelper::map($tournaments, 'id', 'name')) ?>

	<?php if($model->isNewRecord){?>
    <?= $form->field($model, 'team_id')->dropdownlist(ArrayHelper::map($teams, 'id', 'name'), ['multiple' => 'multiple']) ?>
	<?php }else{?>
    <?= $form->field($model, 'team_id')->dropdownlist(ArrayHelper::map($teams, 'id', 'name')) ?>
	<?php }?>
	
    <?= $form->field($model, 'fees_paid')->textInput() ?>

    <?= $form->field($model, 'status')->dropdownlist(Status::$label) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
