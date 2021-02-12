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
	case 'update':
		# code...
		doUpdateTest();
		break;
	default:
		# code...
		break;
}


function doRemoveQuestion(){
include("../../../connections/db-connect.php");

	$id = $_GET['id'];
	$test_id = $_GET['testid'];

	$sql = "DELETE FROM tblprequestion WHERE q_id='$id'"; 
	if($conn->exec($sql)==true){
	  header("location: questions-view.php?id=".$test_id);
	}

}

function doAddTest(){
include("../../../connections/db-connect.php"); 

	$user_id = $_SESSION['user_id'];
	// $id =  $_SESSION['exam_id'];

	$test_subject = $_REQUEST['test_subject'];
	//$description = $_REQUEST['description'];
	$total_questions = $_REQUEST['total_questions'];
	$passing_rate = $_REQUEST['passing_rate'];
	$time_limit = $_REQUEST['time_limit'];
	$time_limit = $_REQUEST['time_limit'];
	$test_subject = $_REQUEST['test_subject'];

	$test_desc = $_REQUEST['test_desc'];
	$difficulty_id = $_REQUEST['difficulty_id'];

	//$accesscode = $_REQUEST['access_code'];
	//$course_subject = $_REQUEST['course_subject'];


	// $stmt = "INSERT INTO tests ( user_id, total_questions, passing_rate, time_limit,  test_desc, test_subject, difficulty_id) VALUES ('$user_id','$total_questions','$passing_rate','$time_limit', '$test_desc', '$test_subject', '$difficulty_id')";
	// if($conn->exec($stmt)==true){

		$test_id  = $_REQUEST['test_id']; 
		if(empty($test_id)){
			$ins = "INSERT INTO tests ( user_id, total_questions, passing_rate, time_limit,  test_desc, test_subject, difficulty_id) VALUES ('$user_id','$total_questions','$passing_rate','$time_limit', '$test_desc', '$test_subject', '$difficulty_id')";
			$stmt = $conn->prepare($ins);
			$stmt->execute();
			$test_id = $conn->lastInsertId();
		}


		$sql ="SELECT * FROM `questions` WHERE `user_id`='$user_id' AND  `difficulty_id`='$difficulty_id' AND `subject` ='$test_subject' AND `Course`='$test_desc' ORDER BY RAND()";
		 
		 $stmt = $conn->prepare($sql);
		 $stmt->execute();  
		 while($row = $stmt->fetch()){
		 	$q_id = $row['q_id']; 

		 	$sql = "SELECT * FROM `tblprequestion` WHERE `q_id`='$q_id' AND `test_id`='$test_id'";
			$stmt = $conn->prepare($sql);
			$stmt->execute();  
			$maxrow = $stmt->rowCount();

			if ($maxrow < 1) {
				# code...
				 $sql ="INSERT INTO `tblprequestion` (`q_id`, `test_id`) VALUES ('$q_id','$test_id')";
			     $conn->exec($sql);
			}

					
		 }

		$id = $_POST['q_id'];
		$key = count($id);

		if ($key > $total_questions) {
			# code...
			 echo '<script>alert("Questions already rich the limit of the test.")</script>';
      		 echo '<script>window.location="index.php"</script>';
		}else{
			for($i=0;$i<$key;$i++){

				$sql = "SELECT * FROM `tblprequestion` WHERE `q_id`='$id[$i]' AND `test_id`='$test_id'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();  
				$maxrow = $stmt->rowCount();

				if ($maxrow < 1) {
				# code...
					$sql ="INSERT INTO `tblprequestion` (`q_id`, `test_id`) VALUES ('$id[$i]','$test_id')";
					$conn->exec($sql);

				}

			} 

			//  $sql ="INSERT INTO `tblprequestion` (`q_id`, `test_id`) VALUES ('$id[$i]','$test_id')";
			//  $conn->exec($sql);

			// $user = New User();
			// $user->delete($id[$i]);
		}
	header("location: questions-view.php?id=$test_id");
	// }

}

function doUpdateTest(){
include("../../../connections/db-connect.php"); 

	$user_id = $_SESSION['user_id'];
	$id =  $_POST['test_id'];

	$test_subject = $_REQUEST['test_subject']; 
	$total_questions = $_REQUEST['total_questions'];
	$passing_rate = $_REQUEST['passing_rate'];
	$time_limit = $_REQUEST['time_limit'];
	$time_limit = $_REQUEST['time_limit'];
	$test_subject = $_REQUEST['test_subject']; 
	$test_desc = $_REQUEST['test_desc'];
	// $difficulty_id = $_REQUEST['difficulty_id'];
 

	$stmt = "UPDATE `tests` SET	`total_questions`='$total_questions',
								`passing_rate`='$passing_rate',
								`time_limit`='$time_limit', 
								`test_desc`= '$test_desc',
								`test_subject`='$test_desc' 
								 WHERE `test_id`='$id'";
	if($conn->exec($stmt)==true){
		
  
		$sql ="SELECT * FROM `questions` WHERE `user_id`='$user_id' AND  `difficulty_id`='$difficulty_id' AND `subject` ='$test_subject' AND `Course`='$test_desc' ORDER BY RAND()";
		 
		 $stmt = $conn->prepare($sql);
		 $stmt->execute();  
		 while($row = $stmt->fetch()){
		 	$q_id = $row['q_id']; 

		 	$sql = "SELECT * FROM `tblprequestion` WHERE `q_id`='$q_id' AND `test_id`='$id'";
			$stmt = $conn->prepare($sql);
			$stmt->execute();  
			$maxrow = $stmt->rowCount();

			if ($maxrow < 1) {
				# code...
				 $sql ="INSERT INTO `tblprequestion` (`q_id`, `test_id`) VALUES ('$q_id','$id')";
			     $conn->exec($sql);
			}

					
		 }

		// $id = $_POST['q_id'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){


		// 	 $sql ="INSERT INTO `tblprequestion` (`q_id`, `test_id`) VALUES ('$id[$i]','$test_id')";
		// 	 $conn->exec($sql);

		// 	// $user = New User();
		// 	// $user->delete($id[$i]);
		// }
	header("location: index.php");
	}

}

?>