<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Player;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Players');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Player'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'unique_id',
            'name',
            // 'position',
            // 'birth_date',
			[
				'attribute' => 'gender',
				'value' => function($data){
					return Player::$gender[$data->gender];
				}
			],
            // 'seeding',
			[
				'attribute' => 'status',
				'value' => function($data){
					return Status::$label[$data->status];
				}
			],
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
