<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AssociationUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = ['label' => $association->name, 'url' => ['association/view', 'id'=> $association->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Add User'), ['create', 'association_id' => $association->id], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
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
            // 'created_at',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
