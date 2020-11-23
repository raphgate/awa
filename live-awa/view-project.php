<!DOCTYPE html>
<?php 
  include_once("src/classes/user.php");
  include_once("src/clean.php");
    include_once("src/classes/session.php");

  //instantiate user class object
  $user = new user;
  $project_id = removeDash(htmlentities($_GET['id']));
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
<html lang="en">
<head>
	<?php include_once('inc/links.php'); ?>
</head>
<body class="bg-awa-light">
<header>
	<nav class="navbar navbar-expand navbar-light fixed-top bg-light profile">
		<?php include_once('inc/header.php'); ?>    
	</nav>
</header>

<main role="main" class="bg-awa-white pt-2">
	
	<section class="profile-content mt-0">
		<div style="width: 80%;margin:0 auto">
        <div class="row" style="margin-top: 2%">
          <div class="col-md-8 card p-0 rounded-0 border-0" style="max-height: 600px;overflow-y: scroll;overflow-x: hidden;">
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
                      <form id="comment-form" action="" method="POST">
                        <div class="row mt-2">
                          <div class="col-md-10 col-9 pr-2 mr-0">
                            <div class="form-group">
                                  <textarea class="form-control bg-light rounded-left rounded-0 tpb-1" id="message_text" name="comment" rows="1" placeholder="make a new comment" required=""></textarea>
                                  <input type="hidden" name="project_id" value="<?php echo $info->project_id ?>">
                                </div>
                          </div>
                          <div class="col-md-2 col-3 pl-0 ml-0">
                            <button class="btn btn-secondary w-100 px-1 btn-sm" type="submit" id="comBtn">Comment</button>
                          </div>
                        </div>
                        </form>
                      <h6 class="my-1 ">comments..</h6>
                      <div id="commento">
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
            </div>
            <div class="col-md-4 card p-0 rounded-0 border-0 bg-danger">
              <div class="card-body border-0 p-4 pt-0 px-4">
                <div class="media pt-0 text-light">
                      <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=e0e0e0&size=10&text=<?php echo substr($fullname,0,1) ?>" alt="" class="mr-2 rounded-circle">
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
    </div>
	</section><hr>
</main>

<?php
    include_once('inc/footer.php');
    include_once('inc/project_modal.php');
    include_once('inc/scripts.php');
?>

<script type="text/javascript">
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
              if (data.trim() == 'failed' || data.trim() == 'Not logged in') {
                $("#comBtn").attr('disabled', false).html(data);
                $("#comment-form")[0].reset();
                setTimeout(
                  function () {
                  $("#comBtn").html('Comment');
                  }, 3000);
              }else{
                  $("#comBtn").attr('disabled', false).html('Posted');
                  $("#commento").prepend(data);
                  $("#comment-form")[0].reset();
                  setTimeout(
                    function () {
                    $("#comBtn").html('Comment');
                    }, 3000);
              }
            },
            error : function(e){
                console.log(e);
            }
        });
    }));
  $('.yada').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay:true
  });
</script>
</body>
</html>