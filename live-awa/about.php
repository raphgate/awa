<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include_once('inc/links.php');
	?>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light landing">
	    	<div class="container">
	    		<a class="navbar-brand" href="index.php">
	    			<img src="asset/img/logocolor.png" width="60" height="25">
	    		</a>
		        <div class="collapse navbar-collapse" id="navbarCollapse">
		          <ul class="navbar-nav mr-auto">
		            <li class="nav-item active">
	                    <a class="nav-link" href="#">ABOUT <span class="sr-only">(current)</span></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="#">RESOURCES</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="#">AWAtv</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="signin.html">MEMBER AREA</a>
	                </li>
		          </ul>
		          <form class="form-inline mt-2 mt-md-0">
		          	<div class="input-group mr-sm-2">
					  <input type="text" class="form-control border-0 rounded-0" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
					  <div class="input-group-append">
					    <button class="btn btn-outline-default border-0 rounded-0" type="button"><i class="fas fa-search"></i></button>
					  </div>
					</div>
		          </form>
		        </div>
		        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		          <span class="navbar-toggler-icon"></span>
		        </button>
	    	</div>    
	    </nav>
	</header>
	<main role="main" class="bg-light pt-3">
		<section class="mb-2 artworks-section">
			<div class="container marketing">
				<div class="row featurette pt-5 pb-5">
						<div class="col-md-7 order-md-2">
							<h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
							<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
						</div>
						<div class="col-md-5 order-md-1">
							<img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_169636adc91%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_169636adc91%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22183.5%22%20y%3D%22261.7%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
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