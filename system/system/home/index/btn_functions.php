<?php 
include("../../../connections/db-connect.php");
$user_id = $_SESSION['user_id'];

$date = date("y-m-d H:i");

if(isset($_REQUEST['btnJoinCourse'])){

$accesscode = $_REQUEST['accesscode'];


 $stmt = $conn->prepare("SELECT * FROM  courses  where  access_code = '$accesscode' ");
 $stmt->execute(); 
 while($row = $stmt->fetch()){
	$course_id = $row['course_id'];
  }
 if($stmt->rowCount() > 0){
	$course_create = "INSERT INTO classlists ( course_id, user_id, date_created) VALUES ('$course_id',  '$user_id', '$date')";
     	if($conn->exec($course_create)==true){
 		header("location: index.php");
        }
 }



}


?>