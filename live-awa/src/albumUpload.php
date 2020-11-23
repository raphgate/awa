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
	$projectType = 'Album';
	$date_added = date('d-m-Y');

	$unique=time();
	$albumID = 'ABM-'.time();
	$pix=$_FILES['cover']['name'];
	$pix = $unique.$pix;
	$rphoto=$_FILES['cover']['tmp_name'];
	$target="../projects/".$pix;
	move_uploaded_file($rphoto, $target);
    if (count($_FILES['works']['name']) > 0) {
		foreach ($_FILES['works']["tmp_name"] as $key => $name_temp) {
                $name = $_FILES['works']['name'][$key];
                $tmpnm = $_FILES['works']['tmp_name'][$key];
                $size = $_FILES['works']['size'][$key];
                // check file extension
                if ($_FILES['works']['type'][$key] != 'image/jpeg'
                    && $_FILES['works']['type'][$key] != 'image/jpg'
                    && $_FILES['works']['type'][$key] != 'image/gif'
                    && $_FILES['works']['type'][$key] != 'image/png'
                ) {
                    // echo "Please upload only Image file";
                } else {
                    //this is the dir for the photo
                    $dir = "../projects/" . $name;
                    $newname = str_replace(" ","",microtime()) . '.jpg';
                    $move = move_uploaded_file($tmpnm, "../projects/" . $newname);
                    $pathnn[] = $newname;
                }

                $images = json_encode($pathnn);
            }
        }

		$addProjectQuery = "INSERT INTO project(project_name, project_description, coverArt, softwares,works, date_added,albumID,user_id,projectType) VALUES ('$projectName', '$projectDesc', '$pix', '$softwares', '$images', '$date_added','$albumID','$user_id','$projectType')";

		$addProjectResult = $user->saveProject($addProjectQuery);
		echo $addProjectResult;
	
?>