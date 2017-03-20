<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\enums\Choice;
use common\models\enums\Status;

/* @var $this yii\web\View */
/* @var $model common\models\Match */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'round')->textInput(['type' => 'number', 'min' => 1, 'step' => 1]) ?>

    <?= $form->field($model, 'pool_id')->dropdownlist(ArrayHelper::map($tournament->pools, 'id', 'name'), ['id' => 'pool-id','prompt' => 'Select Pool']); ?>

    <?= $form->field($model, 'first_team_id')->dropdownlist($pool_teams, ['id' => 'first-team', 'prompt' => 'Select Team']) ?>

    <?= $form->field($model, 'second_team_id')->dropdownlist($pool_teams,['id' => 'second-team', 'prompt' => 'Select Team']) ?>

    <?= $form->field($model, 'toss_winning_team_id')->dropdownlist($selected_pool_teams, ['id' => 'selected-teams', 'prompt' => 'Select Team']) ?>

    <?= $form->field($model, 'choice')->dropdownlist(Choice::$label); ?>

    <?= $form->field($model, 'refree_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scorer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'winning_team_id')->dropdownlist([],['id' => 'winning-team', 'Select Team']) ?>

    <?= $form->field($model, 'status')->dropdownlist(Status::$label) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
	$this->registerJs("
		$('#pool-id').change(function(){
			pool = $(this).val();
			$.ajax({
				type: 'post',
				url: '".Url::to(['pool/teams'])."',
				data: {pool:pool},
				success: function(data){
					if(data){
						data = JSON.parse(data);
						$('#first-team').html('');
						$('#second-team').html('');
						options = '<option>Select Team</option>';
						$.each(data, function(k,v){
							options += '<option value='+v.id+'>'+v.name+'</option>';
						});
						$('#first-team').html(options);
						$('#second-team').html(options);
					}else{
						console.log('Internal server error.');
					}
				},
				error: function(data){
					console.log('Internal server error.');
				}
			});
		});
		
		selected_teams = '<option>Select Team</option>';
		
		$('#first-team').change(function(){
			team = $(this).val();
			$('#second-team').find('option').removeAttr('disabled');
			$('#second-team').find('option[value='+team+']').attr('disabled','disabled');
			if(team){
				fillSelectedTeams();
			}
		});
		
		$('#second-team').change(function(){
			team = $(this).val();
			$('#first-team').find('option').removeAttr('disabled');
			$('#first-team').find('option[value='+team+']').attr('disabled','disabled');
			if(team){
				fillSelectedTeams();
			}
		});
		
		function fillSelectedTeams(){
				$('#selected-teams').html('');
				first_team = $('#first-team');
				$('#selected-teams').append('<option value='+$(first_team).val()+'>'+$(first_team).find('option[value='+$(first_team).val()+']').text()+'</option>');
				
				second_team = $('#second-team');
				$('#selected-teams').append('<option value='+$(second_team).val()+'>'+$(second_team).find('option[value='+$(second_team).val()+']').text()+'</option>');
		}
		
		function fillWinningTeam(){
				$('#winning-team').html('');
				first_team = $('#first-team');
				$('#winning-team').append('<option value='+$(first_team).val()+'>'+$(first_team).find('option[value='+$(first_team).val()+']').text()+'</option>');
				
				second_team = $('#second-team');
				$('#winning-team').append('<option value='+$(second_team).val()+'>'+$(second_team).find('option[value='+$(second_team).val()+']').text()+'</option>');
		}
	");
?>