<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pool */

$this->title = Yii::t('app', 'Create Pool');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pool-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
