<?php
	include_once("classes/user.php");
	include_once("clean.php");

	//instantiate user class object
	$user = new user;

	$fName = clean('fName');
	$lName = clean('lName');
	$email = clean('email');
	$country = clean('country');
	$state = clean('state');
	$city = clean('city');
	$password = sha1(clean('password'));
	$reg_date = date('d-m-Y');

	//Check Duplicate Query
	$dupResult = $user->checkDuplicate($email);

	// Condition
	if ($dupResult > 0) {
		echo "A user with this email alrready exist";
	}else{
		$regResult = $user->register($fName,$lName,$email,$city,$state,$country,$password,$reg_date);
		echo $regResult;
		
	}

	
?>