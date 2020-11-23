<?php
	include_once("classes/Project.php");
	include_once("clean.php");
    include_once("classes/session.php");

	//instantiate user class object
	$project = new Project;

	$email = $_SESSION["email"];
	$projectName = clean("projectName");
	$projectDesc = clean("projectDesc");
	$projectSoftware = clean("projectSoftware");
	$_date_added = date('d-m-Y');
	$_date_added = $_date_added.' ('.date("H:i:a").')';

	$uploadedFiles = '';
	$uploaddir = '../asset/img/';
    if(!empty($_POST['submit'])){
    if (count($_FILES['file']['name']==0)){
        $tmpFilePath = $_FILES['file']['tmp_name'];
        $_date = str_shuffle(microtime(true));
        @$shortName = $_date.'-'.$_FILES['file']['name'];
        @$filePath = $uploaddir.$_date.'-'.$_FILES['file']['name'];
        if (@move_uploaded_file($tmpFilePath, $filePath)) {
					$uploadedFiles = $shortName;
				}
               
    }
    
    
    if (count($_FILES['file']['name']) > 0) {
		for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
			//Get the temp file path
			$tmpFilePath = $_FILES['file']['tmp_name'][$i];

			//make sure we have a file path
			if ($tmpFilePath != "") {
				
				$_date = str_shuffle(microtime(true));
				//save file name
				$shortName = $_date.'-'.$_FILES['file']['name'][$i];

				//Save file url
				$filePath = $uploaddir.$_date.'-'.$_FILES['file']['name'][$i];

				//Upload the file into the temp dir 
				if (move_uploaded_file($tmpFilePath, $filePath)) {
					$uploadedFiles .= $shortName.',';
				}
			}
		}
        }
		$uploadedFiles = substr($uploadedFiles, 0, -1);
        //echo $uploadedFiles. "<br />";

		$addProjectQuery = "INSERT INTO `project`(`email`, `project_name`, `project_description`, `project_dir`, `project_software`, `date_added`) VALUES ('$email', '$projectName', '$projectDesc', '$uploadedFiles', '$projectSoftware', '$_date_added')";

		$addProjectResult = $project->addProject($addProjectQuery);
		echo $addProjectResult;
	
    }
?>