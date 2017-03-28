<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\enums\Level;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\Team */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
				'attribute' => 'association_id',
				'value' => $model->association?$model->association->name:NULL,
			],
			[
				'attribute' => 'level',
				'value' => Level::$label[$model->level],
			],
			[
				'attribute' => 'status',
				'value' => Status::$label[$model->status],
			],
            // 'created_by:datetime',
            // 'updated_by:datetime',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
