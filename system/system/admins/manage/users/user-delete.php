<?php 
include("../../../connections/db-connect.php");
$id = $_REQUEST['id'];

 $stmt = $conn->prepare("DELETE FROM  users WHERE user_id = '$id'");
 $stmt->execute();  
header("location: index.php");
?>