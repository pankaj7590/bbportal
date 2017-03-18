<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\AssociationUser */

$this->title = $model->user->name;
$this->params['breadcrumbs'][] = ['label' => $model->association->name, 'url' => ['association/view', 'id'=> $model->association->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index', 'association_id' => $model->association->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-user-view">

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
			[
				'attribute' => 'association_id',
				'value' => function($data){
					return $data->association?$data->association->name:NULL;
				},
			],
			[
				'attribute' => 'user_id',
				'value' => function($data){
					return $data->user?$data->user->name:NULL;
				},
			],
			[
				'attribute' => 'status',
				'value' => function($data){
					return Status::$label[$data->status];
				},
			],
            // 'created_by',
            // 'updated_by',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
