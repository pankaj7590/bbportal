<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\enums\Choice;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\Match */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'unique_id',
            'round',
			[
				'attribute' => 'tournament_id',
				'value' => $model->tournament?$model->tournament->name:NULL,
			],
			[
				'attribute' => 'pool_id',
				'value' => $model->pool->name,
			],
			[
				'attribute' => 'first_team_id',
				'value' => $model->firstTeam->team->name,
			],
			[
				'attribute' => 'second_team_id',
				'value' => $model->secondTeam->team->name,
			],
			[
				'attribute' => 'toss_winning_team_id',
				'value' => $model->tossWinningTeam->team->name,
			],
			[
				'attribute' => 'choice',
				'value' => Choice::$label[$model->choice],
			],
            'refree_name',
            'scorer_name',
			[
				'attribute' => 'winning_team_id',
				'value' => $model->winningTeam?$model->winningTeam->team->name:NULL,
			],
			[
				'attribute' => 'choice',
				'value' => Status::$label[$model->status],
			],
			[
				'attribute' => 'created_by',
				'value' => $model->createdBy->name,
			],
			[
				'attribute' => 'updated_by',
				'value' => $model->updatedBy->name,
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
