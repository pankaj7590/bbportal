<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SetPoint */

$this->title = Yii::t('app', 'Create Set Point');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Set Points'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-point-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
