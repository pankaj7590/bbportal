<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PoolTeam */

$this->title = Yii::t('app', 'Create Pool Team');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pool Teams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pool-team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
