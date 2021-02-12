<?php 
include("../../../../connections/db-connect.php");
include("function.php");
$id = $_SESSION['test_id'];
$user_id = $_SESSION['user_id'];



$limit = 1; 
 
if (isset($_GET["page"] )) 
{
	$page  = $_GET["page"]; 
} 
else 
{
	$page=1; 
};  
 

 $total_questions =$_SESSION['total_questions'];
  $stmt =  $conn->prepare("SELECT * FROM studentdata_tests as ST, questions as Q where ST.test_id = '$id' and ST.student_id = '$user_id' and Q.q_id = ST.q_id LIMIT $page, $limit");
  $stmt->execute();
  // var_dump($_SESSION['gcCart']);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css.css">
	  <link rel="stylesheet" href="../../../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
<style type="text/css">
/*	.stretch {
		max-height: 300px;
	}*/
	.stretch  > img {
width: 100%;
	}
</style>
</head>
<body>
<div class="container-timer">	
		<div class="timer" id="response">	
		</div>
</div>
	<div class="container">	
	<form action="" method="POST">
				<div class="">

<img src="sa.png " alt="Italian Trulli" style="width:100%;"> 

<h3> Name:     <?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ?> </h3>

<?php 
$c = 0;
$numbering = 1;

 if (!empty($_SESSION['gcCart'])){  
  $count_cart = count($_SESSION['gcCart']); 
	// for ($i=0; $i < $count_cart  ; $i++) { 

		if ($page==1) {
			# code...
			$row = $page-1;
		}else{
			$row = $page-1;
		}

	  $qid = $_SESSION['gcCart'][$row]['q_id'];
	  $ans = $_SESSION['gcCart'][$row]['answer'];
 
  $stmt =  $conn->prepare("SELECT * FROM  questions  where `q_id` ='$qid'");
  $stmt->execute();

while($row = $stmt->fetch()){
$_SESSION['q'.$c] = $row['q_id'];
$c++;
?>
<div class="col-md-8">
<p><?php echo $page.". ".$row['question_desc'];?> </p>
<p>a)<input <?php echo ($row['option_a']==$ans)? "checked" : "" ?> type="radio" class="ans_radio" value="<?php echo $row['option_a'];?>" data-id="<?php echo $row['q_id'];?>" id="a<?php echo $row['q_id'];?>" name="a<?php echo $row['q_id'];?>"><?php echo $row['option_a'];?></p>
<p>b)<input <?php echo ($row['option_b']==$ans)? "checked" : "" ?> type="radio" class="ans_radio" value="<?php echo $row['option_b'];?>" data-id="<?php echo $row['q_id'];?>" id="b<?php echo $row['q_id'];?>" name="a<?php echo $row['q_id'];?>"><?php echo $row['option_b'];?></p>
<p>c)<input <?php echo ($row['option_c']==$ans)? "checked" : "" ?> type="radio" class="ans_radio"  value="<?php echo $row['option_c'];?>" data-id="<?php echo $row['q_id'];?>" id="c<?php echo $row['q_id'];?>" name="a<?php echo $row['q_id'];?>"><?php echo $row['option_c'];?></p>
<p>d)<input <?php echo ($row['option_d']==$ans)? "checked" : "" ?> type="radio" class="ans_radio" value="<?php echo $row['option_d'];?>" data-id="<?php echo $row['q_id'];?>" id="d<?php echo $row['q_id'];?>" name="a<?php echo $row['q_id'];?>"><?php echo $row['option_d'];?></p> 
</div>
<div class="col-md-4">
	<div class="stretch"> 
	<?php if(is_file("../../../../admins/assessments/databank/".$row['attachment_file'])): ?>
	  <img src="../../../../admins/assessments/databank/<?php echo $row['attachment_file'];?>">
	<?php endif; ?>
	</div>
</div>

<?php 
$numbering++;
}
// }
?>

<div class="col-md-12">
<?php 

 
 
$total_records = $count_cart;
if ($total_records==1) {
 	# code...
 	echo '<a class="btn btn-primary " style="float:right" href="process_score.php">Submit</a>';
 } else if ($page==1) {
  	# code...
  	echo '<a  class="btn btn-primary "  style="float:right" href="testpaper.php?page='.($page + 1).'">Next</a>';
  }elseif ($page > 1 && $page < $total_records) {
  	# code...
  	echo '<a  class="btn btn-primary " href="testpaper.php?page='.($page - 1).'">Previous</a>';
  	echo '<a  class="btn btn-primary "  style="float:right" href="testpaper.php?page='.($page + 1).'">Next</a>';
  }elseif ($page == $total_records) {
  	# code...
  	echo '<a  class="btn btn-primary "  href="testpaper.php?page='.($page - 1).'">Previous</a>';
  	echo '<a class="btn btn-primary " style="float:right" href="process_score.php">Submit</a>';
  }
}
 ?>

</div>


<!-- <div class="container-button">


			<input type="submit" name="btnSubmit" value="SUBMIT" class="button1">

</div> -->
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


$question_retrieve = $conn->prepare("SELECT * FROM questions 
	WHERE q_id = '$q_id' and correct_answer = '$student_answer' ");
$question_retrieve->execute();
$score = 0;
if($question_retrieve->rowCount() > 0){
	$score = 1;
}

$testpaper_update = $conn->prepare("UPDATE studentdata_tests
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

<script src="../../../../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).on("click",".ans_radio", function(){
		 var id = $(this).data('id');

		 var option_a = $("#a"+id).val();
		 var option_b = $("#b"+id).val();
		 var option_c = $("#c"+id).val();
		 var option_d = $("#d"+id).val();
		 var answer;

		 if ($("#a"+id).is(':checked')) { 
		 	answer = option_a;
		 	$.ajax({    //create an ajax request to load_page.php
	            type:"POST",  
	            url: "proccess_answer.php",    
	            dataType: "text",  //expect html to be returned  
	            data:{ID:id,ANSWER:answer},               
	            success: function(data){    
	            	// alert(data);
	            }

        	}); 
		 }else if ($("#b"+id).is(':checked')) { 
		 	answer = option_b;
		 	$.ajax({    //create an ajax request to load_page.php
	            type:"POST",  
	            url: "proccess_answer.php",    
	            dataType: "text",  //expect html to be returned  
	            data:{ID:id,ANSWER:answer},               
	            success: function(data){    
	            	// alert(data);
	            }

        	}); 
		 }else if ($("#c"+id).is(':checked')) { 
		 	answer = option_c;
		 	$.ajax({    //create an ajax request to load_page.php
	            type:"POST",  
	            url: "proccess_answer.php",    
	            dataType: "text",  //expect html to be returned  
	            data:{ID:id,ANSWER:answer},               
	            success: function(data){    
	            	// alert(data);
	            }

        	}); 
		 }else if ($("#d"+id).is(':checked')) { 
		 	answer = option_d;
		 	$.ajax({    //create an ajax request to load_page.php
	            type:"POST",  
	            url: "proccess_answer.php",    
	            dataType: "text",  //expect html to be returned  
	            data:{ID:id,ANSWER:answer},               
	            success: function(data){    
	            	// alert(data);
	            }

        	}); 
		 }


        
	});
</script>