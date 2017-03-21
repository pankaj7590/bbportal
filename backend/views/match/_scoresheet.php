<table border='1px solid' border="#000" width="100%">
	<thead>
		<tr>
			<th colspan="6">
				Ball Badminton Federation Of India ....th National Junior/Senior Championship 2015-2016
			</th>
		</tr>
		<tr>
			<td>Pool:</td>
			<td>Venue:</td>
			<td></td>
			<td></td>
			<td>Organised By:...... State Association</td>
			<td>Date:</td>
		</tr>
		<tr>
			<td>Date:....</td>
			<td>Court No.:....</td>
			<td>Toss won by:....</td>
			<td>................</td>
			<td>Choice:Court/Service</td>
			<td>Category:BOYS/GIRLS</td>
		</tr>
		<tr>
			<td colspan="3">Name of the team:...............</td>
			<td colspan="3"> vs Name of the team:...............</td>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="2">
				CAPTAIN:........<br>
				MATCH WON BY:........<br>
				SCORE:........<br>
			</td>
			<td>
				TIMEOUT
				<table border='1px solid' width="100%">
					<tr>
						<td>Team</td>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
						<td>5</td>
					</tr>
					<tr>
						<td>A</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td>B</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
				</table>
			</td>
			<td colspan="2">
				CAPTAIN:.......</br>
				SCORER:.......</br>
				CHIEF REFEREE:.......</br>
			</td>
			<td>
				1st REFEREE:..........</br>
				2nd REFEREE:..........</br>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			<?php for($teamCount = 0; $teamCount<=1; $teamCount++){?>
				<td colspan="3">
					<table border='1px solid' width="100%">
						<tr>
							<td>SI.NO</td>
							<td>List of Players(in CAPITAL)</td>
							<td>Chest No</td>
							<td>First FIVE</td>
						</tr>
						<?php for($i=1;$i<=10;$i++){?>
							<tr>
								<td><?= $i?></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<?php if($i == 1){?>
									<td rowspan="12">
										<table width="100%">
											<tr>
												<td>
													<table border='1px solid' width="100%">
														<tr>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													Substitutions
													<table border='1px solid' width="100%">
														<?php for($subst = 1; $subst <=5; $subst++){?>
															<tr>
																<td rowspan="2"><?= $subst;?></td>
																<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
																<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
																<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
																<td>In</td>
															</tr>
															<tr>
																<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
																<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
																<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
																<td>Out</td>
															</tr>
														<?php }?>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													Warning
													<table border='1px solid' width="100%">
														<tr>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								<?php }?>
							</tr>
						<?php }?>
						<tr>
							<td>11</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td>Coach</td>
						</tr>
						<tr>
							<td>12</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td>Manager</td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td colspan="2">
								Signature of the Manager:..............
							</td>
							<td colspan="2">
								Service & Order
							</td>
						</tr>
					</table>
					<table border='1px solid #000' width="100%">
						<?php for($i=1;$i<=5;$i++){?>
							<tr>
								<td rowspan="6">SET</td>
								<td rowspan="6"><?= $i?></td>
								<td rowspan="6">
									<?php
										for($j=1;$j<=39;$j++){
											echo $j.' ';
										}
									?>
								</td>
							</tr>
							<?php for($service = 1; $service<=5; $service++){?>
								<tr>
									<td><?= $service?></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								</tr>
							<?php }?>
						<?php }?>
					</table>
				</td>
			<?php }?>
		</tr>
	</tbody>
</table>