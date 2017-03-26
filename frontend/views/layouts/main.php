<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="description" content="Akhand sports">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
    </head>
    <body>
		<?php $this->beginBody() ?>
        <div class="topheader">
           <div class="container">
               <div class="topmenus">
                    <a href="#" title="Follow us on Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>                
                    <a href="#" title="Follow us on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>                
                    <a href="tel:+919898989898" title="Got idea? Call us"><i class="fa fa-phone" aria-hidden="true"></i> +919898989898</a>                
                    <a href="mail:akhandsports@gmail.com" title="Drop a mail"><i class="fa fa-envelope" aria-hidden="true"></i> akhandsports@gmail.com</a>
                    <div class="backend-actions">                
                        <a href="http://salokhe.in/bbportal/backend/web/index.php/site/login" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                        <!--<a href="#" title="Register"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>-->
                   </div>
               </div>
            </div>
            <a href="javascript:void(0);" class="toptoggle"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
        </div>
        <header>
        <div class="container">
          <nav id="navigation">
            <a href="<?= Url::to(['site/index'])?>" class="logo">Akhand</a>
            <a href="#0" class="cd-btn"><i class="fa fa-bars" aria-hidden="true"></i></a>            
            <a href="#0" class="cd-btn mobile"><i class="fa fa-info-circle" aria-hidden="true"></i></a>

            <a aria-label="mobile menu" class="nav-toggle">
              <span></span>
              <span></span>
              <span></span>
            </a>
              <ul class="menu-left">
                <li><a href="<?= Url::to(['site/index'])?>">Home</a></li>
                <li><a href="<?= Url::to(['tournament/index'])?>">Tournaments</a></li>
                <li><a href="<?= Url::to(['site/about'])?>">About</a></li>
                <li><a href="<?= Url::to(['news/index'])?>">News</a></li>
                <li><a href="<?= Url::to(['site/contact'])?>">Contact</a></li>
              </ul>
          </nav>
        </div>
      </header>
      <div class="cd-panel from-right">
		<div class="cd-panel-header">
			<h1>Akhand Sports</h1>
			<a href="javascript:void(0);" class="cd-close"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
		</div>

		<div class="cd-panel-container">
			<div class="cd-panel-content">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam accusamus obcaecati nisi eveniet quo veniam quibusdam veritatis autem accusantium doloribus nam mollitia maxime explicabo nemo quae aspernatur impedit cupiditate dicta molestias consectetur, sint reprehenderit maiores. Tempora, exercitationem, voluptate. Sapiente modi officiis nulla sed ullam, amet placeat, illum necessitatibus, eveniet dolorum et maiores earum tempora, quas iste perspiciatis quibusdam vero accusamus veritatis. Recusandae sunt, repellat incidunt impedit tempore iusto, nostrum eaque necessitatibus sint eos omnis! Beatae, itaque, in. Vel reiciendis consequatur saepe soluta itaque aliquam praesentium, neque tempora. Voluptatibus sit, totam rerum quo ex nemo pariatur tempora voluptatem est repudiandae iusto, architecto perferendis sequi, asperiores dolores doloremque odit. Libero, ipsum fuga repellat quae numquam cumque nobis ipsa voluptates pariatur, a rerum aspernatur aliquid maxime magnam vero dolorum omnis neque fugit laboriosam eveniet veniam explicabo, similique reprehenderit at. Iusto totam vitae blanditiis. Culpa, earum modi rerum velit voluptatum voluptatibus debitis, architecto aperiam vero tempora ratione sint ullam voluptas non! Odit sequi ipsa, voluptatem ratione illo ullam quaerat qui, vel dolorum eligendi similique inventore quisquam perferendis reprehenderit quos officia! Maxime aliquam, soluta reiciendis beatae quisquam. Alias porro facilis obcaecati et id, corporis accusamus? Ab porro fuga consequatur quisquam illo quae quas tenetur.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque similique, at excepturi adipisci repellat ut veritatis officia, saepe nemo soluta modi ducimus velit quam minus quis reiciendis culpa ullam quibusdam eveniet. Dolorum alias ducimus, ad, vitae delectus eligendi, possimus magni ipsam repudiandae iusto placeat repellat omnis veritatis adipisci aliquam hic ullam facere voluptatibus ratione laudantium perferendis quos ut. Beatae expedita, itaque assumenda libero voluptatem adipisci maiores voluptas accusantium, blanditiis saepe culpa laborum iusto maxime quae aperiam fugiat odit consequatur soluta hic. Sed quasi beatae quia repellendus, adipisci facilis ipsa vel, aperiam, consequatur eaque mollitia quaerat. Iusto fugit inventore eveniet velit.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque similique, at excepturi adipisci repellat ut veritatis officia, saepe nemo soluta modi ducimus velit quam minus quis reiciendis culpa ullam quibusdam eveniet. Dolorum alias ducimus, ad, vitae delectus eligendi, possimus magni ipsam repudiandae iusto placeat repellat omnis veritatis adipisci aliquam hic ullam facere voluptatibus ratione laudantium perferendis quos ut. Beatae expedita, itaque assumenda libero voluptatem adipisci maiores voluptas accusantium, blanditiis saepe culpa laborum iusto maxime quae aperiam fugiat odit consequatur soluta hic. Sed quasi beatae quia repellendus, adipisci facilis ipsa vel, aperiam, consequatur eaque mollitia quaerat. Iusto fugit inventore eveniet velit.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam accusamus obcaecati nisi eveniet quo veniam quibusdam veritatis autem accusantium doloribus nam mollitia maxime explicabo nemo quae aspernatur impedit cupiditate dicta molestias consectetur, sint reprehenderit maiores. Tempora, exercitationem, voluptate. Sapiente modi officiis nulla sed ullam, amet placeat, illum necessitatibus, eveniet dolorum et maiores earum tempora, quas iste perspiciatis quibusdam vero accusamus veritatis. Recusandae sunt, repellat incidunt impedit tempore iusto, nostrum eaque necessitatibus sint eos omnis! Beatae, itaque, in. Vel reiciendis consequatur saepe soluta itaque aliquam praesentium, neque tempora. Voluptatibus sit, totam rerum quo ex nemo pariatur tempora voluptatem est repudiandae iusto, architecto perferendis sequi, asperiores dolores doloremque odit. Libero, ipsum fuga repellat quae numquam cumque nobis ipsa voluptates pariatur, a rerum aspernatur aliquid maxime magnam vero dolorum omnis neque fugit laboriosam eveniet veniam explicabo, similique reprehenderit at. Iusto totam vitae blanditiis. Culpa, earum modi rerum velit voluptatum voluptatibus debitis, architecto aperiam vero tempora ratione sint ullam voluptas non! Odit sequi ipsa, voluptatem ratione illo ullam quaerat qui, vel dolorum eligendi similique inventore quisquam perferendis reprehenderit quos officia! Maxime aliquam, soluta reiciendis beatae quisquam. Alias porro facilis obcaecati et id, corporis accusamus? Ab porro fuga consequatur quisquam illo quae quas tenetur.</p>
			</div> <!-- cd-panel-content -->
		</div> <!-- cd-panel-container -->
	</div> <!-- cd-panel -->
