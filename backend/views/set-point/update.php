<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SetPoint */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Set Point',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Set Points'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="set-point-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
