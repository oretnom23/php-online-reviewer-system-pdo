<?php 
include("../../header.php"); 
include("modals.php"); 

$user_id = $_SESSION['user_id']= $_REQUEST['user_id'];

 $stmt = $conn->prepare("SELECT * FROM  users where user_id = '$user_id' ");
 $stmt->execute(); 
 while($row = $stmt->fetch()){
    $usertype_id = $row['usertype_id'];
    $fname = $row['fname'];
    $mname = $row['mname'];
    $lname = $row['lname'];
    $username = $row['username'];
    $password = $row['password'];

  }
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <i><small>Users</small></i>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> USERS</a></li>
        <li class="active">Update</a></li>
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->
<form action="btn_functions.php" method="POST">

<div class="col-md-6">
          <div class="box">
            <div class="box-header">
               
            </div>

<div class="col-md-12">
              <div class="form-group">
                <label>Choose Usertype</label>
                <select class="form-control select2" name="usertype_id" style="width: 100%;">
                  <option value="3" <?php if($usertype_id == "3"){?> selected <?php }?>>Student</option>
                  <option value="2" <?php if($usertype_id == "2"){?> selected <?php }?>>Faculty</option>
                  <option value="1" <?php if($usertype_id == "1"){?> selected <?php }?>>Admin</option>
                </select>
              </div>
</div>
<div class="col-md-12">
              <div class="form-group">
                <label>Firstname</label>
                  <input type="text" name="firstname" class="form-control" style="width: 100%;" value="<?php echo $fname?>" required>
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Middlename</label>
                  <input type="text" name="middlename" class="form-control" style="width: 100%;" value="<?php echo $mname?>">
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Lastname</label>
                  <input type="text" name="lastname" class="form-control" style="width: 100%;" value="<?php echo $lname?>" required>
              </div>
</div>




<div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                  <input type="text" name="username" class="form-control" style="width: 100%;" value="<?php echo $username?>" required>
              </div>
</div>

<div class="col-md-6">
              <div class="form-group">
                <label>Password</label>
                  <input type="text" name="password" class="form-control" style="width: 100%;" value="<?php echo $password?>" required>
              </div>
</div>





            <!-- /.box-body -->
             <div class="box-footer">
           <a href="index.php"><input type="button"  value="Back" class="btn btn-default"></a>
             <input type="submit" name="btnUpdateUser" value="Save changes" class="btn btn-info pull-right">
            </div>
          </div>
          <!-- /.box -->

   </div>   
</form>







  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../../footer.php"); ?>


