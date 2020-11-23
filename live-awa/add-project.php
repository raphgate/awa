<?php
	 require_once('src/classes/session.php');
	 if (!isset($_SESSION['email'])) {
		 header('location: signin.php?error=2');
	 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="asset/plugins/select2/css/select2.css">
		<link rel="stylesheet" type="text/css" href="asset/plugins/dropzone/dropzone.css">
		<?php include_once('inc/links.php'); ?>

	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand navbar-light fixed-top bg-light profile">
		    	<?php include_once('inc/auth_nav.php'); ?>
	    	</nav>
		</header>
		
	    <main role="main" class="bg-awa-grey pt-2 text-awa-gray">
	    	<section class="add-project-form">
	    		<div class="container px-0 py-2">
	    			<div class="card border-0">
						<div class="card-header py-1 d-flex justify-content-between">
							<h2 class="h5"><i class="fas fa-briefcase"></i> New Project</h2>
							<a href="manage-collection.php" class="btn btn-default bg-awa-light text-awa-gray btn-sm"><i class="fas fa-folder"></i> Manage</a>
						</div>
						<div class="card-body">
							
							<div class="row">
								<div class="col-md-8">
									<div class="alert alert-danger rounded-0 d-none">
										<i class="fas fa-exclamation-circle"></i> There was an error uploading your data...
									</div>
									<div class="alert alert-success rounded-0 d-none">
										<i class="fas fa-check-circle"></i> Project successfully uploaded.
									</div>
									<form class="pt-2" role="" enctype="multipart/form-data" method="POST" id="uploadForm">
										<p >Upload your images</p>
										<div class="dropzone" id="myDropzone">
											<div class="fallback">
											    <input name="file" type="file" multiple />
											</div>
											<div class="dz-message">
						                      	<div>
						                        	<h4>Drop your images or click here to upload.</h4><div class="text-muted">(file size more than 5Mb will not be uploaded )</div>
						                      	</div>
						                    </div>
										</div>
										<div class="form-group mt-2">
								            <label for="albumName" class="my-0">Album Name</label>
								            <input type="text" name="album-name" class="form-control rounded-0 bg-awa-light" id="projectName" placeholder="(Optional)" required>
										</div>
										<div class="form-group mt-2">
								            <label for="projectName" class="my-0">* Name</label>
								            <input type="text" name="project-name" class="form-control rounded-0 bg-awa-light" id="projectName" placeholder="Project name" required>
								        </div>
								        <div class="form-group">
								            <label for="projectName" class="my-0">* Description</label>
								            <textarea name="project-desc" class="form-control rounded-0 bg-awa-light" id="projectDesc" placeholder="Description the project, ideas around it, etc" required rows="5"></textarea>
								        </div>
								        <div class="form-group">
								            <label for="projectName" class="my-0">* Software used</label>
								            <select name="project-software" class="select2 form-control rounded-0 bg-awa-light" id="projectSoftware" placeholder="Software used" multiple="true" required>
								            	<option selected="true">Photoshop</option>
												<option>Adobe Illustrator</option>
												<option>3D Mayer</option>
									            <option>Corel Draw</option>
									            <option>Corel Photo</option>
								            </select>
								        </div>
								        <button class="btn btn-default bg-awa-prim rounded-0" type="submit" id="save"><i class="fas fa-save"></i> Upload Project</button>
									</form>
								</div>
							</div>
						</div>
					</div>
	    			<form class="" role="form">
	    				
	    			</form>
	    		</div>
	    	</section>
	    </main>
	<?php
		include_once('inc/footer.php');
		include_once('inc/scripts.php');
	?>
	<script type="text/javascript" src="asset/plugins/select2/js/select2.full.js"></script>
	<script type="text/javascript" src="asset/plugins/dropzone/dropzone.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.edit-project').on('click', function(e){
				alert('edit me');
			});
			if ($('.select2').length) {
			    $('.select2').select2();
			}
			// Dropzone.autoDiscover = false;
			Dropzone.options.myDropzone = {
				url: 'src/add_project.php',
				autoProcessQueue: false,
				uploadMultiple: true,
				parallelUploads: 5,
				maxFilesize: 9,
				paramName: 'file',
				acceptedFiles: 'image/*',
				addRemoveLinks: true,
				init: function(){
					dzClosure = this; 
					//for
					$('form').on('submit', function(e){
						//Make sure
						e.preventDefault();
						e.stopPropagation();
						dzClosure.processQueue();
					});

					//send form data
					this.on('sendingmultiple', function(data, xhr, formData){
						formData.append("projectName", $('#projectName').val());
						formData.append("projectDesc", $('#projectDesc').val());
						formData.append("projectSoftware", $('#projectSoftware').val());
					});	
					this.on("successmultiple", function(files, response) {
				      // Gets triggered when the files have successfully been sent.
				      // Redirect user or notify of success.
				      if (response == 'true' ) {
				      	document.getElementById('uploadForm').reset();
				      	$('.dropzone')[0].dropzone.files.forEach(function(file){
				      		file.previewElement.remove();
				      	});
				      	$('.dropzone').removeClass('dz-started');
				      	$('.alert-success').removeClass('d-none').addClass('d-block');
				      }
				    });
				    this.on("errormultiple", function(files, response) {
				    	$('.alert-danger').removeClass('d-none').addClass('d-block');
				      // Gets triggered when there was an error sending the files.
				      // Maybe show form again, and notify user of error
				    });
				},
				error: function(response){
					// alert(response);
				}
			}
		});
	</script>
	</body>
</html>	