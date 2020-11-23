<?php 
	include_once("../src/classes/user.php");
	include_once("../src/clean.php");
    include_once("../src/classes/session.php");

	//instantiate user class object
	$user = new user;
	$project_id = clean("project_id");
	$saveView = $user->saveView($project_id);
	$info = $user->getAProject($project_id);
	$project_name = $info->project_name;
	$user_id = $info->user_id;
	$userInfo = $user->getAUser($user_id);
	$fullname = $userInfo->fullname;
	$projectType = $info->projectType;
	$softwares = explode(',',$info->softwares);
	$comments = $user->getComments($info->project_id);
?>
<div class="row">
	<div class="col-md-8 card p-0 rounded-0 border-0" style="max-height: 520px;overflow-y: scroll;overflow-x: hidden;">
		<div class="scrollbar-macosx" >	
			<div class="card-body bg-light border-0 p-4 rounded-0">
				<?php 
					if ($projectType == 'Album') {
						echo '<div class="yada">';
						foreach ($info->works as $key => $value) {
						echo '<div><img src="projects/'.$value.'" width="100%"></div>';	
						}
						echo '</div>';
					}else{
					?>
						<img src="projects/<?php echo $info->coverArt ?>" width="100%">';
					<?php 
					}
				 ?>
			</div>
			<div class="card-footer border-0 rounded-0 px-4 py-2 project-modal-img-card-footer scrollable-card-footer">
				<div class="bg-light p-1 w-100 ">
					<span class="text-dark mb-1" href=""><i class="fas fa-tag"></i><strong> Design tools &nbsp; </strong></span>
				<?php 
					foreach ($softwares as $key => $soft) {
						echo '<a class="badge badge-secondary mb-1" href="#">'.$soft.'</a>';	
					}
				 ?>
				</div>
	        <hr class="border-top mt-0 mb-1 border-secondary">
	        <div class="">
	        	<h6 class="my-1 ">comments..</h6>
	        	 <?php 
	                  if (count($comments) > 0) {
	                    foreach ($comments as $key => $value) {
	                  ?>
	                      <div class="media text-muted pt-3">
	                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=e0e0e0&size=10&text=<?php echo substr($value->writer,0,1) ?>" alt="" class="mr-2 rounded-circle">
	                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-secondary">
	                          <div class="d-flex justify-content-between align-items-center w-100 mb-1">
	                            <strong class="text-dark"><?php echo $value->writer; ?></strong>
	                            <a href="#" class="text-muted"><?php echo elapsed($value->date_made) ?></a>
	                          </div>
	                          <span class="d-block text-dark"><?php echo $value->comment; ?> </span>
	                        </div>
	                      </div>
	                  <?php  
	                    }
	                  }else{
	                  ?>
	                    <center>
	                      <p>No comments for this post yet</p>
	                    </center>
	                  <?php 
	                  }
	                 ?>
	        </div>
			</div>
		</div>
	</div>
	<div class="col-md-4 card p-0 rounded-0 border-0 bg-danger" style="max-height: 520px;overflow-y: scroll;overflow-x: hidden;">
		<div class="card-body border-0 p-4 pt-0 px-4">
			<div class="media pt-0 text-light">
          	<img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=e0e0e0&size=10&text=VW" alt="" class="mr-2 rounded-circle">
          	<div class="media-body pb-3 mb-0 small lh-125">
	            <div class="d-flex justify-content-between align-items-middle w-100">
	              	<strong class="text-gray-dark"><?php echo $fullname ?></strong>
	              	<a href="#" class="btn btn-sm btn-secondary">+</a>
	            </div>
	            <span class="d-block" style="margin-top: -12px;"><?php echo $userInfo->email ?></span>
          	</div>
        </div>
        <h6 class="text-dark mb-0"><?php echo $project_name ?></h6>
        <small class="text-white"><?php echo $info->project_description ?>
        </small>
        <p class="text-white mb-2"><small class="text-dark">Published <?php echo $info->date_added ?></small></p>
        <div class="d-flex justify-content-between w-100 small">
        	<span class="text-light"><i class="fas fa-eye"></i> <?php echo number_format($info->views) ?></span>
        	<a class="text-light" href="#"><i class="fas fa-thumbs-up"></i> 2.4K</a>
        	<a class="text-light" href="#"><i class="fas fa-comment"></i> 43</a>
        	<!-- <a class="text-light" href="#" ><i class="fas fa-share"></i> share</a> -->
        </div>
		</div>
	</div>
</div>




<!-- <div class="row ">
	<div class="col-12 ml-0 mt-2 mb-0 pb-0">
		<p class="text-light">more from felix</p>
	</div>
	<div class="col-6 m-0 p-1 pt-0">
		<img src="asset/img/800.jpg" width="100%">
	</div>
	<div class="col-6 m-0 p-1">
		<img src="asset/img/800.jpg" width="100%">
	</div>
	<div class="col-6 m-0 p-1">
		<img src="asset/img/800.jpg" width="100%">
	</div>
	<div class="col-6 m-0 p-1">
		<img src="asset/img/800.jpg" width="100%">
	</div>
</div> -->
<!-- <div class="d-flex justify-content-between w-100 px-4 pt-2">
	<a class="btn btn-sm btn-default rounded-0 button-facebook w-100 mx-1" href=""><i class="fab fa-facebook-f"></i></a>
	<a class="btn btn-sm btn-default rounded-0 button-googleplus w-100 mx-1" href=""><i class="fab fa-google-plus-g"></i></a>
	<a class="btn btn-sm btn-default rounded-0 button-linkedin w-100 mx-1" href=""><i class="fab fa-linkedin"></i></a>
	<a class="btn btn-sm btn-default rounded-0  button-twitter w-100 mx-1" href=""><i class="fab fa-twitter"></i></a>
</div> -->