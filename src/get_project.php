<?php
	include_once("classes/Project.php");
	include_once("clean.php");	

	function getAllProject(){
		$project = new Project;
		$projectQuery = "SELECT * FROM `project`";
		$getProjectResult = $project->getProject($projectQuery);
		if ($getProjectResult == 'false') {
			return "no data";
		}else{
			return $getProjectResult;
		}
	}

	function getProject($status){
		$project = new Project;
		$projectQuery = "SELECT * FROM `project` WHERE `status` = '$status'";
		$getProjectResult = $project->getProject($projectQuery);
		if ($getProjectResult == 'false') {
			return "no data";
		}else{
			return $getProjectResult;
		}
	}
	
?>
