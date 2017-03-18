<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            'mobile',
            'designation',
			[
				'attribute' => 'status',
				'value' => Status::$label[$model->status],
			],
			[
				'attribute' => 'roles',
				'value' => function($model){
					$rolesArr = [];
					$roles = Yii::$app->authManager->getRolesByUser($model->id);
					foreach($roles as $k => $v){
						$rolesArr[] = $v->name;
					}
					return implode(',', $rolesArr);
				}
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
