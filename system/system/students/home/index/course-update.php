<?php 
include("../../header.php");
include("../../sql_functions.php");
$course_id = $_SESSION['course_id'] = $_REQUEST['id'];

/*

 $schoolyears_retrieve = $conn->prepare("SELECT * FROM  schoolyears");
 $schoolyears_retrieve->execute();

 $schoolperiods_retrieve = $conn->prepare("SELECT * FROM  schoolperiods");
 $schoolperiods_retrieve->execute();

 $schoolterms_retrieve = $conn->prepare("SELECT * FROM  schoolterms");
 $schoolterms_retrieve->execute();

 $departments_retrieve = $conn->prepare("SELECT * FROM  departments");
 $departments_retrieve->execute();

 $programs_retrieve = $conn->prepare("SELECT * FROM  programs");
 $programs_retrieve->execute();

*/
$course_retrieve = $conn->prepare("SELECT * FROM  courses where course_id = '$course_id'");
$course_retrieve->execute();
while($row = $course_retrieve->fetch()){
$schoolperiod = $row['schoolperiod'];
$schoolyear = $row['schoolyear'];
$coursecode = $row['course_code'];
$description = $row['course_desc'];
$department = $row['department_id']; 
$program = $row['program_id'];
$section = $row['section'];
$accesscode = $row['access_code'];
}
?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Courses
        <small>Blank example to the fixed layout</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Fixed</li>
      </ol>
    </section>


  <section class="content">
    <!-- Main content -->
<div class="col-md-6">
      <div class="box box-default">

      <div class="row">


              <div class="box-body">
<form action="btn_functions.php" method="POST">
<div class="col-md-6">
              <div class="form-group">
                  <label>School Year</label>
                  <select name="schoolyear" class="form-control select2"  style="width: 100%;" required>
<?php 
  while($row = $schoolyears_retrieve->fetch()){
?>
                  <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$schoolyear){?> selected<?php }?> ><?php echo $row['description'];?></option>
<?php
  } 
?>
                  </select>
              </div>
</div>

<div class="col-md-6">                
              <div class="form-group" >
                  <label>School Period</label>
                  <select name="schoolperiod" class="form-control select2" style="width: 100%;" required>
<?php
  while($row = $schoolperiods_retrieve->fetch()){
?>
                  <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$schoolperiod){?> selected<?php }?> ><?php echo $row['description']; ?></option>
<?php
  }
?>
                  </select>
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                  <label>Course Code</label>
                  <input type="text" name="code" class="form-control " style="width: 100%;"  value="<?php echo $coursecode?>" required>
              </div>
</div>

<div class="col-md-12">  
              <div class="form-group">
                  <label>Course Description</label>
                  <textarea name="description" row="6" class="form-control " style="width: 100%;"  required><?php echo $description?></textarea>
              </div>
</div>

<div class="col-md-6">
              <div class="form-group">
                  <label>Department</label>
                  <select name="department" class="form-control select2"  style="width: 100%;" required>
<?php
  while($row = $departments_retrieve->fetch()){
?>
                  <option value="<?php echo $row['department_id']; ?>" <?php if($row['department_id']==$department){?> selected<?php }?> ><?php echo $row['department_code'];?></option>
<?php
  }
?>
                  </select>
              </div>
</div>

<div class="col-md-6">                
              <div class="form-group" >
                  <label>Program</label>
                  <select name="program" class="form-control select2" style="width: 100%;" required>
<?php
  while($row = $programs_retrieve->fetch()){
?>
                  <option value="<?php echo $row['program_id']; ?>" <?php if($row['program_id']==$program){?> selected<?php }?> ><?php echo $row['program_code']; ?></option>
<?php
  }
?>
                  </select>
              </div>
</div>

<div class="col-md-6">
              <div class="form-group">
                  <label>Section</label>
                  <input type="text" name="section" class="form-control" value="<?php echo $section?>" required>
              </div>
</div>
<div class="col-md-6">
              <div class="form-group">
                  <label>Access Code</label>
                  <input type="text" name="accesscode" value="<?php echo $accesscode?>" class="form-control" required>
                  <div id="container"></div>
              </div>

</div>


              </div>


<!-- /body -->
</div>

              <div class="box-footer">
                <div class="col-md-6">
                <button type="button" class="btn btn-danger pull-right">Delete</button>
                <input type="submit" name="btnUpdateCourse" value="Save" class="btn btn-success">
                </div>
              </div>
</form>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php include("../../footer.php"); ?>