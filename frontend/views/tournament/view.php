<?php
$this->title = $model->name;
?>
<section id="">
	<div class="container">
		<div class="page-content">
			<div class="match-header">
				<div class="tournament-wrap">
					<h1><?= $model->name?></h1>
					<div class="dates"><?= date('dS M, Y',strtotime($model->start_date))?> to <?= date('dS M, Y',strtotime($model->end_date))?></div>
				</div>
			</div>
			<div class="match-ttl"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;Sponsors</div>

			<div class="sponsor-gallery">
				<div class="owl-carousel" id="sponsorGallery">
					<div><img src="images/sponsor1.png"> </div>
					<div><img src="images/sponsor2.png"> </div>
					<div><img src="images/sponsor3.png"> </div>  
				</div>
			</div>
  
			<div class="match-content clearfix">
				<div class="match-main">
					<div class="match-ttl"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Tournament details</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam accusamus obcaecati nisi eveniet quo veniam quibusdam veritatis autem accusantium doloribus nam mollitia maxime explicabo nemo quae aspernatur impedit cupiditate dicta molestias consectetur, sint reprehenderit maiores. Tempora, exercitationem, voluptate.</p>
					<div class="match-ttl"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;Schedule</div>
					<div class="match-time">
						<div class="match-datetime"><?= date('dS M, Y',strtotime($model->start_date))?> to <?= date('dS M, Y',strtotime($model->end_date))?></div>
						<div class="match-venue"><?= $model->venue;?></div>
					</div>
					<div class="match-ttl"><i class="fa fa-trophy" aria-hidden="true"></i> &nbsp;Winners</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam accusamus obcaecati nisi eveniet quo veniam quibusdam veritatis autem accusantium doloribus nam mollitia maxime explicabo nemo quae aspernatur impedit cupiditate dicta molestias consectetur, sint reprehenderit maiores. Tempora, exercitationem, voluptate.</p>
					<div class="match-ttl"><i class="fa fa-video-camera" aria-hidden="true"></i> &nbsp;Videos</div>
					<p><a href="https://www.youtube.com/watch?v=TnY8L3FNfxs" target="_blank"> See video</a></p>
					<div class="match-ttl"><i class="fa fa-share-square" aria-hidden="true"></i> &nbsp;Share this Tournament</div>
					<p><a href="#" title="Share on Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>  &nbsp; <a href="#" title="Share on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></p>
				</div>          
				<div class="match-sidebar">
					<div class="match-ttl">Teams</div>
					<div class="match-lineups-wrap clearfix">
						<ul class="tteams">
							<?php foreach($model->tournamentTeams as $k => $v){?>
								<li><?= $v->team->association->name;?></li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
		</div>  
	</div>
</section>