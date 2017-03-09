<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MatchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uniqueid') ?>

    <?= $form->field($model, 'round') ?>

    <?= $form->field($model, 'tournament_id') ?>

    <?= $form->field($model, 'pool_id') ?>

    <?php // echo $form->field($model, 'first_team_id') ?>

    <?php // echo $form->field($model, 'second_team_id') ?>

    <?php // echo $form->field($model, 'toss_winning_team_id') ?>

    <?php // echo $form->field($model, 'choice') ?>

    <?php // echo $form->field($model, 'refree_name') ?>

    <?php // echo $form->field($model, 'scorer_name') ?>

    <?php // echo $form->field($model, 'winning_team_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
