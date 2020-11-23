<header>
		<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light landing">
	    	<div class="container">
	    		<a class="navbar-brand" href="index.php">
	    			<img src="asset/img/logocolor.png" width="60" height="25">
	    		</a>
		        <div class="collapse navbar-collapse" id="navbarCollapse">
		          <ul class="navbar-nav mr-auto">
		            <li class="nav-item active">
									<a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item active">
									<a class="nav-link" href="about.php">ABOUT <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">AWAtv</a>
								</li>
								<?php
									if (isset($_SESSION['userID'])) {
										echo '<li class="nav-item">
												<a class="nav-link" href="profile">Profile</a>
											</li>';
									}else{
										echo '<li class="nav-item">
												<a class="nav-link" href="signin.php">MEMBER AREA</a>
											</li>';
									}
								 ?>
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
	    	<?php 
	    		if (isset($_SESSION['userID'])) {
	    			?>
	    			<div class="ml-auto d-flex justify-content-between">
						<div class="dropdown profile-menu">
							<a href="#" class="rounded-circle dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="20,20" id="profileMenu">
								<img src="asset/img/thumbs/dp.jpg" src="" alt="" class="rounded-circle border border-light" width="38" height="38">
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileMenu">
								<a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> Profile</a>
								<a class="dropdown-item" href="manage-collection.php"><i class="fas fa-image"></i> Manage Collection</a>
								<a class="dropdown-item" href="src/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
							</div>
						</div>
					</div>
	    		<?php 
	    		}
	    	 ?>   
	    </nav>
	</header>