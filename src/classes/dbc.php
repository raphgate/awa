<?php

 function open()
{
		// $con = mysqli_connect("localhost","chuqxnoo_awanetwork","{HTKPmV@F)7A","chuqxnoo_awanetwork");
		$con = mysqli_connect("localhost","root","","awanetwork");

	// Check connection
	if (mysqli_connect_errno())
	{
	    //echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    echo "System failed to connect to server";
	}else{
		return $con;
	}
}

function close($con){
	mysqli_close($con);
}

?>