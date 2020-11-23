<?php
	// require_once('src/classes/session.php');
	// if (!isset($_SESSION['email'])) {
	// 	header('location: signin.html?error=2');
	// }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('inc/links.php'); ?>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand navbar-light fixed-top bg-light profile">
		    	<?php include_once('inc/auth_nav.php'); ?>
	    	</nav>
		</header>
		
	    <main role="main" class="bg-awa-grey pt-2">
	    	<section class="text-awa-light">
	    		<div class="container px-0 py-2">
	    			<div class="row">
	    				<div class="col-md-9">
    						<div class="card bg-transparent border-0">
    							<div class="card-header py-1 d-flex justify-content-between">
    								<h2 class="h5"><i class="fas fa-folder"></i> Manage Collection</h2>
    								<a href="add-project.php" class="btn btn-default bg-awa-prim text-awa-dark btn-sm"><span class="d-sm-none d-md-inline-block"> Add Project</span></a>
    							</div>
    							<div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="">
                                            <a href="#" class=" badge badge-success">Hide</a>
                                            <a href="#" class=" badge badge-danger">Delete</a>
                                        </div>
                                        <div class="">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <input type="text" class="form-control rounded bg-awa-light text-awa-gray form-control-sm" placeholder="Search">
                                                </div>
                                                <!--<div class="form-group">-->
                                                    <!--<select class="custom-select mx-1 ml-sm-2 rounded bg-awa-light text-awa-gray form-control-sm" id="inlineFormCustomSelectPref">-->
                                                        <!--<option selected>Choose...</option>-->
                                                        <!--<option value="1">One</option>-->
                                                        <!--<option value="2">Two</option>-->
                                                        <!--<option value="3">Three</option>-->
                                                    <!--</select>-->
                                                <!--</div>-->
                                            </form>
                                        </div>
                                    </div>
    								<div class="table-responsive">
    									<table class="table table-bordered text-awa-dark table-light">
    										<thead>
    											<tr>
    												<th>#</th>
	    											<th>
	    												<div class="custom-control custom-checkbox">
													        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
													        <label class="custom-control-label" for="customControlAutosizing"></label>
													    </div>
	    											</th>
	    											<th>Name</th>
	    											<th>Description</th>
	    											<th>Tools used</th>
	    											<th>Status</th>
	    											<th>Action</th>
    											</tr>
    										</thead>
    										<tbody>
    											<tr>
    												<th>1</th>
    												<td>
    													<div class="custom-control custom-checkbox ">
													        <input type="checkbox" class="custom-control-input" id="customControlAutosizing1">
													        <label class="custom-control-label" for="customControlAutosizing1"></label>
													    </div>
													 </td>
    												<td>Socadist Second</td>
    												<td>Respect is the....</td>
    												<td>Photoshop, Adobe Illustrator</td>
    												<td class="text-center">
    													<span class="badge badge-success rounded-circle status"><i class="fas fa-check"></i></span>
    												</td>
    												<td class="d-flex justify-content-around border-0">
    													<span class="text-primary edit-project" data-toggle="tooltip" data-placement="top" title="edit Project"><i class="fas fa-edit"></i></span>
    													<span class="text-secondary preview-project"><i class="fas fa-link"></i></span>
    													<span class="text-danger delete-project"><i class="fas fa-trash-alt"></i></span>
    												</td>
    											</tr>
    											<tr>
    												<th>2</th>
    												<td>
    													<div class="custom-control custom-checkbox ">
													        <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
													        <label class="custom-control-label" for="customControlAutosizing2"></label>
													    </div>
    												</td>
    												<td>Socadist Second</td>
    												<td>Respect is the....</td>
    												<td>Photoshop, Adobe Illustrator</td>
    												<td class="text-center">
    													<span class="badge badge-warning rounded-circle status"><i class="fas fa-question"></i></span>
    												</td>
    												<td class="d-flex justify-content-around border-0">
    													<span class="text-primary edit-project"><i class="fas fa-edit"></i></span>
    													<span class="text-secondary preview-project"><i class="fas fa-link"></i></span>
    													<span class="text-danger delete-project"><i class="fas fa-trash-alt"></i></span>
    												</td>
    											</tr>
    											<tr>
    												<th>3</th>
    												<td>
    													<div class="custom-control custom-checkbox ">
													        <input type="checkbox" class="custom-control-input" id="customControlAutosizing3">
													        <label class="custom-control-label" for="customControlAutosizing3"></label>
													    </div>
    												</td>
    												<td>Socadist Second</td>
    												<td>Respect is the....</td>
    												<td>Photoshop, Adobe Illustrator</td>
    												<td class="text-center">
    													<span class="badge badge-success rounded-circle status"><i class="fas fa-check"></i></span>
    												</td>
    												<td class="d-flex justify-content-around border-0">
    													<span class="text-primary edit-project"><i class="fas fa-edit"></i></span>
    													<span class="text-secondary preview-project"><i class="fas fa-link"></i></span>
    													<span class="text-danger delete-project"><i class="fas fa-trash-alt"></i></span>
    												</td>
    											</tr>
    											<tr>
    												<th>4</th>
    												<td>
    													<div class="custom-control custom-checkbox ">
													        <input type="checkbox" class="custom-control-input" id="customControlAutosizing4">
													        <label class="custom-control-label" for="customControlAutosizing4"></label>
													    </div>
    												</td>
    												<td>Socadist Second</td>
    												<td>Respect is the....</td>
    												<td>Photoshop, Adobe Illustrator</td>
    												<td class="text-center">
    													<span class="badge badge-warning rounded-circle status"><i class="fas fa-question"></i></span>
    												</td>
    												<td class="d-flex justify-content-around border-0">
    													<span class="text-primary edit-project"><i class="fas fa-edit"></i></span>
    													<span class="text-secondary preview-project"><i class="fas fa-link"></i></span>
    													<span class="text-danger delete-project"><i class="fas fa-trash-alt"></i></span>
    												</td>
    											</tr>
    											<tr>
    												<th>5</th>
    												<td>
    													<div class="custom-control custom-checkbox ">
													        <input type="checkbox" class="custom-control-input" id="customControlAutosizing5">
													        <label class="custom-control-label" for="customControlAutosizing5"></label>
													    </div>
    												</td>
    												<td>Socadist Second</td>
    												<td>Respect is the....</td>
    												<td>Photoshop, Adobe Illustrator</td>
    												<td class="text-center">
    													<span class="badge badge-danger rounded-circle status"><i class="fas fa-times"></i></span>
    												</td>
    												<td class="d-flex justify-content-around border-0">
    													<span class="text-primary edit-project"><i class="fas fa-edit"></i></span>
    													<span class="text-secondary preview-project"><i class="fas fa-link"></i></span>
    													<span class="text-danger delete-project"><i class="fas fa-trash-alt"></i></span>
    												</td>
    											</tr>
    											<tr>
    												<th>6</th>
    												<td>
    													<div class="custom-control custom-checkbox ">
													        <input type="checkbox" class="custom-control-input" id="customControlAutosizing6">
													        <label class="custom-control-label" for="customControlAutosizing6"></label>
													    </div>
    												</td>
    												<td>Socadist Second</td>
    												<td>Respect is the....</td>
    												<td>Photoshop, Adobe Illustrator</td>
    												<td class="text-center">
    													<span class="badge badge-danger rounded-circle status"><i class="fas fa-times"></i></span>
    												</td>
    												<td class="d-flex justify-content-around border-0">
    													<span class="text-primary edit-project"><i class="fas fa-edit"></i></span>
    													<span class="text-secondary preview-project"><i class="fas fa-link"></i></span>
    													<span class="text-danger delete-project"><i class="fas fa-trash-alt"></i></span>
    												</td>
    											</tr>
    											<tr>
    												<th>7</th>
    												<td>
    													<div class="custom-control custom-checkbox ">
													        <input type="checkbox" class="custom-control-input" id="customControlAutosizing7">
													        <label class="custom-control-label" for="customControlAutosizing7"></label>
													    </div>
    												</td>
    												<td>Socadist Second</td>
    												<td>Respect is the....</td>
    												<td>Photoshop, Adobe Illustrator</td>
    												<td class="text-center">
    													<span class="badge badge-success rounded-circle status"><i class="fas fa-check"></i></span>
    												</td>
    												<td class="d-flex justify-content-around border-0">
    													<span class="text-primary edit-project"><i class="fas fa-edit"></i></span>
    													<span class="text-secondary preview-project"><i class="fas fa-link"></i></span>
    													<span class="text-danger delete-project"><i class="fas fa-trash-alt"></i></span>
    												</td>
    											</tr>
    											<tr>
    												<th>8</th>
    												<td>
    													<div class="custom-control custom-checkbox ">
													        <input type="checkbox" class="custom-control-input" id="customControlAutosizing8">
													        <label class="custom-control-label" for="customControlAutosizing8"></label>
													    </div>
    												</td>
    												<td>Socadist Second</td>
    												<td>Respect is the....</td>
    												<td>Photoshop, Adobe Illustrator</td>
    												<td class="text-center">
    													<span class="badge badge-warning rounded-circle status"><i class="fas fa-question"></i></span>
    												</td>
    												<td class="d-flex justify-content-around border-0">
    													<span class="text-primary edit-project"><i class="fas fa-edit"></i></span>
    													<span class="text-secondary preview-project"><i class="fas fa-link"></i></span>
    													<span class="text-danger delete-project"><i class="fas fa-trash-alt"></i></span>
    												</td>
    											</tr>
    										</tbody>
    									</table>
    								</div>
    							</div>
    							<!-- card-body -->
    						</div>
	    				</div>
	    				<!-- col-md-9 -->
	    				<div class="col-md-3">
	    					<div class="card bg-transparent border-0">
    							<div class="card-header py-1">
    								<h6 class="h6"><i class="fas fa-folder"></i> Key</h6>
    							</div>
    							<div class="card-body text-awa-gray">
    								<p class="tex-muted"><span class="badge badge-success rounded-circle mr-2 status"><i class="fas fa-check"></i></span> Accepted</p>
    								<p class="tex-muted"><span class="badge badge-warning rounded-circle mr-2"><i class="fas fa-question"></i></span> Awaiting Approval</p>
    								<p class="tex-muted"><span class="badge badge-danger rounded-circle mr-2"><i class="fas fa-times"></i></span> Rejected</p>
    							</div>
    						</div>
	    				</div>
	    				<!-- col-md-3 -->
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
			$('.edit-project').on('click', function(e){
				alert('edit me');
			});
		});
	</script>
	</body>
</html>	
	