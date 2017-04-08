<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\MatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $tournament->name.': '.Yii::t('app', 'Matches');
$this->params['breadcrumbs'][] = ['label' => $tournament->name, 'url' => ['tournament/view', 'id'=> $tournament->id]];
$this->params['breadcrumbs'][] = 'Matches';
?>
<div class="match-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Match'), ['create', 'tournament_id' => $tournament->id], ['class' => 'btn btn-success']) ?>
    </p>

	<?php Pjax::begin(); ?>    
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				// 'id',
				// 'uniqueid',
				'round',
				[
					'attribute' => 'pool_id',
					'value' => function($data){
						return $data->pool?$data->pool->name:NULL;
					},
				],
				[
					'attribute' => 'first_team_id',
					'value' => function($data){
						return $data->firstTeam->team->name;
					},
				],
				[
					'attribute' => 'second_team_id',
					'value' => function($data){
						return $data->secondTeam->team->name;
					},
				],

				[
					'class' => 'yii\grid\ActionColumn',
					'template' => '{view} {update} {delete} {scoresheet}',
					'buttons' => [
						'scoresheet' => function($url, $model, $key){
							return Html::a('<span class="glyphicon glyphicon-duplicate"></span>', ['match/scoresheet', 'id' => $model->id], ['title' => 'Download Scoresheet']);
						},
					],
				],
			],
		]); ?>
	<?php Pjax::end(); ?>
</div>