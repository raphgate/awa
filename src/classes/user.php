<?php
	include_once("session.php");
	include_once("dbc.php");
	class user {
		public function query($query)
		{
			$con = open();
				$q = mysqli_query($con,$query);
				return $q;
			close($con);
		}
		public function getArray($query)
		{
				$q = mysqli_fetch_array($query);
				return $q;
		}
		public function getRows($query)
		{
				$q = mysqli_num_rows($query);
				return $q;
		}
		public function checkDuplicate($email){
			$q = $this->getRows($this->query("SELECT * FROM user WHERE email='$email' "));
			return $q;
		}
		public function saveView($project_id){
			$q = $this->query("UPDATE project SET views=views+1 WHERE id='$project_id' OR project_name='$project_id' ");
			return $q;
		}

		public function userLogin($email,$password)
		{
			$date = date("Y-F-d");
			$query = $this->query("SELECT * FROM user WHERE email='$email' AND password='$password'");
			$num = $this->getRows($query);
			if ($num < 1) {
				return '<span>Sorry! Email or password incorrect</span>';
		    }else{
		    	$arr = $this->getArray($query);
				$_SESSION['UsMail'] = $arr['email'];
		        $_SESSION['userID'] = $arr['user_id'];
		        $_SESSION['country'] = $arr['country'];
		        $_SESSION['UsName'] = $arr['first_name'].' '.$arr['last_name'];
				return 'done';
		    }
		}

		public function register($fName,$lName,$email,$city,$state,$country,$password,$reg_date)
		{
			$date = date("Y-F-d");
	    	$ins = $this->query("INSERT INTO `user`(`first_name`, `last_name`, `email`, `city`, `state`, `country`, `password`, `reg_date`) VALUES('$fName', '$lName', '$email', '$city', '$state', '$country', '$password', '$reg_date')");
	    	if ($ins == true) {
				return 'done';
	    	}else{
	    		return '<span>Failed To Create account, please try again later</span>';
	    	}
		}

		public function comment($name,$project_id,$comment,$time)
		{
			$date = date("Y-F-d");
	    	$ins = $this->query("INSERT INTO comments(`writer`, `comment`, `project_id`, `date_made`) VALUES('$name', '$comment', '$project_id', '$time')");
	    	if ($ins == true) {
				return 'posted';
	    	}else{
	    		return 'failed';
	    	}
		}

		public function saveProject($query)
		{
	    	$ins = $this->query($query);
	    	if ($ins == true) {
				return 'Project uploaded successfully';
	    	}else{
	    		return '<span>Failed To upload project, please try again later</span>';
	    	}
		}

		public function projectAction($query,$action)
		{
	    	$ins = $this->query($query);
	    	if ($ins == true) {
				return $action;
	    	}else{
	    		return 'failed';
	    	}
		}

		public function getAUser($user_id){
			$con = open();
			$row = $this->getArray($this->query("SELECT * FROM user WHERE user_id='$user_id' OR email='$user_id' "));
			$obj = new stdClass();
	        $obj->user_id = $row["user_id"];
	        $obj->fullname = $row["first_name"].' '.$row["last_name"];
	        $obj->email = $row["email"];
	        $obj->city = $row["city"];
	        $obj->state = $row["state"];
	        $obj->country = $row["country"];
	        $obj->description = $row["description"];
	        $obj->skills = $row["skills"];
	        $obj->reg_date = $row["reg_date"];
			return $obj;
			close($con);
		}

		public function getAProject($project_id){
			$row = $this->getArray($this->query("SELECT * FROM project WHERE id='$project_id' OR albumID='$project_id' OR project_name='$project_id' "));
			$obj = new stdClass();
	        $obj->project_name = $row["project_name"];
	        $obj->user_id = $row["user_id"];
            $obj->project_id = $row["id"];
            $obj->project_description = $row["project_description"];
            $obj->status = $row["status"];
            $obj->projectType = $row["projectType"];
            $obj->works = json_decode($row["works"], JSON_PRETTY_PRINT);
            $obj->softwares = $row["softwares"];
            $obj->coverArt = $row["coverArt"];
            $obj->views = $row["views"];
            $obj->albumID = $row["albumID"];
            $obj->date_added = $row["date_added"];
			return $obj;
		}

		public function getUserAlbum($user_id){
			$query = $this->query("SELECT * FROM project WHERE user_id='$user_id' AND projectType='Album' GROUP BY albumID ");
			$albums = array();
            while($row = $this->getArray($query)){
                $obj = new stdClass();
                $obj->project_name = $row["project_name"];
                $obj->project_id = $row["id"];
                $obj->project_description = $row["project_description"];
                $obj->status = $row["status"];
                $obj->projectType = $row["projectType"];
                $obj->works = json_decode($row["works"], JSON_PRETTY_PRINT);
                $obj->softwares = $row["softwares"];
                $obj->coverArt = $row["coverArt"];
                $obj->albumID = $row["albumID"];
                $obj->date_added = $row["date_added"];
                $albums[] = $obj;
            }
            return $albums;
		}

		public function getComments($project_id){
			$query = $this->query("SELECT * FROM comments WHERE project_id='$project_id' ORDER BY comment_id DESC ");
			$albums = array();
            while($row = $this->getArray($query)){
                $obj = new stdClass();
                $obj->writer = $row["writer"];
                $obj->comment = $row["comment"];
                $obj->date_made	 = $row["date_made"];
                $albums[] = $obj;
            }
            return $albums;
		}

		public function getUserSingle($user_id){
			$query = $this->query("SELECT * FROM project WHERE user_id='$user_id' AND projectType='Single' ");
			$albums = array();
            while($row = $this->getArray($query)){
                $obj = new stdClass();
                $obj->project_name = $row["project_name"];
                $obj->project_id = $row["id"];
                $obj->project_description = $row["project_description"];
                $obj->status = $row["status"];
                $obj->projectType = $row["projectType"];
                $obj->softwares = $row["softwares"];
                $obj->coverArt = $row["coverArt"];
                $obj->date_added = $row["date_added"];
                $albums[] = $obj;
            }
            return $albums;
		}

		public function getArtWorks($status,$order){
			$query = $this->query("SELECT * FROM project WHERE status='$status' GROUP BY albumID ORDER BY {$order} ");
			$albums = array();
            while($row = $this->getArray($query)){
                $obj = new stdClass();
                $obj->project_name = $row["project_name"];
                $obj->project_description = $row["project_description"];
                $obj->status = $row["status"];
                $obj->projectType = $row["projectType"];
                $obj->id = $row["id"];
                $obj->albumID = $row["albumID"];
                $obj->softwares = $row["softwares"];
                $obj->coverArt = $row["coverArt"];
                $obj->date_added = $row["date_added"];
                $albums[] = $obj;
            }
            return $albums;
		}

		public function logout(){
			// remove all session variables
			session_unset();
			// destroy the session
			session_destroy(); 
		}
	}
?>