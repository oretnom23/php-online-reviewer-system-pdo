<?php 
include("../../../connections/db-connect.php");
$user_id = $_SESSION['user_id'];
$id =  $_SESSION['exam_id'];
if(isset($_REQUEST['btnDeleteTest'])){

$description = $_REQUEST['description'];
$total_questions = $_REQUEST['total_questions'];
$passing_rate = $_REQUEST['passing_rate'];
$time_limit = $_REQUEST['time_limit'];
$accesscode = $_REQUEST['access_code'];


$stmt = "UPDATE examproper SET access_code = '$access_code',
  test_desc = '$description',
  total_questions = '$total_questions',
  passing_rate = '$passing_rate',
  time_limit = '$time_limit'
where test_id = '$test_id'
 ";
      if($conn->exec($stmt)==true){
    header("location: index.php");
    }
}


?>