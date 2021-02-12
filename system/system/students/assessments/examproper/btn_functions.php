<?php 
include("../../../connections/db-connect.php");
$user_id = $_SESSION['user_id'];
//CREATE
if(isset($_REQUEST['btnTakeTest'])){


$access_code = $_REQUEST['access_code'];

//$date_time = $_REQUEST['date_time'];


  $stmt =  $conn->prepare("SELECT * FROM examproper WHERE access_code ='$access_code' ");
  //$stmt2 =  $conn->prepare("SELECT * FROM examproper WHERE date_time ='$date_time'");
  
        $stmt->execute();    

  

if($stmt->rowCount() > 0){

  while($row = $stmt->fetch()){
 $test_id = $_SESSION['test_id']= $row['test_id'];
 $access_code = $_SESSION['access_code']= $row['access_code'];
  $stmt1 =  $conn->prepare("SELECT * FROM studentdata_exams WHERE test_id ='$test_id' and student_id ='$user_id' ");
  $stmt1->execute();
        if($stmt1->rowCount() > 0){
          ?> <script>
        alert('Exam Already Taken');
       </script>"; <?php
        echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        exit();

  
 if($stmt2 > $date_expired){
          ?> 
          <script>
        alert('Please check your examination Schedule');
       </script>"; <?php
        echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        exit();

}
   
            }
        else{
          header("location: take/index.php");
          }
}}
	else{
	?> <script>
        alert('Incorret Access Code');
       </script>"; <?php
      	echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        exit();
}
	
} ?>