<!-- <div class="news-block">
  sdfdsfdf
</div> -->
		<?= $content;?>
        <footer>
            <div class="fat-footer clearfix">
                <div class="left sameheight">
                   <div class="left-wrap">
                        <div class="footerlogo"><img src="<?= Yii::$app->urlManager->baseUrl;?>/images/akhand.png" alt="akhand"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam accusamus obcaecati nisi eveniet quo veniam quibusdam veritatis autem accusantium doloribus nam mollitia maxime explicabo nemo quae aspernatur impedit cupiditate dicta molestias consectetur</p>
                         <div class="clearfix">
                            <div class="footerlinks">
                                <ul>
                                    <li><a href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i>
 The Club</a></li>                            
                                    <li><a href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i>
Gallery</a></li>
                                    <li><a href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i>
 History</a></li>                            
                                    <li><a href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i>
 Donate</a></li>

                                </ul>
                            </div>
                            <div class="footerlinks">
                                <ul>
                                    <li><a href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i>
 About Ball Badminton</a></li>                            
                                    <li><a href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i>
Hall of Fame</a></li>
                                    <li><a href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i>
 FAQ</a></li>                            
                                    <li><a href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i>
 Privacy Policy</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="right sameheight">
                    <div class="left-wrap clearfix">
                        <div class="footernews">
                            <ul>
                                <li><h3>Recent News</h3></li>                            
                                <li><img src="./images/news.jpg"></li>                            
                                <li><h4><a href="#">When super service takes over the opposition</a></h4></li>                          
                                <li><div class="footerdate">September 26, 2016</div></li>
                            </ul>
                        </div>
                        <div class="footercontact">
                            <ul>
                                <li><h3>Contact</h3></li>                            
                                <li><a href="#" title="Follow us on Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> &nbsp;               
                        <a href="#" title="Follow us on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>                                               
                        </li>                            
                                <li><a href="tel:+919898989898" title="Got idea? Call us"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; +919898989898</a> </li>                          
                                <li><a href="mail:akhandsports@gmail.com" title="Drop a mail"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; akhandsports@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer"><?= date('Y')?> - Akhand Sports | Crafted with <i class="glyphicon glyphicon-heart danger"></i> for Ball Badminton</div>
        </footer>

		<?php $this->endBody() ?>
        <script type="text/javascript">
            
        $(document).ready(function() {
            maxHeight();
            $("#homeSlider").owlCarousel({
                loop:true,
                autoHeight: false,
                items:1,
                lazyLoad:true,
                autoplay:true,
				autoplayTimeout:3000,
                smartSpeed:850
            });

            $("#homeResults").owlCarousel({
                items:3,
                lazyLoad:true,
                margin:20,
                nav:true,
                navText: [
              "<i class='fa fa-angle-double-left' aria-hidden='true'></i>",
              "<i class='fa fa-angle-double-right' aria-hidden='true'></i>"
              ],
              responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                900:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
            });

            $("#matchGallery").owlCarousel({
                items:3,
                lazyLoad:true,
                nav:true,
                navText: [
              "<i class='fa fa-angle-double-left' aria-hidden='true'></i>",
              "<i class='fa fa-angle-double-right' aria-hidden='true'></i>"
              ],
              responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                900:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
            });

            $("#sponsorGallery").owlCarousel({
                items:3,
                lazyLoad:true,
                nav:false,
                loop:true,
                autoplay:true,
            autoplayTimeout:3000,
                smartSpeed:850,

              responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                900:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
            });

        });
        </script>
    </body>
</html>
<?php $this->endPage() ?>