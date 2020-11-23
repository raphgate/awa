<?php
	include_once("classes/admin.php");
	include_once("clean.php");

	//instantiate Admin class object
	$admin = new admin;

	// Get and clean formdata with MySQLi real escape string
	$email = clean('email');
	$password = sha1(clean('password'));

	// Query request
	$loginQuery = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	$loginResult = $admin->login($loginQuery);

	if ($loginResult == 'false') {
		echo "email or password incorrect";
	}else{
		$_SESSION['adminId'] = $loginResult['id'];
		$_SESSION['adminEmail'] = $loginResult['email'];
		echo('done');
	}

?>