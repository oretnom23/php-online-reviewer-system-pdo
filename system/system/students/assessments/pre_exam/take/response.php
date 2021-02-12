<?php 
session_start();

$from_time1 =  date("Y-m-d H:i:s");
$to_time1 = $_SESSION['end_time'];

$timefirst = strtotime($from_time1);
$timesecond = strtotime($to_time1);

$seconds = $timesecond - $timefirst;

if($seconds < 0){

	echo "no timeleft";

	$_SESSION['timer_counter'] = "1";
}
else{
echo gmdate("H:i:s",$seconds);	
}



?>