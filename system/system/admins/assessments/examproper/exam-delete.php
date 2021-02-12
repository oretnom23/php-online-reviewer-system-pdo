<?php 
include("../../../connections/db-connect.php");
$id = $_REQUEST['test_id'];

 $stmt = $conn->prepare("DELETE FROM  examproper WHERE test_id = '$id'");
 $stmt->execute();  

header("location: index.php")
?>