<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssociationUser */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Association User',
]) . $model->user->name;
$this->params['breadcrumbs'][] = ['label' => $model->association->name, 'url' => ['association/view', 'id'=> $model->association->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="association-user-update">

    <?= $this->render('_update_form', [
        'model' => $model,
		'associations' => $associations,
		'users' => $users,
    ]) ?>

</div>
