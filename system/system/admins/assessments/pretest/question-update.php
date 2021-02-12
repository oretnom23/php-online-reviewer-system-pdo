<?php 
include("../../header.php"); 
include("modals.php"); 

$q_id = $_SESSION['question_id']= $_REQUEST['question_id'];

 $stmt = $conn->prepare("SELECT * FROM  questions where q_id = '$q_id' ");
 $stmt->execute(); 
 while($row = $stmt->fetch()){
    $question_desc = $row['question_desc'];
    $option_a = $row['option_a'];
    $option_b = $row['option_b'];
    $option_c = $row['option_c'];
    $option_d = $row['option_d'];
    $answer = $row['correct_answer'];

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
                <label>Question</label>
                  <input type="text" name="description" class="form-control" style="width: 100%;" value="<?php echo $question_desc?>" required>
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Option A</label>
                  <input type="text" name="option_a" class="form-control" style="width: 100%;" value="<?php echo $option_a?>">
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Option B</label>
                  <input type="text" name="option_b" class="form-control" style="width: 100%;" value="<?php echo $option_b?>">
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Option C</label>
                  <input type="text" name="option_c" class="form-control" style="width: 100%;" value="<?php echo $option_c?>">
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Option D</label>
                  <input type="text" name="option_d" class="form-control" style="width: 100%;" value="<?php echo $option_d?>">
              </div>
</div>

             <div class="form-group">
                <label>Correct Answer</label>
                     <input type="text" name="answer" class="form-control" style="width: 100%;" value="<?php echo $answer?>">
                           </select> 
      

              </div>



            <!-- /.box-body -->
             <div class="box-footer">
           <a href="index.php"><input type="button"  value="Back" class="btn btn-default"></a>
             <input type="submit" name="btnUpdateQuestion" value="Save changes" class="btn btn-info pull-right">
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


