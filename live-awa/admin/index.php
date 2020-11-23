<?php
	require_once('../src/classes/session.php');
	include_once '../src/classes/user.php';
	if (!isset($_SESSION['adminId'])) {
		header('location: login');        
	}
	 $user = new user;
	 $user_id = $_SESSION['adminId'];
	 $artWorks = $user->getArtWorks('approved','id DESC');
	 $pendingArts = $user->getArtWorks('pending','id DESC');
	 $rejectedArts = $user->getArtWorks('rejected','id DESC');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			include_once('inc/links.php');
		?>
	</head>
	<body>
		<header>
			<?php
				include_once('inc/header.php');
			?>
		</header>
		<main class="bg-light">
			<section class="pt-2">
				<div class="container">
					<nav class="" aria-label="breadcrumb">
						<ol class="breadcrumb rounded-0 py-2">
							<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Project Manager</li>
						</ol>
					</nav>
				</div>
			</section>
			<section class="pb-3">
				<div class="container">
					<div class="dashboard-menu px-md-4 mx-md-4">
						<div class="p-2">
							<div class="card p-0 rounded-0 shadow-sm ">
								<a href="#" class="card-body p-2">
									<i class="fas fa-folder fa-2x"></i>
									<div class="d-flex justify-content-between">
										<div class="text-left">
											<h2 class="text-default h4 mb-0 pb-0"><?php echo number_format(count($artWorks)) ?></h2>
											<p class="text-muted small my-0 py-0">
												Approved projects
											</p>
										</div>
										<div class="text-right">
											<h2 class="text-default h4 mb-0 pb-0"><?php echo number_format(count($pendingArts)) ?></h2>
											<p class="text-muted small my-0 py-0">
												Pending projects
											</p>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="p-2">
							<div class="card p-0 rounded-0 shadow-sm ">
								<a href="manage-events.php" class="card-body p-2">
									<i class="fas fa-users fa-2x text-danger"></i>
									<div class="d-flex justify-content-between">
										<div class="text-left">
											<h4 class="text-default mb-0 pb-0">45</h4>
											<p class="text-muted small  my-0 py-0">
												Meetups done
											</p>
										</div>
										<div class="text-right">
											<h4 class="text-default mb-0 pb-0">45</h4>
											<p class="text-muted small  my-0 py-0">
												Meetups upcomming
											</p>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="p-2">
							<div class="card p-0 rounded-0 shadow-sm ">
								<a href="create-challenge.php" class="card-body p-2">
									<i class="fas fa-trophy fa-2x text-success"></i>
									<div class="d-flex justify-content-between">
										<div class="text-left">
											<h2 class="text-default h4 mb-0 pb-0">45</h2>
											<p class="text-muted small  my-0 py-0">
												Challenge done
											</p>
										</div>
										<div class="text-right">
											<h2 class="text-default h4 mb-0 pb-0">45</h2>
											<p class="text-muted small  my-0 py-0">
												Challenge active
											</p>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="p-2">
							<div class="card p-0 rounded-0 shadow-sm ">
								<a href="#" class="card-body p-2">
									<i class="fas fa-cogs fa-2x text-warning"></i>
									<div class="d-flex justify-content-between">
										<div class="text-left">
											<h2 class="text-default h4 mb-0 pb-0">45</h2>
											<p class="text-muted small my-0 py-0">
												News feeds
											</p>
										</div>
										<div class="text-right">
											<h2 class="text-default h4 mb-0 pb-0">45</h2>
											<p class="text-muted small my-0 py-0">
												News feeds
											</p>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class=" pt-2 pb-4">
				<div class="container">
					<div class="card shadow-sm rounded-0">
						<div class="card-header">
							<ul class="nav nav-tabs card-header-tabs">
								<li class="nav-item">
									<a class="nav-link active rounded-0" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true">Pending</a>
								</li>
								<li class="nav-item">
									<a class="nav-link rounded-0" href="#nav-approved"  data-toggle="tab" role="tab" aria-controls="nav-approved" aria-selected="false">Approved</a>
								</li>
								<li class="nav-item">
									<a class="nav-link rounded-0" href="#nav-rejected" data-toggle="tab" role="tab" aria-controls="nav-rejected" aria-selected="false">Rejected</a>
								</li>
								<li class="nav-item">
									<a class="nav-link rounded-0" href="#nav-all" data-toggle="tab" role="tab" aria-controls="nav-project" aria-selected="false">All Project</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-upcomming-tab">
									<h5 class="card-title">Pending Projects</h5>
									<div class="table-responsive">
										<table width="100%" class="table table-sm table-striped table-bordered table-hover projectsTable" id="">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Description</th>
													<th>Artworks</th>
													<th>Work type</th>
													<th>Action</th>
													<th>D U.</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$n=0;
													foreach ($pendingArts as $key => $penda) {
														$n++;
												?>
													<tr id="trad-<?php echo $penda->id ?>">
														<th><?php echo $n ?></th>
														<td><?php echo $penda->project_name ?></td>
														<td><?php echo $penda->project_description ?></td>
														<td>
															<img class="img img-responsive img-thumbnail" src="../projects/<?php echo $penda->coverArt ?>" style="width:50px">
														</td>
														<td><?php echo $penda->projectType ?></td>
														<input type="hidden" id="alb-<?php echo $penda->id ?>" value="<?php echo $penda->albumID ?>">
														<td class="text-center" id="tido-<?php echo $penda->id ?>">
															<button class="btn btn-success btn-sm px-1 approveProject" onclick="approveProject(<?php echo $penda->id ?>)"><i class="fas fa-check"></i></button>
															<button class="btn btn-danger btn-sm px-2 rejectProject" onclick="rejectProject(<?php echo $penda->id ?>)"><i class="fas fa-times"></i></button>
														</td>
														<td><?php echo $penda->date_added ?></td>
													</tr>
												<?php
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-approved" role="tabpanel" aria-labelledby="nav-all-tab">
									<h5 class="card-title">Approved projects</h5>
									<div class="table-responsive">
										<table width="100%" class="table table-sm table-striped table-bordered table-hover projectsTable" id="">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Description</th>
													<th>Artworks</th>
													<th>Work type</th>
													<th>D U.</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$n=0;
													foreach ($artWorks as $key => $art) {
														$n++;
												?>
													<tr>
														<th><?php echo $n ?></th>
														<td><?php echo $art->project_name ?></td>
														<td><?php echo $art->project_description ?></td>
														<td>
															<img class="img img-responsive img-thumbnail" src="../projects/<?php echo $art->coverArt ?>" style="width:50px">
														</td>
														<td><?php echo $art->projectType ?></td>
														<td><?php echo $art->date_added ?></td>
													</tr>
												<?php
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-rejected" role="tabpanel" aria-labelledby="nav-new-tab">
									<h5 class="card-title">Create New Event/Activity</h5>
									<div class="table-responsive">
										<table width="100%" class="table table-sm table-striped table-bordered table-hover projectsTable" id="">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Description</th>
													<th>Artworks</th>
													<th>Work type</th>
													<th>D U.</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$n=0;
													foreach ($rejectedArts as $key => $rej) {
														$n++;
												?>
													<tr>
														<th><?php echo $n ?></th>
														<td><?php echo $rej->project_name ?></td>
														<td><?php echo $rej->project_description ?></td>
														<td>
															<img class="img img-responsive img-thumbnail" src="../projects/<?php echo $rej->coverArt ?>" style="width:50px">
														</td>
														<td><?php echo $rej->projectType ?></td>
														<td><?php echo $rej->date_added ?></td>
													</tr>
												<?php
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-all" role="tabpanel" aria-labelledby="nav-new-tab">
									<h5 class="card-title">Create New Event/Activity</h5>
								</div>
							</div>
						</div>
						<!-- card-body -->
					</div>
				</div>
			</section>
		</main>
		
		<?php
			include_once('inc/footer.php');
			include_once('inc/scripts.php');
		?>
	    <!-- page script -->
	    <script src="../asset/js/main.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.dashboard-menu').slick({
					dots: false,
					centerMode: false,
					speed: 300,
					slidesToShow: 4,
					slidesToScroll: 1,
					responsive: [
				    {
				      breakpoint: 1024,
				      settings: {
				        slidesToShow: 3,
				        slidesToScroll: 1,
				        infinite: true,
				        dots: true
				      }
				    },
				    {
				      centerMode: false,
				      breakpoint: 600,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 1
				      }
				    },
				    {
				      centerMode: false,
				      breakpoint: 480,
				      settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1
				      }
				    }
				  ]
				});
				$('.projectsTable').DataTable({ buttons: ['copy', 'excel', 'pdf'] });
			});
			function approveProject(id){
				event.preventDefault();
	            var album = $('#alb-'+id).val();
	            var action = 'approved';
	            var conf = confirm('Approve this project?');
	            if (conf == true) {
	            	$("#tido-"+id).html('Processing...');
	            	$.ajax({
				        url:"../src/projAction.php",
				        method:"GET",
				        data:{album:album,action:action},
				        success:function(data){
				        	$("#tido-"+id).html(data);
				        	setTimeout(
			                  function () {
			                  $("#trad-"+id).slideUp();
			                  }, 3000);
				          }
				    });
	            }
			}
			function rejectProject(id){
				event.preventDefault();
	            var album = $('#alb-'+id).val();
	            var action = 'rejected';
	            var conf = confirm('Reject this project?');
	            if (conf == true) {
	            	$("#tido-"+id).html('Processing...');
	            	$.ajax({
				        url:"../src/projAction.php",
				        method:"GET",
				        data:{album:album,action:action},
				        success:function(data){
				        	$("#tido-"+id).html(data);
				        	setTimeout(
			                  function () {
			                  $("#trad-"+id).slideUp();
			                  }, 3000);
				          }
				    });
	            }
			}
		</script>
	</body>
</html>