<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AssociationPlayer */

$this->title = Yii::t('app', 'Create Association Player');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Association Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-player-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
