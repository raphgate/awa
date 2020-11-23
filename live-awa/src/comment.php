<?php
	include_once("classes/user.php");
	include_once("clean.php");
	include_once("classes/session.php");

	//instantiate user class object
	$user = new user;

	$project_id = clean('project_id');
	$comment = clean('comment');
	$time = time();
	if (!isset($_SESSION['UsName'])) {
		echo 'Not logged in';
	}else{
		$name = $_SESSION['UsName'];
		$regResult = $user->comment($name,$project_id,$comment,$time);
		if ($regResult == 'posted') {
	?>
	<div class="media text-muted pt-3">
	    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=e0e0e0&size=10&text=<?php echo substr($name,0,1) ?>" alt="" class="mr-2 rounded-circle">
	    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-secondary">
	      <div class="d-flex justify-content-between align-items-center w-100 mb-1">
	        <strong class="text-dark"><?php echo $_SESSION['UsName']; ?></strong>
	        <a href="#" class="text-muted"><?php echo elapsed($time) ?></a>
	      </div>
	      <span class="d-block text-dark"><?php echo $comment; ?> </span>
	    </div>
	  </div>
	<?php 
		}else{
			echo $regResult;
		}
		
	}
	
?>