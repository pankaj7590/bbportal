<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssociationPlayer */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Association Player',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Association Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="association-player-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
