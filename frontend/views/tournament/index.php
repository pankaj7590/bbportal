<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ListView;
use common\models\enums\Level;
use common\models\enums\TournamentType;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TournamentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tournaments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-index">

    <h1><?= Html::encode($this->title) ?></h1>


      <div class="owl-carousel" id="homeResults">
        <div>
	<?= ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => function($model){
			return '
			  <div class="result-card">
				  <div class="result-card-date">'.$model->start_date.'</div>
				  <div class="result-card-tournament">'.Level::$label[$model->level].' - '.TournamentType::$label[$model->type].'</div>
				  <div class="result-card-scores">
					<div class="teama"><img src="'.(Yii::$app->urlManager->baseUrl).'/images/mumbai.png" alt="'.$model->name.'"></div>
				  </div>
				  <div class="result-card-points">
					<div class="set1"><span>'.date('h:i A', $model->reporting_time).'</span></div>
					<div class="set2"><span>'.$model->venue.'</span></div>
					<div class="set3"><span>'.$model->fees.'</span></div>
				  </div>
				  <div class="card-action">
					<a href="'.Url::to(['tournament/view', 'id' => $model->id]).'">View details</a>
				  </div>
			  </div>';
		}
	]);?>
		</div>
</div>
</div>
