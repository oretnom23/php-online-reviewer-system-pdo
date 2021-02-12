<?php 
include("../../../../connections/db-connect.php"); 
include("function.php");
if (isset($_SESSION['gcCart'])) {
  # code...
    unset($_SESSION['gcCart']);
}
$user_id = $_SESSION['user_id'];

$id = $_SESSION['test_id'] = $_REQUEST['id'];
  $stmt =  $conn->prepare("SELECT * FROM tests where test_id = '$id' ");
  $stmt->execute();
  while($row = $stmt->fetch()){
    $description = $row['test_desc'];
    $total_questions =$_SESSION['total_questions']= $row['total_questions'];
    $difficulty_id = $row['difficulty_id'];
    $passing_rate =$_SESSION['passing_rate']=  $row['passing_rate'];
    $time_limit = $row['time_limit'];
    $teacher_id = $row['user_id'];
  }


 $stmt =  $conn->prepare("SELECT q.* FROM  `tblprequestion` tp inner join questions q on q.q_id = tp.q_id WHERE tp.`test_id` = '$id' ORDER BY  RAND()");
 
 $stmt->execute();


    while  ($row = $stmt->fetch()){
 $q_id = $row['q_id'];
	// $stmt1 = "INSERT INTO studentdata_tests (test_id, q_id, student_id) 
	// VALUES ('$id', '$q_id', '$user_id')";
  
// $conn->exec($stmt1);

  // `q_id`, `question_desc`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `attachment_file`
 // $stmt2 =  $conn->prepare("SELECT * FROM  `questions`  WHERE `test_id` = '$id'");
 // $stmt2->execute();
  $answer="";
  $q=1;
  $a = $row['option_a'];
  $b =  $row['option_b'];
  $c =  $row['option_c'];
  $d =  $row['option_d'];
  $correct_answer =  $row['correct_answer'];
  $attachment =  $row['attachment_file'];

  addtocart($q_id,$answer,$q);
 // addtocart($q_id,$answer,$a,$b,$c,$d,$correct_answer,$attachment);

  // addtocart($pid,$answer,$a,$b,$c,$d,$correct_answer,$attachment)

}



$_SESSION['duration'] = $time_limit;

$_SESSION['start_time'] = date("Y-m-d H:i:s");

$end_time = date("Y-m-d H:i:s", strtotime('+'.$_SESSION['duration'].'minutes', strtotime('+'.$_SESSION['start_time'])));

$_SESSION['end_time'] = $end_time;

// var_dump($_SESSION['gcCart']);
?>

 <script type="text/javascript">
window.location="testpaper.php";
</script> 