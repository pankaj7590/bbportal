<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TeamPlayer */

$this->title = Yii::t('app', 'Add Team Players');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Team Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-player-create">

    <?= $this->render('_form', [
        'model' => $model,
		'teams' => $teams,
		'players' => $players,
    ]) ?>

</div>
