<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Match */

$this->title = Yii::t('app', 'Create Match');
$this->params['breadcrumbs'][] = ['label' => $tournament->name, 'url' => ['tournament/view', 'id'=> $tournament->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matches'), 'url' => ['index', 'tournament_id'=> $tournament->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-create">

    <?= $this->render('_form', [
		'tournament' => $tournament,
        'model' => $model,
		'tournament_teams' => $tournament_teams,
		'selected_tournament_teams' => $selected_tournament_teams,
    ]) ?>

</div>
