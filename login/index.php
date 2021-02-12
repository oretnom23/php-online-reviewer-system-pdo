<?php
include('../system/system/connections/db-connect.php');


if(isset($_REQUEST['btn-login'])){

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$user_retrieve = $conn -> prepare("SELECT * FROM users where username = '$username' and password = '$password'");
$user_retrieve->execute();
if($user_retrieve->rowCount() > 0){
while ($row = $user_retrieve->fetch()) {
	$usertype_id = $_SESSION['usertype_id'] = $row['usertype_id'];
	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['firstname'] = $row['fname'];
	$_SESSION['middlename'] = $row['mname'];
	$_SESSION['lastname'] = $row['lname'];
	$_SESSION['course'] = $row['course'];
	
	if($usertype_id == 3){
      	echo "<script type='text/javascript'>window.location.href = '../system/system/students/home/index/';</script>";
        exit();
	}
	elseif ($usertype_id == 1 || $usertype_id == 2 ) {
      	echo "<script type='text/javascript'>window.location.href = '../system/system/admins/home/index/';</script>";
        exit();
	}

}
}else{
	?> <script>
        alert('Try Again');
       </script>"; <?php
      	echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        exit();
}
}

?>








<!DOCTYPE html>
<html lang="en">
<head>
	<title>FBC ENGINEERING SYSTEM REVIWER<br>
	LOG IN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/fbc2.jpg);">
					<span class="login100-form-title-1">
						
					</span>
				</div>

				<form class="login100-form validate-form" action="" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="btn-login" value = "Log In" class="login100-form-btn">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>