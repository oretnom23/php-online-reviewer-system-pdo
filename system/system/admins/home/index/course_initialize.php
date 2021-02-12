<?php
include("../../../connections/db-connect.php");

$course_id = $_SESSION['course_id'] = $_REQUEST['id'];


 $course_retrieve = $conn->prepare("SELECT * FROM  courses where  course_id = '$course_id'");
 $course_retrieve->execute();
 while($row = $course_retrieve->fetch()){
 	 $_SESSION['course_code'] = $row['course_code'];
 	 $_SESSION['course_desc'] = $row['course_desc'];
 }



header("location: ../courses/");
?>