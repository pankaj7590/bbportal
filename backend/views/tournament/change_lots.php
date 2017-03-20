<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\sortable\Sortable;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Tournament */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', '{modelClass}: ', [
    'modelClass' => 'Change Lots',
]) . $tournament->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tournaments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tournament->name, 'url' => ['view', 'id' => $tournament->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Change Lots');
?>

<div class="generate-lots-form">
	<div class="row">
		<?php foreach($pools as $k => $v){?>
			<div class="col-md-3 pools" data-pool-id="<?= $v->id?>">
				<h3><?= $v->name?></h3>
				<div class="pool-teams">
					<?php 
						$poolTeams = $v->poolTeams;
						$items = [];
						foreach($poolTeams as $ptk => $ptv){
							$items[] = [
								'content' => $ptv->team->name,
								'options' => [
									'data-team-id' => $ptv->team->id,
									'data-pool-team-id' => $ptv->id,
								],
							];
						}
						
						echo Sortable::widget([
							'connected'=>true,
							'items'=> $items,
							'pluginEvents' => [
								'sortupdate' => 'function(e,ui) {
									team = ui.item;
									pool = ui.endparent;
									$.ajax({
										type:"post",
										url:"'.Url::to(['update-lots']).'",
										data:{
											tournament:'.$tournament->id.', 
											pool_team:$(team).attr("data-pool-team-id"), 
											pool:$(pool).attr("data-pool-id"), 
											team:$(team).attr("data-team-id")
										},
										success: function(data){
											alert("Lots updated.");
										},
										error: function(data){
											alert("Internal server error.");
										}
									});
								}',
							],
							'options' => ['data-pool-id' => $v->id],
						]);
					?>
				</div>
			</div>
		<?php }?>
	</div>
</div>