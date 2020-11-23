<?php
	include_once("classes/User.php");
	//include_once("clean.php");

	//instantiate user class object
	$user = new User;

	//call logout method
	$logoutResult = $user->logout();
	header('Location: ../index.php');
?>