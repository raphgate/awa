<?php
	// if (isset()) {
	// 	# code...
	// }
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
			<?php include_once('inc/header.php'); ?>
		</header>
		<main class="bg-light">
			<section class="pt-2">
				<div class="container">
					<nav class="" aria-label="breadcrumb">
						<ol class="breadcrumb rounded-0 py-2">
							<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Manage Events/Meetups</li>
						</ol>
					</nav>
				</div>
			</section>
			<section class="pb-3">
				<div class="container">
					<div class="dashboard-menu px-md-4 mx-md-4">
						<div class="p-2">
							<div class="card p-0 rounded-0 shadow-sm ">
								<a href="index.php" class="card-body p-2">
									<p class="p-0 m-0 text-muted small">Approve new projects</p>
									<div class="d-flex justify-content-between">
										<div class="text-primary">
											<i class="fas fa-folder fa-3x"></i>
										</div>
										<div class="text-right">
											<h2 class="text-default h4 mb-0 pb-0">45</h2>
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
									<p class="p-0 m-0 text-muted small">Manage Events/Meetups</p>
									<div class="d-flex justify-content-between">
										<div class="text-danger">
											<i class="fas fa-users fa-3x"></i>
										</div>
										<div class="text-right">
											<h4 class="text-default mb-0 pb-0">45</h4>
											<p class="text-muted small  my-0 py-0">
												Up comming meetups
											</p>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="p-2">
							<div class="card p-0 rounded-0 shadow-sm ">
								<a href="create-challenge.php" class="card-body p-2">
									<p class="p-0 m-0 text-muted small">Create Challenge</p>
									<div class="d-flex justify-content-between">
										<div class="text-success">
											<i class="fas fa-trophy fa-3x"></i>
										</div>
										<div class="text-right">
											<h2 class="text-default h4 mb-0 pb-0">45</h2>
											<p class="text-muted small  my-0 py-0">
												Active Challenge
											</p>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="p-2">
							<div class="card p-0 rounded-0 shadow-sm ">
								<a href="#" class="card-body p-2">
									<p class="p-0 m-0 text-muted small">Social Media</p>
									<div class="d-flex justify-content-between">
										<div class="text-warning">
											<i class="fas fa-cogs fa-3x"></i>
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
									<a class="nav-link active rounded-0" data-toggle="tab" href="#nav-upcomming" role="tab" aria-controls="nav-upcomming" aria-selected="true">Upcomming Events</a>
								</li>
								<li class="nav-item">
									<a class="nav-link rounded-0" href="#nav-all"  data-toggle="tab" role="tab" aria-controls="nav-all" aria-selected="false">All Events</a>
								</li>
								<li class="nav-item">
									<a class="nav-link rounded-0" href="#nav-new" data-toggle="tab" role="tab" aria-controls="nav-new" aria-selected="false">Create Events</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-upcomming" role="tabpanel" aria-labelledby="nav-upcomming-tab">
									<h5 class="card-title">Upcomming Events</h5>
									<div class="table-responsive">
										<table width="100%" class="table table-sm table-striped table-bordered table-hover" id="projectsTable">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Description</th>
													<th>Tools used</th>
													<th>Approve/Reject</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th>1</th>
													<td>Socadist Second</td>
		    										<td>Respect is the calipso....</td>
		    										<td>3D mayer, Photoshop, Adobe Illustrator</td>
													<td class="text-center">
														<button class="btn btn-success btn-sm px-1 approveProject"><i class="fas fa-check"></i></button>
														<button class="btn btn-danger btn-sm px-2 rejectProject"><i class="fas fa-times"></i></button>
													</td>
													<td class="d-flex justify-content-around border-0">
														<a href="#" class="badge badge-primary preview-project"><i class="fas fa-link"></i> Preview</a>
													</td>
												</tr>
												<tr>
													<th>2</th>
													<td>Socadist Second</td>
		    										<td>Respect is the calipso....</td>
		    										<td>Photoshop, Adobe Illustrator</td>
													<td class="text-center">
														<button class="btn btn-success btn-sm px-1 approveProject"><i class="fas fa-check"></i></button>
														<button class="btn btn-danger btn-sm px-2 rejectProject"><i class="fas fa-times"></i></button>
													</td>
													<td class="d-flex justify-content-around border-0">
														<a href="#" class="badge badge-primary preview-project"><i class="fas fa-link"></i> Preview</a>
													</td>
												</tr>
												<tr>
													<th>3</th>
													<td>Socadist Second</td>
		    										<td>Respect is the falling....</td>
		    										<td>Adobe Illustrator, Photoshop</td>
													<td class="text-center">
														<button class="btn btn-success btn-sm px-1 approveProject"><i class="fas fa-check"></i></button>
														<button class="btn btn-danger btn-sm px-2 rejectProject"><i class="fas fa-times"></i></button>
													</td>
													<td class="d-flex justify-content-around border-0">
														<a href="#" class="badge badge-primary preview-project"><i class="fas fa-link"></i> Preview</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
									<h5 class="card-title">All Events/Activities</h5>
								</div>
								<div class="tab-pane fade" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
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
				$('#projectsTable').DataTable({ buttons: ['copy', 'excel', 'pdf'] });
				$(".approveProject").on("click", function(e){
					$(this).html('<i class="fas fa-spinner fa-pulse fa-fw "></i>');
				});
				$(".rejectProject").on("click", function(e){
					var _inst = $(this);
					if(confirm("Reject this project...?") == true){
						_inst.html('<i class="fas fa-spinner fa-pulse fa-fw "></i>');
					}
				});
			});
		</script>
	</body>
</html>