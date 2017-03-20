<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\enums\Level;
use common\models\enums\TournamentType;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TournamentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tournaments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Tournament'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'unique_id',
            'name',
			[
				'attribute' => 'level',
				'value' => function($data){
					return Level::$label[$data->level];
				}
			],
			[
				'attribute' => 'type',
				'value' => function($data){
					return TournamentType::$label[$data->type];
				}
			],
			[
				'attribute' => 'status',
				'value' => function($data){
					return Status::$label[$data->status];
				}
			],
            // 'venue',
            // 'start_date',
            // 'end_date',
            // 'reporting_time:datetime',
            // 'fees',
            // 'status',
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',

            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {delete} {teams} {generate_lots} {change_lots} {matches}',
				'buttons' => [
					'teams' => function($url, $model, $key){
						return Html::a('<span class="glyphicon glyphicon-user"></span>', ['tournament-team/index', 'tournament_id' => $model->id], ['title' => 'Teams']);
					},
					'generate_lots' => function($url, $model, $key){
						return Html::a('<span class="glyphicon glyphicon-transfer"></span>', ['generate-lots', 'tournament_id' => $model->id], ['title' => 'Generate Lots']);
					},
					'change_lots' => function($url, $model, $key){
						return Html::a('<span class="glyphicon glyphicon-refresh"></span>', ['change-lots', 'tournament_id' => $model->id], ['title' => 'Change Lots']);
					},
					'matches' => function($url, $model, $key){
						return Html::a('<span class="glyphicon glyphicon-list-alt"></span>', ['match/index', 'tournament_id' => $model->id], ['title' => 'Matches']);
					},
				],
			],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
