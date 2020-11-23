<?php
	include("session.php");
	include("dbc.php");
	include_once 'user.php';
	/**
	 * 
	 */
	class admin extends user
	{
		public function login($data)
		{
			$result = $this->query($data);
			if ($this->getRows($result) > 0) {
				$row = $this->getArray($result);
				return $row;
			}
			else{
				return 'false';
			}
		}
	}

?>