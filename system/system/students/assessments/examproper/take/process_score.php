<?php
include("../../../../connections/db-connect.php");
include("function.php");
 if (!empty($_SESSION['gcCart'])){   
 	$test_id =$_SESSION['test_id'];
 	$user_id = $_SESSION['user_id'];
	$access_code = $_SESSION['access_code'];

	$count_cart = count($_SESSION['gcCart']); 
	for ($i=0; $i < $count_cart  ; $i++) { 
		$q_id = $_SESSION['gcCart'][$i]['q_id'];
		$student_answer= $_SESSION['gcCart'][$i]['answer'];
		 

		$question_retrieve = $conn->prepare("SELECT * FROM questions 
		WHERE q_id = '$q_id' and correct_answer = '$student_answer' ");
		$question_retrieve->execute();

		$score = 0;
		if($question_retrieve->rowCount() > 0){
			 $score = 1;
		}else{
			$score = 0;
		}

		// echo $score.'<br/>';

		$sql = "INSERT INTO `studentdata_exams` (`test_id`, `q_id`, `answer`, `status`, `student_id`,`access_code`) VALUES ('$test_id', '$q_id', '$student_answer','{$score}','{$user_id}','{$access_code}')"; 
		$result = $conn->prepare($sql);
		$result->execute();

	}
}


	
?>
<script type="text/javascript">
window.location="testpaper-result.php";
</script>