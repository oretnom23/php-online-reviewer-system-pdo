<?php 
include("../../../connections/db-connect.php");



if(isset($_REQUEST['btnAddUser'])){

$firstname = $_REQUEST['firstname'];
$middlename = $_REQUEST['middlename'];
$lastname = $_REQUEST['lastname'];

$course = $_REQUEST['course'];
$year = $_REQUEST['year'];


$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$usertype_id = $_REQUEST['usertype_id'];
$user_type = $_REQUEST['user_type'];


if($usertype_id == '1'){
		$user_type = 'Admin';
}
elseif($usertype_id == '2'){
  $user_type = 'Teacher';
}
elseif($usertype_id == '3'){
  $user_type = 'Student';
}


$stmt = "INSERT INTO users (usertype_id, fname, mname, lname, username, password, user_type, course, year ) 
VALUES ('$usertype_id','$firstname','$middlename','$lastname','$username','$password','$user_type', '$course','$year' )";
 if($conn->exec($stmt)==true){
  header("location: index.php");
  }

}

if(isset($_REQUEST['btnUpdateUser'])){
$user_id = $_SESSION['user_id'];
$firstname = $_REQUEST['firstname'];
$middlename = $_REQUEST['middlename'];
$lastname = $_REQUEST['lastname'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$usertype_id = $_REQUEST['usertype_id'];
$user_type = $_REQUEST['user_type'];

if($usertype_id == '1'){
		$user_type = 'Admin';
}
elseif($usertype_id == '2'){
  $user_type = 'Teacher';
 header("location: index_teacher.php");

}
elseif($usertype_id == '3'){
  $user_type = 'Student';
}


$stmt = "UPDATE users 
SET usertype_id = '$usertype_id',
fname = '$firstname',
mname = '$middlename',
lname = '$lastname',
username = '$username',
user_type = '$user_type',
password = '$password' WHERE user_id = '$user_id' ";


 if($conn->exec($stmt)==true){
  header("location: index.php");

  }

 else {
  header("location: index.php");

  }

}




?>