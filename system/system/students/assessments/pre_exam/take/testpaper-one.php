<?php 
include("../../../../connections/db-connect.php");


$test_id = $_SESSION['test_id'];
$user_id = $_SESSION['user_id'];




 $total_questions =$_SESSION['total_questions'];
  $stmt =  $conn->prepare("SELECT * FROM studentdata_exams as ST, exam_questions as 
  	Q where ST.test_id = '$test_id' and ST.student_id = '$user_id' and Q.q_id = ST.q_id limit $total_questions");
  $stmt->execute();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<div class="container-timer">	
		<div class="timer" id="response">	
		</div>
</div>


	<div class="container">	
	<form action="" method="POST">
				<div class="test">
<img src="sa1.png " alt="Italian Trulli" style="width:100%;"> 

<h3> Name:     <?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ?> </h3>
 

<?php 
$c = 0;
$numbering = 1;
while($row = $stmt->fetch()){
$_SESSION['q'.$c] = $row['q_id'];
$c++;
?>

<p><?php echo $numbering.". ".$row['question_desc'];?></p>
<p>a)<input type="radio" value="<?php echo $row['option_a'];?>" name="a<?php echo $row['q_id'];?>"><?php echo $row['option_a'];?></p>
<p>b)<input type="radio" value="<?php echo $row['option_b'];?>" name="a<?php echo $row['q_id'];?>"><?php echo $row['option_b'];?></p>
<p>c)<input type="radio" value="<?php echo $row['option_c'];?>" name="a<?php echo $row['q_id'];?>"><?php echo $row['option_c'];?></p>
<p>d)<input type="radio" value="<?php echo $row['option_d'];?>" name="a<?php echo $row['q_id'];?>"><?php echo $row['option_d'];?></p>


<?php 
$numbering++;}?>



<div class="container-button">


			<input type="submit" name="btnSubmit" value="SUBMIT" class="button1">

</div>
</form>
				
	</div>
	
</body>
</html>





<script type="text/javascript">

setInterval(function()
{
var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "response.php", false);
xmlhttp.send(null);
document.getElementById("response").innerHTML = xmlhttp.responseText;
},1000);

</script>

<?php 



if(isset($_REQUEST['btnSubmit'])){

for($i = 0; $i < $c; $i++){
$q_id = $_SESSION['q'.$i];
$student_answer = $_REQUEST['a'.$q_id];


$question_retrieve = $conn->prepare("SELECT * FROM exam_questions 
	WHERE q_id = '$q_id' and correct_answer = '$student_answer' ");
$question_retrieve->execute();
$score = 0;
if($question_retrieve->rowCount() > 0){
	$score = 1;
}

$testpaper_update = $conn->prepare("UPDATE studentdata_exams
	SET answer = '$student_answer', status = '$score'
	where test_id = '$id'   and q_id = '$q_id' ");
$testpaper_update->execute();

}
?> 
<script type="text/javascript">
window.location="testpaper-result.php";
</script>
<?php

}?>