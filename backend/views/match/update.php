<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Match */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Match',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => $tournament->name, 'url' => ['tournament/view', 'id'=> $tournament->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matches'), 'url' => ['index', 'tournament_id'=> $tournament->id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="match-update">

    <?= $this->render('_form', [
		'tournament' => $tournament,
        'model' => $model,
		'pool_teams' => ArrayHelper::map($pool_teams, 'id', 'name'),
		'selected_pool_teams' => ArrayHelper::map($selected_pool_teams, 'id', 'name'),
    ]) ?>

</div>
