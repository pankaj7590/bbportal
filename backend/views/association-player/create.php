<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AssociationPlayer */

$this->title = Yii::t('app', 'Add Player');
$this->params['breadcrumbs'][] = ['label' => $association->name, 'url' => ['association/view', 'id'=> $association->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-player-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'associations' => $associations,
        'players' => $players,
    ]) ?>

</div>
