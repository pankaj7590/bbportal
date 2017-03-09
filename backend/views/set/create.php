<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Set */

$this->title = Yii::t('app', 'Create Set');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
