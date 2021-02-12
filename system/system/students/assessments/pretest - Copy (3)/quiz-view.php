<?php 
include("../../header.php");
include("modals.php"); 
//$user_id = $_SESSION['user_id'];
$course_id = $_SESSION['course_id'];
$id =  $_SESSION['id'] = $_REQUEST['id'];

  $stmt =  $conn->prepare("SELECT * FROM quizzes where quiz_id = '$id' ");
  $stmt->execute();
  while($row = $stmt->fetch()){
    $description = $row['description'];

    $instruct_mc = $row['instruct_mc'];
    $instruct_id = $row['instruct_id'];
    $instruct_es = $row['instruct_es'];
    $total_mc = $row['total_mc'];
    $total_id = $row['total_id'];
    $total_es = $row['total_es'];
    $quiz_date = $row['quiz_date'];
    $time_start = $row['time_start'];
    $time_end = $row['time_end'];
    $time_limit = $row['time_limit'];
    $status = $row['status'];

  }

  $stmt =  $conn->prepare("SELECT * FROM users as U, classlists as CL, programs as P where CL.course_id = '$course_id' and U.user_id = CL.user_id and U.program_id = P.program_id and CL.status = 1 ");
  $stmt->execute();



?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $_SESSION['course_code']?>
        <i><small><?php echo $_SESSION['course_desc']?></small></i>
      </h1>

      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Assessments</a></li>
        <li class="active">Quizzes</a></li>
      </ol>
    </section>

  <section class="content">


          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Quiz Informations</a></li>

              
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

        
          <div class="box-body">

            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                  <input type="text" value="<?php echo $description?>" class="form-control" style="width: 100%;" placeholder="Enter description" disabled>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>Quiz Date</label>
                  <input type="text" value="<?php echo $quiz_date?>" class="form-control" style="width: 100%;" placeholder="Enter description" disabled>
              </div>
            </div>


            <div class="col-md-3">
              <div class="form-group">
                <label>Status</label>
                    <select name="status" style="width: 100%;" class="form-control" disabled>

                    <option value="1" 

                    <?php if($status=='1'){?> selected<?php }?>> Open</option>

                    <option value="0"

                    <?php if($status=='0'){?> selected<?php }?>> Closed</option>
            
                    </select>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Instructions for Multiple Choice</label>
                   <textarea name="instruction" row="3" class="form-control" style="width: 100%;" disabled=""><?php echo $instruct_mc?></textarea>         
                   </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Instructions for Identification</label>
                   <textarea name="instruction" row="3" class="form-control" style="width: 100%;" disabled=""><?php echo $instruct_id?></textarea>         
                   </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Instructions for Essay</label>
                   <textarea name="instruction" row="3" class="form-control" style="width: 100%;" disabled=""><?php echo $instruct_es?></textarea>         
                   </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Total Multiple Choices</label>
                  <input type="text" value="<?php echo $total_mc?>" class="form-control" style="width: 100%;"  disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Total Identifications</label>
                  <input type="text" value="<?php echo $total_id?>" class="form-control" style="width: 100%;"  disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Total Essays</label>
                  <input type="text" value="<?php echo $total_es?>" class="form-control" style="width: 100%;"  disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Time Start</label>
                  <input type="text" value="<?php echo $time_start?>" class="form-control" style="width: 100%;"  disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Time End</label>
                  <input type="text" value="<?php echo $time_end?>" class="form-control" style="width: 100%;" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Time Limit</label>
                  <input type="text" value="<?php echo $time_limit?>" class="form-control" style="width: 100%;" disabled>
              </div>
            </div>
          </div>

           <div class="box-footer">
             <a href="index.php"><input type="button"  value="Back" class="btn btn-default"></a>
             <a href="take/index.php?id=<?php echo $id ?>"><input type="button"  value="Take Quiz" class="btn btn-info pull-right"></a>
           </div>    

        </div>
</div>










      <!-- /body -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../../footer.php"); ?>