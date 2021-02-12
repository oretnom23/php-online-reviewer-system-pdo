<?php 
include("../../../connections/db-connect.php");
$user_id = $_SESSION['user_id'];
$id =  $_SESSION['exam_id'];
if(isset($_REQUEST['btnAddTest'])){

$test_desc = $_REQUEST['test_desc'];
$total_questions = $_REQUEST['total_questions'];
$passing_rate = $_REQUEST['passing_rate'];
$time_limit = $_REQUEST['time_limit'];
$accesscode = $_REQUEST['access_code'];
$category_exam = $_REQUEST['category_exam'];
$difficulty_id = $_REQUEST['difficulty_id'];



$stmt = "INSERT INTO pre_exam ( user_id, total_questions, passing_rate, time_limit, access_code, test_desc, category_exam, difficulty_id ) 
                  VALUES ('$user_id','$total_questions','$passing_rate','$time_limit','$accesscode','$test_desc', '$category_exam','$difficulty_id')";
 if($conn->exec($stmt)==true){
  header("location: index.php");
  }

}

if(isset($_REQUEST['btnAddQuestion'])){

$category_exam = $_REQUEST['category_exam'];

$description = $_REQUEST['description'];
$option_a = $_REQUEST['option_a'];
$option_b = $_REQUEST['option_b'];
$option_c = $_REQUEST['option_c'];
$option_d = $_REQUEST['option_d'];
$answer = $_REQUEST['answer'];

if($answer == 'A'){
  $answer = $option_a;
}
elseif($answer == 'B'){
  $answer = $option_b;
}
elseif($answer == 'C'){
  $answer = $option_c;
}
elseif($answer == 'D'){
  $answer = $option_d;
}

$stmt = "INSERT INTO exam_questions (test_id, question_desc, option_a, option_b, option_c, option_d, correct_answer, user_id) 
VALUES ('$id','$description','$option_a','$option_b','$option_c','$option_d','$answer','$user_id') ";
     	if($conn->exec($stmt)==true){
    header("location: questions-view.php?id=$id");








    }
}

if(isset($_REQUEST['btnUpdateQuestion'])){
$q_id = $_SESSION['question_id'];
$description = $_REQUEST['description'];
$option_a = $_REQUEST['option_a'];
$option_b = $_REQUEST['option_b'];
$option_c = $_REQUEST['option_c'];
$option_d = $_REQUEST['option_d'];
$answer = $_REQUEST['answer'];

if($answer == 'A'){
  $answer = $option_a;
}
elseif($answer == 'B'){
  $answer = $option_b;
}
elseif($answer == 'C'){
  $answer = $option_c;
}
elseif($answer == 'D'){
  $answer = $option_d;
}





$stmt = "UPDATE pre_questions SET question_desc = '$description',
  option_a = '$option_a',
  option_b = '$option_b',
  option_c = '$option_c',
 
  option_d = '$option_d'
where q_id = '$q_id'
 ";
      if($conn->exec($stmt)==true){
    header("location: questions-view.php?id=$id");
    }
}


if(isset($_REQUEST['btnUpdateExam'])){
$access_code = $_REQUEST['access_code'];
$description = $_REQUEST['description'];
$passing_rate = $_REQUEST['passing_rate'];
$total_questions = $_REQUEST['total_questions'];
$time_limit = $_REQUEST['time_limit'];
$test_id = $_SESSION['test_id'];

$stmt = "UPDATE pre_exam SET access_code = '$access_code',
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