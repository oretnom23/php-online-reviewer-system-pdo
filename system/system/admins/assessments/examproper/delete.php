<php

include("../../../connections/db-connect.php");
$user_id = $_SESSION['user_id'];
$id =  $_SESSION['exam_id'];

$sql = DELETE FROM `examproper` WHERE `examproper`.`test_id` = 23 ;
?>