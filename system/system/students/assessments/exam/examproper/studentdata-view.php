<?php 
include("../../header.php"); 
$user_id = $_SESSION['user_id'];
$course_id = $_SESSION['course_id'];
$quiz_id =  $_SESSION['id'];
$id = $_REQUEST['id'];

  $stmt =  $conn->prepare("SELECT * FROM studentdata_assignments where assignment_id = '$assignment_id' and user_id = '$id'");
  $stmt->execute();
  while($row = $stmt->fetch()){
    $description = $row['description'];
    $activity_date = $row['date_created'];
    $img = $row['img'];
    $vid = $row['vid'];

    $status = $row['status'];
    
  }


  $stmt =  $conn->prepare("SELECT * FROM users where user_id = '$id'");
  $stmt->execute();
  while($row = $stmt->fetch()){
    $fullname = $row['lastname'].", ".$row['firstname']." ".$row['middlename'];
  }

  $stmt =  $conn->prepare("SELECT * FROM assignments where assignment_id = '$assignment_id'");
  $stmt->execute();
  while($row = $stmt->fetch()){
    $assignment = $row['description'];
        $points = $row['points'];
  }

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

<form action="btn_functions.php?id=<?php echo $id?>" method="POST">

          <div class="box">
            <div class="box-header">
        
          <div class="box-body">

            <div class="col-md-5">
              <div class="form-group">
                <label>Student Name</label>
                  <input type="text" value="<?php echo $fullname?>" class="form-control" style="width: 100%;" placeholder="Enter description" disabled>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>Description</label>
                  <input type="text" value="<?php echo $assignment?>" class="form-control" style="width: 100%;" disabled>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label>Date Submitted</label>
                  <input type="text" value="<?php echo $activity_date?>" class="form-control" style="width: 100%;" placeholder="Enter description" disabled>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label>Points</label>
                    <select name="score" style="width: 100%;" class="form-control select2" >

                    <?php
                    for($i = 1; $i <= $points; $i++){
                      ?>
                    <option><?php echo $i?></option>
                    <?php
                    }
                    ?>

                    </select>
              </div>
            </div>



            <div class="col-md-12">
              <div class="form-group">
                <label>Comments</label>
                   <textarea name="instruction" row="5" class="form-control" style="width: 100%;" disabled=""><?php echo $description?></textarea>         
                   </div>
            </div>



            <div class="col-md-12">
            <?php if($img != "" ){?>
            <label>Submitted file</label>
              <img class="img-responsive pad" src="<?php echo $img ?>" alt="Photo"></p>
              <?php
              }
              ?>
            <p><?php if($vid!= "" ){?>
            <label>Submitted file</label>
            <video width="100%" height="500px" controls preload="none"><source class="embed-responsive-item" src="<?php echo $vid?>" frameborder="0" allowfullscreen autoplay="false"></video></p>
              <?php
              }
              ?>
            </div>

          </div>
           <div class="box-footer">
             <a href="quiz-view.php?id=<?php echo $id?>"><input type="button"  value="Back" class="btn btn-default"></a>
             <input type="submit" name="btnUpdateScore" value="Save changes" class="btn btn-info pull-right">
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