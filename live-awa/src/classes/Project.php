<?php
	include_once("session.php");
	include_once("dbc.php");

	/**
	 * 
	 */

	class Project
	{
		public function addProject($data){
			$db = Database::getInstance();
			$conn = $db->getConnection();
			$result = $conn->query($data);
			if ($result) {
				return 'true';
			}else{
				return mysqli_error($conn);
			}
		}
		public function getProject($data){
			$db = Database::getInstance();
			$conn = $db->getConnection();
			$result = $conn->query($data);
			if ($result->num_rows > 0) {
				return $result;
			}else{
				return 'false';
			}
		}

		public function updateProject($data){
			$db = Database::getInstance();
			$conn = $db->getConnection();
			$result = $conn->query($data);
			if ($result) {
				return 'true';
			}else{
				return mysqli_error($conn);
			}
		}
	}
?>