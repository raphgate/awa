<?php
	include_once("classes/user.php");
	include_once("clean.php");
    include_once("classes/session.php");

	//instantiate user class object
	$user = new user;

	if (!isset($_SESSION['adminId'])) {
		echo 'Unauthorised';       
	}else{
		$action = htmlentities(trim($_GET['action']));
		$album = htmlentities(trim($_GET['album']));
		$query = "UPDATE project SET status='$action' WHERE albumID='$album' ";
		$update = $user->projectAction($query,$action);
		echo $update;
	}
	
?>