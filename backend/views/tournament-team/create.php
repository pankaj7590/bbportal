<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */

$this->title = Yii::t('app', 'Add Teams');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tournament Teams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-team-create">

    <?= $this->render('_form', [
		'tournament' => $tournament,
		'tournaments' => $tournaments,
		'teams' => $teams,
        'model' => $model,
    ]) ?>

</div>
