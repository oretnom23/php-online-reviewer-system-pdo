<?php 

include("../../../../connections/db-connect.php");
$test_id = $_SESSION['test_id'];
$user_id = $_SESSION['user_id'];

$total_questions =$_SESSION['total_questions'];
$passing_rate =$_SESSION['passing_rate'];


  $stmt =  $conn->prepare("SELECT * FROM studentdata_exams as ST, exam_questions as Q where ST.test_id = '$test_id' and ST.student_id = '$user_id' and Q.q_id = ST.q_id limit $total_questions");
  $stmt->execute();



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>

<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<body>
<div class="container-timer">	
		<div class="timer" id="response">	
		</div>
</div>
	<div class="container">	
	<form action="" method="POST">
				<div class="test">

<table>
  <tr>
    <th>Questions</th>
    <th>Answers</th>
    <th>Remarks</th>
  </tr>
<?php 
$mc_score = 0;
while($row = $stmt->fetch()){ 
?>
  <tr>
    <td><?php echo $row['question_desc'];?></td>
    <td><?php echo $row['answer'];?></td>
    <?php if($row['status']=='1'){
  $mc_score++; ?>
  <td><img  src="../../../../img/check.jpg" width="50px" alt="Photo"> </td>
    <?php } 
    else{ ?>
  <td><img  src="../../../../img/wrong.jpg" width="50px" alt="Photo"> </td>
     <?php  }?>
  </tr>
<?php
}
?>

	<th><?php echo "Score:"; ?></td>
	<th><?php echo $mc_score; ?></td>
  <?php 
  $remark = $total_questions*$passing_rate/100;
$percentage = $mc_score/$total_questions;
$percentage = $percentage * 100;
  ?>
  <td> <?php if($mc_score >= $remark){
    echo $remarks = "PASS";
    } 
    else{
      echo $remarks = "FAILED";
    }

    ?></td>
 </table>

</div>



<?php 
$date = date("M, d Y");
$stmt1 = "INSERT INTO studentresult_exams (student_id, test_id, score, percentage, remarks, date_taken) 
  VALUES ('$user_id', '$test_id', '$mc_score', '$percentage', '$remarks', '$date')";
$conn->exec($stmt1);


?>

<div class="container-button">
		<div class="button-cell">
			
		</div>
		<div class="button-cell">
			
		</div><div class="button-cell">
			<a href="../index.php"><input type="button" name="btn-Submit" value="DONE" class="button1"></a>
		</div>
</div>
</form>
				
	</div>
	
</body>
</html>

