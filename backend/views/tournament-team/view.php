<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */

$this->title = $model->team->name;
$this->params['breadcrumbs'][] = ['label' => $model->tournament->name, 'url' => ['tournament/view', 'id'=> $model->tournament->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teams'), 'url' => ['index', 'tournament_id' => $model->tournament->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-team-view">

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
			[
				'attribute' => 'tournament_id',
				'value' => $model->tournament->name,
			],
			[
				'attribute' => 'team_id',
				'value' => $model->team->name,
			],
            'fees_paid',
			[
				'attribute' => 'status',
				'value' => Status::$label[$model->status],
			],
			[
				'attribute' => 'created_by',
				'value' => $model->createdBy?$model->createdBy->name:NULL,
			],
			[
				'attribute' => 'updated_by',
				'value' => $model->updatedBy?$model->updatedBy->name:NULL,
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
