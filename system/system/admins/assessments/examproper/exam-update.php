<?php 
include("../../header.php"); 
include("modals.php"); 

$test_id = $_SESSION['test_id']= $_REQUEST['test_id'];

 $stmt = $conn->prepare("SELECT * FROM  examproper where test_id = '$test_id' ");
 $stmt->execute(); 
 while($row = $stmt->fetch()){
    $access_code = $row['access_code'];
    $passing_rate = $row['passing_rate'];
    $test_desc = $row['test_desc'];
    $total_questions = $row['total_questions'];
    $time_limit = $row['time_limit'];


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
<form action="btn_functions.php?action=updatetest" method="POST">

<div class="col-md-6">

              <div class="form-group">
                <label>Access Code</label>
               <input type="text" name="access_code" class="form-control" style="width: 100%;" value="<?php echo $accesscode; ?>" >
                  
                <!-- /.input group -->
              </div>
</div>
<div class="col-md-6">

              <div class="form-group">
                <label>Passing Rate</label>
                <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                    <select name="passing_rate" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 75; $i >= 1; $i--){
                      ?>
                    <option value="<?php echo $i?>" <?php if($passing_rate!=$i){}else{ ?> selected<?php } ?>>
                    <?php echo $i?> %</option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                  
                <!-- /.input group -->
              </div>
</div>  

<div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                 <textarea name="description" class="form-control" style="width: 100%;" required> <?php echo $test_desc; ?></textarea>
              </div>
</div>



<div class="col-md-6">
              <div class="form-group">
                    <label>Total Questions</label>
                    <select name="total_questions" style="width: 100%;" class="form-control select2" >
            <?php
                    for($i = 1; $i <= 1000; $i++){
                      ?>
                    <option><?php echo $i?></option>
                    <?php
                    }
                    ?>
                    </select>
              </div>
</div>



<div class="col-md-6">

              <div class="form-group">
                <label>Time Limit</label>
                <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                    <select name="time_limit" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 60; $i <= 600; $i=$i+30){
                      ?>
                    <option value="<?php echo $i?>"><?php echo $i?> minutes</option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                  
                <!-- /.input group -->
              </div>
</div>


            <!-- /.box-body -->
             <div class="box-footer">
           <a href="index.php"><input type="button"  value="Back" class="btn btn-default"></a>
             <input type="submit" name="btnUpdateExam" value="Save changes" class="btn btn-info pull-right">
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


