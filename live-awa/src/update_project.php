<?php
	include_once("classes/Project.php");
	include_once("clean.php");

	//instantiate user class object
	$project = new Project;

	//clean post data
	$action = clean('action');
	$projectId = clean('data');

	$updateQuery = "UPDATE `project` SET `status` = '$action' WHERE `project`.`id` = $projectId;";
	$updateResult = $project->updateProject($updateQuery);
	echo $updateResult;

?>