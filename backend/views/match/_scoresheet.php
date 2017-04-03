<?php
use common\models\enums\Choice;
use common\models\enums\TournamentType;
?>
<table style="border:1px solid #000; font-size:11px" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<th colspan="6" style="text-align:center">
			<?= $model->tournament->name;?>
		</th>
	</tr>
	<tr>
		<td>Pool: <?= $model->pool->name;?></td>
		<td>Venue: <?= $model->tournament->venue;?></td>
		<td></td>
		<td></td>
		<td>Organised By:...... State Association</td>
		<td>Date: <?= date('dS M, Y')?></td>
	</tr>
	<tr>
		<td>Date: <?= date('dS M, Y')?></td>
		<td>Court No.:....</td>
		<td>Toss won by: <?= $model->tossWinningTeam?$model->tossWinningTeam->team->name:'.....';?></td>
		<td>................</td>
		<td>Choice: <?= $model->choice === NULL?'Court/Service':Choice::$label[$model->choice];?></td>
		<td>Category: <?= $model->tournament->type === NULL?'BOYS/GIRLS':TournamentType::$label[$model->tournament->type];?></td>
	</tr>
	<tr>
		<td colspan="3">Name of the team: <?= $model->firstTeam->team->name;?></td>
		<td colspan="3"> vs Name of the team: <?= $model->secondTeam->team->name;?></td>
	</tr>
	<tr>
		<?php for($teamCount = 0; $teamCount<=1; $teamCount++){?>
			<td colspan="3">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="border:1px solid #000">SI.NO</td>
						<td style="border:1px solid #000">List of Players(in CAPITAL)</td>
						<td style="border:1px solid #000">Chest No</td>
						<td style="border:1px solid #000">First FIVE</td>
					</tr>
					<?php 
						if($teamCount == 0){
							$team = $model->firstTeam->team;
						}else{
							$team = $model->secondTeam->team;
						}
						foreach($team->teamPlayers as $tpk => $tpv){
					?>
						<tr>
							<td style="border:1px solid #000"><?= $tpk+1?></td>
							<td style="border:1px solid #000"><?= strtoupper($tpv->player->name);?></td>
							<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<?php if(($tpk+1) == 1){?>
								<td rowspan="12" style="border:1px solid #000">
									<table width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<table width="100%" cellpadding="0" cellspacing="0">
													<tr>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												Substitutions
												<table width="100%" cellpadding="0" cellspacing="0">
													<?php for($subst = 1; $subst <=5; $subst++){?>
														<tr>
															<td style="border:1px solid #000" rowspan="2"><?= $subst;?></td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">In</td>
														</tr>
														<tr>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">Out</td>
														</tr>
													<?php }?>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												Warning
												<table width="100%" cellpadding="0" cellspacing="0">
													<tr>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							<?php }?>
						</tr>
					<?php }?>
					<?php 
						if(count($team->teamPlayers) < 10){
							$extraRows = 10 - count($team->teamPlayers);
							for($i = count($team->teamPlayers)+1; $i <= 10; $i++){
					?>
						<tr>
							<td style="border:1px solid #000"><?= $i?></td>
							<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<?php if($i == 1){?>
								<td rowspan="12">
									<table width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<table width="100%" cellpadding="0" cellspacing="0">
													<tr>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												Substitutions
												<table width="100%" cellpadding="0" cellspacing="0">
													<?php for($subst = 1; $subst <=5; $subst++){?>
														<tr>
															<td style="border:1px solid #000" rowspan="2"><?= $subst;?></td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">In</td>
														</tr>
														<tr>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td style="border:1px solid #000">Out</td>
														</tr>
													<?php }?>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												Warning
												<table width="100%" cellpadding="0" cellspacing="0">
													<tr>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
														<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							<?php }?>
						</tr>
					<?php 
							}
						}
					?>
					<tr>
						<td style="border:1px solid #000">11</td>
						<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td style="border:1px solid #000">Coach</td>
					</tr>
					<tr>
						<td style="border:1px solid #000">12</td>
						<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td style="border:1px solid #000">Manager</td>
					</tr>
				</table>
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td colspan="2" style="border:1px solid #000">
							Signature of the Manager:..............
						</td>
						<td colspan="2" style="border:1px solid #000">
							Service & Order
						</td>
					</tr>
				</table>
				<table width="100%" cellpadding="0" cellspacing="0">
					<?php for($i=1;$i<=5;$i++){?>
						<tr>
							<td rowspan="6" style="border:1px solid #000">SET</td>
							<td rowspan="6" style="border:1px solid #000"><?= $i?></td>
							<td rowspan="6" style="border:1px solid #000">
								<?php
									for($j=1;$j<=39;$j++){
										echo $j.' ';
									}
								?>
							</td>
						</tr>
						<?php for($service = 1; $service<=5; $service++){?>
							<tr>
								<td style="border:1px solid #000"><?= $service?></td>
								<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
						<?php }?>
					<?php }?>
				</table>
			</td>
		<?php }?>
	</tr>
	<tr>
		<td colspan="2" style="border:1px solid #000">
			CAPTAIN:........<br>
			MATCH WON BY:........<br>
			SCORE:........<br>
		</td>
		<td>
			TIMEOUT
			<table width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="border:1px solid #000">Team</td>
					<td style="border:1px solid #000">1</td>
					<td style="border:1px solid #000">2</td>
					<td style="border:1px solid #000">3</td>
					<td style="border:1px solid #000">4</td>
					<td style="border:1px solid #000">5</td>
				</tr>
				<tr>
					<td style="border:1px solid #000">A</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td style="border:1px solid #000">B</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="border:1px solid #000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
			</table>
		</td>
		<td colspan="2" style="border:1px solid #000">
			CAPTAIN:.......</br>
			SCORER: <?= $model->scorer_name;?></br>
			CHIEF REFEREE: <?= $model->refree_name;?></br>
		</td>
		<td style="border:1px solid #000">
			1st REFEREE:..........</br>
			2nd REFEREE:..........</br>
		</td>
	</tr>
</table>