<?php
include 'function.php';
session_start();
$id = $_POST['ID'];
$answer = $_POST['ANSWER'];

editproduct($id,$answer,1);

?>