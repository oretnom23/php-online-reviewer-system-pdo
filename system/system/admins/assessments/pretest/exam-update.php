<?php 
include("../../header.php"); 
include("modals.php"); 

$test_id = $_SESSION['test_id']= $_REQUEST['test_id'];

 $stmt = $conn->prepare("SELECT * FROM  tests where test_id = '$test_id' ");
 $stmt->execute(); 
 while($row = $stmt->fetch()){
    $passing_rate = $row['passing_rate'];
    $test_desc = $row['test_desc'];
    $total_questions = $row['total_questions'];
    $time_limit = $row['time_limit'];
    $test_subject = $row['test_subject'];


  }
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Pre Test Update
        <i><small>Users</small></i>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> USERS</a></li>
        <li class="active">Update</a></li>
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->
<form action="btn_functions.php?action=update" method="POST">

<div class="col-md-6">

              <div class="form-group">
                <label>Course/program</label>
                <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
               <input type="text" name="test_desc" class="form-control" style="width: 100%;" value="<?php echo $test_desc; ?>" >
               
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
                    for($i = 100; $i >= 1; $i--){
                      ?>
                    <option value="<?php echo $i?>" <?php if($passing_rate!=$i){}else{ ?> selected <?php } ?> >
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
              </div>
</div>



<div class="col-md-6">
              <div class="form-group">
                    <label>Total Questions</label>
                    <select name="total_questions" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 1; $i <= 500; $i++){
                      ?>
                    <option <?php if($total_questions!=$i){}else{ ?> selected <?php } ?>><?php echo $i?></option>
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
                    <option <?php if($time_limit!=$i){ }else{ ?> selected <?php } ?> value="<?php echo $i?>"><?php echo $i?> minutes</option>
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


