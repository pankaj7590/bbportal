<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TeamPlayer */

$this->title = Yii::t('app', 'Create Team Player');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Team Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-player-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
