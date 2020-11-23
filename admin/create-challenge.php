<?php
	 // require_once('src/classes/session.php');
	 // if (!isset($_SESSION['email'])) {
		 // header('location: signin.html?error=2');
	 // }
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
            <?php include_once('inc/header.php'); ?>
		</header>
		
	    <main role="main" class="bg-awa-grey pt-2 text-awa-gray">
	    	<section class="add-project-form">
	    		<div class="container px-0 py-2">
	    			<div class="card border-0">
						<div class="card-header py-1 d-flex justify-content-between">
							<h2 class="h5"><i class="fas fa-briefcase"></i> Create Challenge</h2>
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
										<div class="form-group mt-2">
								            <label for="projectName" class="my-0">* Challenge graphics </label>
								            <input name="file" type="file" multiple />
										</div>
										<div class="form-group mt-2">
								            <label for="projectName" class="my-0">* Title of challenge</label>
								            <input type="text" name="challenge-title" class="form-control rounded-0 bg-awa-light" id="challengeTitle" placeholder="Use something catchy!" required>
										</div>
										<div class="form-group mt-2">
								            <label for="projectName" class="my-0">* Sponsor (s)</label>
								            <input type="text" name="sponsor-name" class="form-control rounded-0 bg-awa-light" id="sponsorName" placeholder="Any sponsor for this challenge" required>
								        </div>
								        <div class="form-group">
								            <label for="projectName" class="my-0">* Description</label>
								            <textarea name="challenge-desc" class="form-control rounded-0 bg-awa-light" id="challengeDesc" placeholder="Describe the challenge, rules, etc" required rows="5"></textarea>
								        </div>
								        <button class="btn btn-default bg-awa-prim rounded-0" type="submit" id="save">Publish Challenge</button>
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