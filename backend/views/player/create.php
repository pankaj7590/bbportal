<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Player */

$this->title = Yii::t('app', 'Create Player');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
