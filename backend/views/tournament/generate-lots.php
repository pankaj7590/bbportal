<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tournament */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', '{modelClass}: ', [
    'modelClass' => 'Generate Lots',
]) . $tournament->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tournaments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tournament->name, 'url' => ['view', 'id' => $tournament->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Generate Lots');
?>

<div class="generate-lots-form">

    <?= Html::beginForm(); ?>
	
	<div class="form-group field-association-name required">
		<label class="control-label" for="association-name">Maximum Number Of Teams In A Pool</label>
		<?= Html::input('number', 'max-teams', '2', ['min' => 1, 'class' => 'form-control']) ?>
		<div class="help-block"></div>
	</div>
    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Generate'), ['class' => 'btn btn-success']) ?>
    </div>

    <?= Html::endForm(); ?>

</div>
