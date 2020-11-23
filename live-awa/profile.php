<?php
	require_once('src/classes/session.php');
	include_once 'src/classes/user.php';
	if (!isset($_SESSION['UsMail'])) {
		header('location: signin');        
	}
	 $user = new user;
	 $user_id = $_SESSION['userID'];
	 $info = $user->getAUser($user_id);
	 $myAlbum = $user->getUserAlbum($user_id);
	 $mySingle = $user->getUserSingle($user_id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once('inc/links.php'); ?>
	<style type="text/css">
    .vipform{
      z-index: 1000000;
      position: fixed;
      width: 100%;
      height: 104%;
      background: rgba(50,50,50,0.7);
      padding-left: 25%;
      padding-right: 25%;
      padding-top: 3%;
      display: none;
      margin-top: -4%;
    }
    @media only screen and (max-width: 560px) {
     .vipform{
      z-index: 1000000;
      position: fixed;
      width: 100%;
      height: 104%;
      background: rgba(50,50,50,0.7);
      padding-left: 7%;
      padding-right: 7%;
      padding-top: 15%;
      margin-top: -13%;
    }
}
	#forAlbum{
		display: none;
	}
	#forSingle{
		
	}
	.heado{
		padding: 3%;
	}
  </style>
  <div class="vipform">
      <div class="card">
        <div class="heado">
            <b>Upload a project</b>
            <span class="float-right klose" style=""><i class="fa fa-times"></i></span> 
        </div>
        <div style="overflow-y: scroll;max-height: 400px">
          <div style="padding-right: 5%;padding-left: 4%;padding-top: 2%;padding-bottom: 1%">
        	<select class="form-control" id="projectType" name="projectType" required="">
            	<option>Single</option>
            	<option>Album</option>
            </select>
        </div> 
        <form action="" method="POST" id="forSingle" enctype="multipart/form-data">
         <div class="heado">
            <div>
                <input type="text" name="projectName" id="projectName" class="form-control" placeholder="Project name"><br>
                <input type="text" name="softwares" id="softwares" class="form-control" placeholder="Softwares used (eg Photoshop, Illustrator, Coreldraw)"><br>
               	<label>Project</label>
                <input type="file" name="cover" class="form-control" required=""><br>
                <textarea class="form-control" name="projectDesc" placeholder="Project description"></textarea>
            </div><br>
            <div class="err">
            	
            </div>
        </div>
        <div class="heado">
            <button type="submit" class="btn btn-secondary w-100" id="saveSingle">Save</button>
        </div>
    </form>
    <form action="" method="POST" id="forAlbum" enctype="multipart/form-data">
         <div class="heado">
            <div>
                <input type="text" name="projectName" id="projectName" class="form-control" placeholder="Project name"><br>
                <input type="text" name="softwares" id="softwares" class="form-control" placeholder="Softwares used (eg Photoshop, Illustrator, Coreldraw)"><br>
            	<label>Cover art</label>
            	<input type="file" name="cover" class="form-control" required=""><br>

            	<label>Other works</label>
            	<input type="file" name="works[]" class="form-control" required="" multiple=""><br>
                <textarea class="form-control" name="projectDesc" placeholder="Project description"></textarea>
            </div><br>
            <div class="err">
            	
            </div>
        </div>
        <div class="heado">
            <button type="submit" class="btn btn-secondary w-100" id="saveAlbum">Save</button>
        </div>
    </form>
	 </div>
    </div>
</div>
</head>
<body class="bg-awa-light">
<header>
	<nav class="navbar navbar-expand navbar-light fixed-top bg-light profile">
		<?php include_once('inc/header.php'); ?>    
	</nav>
</header>

