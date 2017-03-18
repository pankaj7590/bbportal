<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\enums\Level;
use common\models\enums\TournamentType;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\Tournament */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tournaments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Generate Lots'), ['generate-lots', 'tournament_id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'unique_id',
            'name',
			[
				'attribute' => 'level',
				'value' => Level::$label[$model->level],
			],
			[
				'attribute' => 'type',
				'value' => TournamentType::$label[$model->type],
			],
            'venue',
            'start_date:date',
            'end_date:date',
            'reporting_time:time',
            'fees',
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
