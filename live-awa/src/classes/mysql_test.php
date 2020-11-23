<?php
//include_once("dbc.php");
$db = mysqli_connect('localhost','root','','awa');
$query="SELECT * FROM `user` WHERE `email`='raphael@raphgate.com'";
$result=$db->query($query);
$res=$result->fetch_assoc();
echo $res['first_name'];
if(password_verify('femmy01',$res['password'])==true){
    echo "true";
}




?>