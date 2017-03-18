<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AssociationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Associations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Association'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'unique_id',
            'name',
            // 'level',
            // 'seeding',
            // 'sport',
            'status',
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            'updated_at',

            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {delete} {users} {players}',
				'buttons' => [
					'users' => function($url, $model, $key){
						return Html::a('<span class="glyphicon glyphicon-user"></span>', ['association-user/index', 'association_id' => $model->id], ['title' => 'Users']);
					},
					'players' => function($url, $model, $key){
						return Html::a('<span class="glyphicon glyphicon-user"></span>', ['association-player/index', 'association_id' => $model->id], ['title' => 'Players', 'style' => 'color:#8fc2e0']);
					}
				]
			],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