<main role="main" class="bg-awa-white pt-2">
	<!-- jumbotron -->
	<section class="profile-lead">
		<div class="container px-0">
			<div class="jumbotron mb-0 pb-4 text-dark rounded-0 bg-awa-white">
				<div class="row">
					<div class="col-md-6 px-1">
						<div class="row text-center">
							<div class="col-md-4 col-sm-12">
								<img src="asset/img/thumbs/dp.jpg" class="rounded-circle" width="120" height="120">
							</div>
							<div class="col-md-8 col-sm-12 text-awa-light text-md-left">
								<h5 class="font-italic"><?php echo $_SESSION['UsName'] ?></h5>
								<div class=""><i class="fas fa-map-marker"></i> <span class="text-muted"><?php echo $info->city ?><?php echo " ". $info->state ?><?php echo " ".$info->country ?></span></div>
								<p class="mb-0"><?php echo $info->skills ? : 'N/A'  ?></p>
								<!-- <a href="" class="mt-0 text-awa-gray">www.malina.com</a> -->
								<h6 class="text-muted"><?php echo $info->email ? : 'N/A'  ?></h6><br>
								<button class="btn btn-secondary" id="callProj"><i class="fa fa-plus"></i> Upload new project</button>
							</div>
						</div>
					</div>
					<div class="col-md-6 px-2 text-awa-dark">
						<div class="d-flex justify-content-between w-100 px-lg-4 pt-2 text-center">
							<p class=""><i class="fas fa-eye fa-lg"></i><br> <small class="small">5.3k</small></p>
							<p class=""><i class="fas fa-thumbs-up fa-lg"></i><br> <small class="small">4453</small></p>
							<p class=""><i class="fas fa-user-plus fa-lg"></i><br> <small class="small">4.4k Followers</small></p>
							<p class=""><i class="fas fa-user-plus fa-lg"></i><br> <small class="small">4.3k Following</small></p>
						</div>
						<hr class="m-2">
						<div class="d-flex justify-content-between w-100 px-4">
							<a href="" class="btn btn-default bg-transparent w-100 mx-1 text-awa-dark p-0">
								<i class="fas fa-envelope"></i>
							</a>
							<a href="" class="btn btn-default bg-transparent  w-100 mx-1 text-awa-primary p-0">
								<i class="fab fa-facebook-f"></i>
							</a>
							<a href="" class="btn btn-default bg-transparent  w-100 mx-1 text-awa-sec p-0">
								<i class="fab fa-instagram"></i>
							</a>
							<a href="" class="btn btn-default bg-transparent  w-100 mx-1 text-awa-primary p-0">
								<i class="fab fa-twitter"></i>
							</a>
						</div>
						<hr class="m-2">
						<p class="px-lg-4 mt-2">TOOLS: <span class="text-muted">
				        		3D Mayer, Cinema 4D, Photoshop, Illustrator
				        	</span></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="profile-content mt-0">
		<div class="container mt-0 px-0">
			<div class="profile-tab">
				<nav class="bg-awa-gray">
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Projects</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Followers</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Following</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Likes</a>
					</div>
				</nav>
				<div class="tab-content bg-awa-grey" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<hr>
							<p class="text-awa-dark">Albums</p>
						<hr>
						<div class="row project-list px-2">
						<?php 
							if (count($myAlbum) < 1) {

							echo "<div class='col-md-6 col-md-12'><center style='padding-top:5%;padding-bottom:5%;opacity:0.4'>
									<i class='fas fa-folder text-secondary' style='font-size:70px'></i><br><br>
                                    <b style='color:#000'>Opps! You have not uploaded anything yet</b><br>
                                </center></div>";	
							}else{
								foreach ($myAlbum as $key => $album) {
							?>
								<div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 m-0">
									<div class="card rounded-0 border-0">
										<img class="card-img w-100 rounded-0 project-img" src="projects/<?php echo $album->coverArt ?>" alt="Third slide" height="150" onclick="mensaje(<?php echo $album->project_id ?>)">
										<div class="card-body p-2 ">
											<h6 class="small pb-0 mb-0"><i class="fas fa-folder"></i> &nbsp; <?php echo $album->project_name ?></h6>
										</div>
									</div>
								</div>
							<?php
								}
							}
						?>
						</div>
						<hr>
							<p class="text-awa-dark">Singles</p>
						<hr>

						<div class="row project-list px-2">
							<?php 
							if (count($mySingle) < 1) {

							echo "<div class='col-md-6 col-md-12'><center style='padding-top:5%;padding-bottom:5%;opacity:0.4'>
									<i class='fas fa-folder text-secondary' style='font-size:70px'></i><br><br>
                                    <b style='color:#000'>Opps! You have not uploaded anything yet</b><br>
                                </center></div>";	
							}else{
								foreach ($mySingle as $key => $single) {
							?>
								<div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 m-0">
									<div class="card rounded-0 border-0">
										<img class="card-img w-100 rounded-0 project-img" src="projects/<?php echo $single->coverArt ?>" alt="Third slide" height="150" onclick="mensaje(<?php echo $single->project_id ?>)">
										<div class="card-body p-2 ">
											<h6 class="small pb-0 mb-0"><i class="fas fa-folder"></i> &nbsp; <?php echo $single->project_name ?></h6>
										</div>
									</div>
								</div>
							<?php
								}
							}
						?>
						</div>
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<div class="row follow px-4">
							<div class="col-12 col-md-4 col-lg-3 col-xl-3 p-2 m-0">
								<div class="row text-awa-light">
									<div class="col-5 p-1 m-0">
										<div class="follow-head text-center shadow-sm rounded pt-2">
											<img src="asset/img/801.jpg" class="rounded-circle" width="72" height="72">
											<div class="border-top mt-2 border-dark">
												<p class=""><strong class="small">Alisi Daniel.</strong></p>
											</div>
										</div>
									</div>
									<div class="col-7 p-1 px-3 pt-1 m-0">
										<p class="small p-0 m-1"><span class="text-muted"><i class="fas fa-briefcase"></i> </span>&nbsp; 503 Projects</p>
										<p class="small p-0 m-1"><span class="text-muted"> <i class="fas fa-user-plus"></i> </span>&nbsp; 5.1k Followers</p>
										<p class="small p-0 m-1"><span class="text-muted"><i class="fas fa-user-plus"></i> </span>&nbsp; 3.4k Following</p>
										<button class="btn btn-secondary btn-sm py-0 rounded-0"><i class="fas fa-"></i> Follow</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">!@#</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
    include_once('inc/footer.php');
    include_once('inc/project_modal.php');
    include_once('inc/scripts.php');
