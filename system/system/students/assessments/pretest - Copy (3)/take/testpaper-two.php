<?php 
include("../../../connections/db-connect.php");
$activity_id = $_SESSION['activity_id'];
$user_id = $_SESSION['user_id'];

$questions_retrieve = $conn->prepare("SELECT * FROM  studentdata_presetactivity_id as SDPA, bnk_identification as BNK  where SDPA.activity_id = '$activity_id'   and SDPA.user_id = '$user_id' and BNK.bnkid_id = SDPA.bnkid_id");
$questions_retrieve->execute();


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
<?php 
$c = 0;
while($row = $questions_retrieve->fetch()){ 
$_SESSION['q'.$c] = $row['bnkid_id'];
$c++;
?>
					<p><?php echo $row['question_desc'];?></p>
					<p>
					<p><input type="text" name="a<?php echo $row['bnkid_id'];?>"></p>
			
<?php } ?>


				</div>

<div class="container-button">
		<div class="button-cell">
			
		</div>
		<div class="button-cell">
			
		</div><div class="button-cell">
			<input type="submit" name="btn-Submit" value="SUBMIT" class="button1">
		</div>
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



if(isset($_REQUEST['btn-Submit'])){

for($i = 0; $i < $c; $i++){
$bnkid_id = $_SESSION['q'.$i];
$student_answer = $_REQUEST['a'.$bnkid_id];


$question_retrieve = $conn->prepare("SELECT * FROM bnk_identification 
	WHERE bnkid_id = '$bnkid_id' and answer_desc = '$student_answer' ");
$question_retrieve->execute();
$score = 0;
if($question_retrieve->rowCount() > 0){
	$score = 1;
}

$testpaper_update = $conn->prepare("UPDATE studentdata_presetactivity_id 
	SET answer = '$student_answer', score = '$score'
	where activity_id = '$activity_id'   and bnkid_id = '$bnkid_id' ");
$testpaper_update->execute();

}
?> 
<script type="text/javascript">
window.location="testpaper-result.php";
</script>
<?php

}?>