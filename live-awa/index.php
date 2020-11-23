<!DOCTYPE html>
<?php include_once 'src/classes/session.php'; ?>
<html lang="en">
<head>
	<?php
		include_once('inc/links.php');
		include_once 'src/classes/user.php';
		include_once 'src/clean.php';
		$user = new user;
		$artWorks = $user->getArtWorks('approved','RAND()');
	?>
</head>
<body>
	<?php include_once 'inc/header.php'; ?>
	<main role="main" class="bg-light pt-3">
		<section class="pb-2">
			<div class="container">
				<div class="main-menu">
					<?php 
							$n =0;
							foreach ($artWorks as $key => $artWork) {
								$n++;
								if ($n > 6) {
									break;
								}
							?>
								<div class="card">
									<a href="view-project?id=<?php echo addDash($artWork->project_name)  ?>">
										<img class="card-img d-block w-100" src="projects/<?php echo $artWork->coverArt ?>" alt="Third slide" height="90">
									</a>
								</div>
							<?php
								}
						?>
				</div>
			</div>
		</section>
		<section class="carousel-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="asset/img/slider-1.jpg" alt="First slide" height="">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="asset/img/slider-2.jpg" alt="Second slide" height="300">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="asset/img/slider-3.jpg" alt="Third slide" height="300">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="asset/img/slider-4.jpg" alt="Third slide" height="300">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="asset/img/slider-5.jpg" alt="Third slide" height="300">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-img">
								<img class="d-block w-100" src="asset/img/art-of-week.jpg" alt="Third slide" height="300">
								<div class="card-img-overlay">
									<h5 class="text-white">ART OF THE WEEK</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<hr class="awa-line" style="height: 50px; background-color: #ffffff00;">
		<section class="mb-2 artworks-section">
			<div class="container">
				<div class="mb-2 section-heading">
					<h1 class="d-inline text-white">ARTWORKS</h1>
					<button class="d-inline btn btn-secondary rounded-0 float-right ">More</button>
				</div>
				<div class="grid pt-2">
					<?php 
							if (count($artWorks) < 1) {

							echo "<div class='grid-item mt-1 mx-1'><center style='padding-top:5%;padding-bottom:5%;opacity:0.4'>
									<i class='fas fa-folder text-secondary' style='font-size:70px'></i><br><br>
                                    <b style='color:#000'>Opps! No art work available</b><br>
                                </center></div>";	
							}else{
								foreach ($artWorks as $key => $artWork) {
							?>
								<div class="grid-item mt-1 mx-1">
							  		<a href="view-project?id=<?php echo addDash($artWork->project_name)  ?>">
							  			<img class="d-block" src="projects/<?php echo $artWork->coverArt ?>" alt="Third slide" width="100%">
							  		</a>
							  	</div>
							<?php
								}
							}
						?>
				</div>
			</div>
		</section>

		<!-- awa-section -->
		<section class="awa-section">
			<div class="container pb-2">
				<div class="pt-2 pb-2 mb-2 section-heading">
					<h1 class="d-inline text-white">AWA TV</h1>
					<button class="d-inline btn btn-default text-white bg-transparent rounded-0 float-right">More</button>
				</div>
				<div class="awa-blog box-shadow">
					<div class="row">
						<div class="col-md-7 d-flex align-content-center flex-wrap">
							<div class="embed-responsive embed-responsive-21by9 ">
							  <video class="embed-responsive-item"  width="100%" controls>
							  	<source src="asset/videos/Flavour & Juliana.mp4" type="">
							  </video>
							</div>
				            <!--  -->
				        </div>
				        <div class="col-md-5 order-md-2 mt-2">
				            <div class="media">
				            	<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" height="100" width="125">
				            	<p class="media-body text-white pl-2">
				            		<a href="#" class="d-block text-white">
				            			Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo.
				            		</a>
				            		<span class="text-white">25 Minute ago</span>
				            	</p>
				            </div>
				            <div class="media">
				            	<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" height="100" width="125">
				            	<p class="media-body text-white pl-2">
				            		<a href="#" class="d-block text-white">
				            			Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo.
				            		</a>
				            		<span class="text-white">25 Minute ago</span>
				            	</p>
				            </div>
				            <div class="media">
				            	<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" height="100" width="125">
				            	<p class="media-body text-white pl-2">
				            		<a href="#" class="d-block text-white">
				            			Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo.
				            		</a>
				            		<span class="text-white">25 Minute ago</span>
				            	</p>
				            </div>
				        </div>
			        </div>
				</div>
			</div>
		</section>

		<!-- meetup -->
		<section class="meetup-section">
			<div class="container pb-2">
				<div class="pt-2 pb-2 mb-2 section-heading">
					<h1 class="d-inline text-white">MEETUPS</h1>
					<button class="d-inline btn btn-default float-right">More</button>
				</div>
				<div class="">
					<div class="row">
						<div class="col-md-3">
							<div class="card border-0 rounded-0">
								<img class="card-img w-100 rounded-0" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide" height="150">
							 	<div class="card-footer rounded-0">
							  		<p class=""><a class="text-awa-prim" href="full-article.php"> Digital Arts Festival 2018</a></p>
							  	</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card border-0 rounded-0">
								<img class="card-img w-100 rounded-0" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide" height="150">
							 	<div class="card-footer rounded-0">
							  		<p class=""><a class="text-awa-prim" href="full-article.php"> Digital Arts Festival 2018</a></p>
							  	</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card border-0 rounded-0">
								<img class="card-img w-100 rounded-0" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide" height="150">
							 	<div class="card-footer rounded-0">
							  		<p class=""><a class="text-awa-prim" href="full-article.php"> Digital Arts Festival 2018</a></p>
							  	</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card border-0 rounded-0">
								<img class="card-img w-100 rounded-0" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide" height="150">
							 	<div class="card-footer rounded-0">
							  		<p class=""><a class="text-awa-prim" href="full-article.php"> Digital Arts Festival 2018</a></p>
							  	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- challenge -->
		<section class="challenge-section">
			<div class="container pb-2">
				<div class="pt-2 pb-2 mb-2 section-heading">
					<h1 class="d-inline text-white">CHALLENGES</h1>
					<button class="d-inline btn btn-default float-right">More</button>
				</div>
				<div class="">
					<div class="row">
						<div class="row mb-2 mr-auto ml-auto">
					        <div class="col-md-4">
					          <div class="card flex-md-row mb-4 box-shadow h-md-250 rounded-0 border-0">
					          	<img class="card-img-left flex-auto d-none d-lg-block" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Card image cap" height="100%" width="200">
					            <div class="card-body d-flex flex-column align-items-start p-2 bg-light">
					              <h5 class="mb-0">
					                <a class="text-dark" href="full-article.php">Featured post</a>
					              </h5>
					              <p class="card-text mb-auto">This is a wider card with supporting text.</p>
					              <div class="mb-1 text-muted">Nov 12</div>
					            </div>
					          </div>
					        </div>
					        <div class="col-md-4">
					          <div class="card flex-md-row mb-4 box-shadow h-md-250 rounded-0 border-0">
					          	<img class="card-img-left flex-auto d-none d-lg-block" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Card image cap" height="100%" width="200">
					            <div class="card-body d-flex flex-column align-items-start p-2 bg-light">
					              <h5 class="mb-0">
					                <a class="text-dark" href="full-article.php">Post title</a>
					              </h5>
					              <p class="card-text mb-auto">This is a wider card with supporting text.</p>
					              <div class="mb-1 text-muted">Nov 11</div>
					            </div>
					          </div>
					        </div>
					        <div class="col-md-4">
					          <div class="card flex-md-row mb-4 box-shadow h-md-250 rounded-0 border-0">
					          	<img class="card-img-left flex-auto d-none d-lg-block" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Card image cap" height="100%" width="200">
					            <div class="card-body d-flex flex-column align-items-start p-2 bg-light">
					              <h5 class="mb-0">
					                <a class="text-dark" href="full-article.php">Post title</a>
					              </h5>
					              <p class="card-text mb-auto">This is a wider card with supporting text.</p>
					              <div class="mb-1 text-muted">Nov 11</div>
					            </div>
					          </div>
					        </div>
					    </div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php
		include_once('inc/footer.php');
		include_once('inc/scripts.php');
	?>
    <script type="text/javascript">
    	$(document).ready(function(){

    		$('.grid').masonry({
			  // options
			  fitWidth: true,
			  itemSelector: '.grid-item',
			});
			$('.main-menu').slick({
				speed: 300,
				slidesToShow: 6,
				slidesToScroll: 1,
				responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 6,
			        slidesToScroll: 1,
			        infinite: true,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 4,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3
			      }
			    }
			  ]
			});
    	});
    </script>
</body>
</html>