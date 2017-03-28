<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AssociationPlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $association->name.': '.Yii::t('app', 'Players');
$this->params['breadcrumbs'][] = ['label' => $association->name, 'url' => ['association/view', 'id'=> $association->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-player-index">

    <p>
        <?= Html::a(Yii::t('app', 'Add Player'), ['create', 'association_id' => $association->id], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
			[
				'attribute' => 'player_id',
				'label' => 'Player',
				'value' => function($data){
					return $data->player->name;
				},
			],
			[
				'attribute' => 'status',
				'value' => function($data){
					return Status::$label[$data->status];
				},
			],
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
