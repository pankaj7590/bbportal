<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pool */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pool',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pool-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
