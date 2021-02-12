<?php 
include("../../header.php"); 
include("modals.php"); 

$q_id = $_GET['id'];

 $stmt = $conn->prepare("SELECT * FROM  questions where q_id = '$q_id' ");
 $stmt->execute(); 
 while($row = $stmt->fetch()){
    $question_desc = $row['question_desc'];
    $option_a = $row['option_a'];
    $option_b = $row['option_b'];
    $option_c = $row['option_c'];
    $option_d = $row['option_d'];
    $difficulty_id = $row['difficulty_id'];
    $correct_answer = $row['correct_answer'];
    $course = $row['Course'];
    $subject = $row['subject'];

  }
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Update Question</i>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> databank</a></li>
        <li class="active">Update</a></li>
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->
<form action="btn_functions.php?action=update" method="POST" enctype="multipart/form-data">

<div class="col-md-6">
          <div class="box">
            <div class="box-header">
               
            </div>

<div class="col-md-12">
              <div class="form-group">
                <label>Choose Dificulty</label>
                <select class="form-control select2" name="difficulty_id" style="width: 100%;">

                  <option <?php echo ($difficulty_id==1) ? "SELECTED" : "" ?> value="1">EASY</option>
                  <option <?php echo ($difficulty_id==2) ? "SELECTED" : "" ?> value="2">MODERATE</option>
                  <option <?php echo ($difficulty_id==3) ? "SELECTED" : "" ?> value="3">DIFFICULT</option>

                </select>
              </div>
  </div>
<div class="col-md-12"> 
              <div class="form-group">
                  <label>PROGRAM/COURSE</label> 
                  <select name="test_desc" style="width: 100%;" class="form-control select2"  tabindex="1" >
                  <option <?php echo ($course=="CIVIL ENGINEERING") ? "SELECTED" : "" ?> value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>
                  <option <?php echo ($course=="ECE") ? "SELECTED" : "" ?> value="ECE">ECE</option> 
                  </select>  
              </div>
              </div>

              <div class="col-md-12">
              <div class="form-group">
                <label>SUBJECT</label>

                  <select name="test_subject" style="width: 100%;" class="form-control select2"  tabindex="1" >
                  <option value="Mathematics, Surveying and Transportation Engineering">Mathematics, Surveying and Transportation Engineering</option>
                  <option <?php echo ($subject=="Sturctural Design") ? "SELECTED" : "" ?> value="Sturctural Design">Sturctural Design</option>
                  <option <?php echo ($subject=="Geotech") ? "SELECTED" : "" ?> value="Geotech">Geotech</option>
                  <option <?php echo ($subject=="Mathematics") ? "SELECTED" : "" ?> value="Mathematics">Mathematics</option>
                  <option <?php echo ($subject=="General Engineering and Applied Science") ? "SELECTED" : "" ?> value="General Engineering and Applied Science">General Engineering and Applied Science</option>
                  <option <?php echo ($subject=="Electronics Engineering") ? "SELECTED" : "" ?> value="Electronics Engineering">Electronics Engineering</option>
                  <option <?php echo ($subject=="Electronics System and Technologies") ? "SELECTED" : "" ?> value="Electronics System and Technologies">Electronics System and Technologies</option> 
                </select>  
                </div>
              </div>
<div class="col-md-12">
              <div class="form-group">
                <label>Question</label>
                <input type="hidden" name="question_id" value="<?php echo $q_id?>">
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
                    <select name="answer" style="width: 100%;" class="form-control select2" >
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                    </select>
              </div>
              
              <div class="form-group"> 
                  <label>Attachment Image:</label> 
                  <input type="file" name="personImage" value="" id="personImage"/> 
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


