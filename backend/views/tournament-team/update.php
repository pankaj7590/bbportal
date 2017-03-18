<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tournament Team',
]) . $model->team->name;
$this->params['breadcrumbs'][] = ['label' => $model->tournament->name, 'url' => ['tournament/view', 'id'=> $model->tournament->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teams'), 'url' => ['index', 'tournament_id' => $model->tournament->id]];
$this->params['breadcrumbs'][] = ['label' => $model->team->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tournament-team-update">

    <?= $this->render('_form', [
		'tournament' => $model->tournament,
		'tournaments' => $tournaments,
		'teams' => $teams,
        'model' => $model,
    ]) ?>

</div>
