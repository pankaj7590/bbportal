<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\enums\Level;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\Association */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Associations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-view">

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
				'attribute' => 'level',
				'value' => $model->level?Level::$label[$model->level]:NULL,
			],
            // 'seeding',
            // 'sport',
			[
				'attribute' => 'status',
				'value' => Status::$label[$model->status],
			],
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
