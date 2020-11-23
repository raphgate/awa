<?php
	require_once 'classes/dbc.php';
	// Function to clean input data
	function clean($text){
        $conn=open();
		$text = mysqli_real_escape_string($conn, trim($_POST[$text]));
		return $text;
		close($conn);
	}
    function encod($info){
     $result=password_hash($info,PASSWORD_BCRYPT);
     return $result;     
    }
    function decod($input,$hash){
        if(password_verify($input,$hash)==true){
            return true;
        }
        else {
            return false;
        }
    }

    //////////////// function to change time format to 12 hour /////////////
    function timeFormat(){
        $time = date("H:i:a");
        $r = explode(':',$time);
        $td = $r[0];
        if ($td > 12) {
            $formated  = ($td - 12).':'.$r[1].':'.$r[2];
        }else{
            $formated = $td.':'.$r[1].':'.$r[2];
        }
        return $formated;
    }


    ///////////// function to explode time ///////////////////
    function expo($value)
    {
        $r = explode('.',$value);
        return $r;
    }

    ////////////// Function to calculate elapseed time /////////////////
    function elapsed($oldtime){
        $time = time();
        $ago = $time-$oldtime;
        $inMin = round($ago/60,1);
        $inHr = round($inMin/60,1);
        $inDay = round($inHr/24,1);
        $inWeek = round($inDay/7,1);
        $inMonth = round($inWeek/28,1);
        $inYear = round($inMonth/12,1);
        if ($inMin < 60) {
            $time = round($inMin).'m ago';
        }elseif ($inHr < 24) {
            $tspilt = expo($inHr);
            $time = $tspilt[0].'h '.@$tspilt[1].'m ago';
        }elseif ($inDay < 7) {
            $tspilt = expo($inDay);
            $time = $tspilt[0].'d '.@$tspilt[1].'h ago';
        }elseif ($inWeek < 28) {
            $tspilt = expo($inWeek);
            $time = $tspilt[0].'w '.@$tspilt[1].'d ago';
        }elseif ($inMonth < 12) {
            $tspilt = expo($inMonth);
            $time = $tspilt[0].'mon '.@$tspilt[1].'w ago';
        }elseif ($inYear > 0.9) {
            $tspilt = expo($inYear);
            $time = $tspilt[0].' yr '.@$tspilt[1].'mon ago';
        }
        return $time;
    }

    ////////////// Function to calculate time Unit /////////////////
    function timeUnit($unit){
        if ($unit == 'hour') {
            $value = 3600;
        }elseif ($unit == 'day') {
            $value = 3600*24;
        }elseif ($unit == 'week') {
            $value = (3600*24)*7;
        }elseif ($unit == 'month') {
            $value = (3600*24*30);
        }elseif ($unit == 'year') {
            $value == (3600*24*30*12);
        }
        return $value;
    }

    function addDash($value)
    {
        $value = explode(' ',$value);
        $value = implode('-',$value);
        return $value;
    }

    function removeDash($value)
    {
        $value = explode('-',$value);
        $value = implode(' ',$value);
        return $value;
    }
?>