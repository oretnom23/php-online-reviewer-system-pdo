<?php 
$action = isset($_GET['action']) ? $_GET['action'] : "";

switch ($action) {
  case 'remove':
    # code...
    doRemoveQuestion();
    break;
  case 'addtest':
    # code...
    doAddTest();
    break;
  case 'updatetest':
    # code...
    doUpdateTest();
    break;
  
  default:
    # code...
    break;
}

function doAddTest(){
  include("../../../connections/db-connect.php");
  $user_id = $_SESSION['user_id'];
  $id =  $_SESSION['exam_id'];
  if(isset($_REQUEST['btnAddTest'])){

      $test_desc = $_REQUEST['test_desc'];
      $total_questions = $_REQUEST['total_questions'];
      $passing_rate = $_REQUEST['passing_rate'];
      $time_limit = $_REQUEST['time_limit'];
      $accesscode = $_REQUEST['access_code'];
      $category_exam  = $_REQUEST['category_exam'];

      $date_time  = $_REQUEST['date_time'];

      $date_expired = $_REQUEST['date_expired'];

      $stmt = "INSERT INTO examproper ( user_id, total_questions, passing_rate, time_limit, access_code, test_desc, category_exam,date_time,date_expired ) 
        VALUES ('$user_id','$total_questions','$passing_rate','$time_limit','$accesscode','$test_desc', '$category_exam','$date_time','$date_expired' )";
      if($conn->exec($stmt)==true){

          $id = $_POST['q_id'];
    $key = count($id);

    if ($key > $total_questions) {
      # code...
       echo '<script>alert("Questions already rich the limit of the test.")</script>';
           echo '<script>window.location="index.php"</script>';
    }else{
      for($i=0;$i<$key;$i++){

        $sql = "SELECT * FROM `tblexamquestion` WHERE  `q_id`='$id[$i]' AND `access_code`='$accesscode'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();  
        $maxrow = $stmt->rowCount();

        if ($maxrow < 1) {
        # code...
          $sql ="INSERT INTO `tblexamquestion` (`q_id`, `access_code`) VALUES ('$id[$i]','$accesscode')";
          $conn->exec($sql);

        }

      } 

      
    }
      header("location: index.php");
      }

  }

}

function doUpdateTest(){
  include("../../../connections/db-connect.php"); 
  if(isset($_REQUEST['btnUpdateExam'])){
      $access_code = $_REQUEST['access_code'];
      $description = $_REQUEST['description'];
      $passing_rate = $_REQUEST['passing_rate'];
      $total_questions = $_REQUEST['total_questions'];
      $time_limit = $_REQUEST['time_limit'];
      $test_id = $_SESSION['test_id'];

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

      else {

      header("location: index.php");

      }

  }

}

function doRemoveQuestion(){
  include("../../../connections/db-connect.php"); 
  $q_id = $_GET['id'];
  $accesscode = $_GET['code'];
  $sql ="DELETE FROM `tblexamquestion` WHERE `q_id`=".$q_id;
  if($conn->exec($sql)==true){
      header("location: questions-view.php?id=".$accesscode);
  }
}

// if(isset($_REQUEST['btnAddQuestion'])){

// $description = $_REQUEST['description'];
// $option_a = $_REQUEST['option_a'];
// $option_b = $_REQUEST['option_b'];
// $option_c = $_REQUEST['option_c'];
// $option_d = $_REQUEST['option_d'];
// $answer = $_REQUEST['correct_answer'];

// if($answer == 'A'){
//   $answer = $option_a;
// }
// elseif($answer == 'B'){
//   $answer = $option_b;
// }
// elseif($answer == 'C'){
//   $answer = $option_c;
// }
// elseif($answer == 'D'){
//   $answer = $option_d;
// }

// $stmt = "INSERT INTO exam_questions (test_id, question_desc, option_a, option_b, option_c, option_d, correct_answer, user_id) 
// VALUES ('$id','$description','$option_a','$option_b','$option_c','$option_d','$answer','$user_id') ";
//       if($conn->exec($stmt)==true){
//     header("location: questions-view.php?id=$id");
//     }
// }

// if(isset($_REQUEST['btnUpdateQuestion'])){
// $q_id = $_SESSION['question_id'];
// $description = $_REQUEST['description'];
// $option_a = $_REQUEST['option_a'];
// $option_b = $_REQUEST['option_b'];
// $option_c = $_REQUEST['option_c'];
// $option_d = $_REQUEST['option_d'];
// $answer = $_REQUEST['correct_answer'];

// if($answer == 'A'){
//   $answer = $option_a;
// }
// elseif($answer == 'B'){
//   $answer = $option_b;
// }
// elseif($answer == 'C'){
//   $answer = $option_c;
// }
// elseif($answer == 'D'){
//   $answer = $option_d;
// }

// $stmt = "UPDATE exam_questions SET question_desc = '$description',
//   option_a = '$option_a',
//   option_b = '$option_b',
//   option_c = '$option_c',
//   option_d = '$option_d'
// where q_id = '$q_id'
//  ";
//       if($conn->exec($stmt)==true){
//     header("location: questions-view.php?id=$id");
//     }
// }





?>