<?php 
include("../../../connections/db-connect.php");
$user_id = $_SESSION['user_id'];
$course_id = $_SESSION['course_id'];
$term_id = $_SESSION['schoolterm'];

$date = date("y-m-d H:i");
//CREATE
if(isset($_REQUEST['btnAddQuiz'])){

print_r($_REQUEST);
$topic_id = $_REQUEST['topic_id'];
$description = $_REQUEST['description'];
$instruct_mc = $_REQUEST['instruct_mc'];
$instruct_id = $_REQUEST['instruct_id'];
$instruct_es = $_REQUEST['instruct_es'];

$total_mc = $_REQUEST['total_mc'];
$total_id = $_REQUEST['total_id'];
$total_es = $_REQUEST['total_es'];

$quiz_date = $_REQUEST['quiz_date'];
$time_start = $_REQUEST['time_start'];
$time_end = $_REQUEST['time_end'];
$time_limit = $_REQUEST['time_limit'];

$stmt = "INSERT INTO quizzes (course_id, topic_id, term_id, quiz_date, description, time_start, time_end, time_limit, total_mc, total_id, total_es, instruct_mc, instruct_id, instruct_es, date_created) VALUES ('$course_id', '$topic_id', '$term_id', '$quiz_date', '$description', '$time_start', '$time_end', '$time_limit', '$total_mc', '$total_id', '$total_es', '$instruct_mc', '$instruct_id', '$instruct_es', '$date')";
 if($conn->exec($stmt)==true){
  header("location: index.php");
  }

}








// ADDING OF QUESTIONS 
if(isset($_REQUEST['btnAddMc'])){

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

$id =  $_SESSION['id'];

$stmt = "INSERT INTO quiz_mc (quiz_id, description, answer, option_a, option_b, option_c, option_d) 
VALUES ('$id','$description','$answer','$option_a','$option_b','$option_c','$option_d') ";
     	if($conn->exec($stmt)==true){
    header("location: quiz-view.php?id=$id");
    }
}

if(isset($_REQUEST['btnAddId'])){

$description = $_REQUEST['description'];
$answer = $_REQUEST['answer'];


$id =  $_SESSION['id'];

$stmt = "INSERT INTO quiz_id (quiz_id, description, answer) 
VALUES ('$id','$description','$answer')";
      if($conn->exec($stmt)==true){
    header("location: quiz-view.php?id=$id");
    }
}


if(isset($_REQUEST['btnAddEs'])){

$description = $_REQUEST['description'];
$points = $_REQUEST['points'];


$id =  $_SESSION['id'];

$stmt = "INSERT INTO quiz_es (quiz_id, description, points) 
VALUES ('$id','$description','$points')";
      if($conn->exec($stmt)==true){
    header("location: quiz-view.php?id=$id");
    }
}






//UPDATING OF QUESTIONS
if(isset($_REQUEST['btnUpdateScore'])){
$assignment_id =  $_SESSION['id'];
$user_id = $_REQUEST['id'];
$score = $_REQUEST['score'];

$stmt = "UPDATE studentdata_assignments
SET score = '$score', status = '1'
  where user_id = '$user_id' and assignment_id = '$assignment_id' ";
      if($conn->exec($stmt)==true){
        header("location: assignment-view.php?id=$assignment_id");
        }

}

?>