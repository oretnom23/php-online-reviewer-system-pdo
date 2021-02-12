<?php 
$action = isset($_GET['action']) ? $_GET['action'] : "";

switch ($action) {
   case 'add':
     # code...
     doAddQuestion();
     break;
   case 'update':
     # code...
    doUpdateQuestion();
     break;
   
  case 'pretest':
     # code...
    doPreTest();
     break;
   
  case 'properexam':
     # code...
    doProperExam();
     break;

  case 'remove':
    doRemoved();
    break;
    default:
     # code...
     break;
 } 


function doAddQuestion(){
  include("../../../connections/db-connect.php");
  $user_id = $_SESSION['user_id'];  

  // ADDING OF QUESTIONS 
    if(isset($_REQUEST['btnAddQuestion'])){

    $description = $_REQUEST['description'];
    $option_a = $_REQUEST['option_a'];
    $option_b = $_REQUEST['option_b'];
    $option_c = $_REQUEST['option_c'];
    $option_d = $_REQUEST['option_d'];
    $difficulty_id = $_REQUEST['difficulty_id'];
    $subject = $_REQUEST['test_subject'];
    $course = $_REQUEST['test_desc'];
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

      $filename = UploadImage("personImage");
      $personImage = "files/". $filename ;

    $stmt = "INSERT INTO questions (difficulty_id,question_desc, option_a, option_b, option_c, option_d, correct_answer, user_id,attachment_file,`subject`, `Course`) 
    VALUES ('$difficulty_id','$description','$option_a','$option_b','$option_c','$option_d','$answer','$user_id','$personImage','$subject','$course') ";
          if($conn->exec($stmt)==true){
        header("location: index.php");
        }
    }

}

function doUpdateQuestion(){
  include("../../../connections/db-connect.php");
  $user_id = $_SESSION['user_id'];   

       $q_id = $_POST['question_id'];
       $description = $_POST['description'];
       $option_a = $_POST['option_a'];
       $option_b = $_POST['option_b'];
       $option_c = $_POST['option_c'];
       $option_d = $_POST['option_d'];
       $difficulty_id = $_POST['difficulty_id'];
      $subject = $_POST['test_subject'];
      $course = $_POST['test_desc'];
       $answer = $_POST['answer'];

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
      $filename = UploadImage("personImage");
      $personImage = "files/". $filename ;
      
//   echo $personImage;

if($personImage=="files/"){
      $stmt = "UPDATE questions SET `question_desc` = '$description',
                `option_a` = '$option_a',
                `option_b` = '$option_b',
                `option_c` = '$option_c',
                `option_d` = '$option_d',
                `difficulty_id` = '$difficulty_id',
                `correct_answer` = '$answer',
                `Course`='$course',
                `subject`='$subject'
                WHERE `q_id` = '$q_id'";
}else{
      $stmt = "UPDATE questions SET `question_desc` = '$description',
                `option_a` = '$option_a',
                `option_b` = '$option_b',
                `option_c` = '$option_c',
                `option_d` = '$option_d',
                `difficulty_id` = '$difficulty_id',
                `correct_answer` = '$answer',
                `attachment_file`='$pesonImage',
                `Course`='$course',
                `subject`='$subject'
                WHERE `q_id` = '$q_id'";
}
   
   

        // $stmt = "UPDATE questions SET `question_desc` = '$description',
        //         `option_a` = '$option_a',
        //         `option_b` = '$option_b',
        //         `option_c` = '$option_c',
        //         `option_d` = '$option_d',
        //         `correct_answer` = '$answer'
        //         WHERE `q_id` = '$q_id'";
        $result  = $conn->exec($stmt);
        if($result){
          echo '<script>alert("Questions already updated!")</script>';
          echo '<script>window.location="index.php"</script>';
        } else{
          echo '<script>alert("Questions already updated!")</script>';
          echo '<script>window.location="index.php"</script>';
        }

}

function doPreTest(){
  include("../../../connections/db-connect.php");
  $user_id = $_SESSION['user_id'];   
  $q_id = $_POST['q_id'];
  $test_id = $_POST['test_id'];

  $sql ="SELECT count(*) as 'total' FROM `questions` q,`tblprequestion` p WHERE q.`q_id`=p.`q_id` AND p.`test_id`='$test_id'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();  
  $row = $stmt->fetch();

  $num_test1 = $row['total'];


  $stmt = $conn->prepare("SELECT * FROM  tests WHERE test_id='$test_id' AND user_id = '$user_id'  ");
  $stmt->execute();   
  $row = $stmt->fetch();

  $num_test2 = $row['total_questions'];

  if ($num_test1==$num_test2) {
    # code...
      echo '<script>alert("Questions already rich the limit of the test.")</script>';
      echo '<script>window.location="index.php"</script>';
  }else{
      $sql ="INSERT INTO `tblprequestion` (`q_id`, `test_id`) VALUES ('$q_id','$test_id')";
      if($conn->exec($sql)==true){
        echo '<script>alert("Questions already added in the pretest")</script>';
        echo '<script>window.location="index.php"</script>';
          // header("location: index.php");
      } 

  }
 
}


function doProperExam(){
  include("../../../connections/db-connect.php");
  $user_id = $_SESSION['user_id'];   
  $q_id = $_POST['q_id'];
  $access_code = $_POST['access_code'];

  $sql ="SELECT count(*) as 'total' FROM `questions` q,`tblexamquestion` e WHERE q.`q_id`=e.`q_id` AND access_code='$access_code'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();  
  $row = $stmt->fetch();

  $num_test1 = $row['total'];


  $stmt = $conn->prepare("SELECT * FROM  examproper WHERE access_code='$access_code' AND user_id = '$user_id'  ");
  $stmt->execute();   
  $row = $stmt->fetch();

  $num_test2 = $row['total_questions'];
  
  if ($num_test1==$num_test2) {
    # code...
      echo '<script>alert("Questions already rich the limit of the test.")</script>';
      echo '<script>window.location="index.php"</script>';
  }else{

    $sql ="INSERT INTO `tblexamquestion` (`q_id`, `access_code`) VALUES ('$q_id','$access_code')";
    if($conn->exec($sql)==true){
      echo '<script>alert("Questions already added in the proper exam.")</script>';
      echo '<script>window.location="index.php"</script>';
        // header("location: index.php");
    } 
  }
}


function doRemoved(){
  include("../../../connections/db-connect.php");
  $q_id = $_GET['id']; 

    $sql ="DELETE  FROM `questions` WHERE `q_id`='$q_id'";
  if($conn->exec($sql)==true){
   
    $sql ="DELETE  FROM `tblprequestion` WHERE `q_id`='$q_id'";
    $conn->exec($sql);

    echo '<script>alert("Questions already deleted!")</script>';
    echo '<script>window.location="index.php"</script>';
      // header("location: index.php");
  } 
 
}

// $filename = UploadImage("graveImage");
//             $graveImage = "files/". $filename ;


  function UploadImage($imgname=""){
      $target_dir = "files/";
        $target_file = $target_dir  . basename($_FILES[$imgname]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
      
      if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
        || $imageFileType != "gif" || $imageFileType != "docs" || $imageFileType != "mp4") {
         if (move_uploaded_file($_FILES[$imgname]["tmp_name"], $target_file)) {
          return   basename($_FILES[$imgname]["name"]);
        }else{
        //   echo "Error Uploading File";
        //   exit;
        }
      }else{
        //   echo "File Not Supported";
        //   exit;
   }
}

?>