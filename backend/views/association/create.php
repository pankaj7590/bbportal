<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Association */

$this->title = Yii::t('app', 'Create Association');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Associations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
