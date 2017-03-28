<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\enums\Level;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teams');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Team'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'unique_id',
            'name',
			[
				'attribute' => 'association_id',
				'value' => function($data){
					return $data->association?$data->association->name:NULL;
				}
			],
			[
				'attribute' => 'level',
				'value' => function($data){
					return Level::$label[$data->level];
				}
			],
            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {delete} {players}',
				'buttons' => [
					'players' => function($url, $model, $key){
						return Html::a('<span class="glyphicon glyphicon-user"></span>', ['team-player/index', 'team_id' => $model->id], ['title' => 'Players', 'data-pjax' => 0]);
					}
				]
			],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
