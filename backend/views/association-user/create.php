<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AssociationUser */

$this->title = Yii::t('app', 'Create Association User');
$this->params['breadcrumbs'][] = ['label' => $association->name, 'url' => ['association/view', 'id'=> $association->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-user-create">

    <?= $this->render('_form', [
        'model' => $model,
		'association' => $association,
		'associations' => $associations,
		'users' => $users,
    ]) ?>

</div>
