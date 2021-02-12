<?php 
include("../../../../connections/db-connect.php");
include("function.php");
if (isset($_SESSION['gcCart'])) {
  # code...
  unset($_SESSION['gcCart']);
}
$user_id = $_SESSION['user_id']; 
$id = $_SESSION['test_id'];
$access_code = $_SESSION['access_code'];

  $stmt =  $conn->prepare("SELECT * FROM examproper where access_code = '$access_code' ");
  $stmt->execute();
  while($row = $stmt->fetch()){
    $description = $row['test_desc'];
    $total_questions =$_SESSION['total_questions']= $row['total_questions'];
    // $difficulty_id = $row['difficulty_id'];
    $passing_rate =$_SESSION['passing_rate']=  $row['passing_rate'];
    $time_limit = $row['time_limit'];
    $teacher_id = $row['user_id'];
  $date_time = $row['date_time'];

  }


// $stmt =  $conn->prepare("SELECT * FROM exam_questions WHERE user_id = '$teacher_id ' limit $total_questions");
 //$stmt =  $conn->prepare("SELECT * FROM exam_questions WHERE test_id = '$teacher_id ' limit $total_questions");
// $stmt =  $conn->prepare("SELECT * FROM exam_questions WHERE test_id = '$id ' limit $total_questions");
$stmt =  $conn->prepare("SELECT * FROM tblexamquestion WHERE access_code = '$access_code' ORDER BY  RAND()");
 $stmt->execute();

while($row = $stmt->fetch()){
$q_id = $row['q_id'];
addtocart($q_id,"",1,$access_code);
// addtocart($q_id,$answer,$q,$access_code)

// 	$q_id = $row['q_id'];
// 	$stmt1 = "INSERT INTO studentdata_exams (test_id, q_id, student_id) 
// 	VALUES ('$id', '$q_id', '$user_id')";
// $conn->exec($stmt1);
}




$_SESSION['duration'] = $time_limit;

$_SESSION['start_time'] = date("Y-m-d H:i:s");

$end_time = date("Y-m-d H:i:s", strtotime('+'.$_SESSION['duration'].'minutes', strtotime('+'.$_SESSION['start_time'])));

$_SESSION['end_time'] = $end_time;



?>

 <script type="text/javascript">
// window.location="testpaper-one.php";
 window.location="testpaper.php";
</script> 