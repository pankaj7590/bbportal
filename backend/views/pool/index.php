<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\enums\Status;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pools');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pool-index">

	<?php Pjax::begin(); ?>    
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				// 'id',
				[
					'attribute' => 'tournament_id',
					'value' => function($data){
						return $data->tournament->name;
					},
				],
				'name',
				[
					'attribute' => 'status',
					'value' => function($data){
						return Status::$label[$data->status];
					},
				],
				
				['class' => 'yii\grid\ActionColumn'],
			],
		]); ?>
	<?php Pjax::end(); ?>
</div>
