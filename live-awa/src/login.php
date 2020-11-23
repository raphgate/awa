<?php
	include_once("classes/user.php");
	include_once("clean.php");
    

	//instantiate user class object
	$user = new user;

	// Get and clean formdata with MySQLi real escape string
	$email = clean('email');
	$password = sha1(clean('password'));

	// Query request
	$result = $user->userLogin($email,$password);    
	echo $result;

?>