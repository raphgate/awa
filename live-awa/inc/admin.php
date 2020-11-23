<?php
	include_once 'dbc.php';
	include_once 'session.php';
	include_once 'clean.php';
    //require_once 'PHPGangsta/GoogleAuthenticator.php';


	class admin{

		public function admin_login(){
		
			$con = open();
			$password = clean('password');
			$password = sha1($password);
			$email = clean('email');

			$query = mysqli_query($con, "SELECT * FROM admin WHERE email='$email' AND password='$password' AND status=1 ");
			$num = mysqli_num_rows($query);
			if ($num > 0) {
				$arr = mysqli_fetch_array($query);
				$_SESSION['adMail'] = $arr['email']; // Initializing Session
		         $_SESSION['adID'] = $arr['admin_id'];
		          $_SESSION['adName'] = $arr['fullname'];
					$URL = "../admin/dashboard.php";
		        	echo "<script>location.href='$URL'</script>";
		        
		    }else{
		       echo '<div class="alert alert-info alert-with-icon" data-notify="container">
                        <span data-notify="icon" class="pe-7s-key"></span>
                        <span data-notify="message">Oops! email or password incorrect</span>
                    </div>';
		    }

		    close($con);
		}

		function checkLogin()
        {
            if (isset($_SESSION['userID'])) {
                return 'logged';
            }else{
                return 'nada';
            }
        }

		public function userLogin($email,$password)
		{
			$con = open();
			$date = date("Y-F-d");
			$query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password' AND status=11 ");
			$num = mysqli_num_rows($query);
			if ($num < 1) {
				return '<span>Sorry! Email or password incorrect, or account not activated</span>';
		    }else{
		    	$arr = mysqli_fetch_array($query);
				$_SESSION['UsMail'] = $arr['email'];
		        $_SESSION['userID'] = $arr['user_id'];
		        $_SESSION['accType'] = $arr['accType'];
		        $_SESSION['UsName'] = $arr['firstName'].' '.$arr['lastName'];
				return 'done';
		    }

		    close($con);
		}

		public function register($user_id,$accType,$fName,$lName,$email,$password,$phone,$state)
		{
			$con = open();
			$date = date("Y-F-d");
			$query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' OR phone='$phone' ");
			$num = mysqli_num_rows($query);
			if ($num > 0) {
				return '<span>Sorry! This email/phone already exist</span>';
		    }else{
		    	$ins = mysqli_query($con,"INSERT INTO users (user_id, firstName,lastName, email, password, phone, accType,state,date_created) VALUES('$user_id','$fName','$lName','$email','$password','$phone','$accType','$state','$date')");
		    	if ($accType == 'Labourer') {
		    		$rego = mysqli_query($con,"INSERT INTO services (provider_id,service,state,date_created,provider_phone) VALUES('$user_id','Worker','$state','$date','$phone')");
		    	}
		    	if ($ins == true) {
					return 'done';
		    	}else{
		    		return '<span>Failed To Create account, please try again later</span>';
		    	}
		    	
		    }

		    close($con);
		}

		public function addSample($pix,$category,$sample,$unit,$price,$description,$shipping)
		{
			$con = open();
			$date = date("Y-F-d");
			$query = mysqli_query($con, "SELECT * FROM produce_samples WHERE category='$category' AND produce_name='$sample' ");
			$num = mysqli_num_rows($query);
			if ($num > 0) {
				return '<span>Sorry! This samle already exist</span>';
		    }else{
		    	$ins = mysqli_query($con,"INSERT INTO produce_samples (produce_name, unit, price, cover_photo, description, category,shipping, date_created) VALUES('$sample','$unit','$price','$pix','$description','$category','$shipping','$date')");
		    	if ($ins == true) {
					return 'done';
		    	}else{
		    		return '<span>Failed To add samle, please try again later</span>';
		    	}
		    }

		    close($con);
		}

		public function editSample($pix,$price,$description,$shipping,$sample_id)
		{
			$con = open();
	    	$ins = mysqli_query($con,"UPDATE produce_samples SET cover_photo='$pix',price='$price',description='$description',shipping='$shipping' WHERE sample_id='$sample_id' ");
	    	if ($ins == true) {
				return 'done';
	    	}else{
	    		return '<span>Failed To add samle, please try again later</span>';
	    	}
		    close($con);
		}

		public function savePrice($sample_id,$price,$produce_name,$date,$week,$month,$year)
		{
			$con = open();
	    	$ins = mysqli_query($con,"INSERT INTO price_changes (produce_id, produce_name, price, date_changed, week_changed, month_changed, year_changed) VALUES('$sample_id','$produce_name','$price','$date','$week','$month','$year') ");
	    	if ($ins == true) {
				return 'saved';
	    	}else{
	    		return 'error';
	    	}
		    close($con);
		}

		public function updatePrice($sample_id,$price)
		{
			$con = open();
	    	$ins = mysqli_query($con,"UPDATE produce_samples SET price='$price' WHERE sample_id='$sample_id' ");
	    	if ($ins == true) {
				return 'done';
	    	}else{
	    		return 'error';
	    	}
		    close($con);
		}

		public function activate($phone,$type,$dueNext)
		{
			$con = open();
	    	$ins = mysqli_query($con,"UPDATE users SET status=11,subType='$type',dueNext='$dueNext' WHERE phone='$phone' ");
	    	if ($ins == true) {
				return 'done';
	    	}else{
	    		return 'error';
	    	}
		    close($con);
		}

		public function placeOrder($userID,$shipping,$price,$unit,$state,$produce_id,$qty,$order_id,$fullname,$email,$phone,$produce_name,$status,$description)
		{
			$con = open();
			$date = date("Y-F-d");
			$query = mysqli_query($con, "SELECT * FROM orders WHERE buyer_id='$userID' AND produce_id='$produce_id' AND status=0 ");
			$num = mysqli_num_rows($query);
			if ($num > 0) {
				return '<span>Sorry! You have a pending order on this product</span>';
		    }else{
		    	$ins = mysqli_query($con,"INSERT INTO orders (order_id, buyer_id, buyer_email, buyer_name, phone, price, quantity, state, shipping, unit, produce_id,produce,status, time_added,description) VALUES('$order_id','$userID','$email','$fullname','$phone','$price','$qty','$state','$shipping','$unit','$produce_id','$produce_name','$status','$date','$description')");
		    	if ($ins == true) {
					return 'done';
		    	}else{
		    		return '<span>Failed To place order, please try again later</span>';
		    		//return mysqli_error($con);
		    	}
		    }

		    close($con);
		}
		public function generateMacHeader($method = 'POST', $uri = '/v2/sms/', $host = 'api.smsglobal.com', $port = 80, $extraData = '')
		  {
		  	  $charMap = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTWXYZ0123456789';
		  	  $result = '';
		      $size = strlen($charMap);
		      for ($i = 0; $i < 10; $i++) {
		          $result .= $charMap[rand(0, $size - 1)];
		      }
		      $apikey = 'db3832ef64ac2471cbff93bf5568de25';$secret = '96081232bb85d1117b4ff3ccd3ca131a';

		      $timestamp = time();
		      $nonce = $result;

		      $rawString = $timestamp . "\n" . $nonce . "\n" . $method . "\n" . $uri . "\n" . $host . "\n" . $port . "\n" . $extraData . "\n";
		      //echo $rawString;
		      $hashHeader = base64_encode(hash_hmac('sha256', $rawString, $secret, true));

		      return "MAC id=\"$apikey\", ts=\"$timestamp\", nonce=\"$nonce\", mac=\"$hashHeader\"";
		  }

		public function sendMessage($message,$destination)
		{
			  $mac = $this->generateMacHeader();
			  $c = curl_init();
			  curl_setopt($c, CURLOPT_URL, 'http://api.smsglobal.com/v2/sms/');
			  curl_setopt($c,CURLOPT_HTTPHEADER, [
			      "Authorization: $mac",
			      'Content-Type: application/json',
			      'Accept: application/json'
			  ]);
			  curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
			  curl_setopt($c, CURLOPT_POST, true);
			  curl_setopt($c, CURLOPT_POSTFIELDS, json_encode([
			      'destination' => $destination,
			      'origin' => 'RFHUB',
			      'message' => $message
			  ]));
			  $response = curl_exec($c);
			  if (curl_error($c)) {
			      return "Error: " . curl_error($c);
			  }else{
			    $res = json_decode($response);
			    foreach ($res->messages as $key => $value) {
			      $status = $value->status;
			      return $status;
			    }
			  }
			  curl_close($c);
		}
		public function addProduce($images,$category,$sample_id,$unit,$price,$description,$userID,$product_name,$state)
		{
			$con = open();
			$date = date("Y-F-d");
			$query = mysqli_query($con, "SELECT * FROM produce WHERE farmer_id='$userID' AND sample_id='$sample_id' ");
			$num = mysqli_num_rows($query);
			if ($num > 0) {
				return '<span>Sorry! This produce already exist</span>';
		    }else{
		    	$ins = mysqli_query($con,"INSERT INTO produce (category, sample_id, product_name, unit, price, photo, state, description, farmer_id, date_created) VALUES('$category','$sample_id','$product_name','$unit','$price','$images','$state','$description','$userID','$date')");
		    	if ($ins == true) {
					return 'done';
		    	}else{
		    		return '<span>Failed To add peoduce, please try again later</span>';
		    	}
		    }

		    close($con);
		}

		public function addService($images,$service,$provider_id,$phone,$state)
		{
			$con = open();
			$date = date("Y-F-d");
			$query = mysqli_query($con, "SELECT * FROM services WHERE provider_id='$provider_id' AND service='$service' ");
			$num = mysqli_num_rows($query);
			if ($num > 0) {
				return '<span>Sorry! You have already added this service</span>';
		    }else{
		    	$ins = mysqli_query($con,"INSERT INTO services (provider_id,service,state,date_created,provider_phone,images) VALUES('$provider_id','$service','$state','$date','$phone','$images')");
		    	if ($ins == true) {
					return 'done';
		    	}else{
		    		return '<span>Failed To add service, please try again later</span>';
		    	}
		    }

		    close($con);
		}

		public function placeServiceOrder($execID,$from,$order_type,$typy,$unit,$qty,$language,$consumer_id,$state)
		{
			$con = open();
			$date = date("Y-F-d");
			$query = mysqli_query($con, "SELECT * FROM service_request WHERE execID='$execID' ");
			$num = mysqli_num_rows($query);
			if ($num > 0) {
				return '<span>Sorry! You have already requested for this service</span>';
		    }else{
		    	$ins = mysqli_query($con,"INSERT INTO service_request (service, service_type, language, unit, qty, consumer_id, execID, status, state, date_created, consumer_phone) VALUES('$order_type','$typy','$language','$unit','$qty','$consumer_id','$execID','Awaiting reply','$state','$date','$from')");
		    	if ($ins == true) {
		    		$getEm = mysqli_query($con, "SELECT provider_id,provider_phone,state FROM services WHERE service='$order_type' ");
		    		while ($r = mysqli_fetch_array($getEm)) {
		    			$number = $r['provider_phone'];
		    			$provider_id = $r['provider_id'];$myState = $r['state'];
		    			if ($order_type == 'Worker') {
		    				$MSG = 'Dear Worker, A farmer has requested for manual Labourer,  click https://ruralfamershub.com/app/new-service-requests to respond. Thank you';
		    			}else{
		    				$MSG = 'Dear service provider, A farmer has requested for '.$qty.' '.$unit.'(s) of '.$typy.' '.$order_type.', click https://ruralfamershub.com/app/new-service-requests to respond. Thank you';
		    			}
		    			$quo = mysqli_query($con,"INSERT INTO service_quotations (service, service_type, unit, qty, message_body, price, status, order_id, provider_id, provider_phone, consumer_phone, date_created,state) VALUES('$order_type','$typy','$unit','$qty','$order_type',0,'Pending','$execID','$provider_id','$number','$from','$date','$myState')");
		    			$send = $this->sendMessage($MSG,$number);
		    		}
					return 'done';
		    	}else{
		    		return '<span>Failed To request for service, please try again later</span>';
		    	}
		    }

		    close($con);
		}

		public function getLatestUsers(){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC LIMIT 20");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->id = $row["id"];
		        $obj->taxID = $row["user_id"];
		        $obj->fullname = $row["firstName"].' '.$row["lastName"];
		        $obj->email = $row["email"];
		        $obj->phone = $row["phone"];
		        $obj->state = $row["state"];
		        $obj->accType = $row["accType"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getCategoryProduce($category){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM produce_samples WHERE category='$category' ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->sample_id = $row["sample_id"];
		        $obj->produce_name = $row["produce_name"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->category = $row["category"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getCategories(){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM produce_samples GROUP BY category ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->sample_id = $row["sample_id"];
		        $obj->produce_name = $row["produce_name"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->category = $row["category"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getServiceSamples(){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM service_samples ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->ss_id = $row["ss_id"];
		        $obj->service_name = $row["service_name"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getFarmerProd($farmer_id){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM produce WHERE farmer_id='$farmer_id' ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->farmer_id = $row["farmer_id"];
		        $obj->product_name = $row["product_name"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->state = $row["state"];
		        $obj->photo = json_decode($row["photo"], JSON_PRETTY_PRINT)[0];
		        $obj->date_created = $row["date_created"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getProviderServices($provider_id){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM services WHERE provider_id='$provider_id' ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->provider_id = $row["provider_id"];
		        $obj->service = $row["service"];
		        $obj->state = $row["state"];
		        $obj->image = json_decode($row["images"], JSON_PRETTY_PRINT)[0];
		        $obj->date_created = $row["date_created"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getOrders($userID){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM orders WHERE buyer_id='$userID' ORDER By id DESC ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
				$obj->id = $row['id'];
		        $obj->order_id = $row["order_id"];
		        $obj->quantity = $row["quantity"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->shipping = $row["shipping"];
		        $obj->produce = $row["produce"];
		        $obj->state = $row["state"];
		        $obj->status = $row["status"];
		        $obj->time_added = $row["time_added"];
		        $produce_id = $row['produce_id'];
		        $arr = mysqli_fetch_array(mysqli_query($con, "SELECT cover_photo FROM produce_samples WHERE sample_id='$produce_id' "));
		        $obj->photo = json_decode($arr["cover_photo"], JSON_PRETTY_PRINT)[0];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getFarmerOrders($userID,$state){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM orders WHERE state='$state' AND produce_id IN (SELECT sample_id FROM produce WHERE farmer_id='$userID') ORDER By id DESC ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->order_id = $row["order_id"];
		        $obj->quantity = $row["quantity"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->shipping = $row["shipping"];
		        $obj->produce = $row["produce"];
		        $obj->state = $row["state"];
		        $obj->status = $row["status"];
		        $obj->time_added = $row["time_added"];
		        $produce_id = $row['produce_id'];
		        $arr = mysqli_fetch_array(mysqli_query($con, "SELECT cover_photo FROM produce_samples WHERE sample_id='$produce_id' "));
		        $obj->photo = json_decode($arr["cover_photo"], JSON_PRETTY_PRINT)[0];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getFarmerSales($userID){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM quotations WHERE Qstatus='Selected' AND farmer_id='$userID' AND orderID IN (SELECT orderID FROM orders WHERE status='Completed') ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->order_id = $row["orderID"];
		        $obj->quantity = $row["qty"];
		        $order_id = $row['orderID'];
		        $orr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM orders WHERE order_id='$order_id' "));
		        $obj->unit = $orr["unit"];
		        $obj->price = $orr["price"];
		        $obj->shipping = $orr["shipping"];
		        $obj->produce = $orr["produce"];
		        $obj->state = $orr["state"];
		        $obj->status = $orr["status"];
		        $obj->time_added = $orr["time_added"];
		        $produce_id = $orr['produce_id'];
		        $arr = mysqli_fetch_array(mysqli_query($con, "SELECT cover_photo FROM produce_samples WHERE sample_id='$produce_id' "));
		        $obj->photo = json_decode($arr["cover_photo"], JSON_PRETTY_PRINT)[0];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getProviderNewRequests($userID){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM service_quotations WHERE status='Pending' AND provider_id='$userID' ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->order_id = $row["order_id"];
		        $obj->service = $row["service"];
		        $obj->service_type = $row["service_type"];
		        $obj->unit = $row["unit"];
		        $obj->qty = $row["qty"];
		        $obj->status = $row["status"];
		        $obj->date_created = $row["date_created"];
		        $obj->state = $row["state"];
		        $obj->quotation_id = $row['quotation_id'];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getServiceProviders($execID){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM service_quotations WHERE order_id='$execID' ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->order_id = $row["order_id"];
		        $obj->service = $row["service"];
		        $obj->service_type = $row["service_type"];
		        $obj->unit = $row["unit"];
		        $obj->qty = $row["qty"];
		        $obj->status = $row["status"];
		        $obj->date_created = $row["date_created"];
		        $obj->state = $row["state"];
		        $obj->price = $row["price"];
		        $obj->quotation_id = $row['quotation_id'];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getProviderNewRequests2($userID){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM service_quotations WHERE status!='Pending' AND provider_id='$userID' ORDER BY quotation_id DESC ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->order_id = $row["order_id"];
		        $obj->service = $row["service"];
		        $obj->service_type = $row["service_type"];
		        $obj->unit = $row["unit"];
		        $obj->qty = $row["qty"];
		        $obj->price = $row["price"];
		        $obj->status = $row["status"];
		        $obj->date_created = $row["date_created"];
		        $obj->state = $row["state"];
		        $obj->quotation_id = $row['quotation_id'];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getSales($userID){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM orders WHERE buyer_id='$userID' AND status='Completed' ORDER By id DESC ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->order_id = $row["order_id"];
		        $obj->quantity = $row["quantity"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->shipping = $row["shipping"];
		        $obj->produce = $row["produce"];
		        $obj->state = $row["state"];
		        $obj->status = $row["status"];
		        $obj->time_added = $row["time_added"];
		        $produce_id = $row['produce_id'];
		        $arr = mysqli_fetch_array(mysqli_query($con, "SELECT cover_photo FROM produce_samples WHERE sample_id='$produce_id' "));
		        $obj->photo = json_decode($arr["cover_photo"], JSON_PRETTY_PRINT)[0];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getAdminOrders($offset){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM orders ORDER BY id DESC LIMIT 50 ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->id = $row["id"];
		        $obj->order_id = $row["order_id"];
		        $obj->quantity = $row["quantity"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->shipping = $row["shipping"];
		        $obj->produce = $row["produce"];
		        $obj->state = $row["state"];
		        $obj->status = $row["status"];
		        $obj->time_added = $row["time_added"];
		        $produce_id = $row['produce_id'];
		        $arr = mysqli_fetch_array(mysqli_query($con, "SELECT cover_photo FROM produce_samples WHERE sample_id='$produce_id' "));
		        $obj->photo = json_decode($arr["cover_photo"], JSON_PRETTY_PRINT)[0];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getAdminServiceReq($offset){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM service_request ORDER BY request_id DESC LIMIT 50 ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->request_id = $row["request_id"];
		        $obj->qty = $row["qty"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->service = $row["service"];
		        $obj->service_type = $row["service_type"];
		        $obj->state = $row["state"];
		        $obj->status = $row["status"];
		        $obj->language = $row["language"];
		        $obj->execID = $row["execID"];
		        $obj->consumer_id = $row["consumer_id"];
		        $obj->provider_id = $row["provider_id"];
		        $obj->date_created = $row["date_created"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getOrder($orderID){
			$con = open();
			$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM orders WHERE order_id='$orderID' "));
			$obj = new stdClass();
	        $obj->order_id = $row["order_id"];
	        $obj->quantity = $row["quantity"];
	        $obj->unit = $row["unit"];
	        $obj->price = $row["price"];
	        $obj->shipping = $row["shipping"];
	        $obj->produce = $row["produce"];
	        $obj->state = $row["state"];
	        $obj->status = $row["status"];
	        $obj->time_added = $row["time_added"];
			return $obj;
			close($con);
		}

		public function orderMet($userID,$order_id,$actual,$ref,$Pstatus,$Ostatus){
			$con = open();
			$date = date('Y-M-d');
			$ins = mysqli_query($con, "INSERT INTO transactions (payment_id, user_id, orderID, status, amount, date_created) VALUES('$ref','$userID','$order_id','$Pstatus','$actual','$date') ");
			if ($ins == true) {
				$upd = mysqli_query($con,"UPDATE orders SET status='$Ostatus' WHERE order_id='$order_id' ");
				return 'done';
			}else{
				return 'investopedia';
			}
			close($con);
		}
        public function havePaid($orderID){
			$con = open();
			$upd = mysqli_query($con,"UPDATE orders SET status='Payment made' WHERE order_id='$orderID' ");
			if ($upd == true) {
				return 'done';
			}else{
				return 'error';
			}
			close($con);
		}

		public function supply($orderID,$status){
			$con = open();
			$upd = mysqli_query($con,"UPDATE orders SET status='$status' WHERE order_id='$orderID' ");
			if ($upd == true) {
				return 'done';
			}else{
				return 'error';
			}
			close($con);
		}

		public function confirmPay($orderID){
			$con = open();
			$upd = mysqli_query($con,"UPDATE orders,transactions SET orders.status='Supply requested',transactions.status='Confirmed' WHERE orders.order_id='$orderID' AND transactions.orderID=orders.order_id ");
			if ($upd == true) {
				return 'done';
			}else{
				return 'error';
			}
			close($con);
		}

		public function deleteProd($sample_id){
			$con = open();
			$upd = mysqli_query($con,"DELETE FROM produce_samples WHERE sample_id='$sample_id' ");
			if ($upd == true) {
				return 'done';
			}else{
				return 'error';
			}
			close($con);
		}

		public function getAdminSales($offset){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM orders WHERE status='Completed' LIMIT 50 OFFSET {$offset} ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->order_id = $row["order_id"];
		        $obj->quantity = $row["quantity"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->shipping = $row["shipping"];
		        $obj->produce = $row["produce"];
		        $obj->state = $row["state"];
		        $obj->status = $row["status"];
		        $obj->time_added = $row["time_added"];
		        $produce_id = $row['produce_id'];
		        $arr = mysqli_fetch_array(mysqli_query($con, "SELECT cover_photo FROM produce_samples WHERE sample_id='$produce_id' "));
		        $obj->photo = json_decode($arr["cover_photo"], JSON_PRETTY_PRINT)[0];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getAllProduce($offset){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM produce_samples LIMIT 50 OFFSET {$offset} ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->sample_id = $row["sample_id"];
		        $obj->produce_name = $row["produce_name"];
		        $obj->unit = $row["unit"];
		        $obj->price = $row["price"];
		        $obj->category = $row["category"];
		        $obj->cover_photo = $row["cover_photo"];
		        $obj->cover_photo = json_decode($row["cover_photo"], JSON_PRETTY_PRINT)[0];
		        $obj->date_created = $row["date_created"];
		        $sample_id = $row['sample_id'];
		        $obj->num = mysqli_num_rows(mysqli_query($con, "SELECT sample_id FROM produce WHERE sample_id='$sample_id' "));
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getUsers($offset){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM users LIMIT 50 OFFSET {$offset} ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->id = $row["id"];
		        $obj->user_id = $row["user_id"];
		        $obj->fullname = $row["firstName"].' '.$row["lastName"];
		        $obj->email = $row["email"];
		        $obj->phone = $row["phone"];
		        $obj->state = $row["state"];
		        $obj->accType = $row["accType"];
		        $obj->date_created = $row["date_created"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getSuppliers($sample_id){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM produce WHERE sample_id='$sample_id' ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->farmer_id = $row["farmer_id"];
		        $user_id = $row['farmer_id'];
		        $arr = mysqli_fetch_array(mysqli_query($con, "SELECT firstName,lastName FROM users WHERE user_id='$user_id' ")); 
		        $obj->farmer = $arr["firstName"].' '.$arr["lastName"];
		        $obj->product_name = $row["product_name"];
		        $obj->state = $row["state"];
		        $obj->photo = json_decode($row["photo"], JSON_PRETTY_PRINT)[0];
		        $obj->date_created = $row["date_created"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getSupplyPhone($order_id){
			$con = open();
			$q = mysqli_query($con, "SELECT * FROM quotations WHERE orderID='$order_id' AND Qstatus='Selected' ");
			$courses = array();
			while ($row = mysqli_fetch_array($q)) {
				$obj = new stdClass();
		        $obj->phone = $row["phone"];
		        $obj->qty = $row["qty"];
		        $courses[] = $obj;
			}
			return $courses;
			close($con);
		}

		public function getPaid($billID){
			$con = open();
			$q = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(amount) AS paid FROM payments WHERE bill_id='$billID' "));
			$paid = $q['paid'];
			return $paid;
			close($con);
		}

		public function getProduce($produce){
			$con = open();
			$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM produce_samples WHERE sample_id='$produce' "));
			$obj = new stdClass();
	        $obj->sample_id = $row["sample_id"];
	        $obj->produce_name = $row["produce_name"];
	        $obj->unit = $row["unit"];
	        $obj->price = $row["price"];
	        $obj->category = $row["category"];
	        $obj->cover_photo = $row["cover_photo"];
	        $obj->description = $row["description"];
	        $obj->shipping = $row["shipping"];
	        $obj->cover_photo = json_decode($row["cover_photo"], JSON_PRETTY_PRINT)[0];
	        $obj->images = json_decode($row["cover_photo"], JSON_PRETTY_PRINT);
	        $obj->date_created = $row["date_created"];
	        $sample_id = $row['sample_id'];
			return $obj;
			close($con);
		}

		public function getAUser($user_id){
			$con = open();
			$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE user_id='$user_id' OR phone='$user_id' "));
			$obj = new stdClass();
	        $obj->id = $row["id"];
	        $obj->user_id = $row["user_id"];
	        $obj->fullname = $row["firstName"].' '.$row["lastName"];
	        $obj->email = $row["email"];
	        $obj->phone = $row["phone"];
	        $obj->state = $row["state"];
	        $obj->accType = $row["accType"];
	        $obj->date_created = $row["date_created"];
			return $obj;
			close($con);
		}

		public function updatePassword($user_id){
			$con = open();
			$confNewP = clean('confNewP');
			$new_password = clean('newP');
			$old_password = clean('oldP');
			$URL = "account-settings.php";
			if ($new_password != '' && $old_password != '') {

				$check = mysqli_num_rows(mysqli_query($con, "SELECT password FROM member_tbl WHERE id='$user_id' AND password='$old_password' "));
				if ($check == 1) {
					$update = mysqli_query($con,"UPDATE member_tbl SET password='$new_password' WHERE id='$user_id' ");
			            echo "<script>alert('Password updated')</script>";
		            echo "<script>location.href='$URL'</script>";
				}elseif($check < 1){
					echo "<script>alert('Password Incorrect')</script>";
				}
			}else{
				
			    echo "<script>alert('All fields are required')</script>";
			    echo "<script>location.href='$URL'</script>";
			}
			mysqli_close($con);
		}

		public function reset($email){
		$con = open();
		$check = mysqli_num_rows(mysqli_query($con, "SELECT email FROM users WHERE email='$email' "));
		if ($check > 0) {
			$characters = '123456789ABCDEFGHIJKLMNOPQRSTUV';
			$characterslength=31;
			$randomString='';
			for ($i = 1; $i < 5; $i++){
				$randomString.=$characters[rand(0,$characterslength - 1)];
			}
			$new_password = sha1($randomString);
			$new_password1 = $randomString;

			$update_user = mysqli_query($con, "UPDATE users SET password='$new_password' WHERE email = '$email'");
			
	  	$subject = "Password Reset";
	    $date = date("Y");

	                $htmlContent = '<html>
	                  <body style="background: #e4e2e2">
	                  <center><div style="width: 50%;border-radius: 5px 5px 5px 5px;height:60%">
	    
	                  <div style="background: white;padding:10%;margin-top:25px">
	                   <div>
	                    <h6>Password Reset</h6>
	                   </div>
	                  <h3  style="color: #1ab394;font-family: Open Sans, helvetica, arial, sans-serif;margin:3%">RFHUB password reset</h3>
	                  <p style="padding:10px;line-height:200%">You have successfully Reset <em style="color: #1ab394;font-family: CASTELLAR;font-size:1.2em;">Your password</em> Your new password is : '.$new_password1.'</p>
	                 <div >
	                    <div></div>
	                     </div>
	                   <br>
	                   <div>
	                    <p><strong>Copyright</strong> &copy; <i id="today_d">'.$date.'</i> RFHUB </p>
	                   </div>
	               </div>
	    
	               </div>
	             </center>
	          </body>
	          </html>';

	$from ='<password_reset@rfhub.com.io>';
	// Additional headers
	$headers = 'From: ' . $from. "\r\n";   
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	 

	 @$send = mail($email,$subject,$htmlContent,$headers);
			
	echo 'done';
	
		}

		else{
			echo '<span>Sorry! This email address is not associated with any account on this platform</span>';
		}

	}

	}
?>