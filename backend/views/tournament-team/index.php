<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TournamentTeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $tournament->name.': '.Yii::t('app', 'Teams');
$this->params['breadcrumbs'][] = ['label' => $tournament->name, 'url' => ['tournament/view', 'id'=> $tournament->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-team-index">

    <p>
        <?= Html::a(Yii::t('app', 'Add Teams'), ['create', 'tournament_id' => $tournament->id], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
			[
				'attribute' => 'tournament_id',
				'value' => function($data){
					return $data->tournament->name;
				}
			],
			[
				'attribute' => 'team_id',
				'value' => function($data){
					return $data->team->name;
				}
			],
            'fees_paid',
			[
				'attribute' => 'status',
				'value' => function($data){
					return Status::$label[$data->status];
				}
			],
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
