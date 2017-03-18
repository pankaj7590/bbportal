<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teams');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Team'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'unique_id',
            'name',
            'association_id',
            'level',
            // 'status',
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',

            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {delete} {players}',
				'buttons' => [
					'players' => function($url, $model, $key){
						return Html::a('<span class="glyphicon glyphicon-user"></span>', ['team-player/index', 'team_id' => $model->id], ['title' => 'Players']);
					}
				]
			],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
