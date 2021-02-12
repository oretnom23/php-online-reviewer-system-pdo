<?php 
include("../../../connections/db-connect.php");

$id = $_REQUEST['test_id'];
$q_id =  $_REQUEST['q_id'];

 $stmt = $conn->prepare("DELETE FROM exam_questions WHERE q_id = '$q_id' ");
 $stmt->execute();  

  header("location: questions-view.php?q_id= $id");
   

?>