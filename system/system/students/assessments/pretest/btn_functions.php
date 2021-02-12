<?php 
include("../../../connections/db-connect.php");
$user_id = $_SESSION['user_id'];
//CREATE
if(isset($_REQUEST['btnTakeTest'])){


$access_code = $_REQUEST['access_code'];

  $stmt =  $conn->prepare("SELECT * FROM tests WHERE access_code ='$access_code' ");
  $stmt->execute();


if($stmt->rowCount() > 0){

  while($row = $stmt->fetch()){
 $test_id = $_SESSION['test_id']= $row['test_id'];
  $stmt1 =  $conn->prepare("SELECT * FROM studentdata_exams WHERE test_id ='$test_id' and student_id ='$user_id' ");
  $stmt1->execute();
        if($stmt1->rowCount() > 0){
          ?> <script>
        alert('Exam Already Taken');
       </script>"; <?php
        echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        exit();
            }
        else{
          header("location: take/index.php");
          }
}}
  else{
  ?> <script>
        alert('Try Again');
       </script>"; <?php
        echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        exit();
}
  
} ?>



