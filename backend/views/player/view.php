<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Player;
use common\models\enums\Status;
use common\models\enums\Position;

/* @var $this yii\web\View */
/* @var $model common\models\Player */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-view">

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
            'name',
			[
				'attribute' => 'position',
				'value' => Position::$label[$model->position],
			],
            'birth_date',
			[
				'attribute' => 'gender',
				'value' => Player::$gender[$model->gender],
			],
            'seeding',
			[
				'attribute' => 'status',
				'value' => Status::$label[$model->status],
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
