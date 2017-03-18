<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeamPlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Team Players');
$this->params['breadcrumbs'][] = ['label' => $team->name, 'url' => ['team/view', 'id'=> $team->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-player-index">

    <p>
        <?= Html::a(Yii::t('app', 'Add Team Players'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
			[
				'attribute' => 'player_id',
				'value' => function($data){
					return $data->player->name;
				}
			],
			[
				'attribute' => 'status',
				'value' => function($data){
					return Status::$label[$data->status];
				}
			],
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