?>

<script type="text/javascript">
	$(document).ready(function(){
		$(".scrollbar-macosx").scrollbar();
		$('.project-img').on('click', function(e){
			$('#project-modal').modal({});
		});
		$('#uploadProject').on('click', function(e){
			$('#uploadProjectModal').modal({});
		});
		$.fn.extend({
			autoresize: function(){
				$(this).on('change keyup keydown paste cut', function(){
					$(this).height(1).height(this.scrollHeight);
				});
			}
		});
		$("#message_text").autoresize();
	});
	$("#callProj").on('click', function(e){
		$(".vipform").slideDown();
	})
	$(".klose").on('click', function(e){
		$(".vipform").slideUp();
	})
	$("#projectType").on('input', function(e){
		var proj = $("#projectType").val();
		if (proj == 'Album') {
			$("#forAlbum").slideDown();
			$("#forSingle").slideUp();
		}else if (proj == 'Single') {
			$("#forAlbum").slideUp();
			$("#forSingle").slideDown();
		}
	})
$("#forSingle").on('submit',(function(e) {
      e.preventDefault();
      $("#saveSingle").attr('disabled', true).html("<i class='fa fa-spinner fa-spin'></i> Saving project");
      var datas = new FormData(this);
      $.ajax({
          url: "src/singleUpload", // Url to which the request is send
          type: "POST",             // Type of request to be send, called as method
          data: datas, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,        // To send DOMDocument or non processed data file it is set to false
          success: function(data){   // A function to be called if request succeeds
            $(".err").html('<div class="alert alert-info">'+data+'</div>');
            $("#saveSingle").attr('disabled', false).html("Save project");
            $("#forSingle")[0].reset();
            setTimeout(
              function () {
              $(".err").html('')
              }, 5000);
          },
          error : function(e){
              console.log(e);
          }
      });
  }));
$("#forAlbum").on('submit',(function(e) {
      e.preventDefault();
      $("#saveAlbum").attr('disabled', true).html("<i class='fa fa-spinner fa-spin'></i> Saving project");
      var datas = new FormData(this);
      $.ajax({
          url: "src/albumUpload", // Url to which the request is send
          type: "POST",             // Type of request to be send, called as method
          data: datas, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,        // To send DOMDocument or non processed data file it is set to false
          success: function(data){   // A function to be called if request succeeds
            $(".err").html('<div class="alert alert-info">'+data+'</div>');
            $("#saveAlbum").attr('disabled', false).html("Save project");
            $("#forAlbum")[0].reset();
            setTimeout(
              function () {
              $(".err").html('')
              }, 5000);
          },
          error : function(e){
              console.log(e);
          }
      });
  }));
	function mensaje(project_id) {
		$("#usted").html('<input type="hidden" name="project_id" value="'+project_id+'">');
		$.ajax({
          url: "inc/getProjInfo", // Url to which the request is send
          type: "POST",             // Type of request to be send, called as method
          data: {project_id:project_id},
          success: function(data){   // A function to be called if request succeeds
            $("#projecto").html(data);
            $('.yada').slick({
			  dots: true,
			  infinite: true,
			  speed: 500,
			  fade: true,
			  cssEase: 'linear',
			  autoplay:true
			});
          },
          error : function(e){
              console.log(e);
          }
      });
	}

	$("#comment-form").on('submit',(function(e) {
	      e.preventDefault();
	      $("#comBtn").attr('disabled', true).html("Posting...");
	      var datas = new FormData(this);
	      $.ajax({
	          url: "src/comment", // Url to which the request is send
	          type: "POST",             // Type of request to be send, called as method
	          data: datas, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
	          contentType: false,       // The content type used when sending data to the server.
	          cache: false,             // To unable request pages to be cached
	          processData:false,        // To send DOMDocument or non processed data file it is set to false
	          success: function(data){   // A function to be called if request succeeds
	            $("#comBtn").attr('disabled', false).html(data);
	            $("#comment-form")[0].reset();
	            setTimeout(
	              function () {
	              $("#comBtn").html('Comment');
	              }, 3000);
	          },
	          error : function(e){
	              console.log(e);
	          }
	      });
	  }));
</script>
</body>
</html>