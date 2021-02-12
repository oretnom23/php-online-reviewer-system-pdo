<?php 
include("../../../connections/db-connect.php");
include("../../../connections/date-timezone.php");
include("../../sql_functions.php"); 

if($_SESSION['user_id']==""){
  header("location:../../../../../");
}
?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FBC Engeneering Reviewer System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../../dist/css/skins/_all-skins.min.css">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
  <a href="../../home/index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>MS</span>
      <!-- logo for regular state and mobile devices -->
        <img src="../../../../dist/img/logo.png" class="user-image" alt="User Image" height="50" width="50">
          
           FBC Reviewer </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">



<li class="dropdown messages-menu">
            <a href="../../home/index/">
              <i>HOME </i>
            </a>
          </li>


<!--<li class="dropdown messages-menu">
            <a href="../../assessments/databank/">
              <i>TEST BANK </i>
            </a>
          </li> -->

 

 <li class="dropdown messages-menu">
            <a href="../../assessments/pretest/">
              <i>PRE TEST</i>
            </a>
          </li>

           <li class="dropdown messages-menu">
           <a href="../../assessments/examproper/">
              <i>PROPER EXAM</i>
            </a>
          </li>

           <li class="dropdown messages-menu">
           <a href="../../assessments/results/">
              <i>RESULTS</i>
            </a>
          </li>
<?php if($_SESSION['usertype_id']== 1) {?> 
          <li class="dropdown messages-menu">
           <a href="../../manage/users/">
              <i>ACCOUNTS</i>

            </a>
          </li> 


        <?php } ?>
    


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../../../dist/img/logo.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['firstname'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../../../dist/img/logo.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  
                </div>
                <div class="pull-right">
                 <a href="../../logout.php/" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">


        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Test Panel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right">
              </i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../assessments/pretest/"><i class="fa fa-circle-o"></i>Pre Test</a></li>
            <li><a href="../../assessments/examproper/"><i class="fa fa-circle-o"></i>Exam Proper</a></li>
            <li><a href="../../assessments/results/"><i class="fa fa-circle-o"></i>Results</a></li>

          </ul>
        </li>
<?php 

if($_SESSION['usertype_id']== 1) {?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Users Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../manage/users/"><i class="fa fa-circle-o"></i> Accounts</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
</div>
</body>
</html>
