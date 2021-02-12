<?php 
include("../../../../connections/db-connect.php");
$user_id = $_SESSION['user_id'];

$id = $_SESSION['test_id'] = $_REQUEST['id'];
  $stmt =  $conn->prepare("SELECT * FROM tests where user_id = '$user_id' ");
  $stmt->execute();
  while($row = $stmt->fetch()){
    $description = $row['test_desc'];
    $total_questions =$_SESSION['total_questions']= $row['total_questions'];
    $difficulty_id = $row['difficulty_id'];
    $passing_rate =$_SESSION['passing_rate']=  $row['passing_rate'];
    $time_limit = $row['time_limit'];
    
  

  }




 $stmt =  $conn->prepare("SELECT * FROM questions where test_id = '$test_id '  ");
 $stmt->execute();

while($row = $stmt->fetch()){
	$q_id = $row['q_id'];
	$stmt1 = "INSERT INTO studentdata_tests (test_id, q_id, student_id) 
	VALUES ('$id', '$q_id', '$user_id')";
$conn->exec($stmt1);
}




$_SESSION['duration'] = $time_limit;

$_SESSION['start_time'] = date("Y-m-d H:i:s");

$end_time = date("Y-m-d H:i:s", strtotime('+'.$_SESSION['duration'].'minutes', strtotime('+'.$_SESSION['start_time'])));

$_SESSION['end_time'] = $end_time;



?>

 <script type="text/javascript">
window.location="testpaper-one.php";
</script> 