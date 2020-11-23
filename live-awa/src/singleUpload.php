<?php
	include_once("classes/user.php");
	include_once("clean.php");
    include_once("classes/session.php");

	//instantiate user class object
	$user = new user;

	$user_id = $_SESSION['userID'];
	$projectName = clean("projectName");
	$projectDesc = clean("projectDesc");
	$softwares = clean("softwares");
	$projectType = 'Single';
	$date_added = date('d-m-Y');
	$albumID = 'SGL-'.time();

	$unique=time();
	$pix=$_FILES['cover']['name'];
	$pix = $unique.$pix;
	$rphoto=$_FILES['cover']['tmp_name'];
	$target="../projects/".$pix;
	move_uploaded_file($rphoto, $target);

		$addProjectQuery = "INSERT INTO project(project_name, project_description, coverArt, softwares, date_added,user_id,projectType,albumID) VALUES ('$projectName', '$projectDesc', '$pix', '$softwares', '$date_added','$user_id','$projectType','$albumID')";

		$addProjectResult = $user->saveProject($addProjectQuery);
		echo $addProjectResult;
	
?>