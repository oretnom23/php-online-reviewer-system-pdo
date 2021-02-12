<?php 
include("../../header.php"); 
include("modals.php"); 
$id = $_SESSION['user_id'];
//$id =  $_SESSION['difficulty_id'] = $_REQUEST['id'];

 $stmt = $conn->prepare("SELECT * FROM  questions WHERE user_id = '$id' ");
 $stmt->execute();  

?>
<style type="text/css">
  #stretch{
    width: 10%;
    height: 50px;
  }
  #stretch img{
    width: 100%;
    height: 100%;
  }
</style>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       TEST QUESTIONAIRE
        <i><small></small></i>

      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Assessments</a></li>
        <li class="active">Test Questionaire</a></li>
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-question">Add Questions</button></a>
            </div>
            <div class="box-body table-responsive no-padding">

              <table id="example1" class="table table-hover">
              
                <thead> 
                  <th></th>
                  <th>Course</th>
                  <th>Subject</th>
                  <th>Questions</th>
                  <th>Option A</th>
                  <th>Option B</th>
                  <th>Option C</th>
                  <th>Option D</th>
                  <th>Correct Answer</th>
                  <th>Image</th>
                  <th>Difficulty</th>
                  <!-- <th>Manage</th> -->
                  
                </thead>

    <?php
    while($row = $stmt->fetch()){

      if ($row['difficulty_id']==1) {
        $difficulty  = "EASY";
        # code...
      }elseif ($row['difficulty_id']==2) {
        $difficulty  = "MODERATE";
        # code...
      }elseif ($row['difficulty_id']==3) {
        $difficulty  = "DIFFICULT";
        # code...
      }
    ?>
                <tr>

                  <!-- <td><input type="checkbox" name="q_id[]" value="<?php echo $row['q_id']; ?>"></td> -->
                  <td>
                    <a title="Edit" href="question-update.php?id=<?php echo $row['q_id']; ?>" ><i class="fa fa-edit"></i></a>
                    <a title="Delete" class="removeQuestion" href="btn_functions.php?action=remove&id=<?php echo $row['q_id']; ?>"><i class="fa fa-times"></i>
                  </td>
                  <td><?php echo $row['Course']; ?></td>
                  <td><?php echo $row['subject']; ?></td>
                  <td><?php echo $row['question_desc']; ?></td>
                  <td><?php echo $row['option_a']; ?></td>
                  <td><?php echo $row['option_b']; ?></td>
                  <td><?php echo $row['option_c']; ?></td>
                  <td><?php echo $row['option_d']; ?></td>
                  <td><?php echo $row['correct_answer']; ?></td>
                  <?php  if($row['attachment_file']=="files/") { ?>
                   <td id="stretch">None</td>
                  <?php }else{ ?>
                  <td id="stretch"><img src="<?php echo $row['attachment_file']; ?>"/> </td>
                 <?php } ?>
                  <td><?php echo $difficulty; ?></td>
                 <!--  <td><a href="#" data-id="<?php echo $row['q_id']; ?>" class="pretest" id="pretest" data-toggle="modal" data-target="#modal-difficulty" ><i class="fa fa-send"> TEST YOURSELF</i></a>
                  | <a  href="#" data-id="<?php echo $row['q_id']; ?>" class="properexam" id="properexam" data-toggle="modal" data-target="#modal-accesscode" ><i class="fa fa-send"> PREBOARD</i></a></td> -->
                </tr>
    <?php
    }
    ?>
              </table>
            </div>
            <!-- /.box-body -->
              <!--     <div class="box-footer"> 
                      <button class="btn btn-primary">SUMBMIT PRE TEST</button>
                      <button class="btn btn-primary">SUMBMIT PROPER EXAM</button>
                  </div> -->
          </div>
          <!-- /.box -->

      








  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../footer.php"); ?>

<script type="text/javascript">
  $(document).on("click",".pretest",function(){
      var id = $(this).data('id');
      // alert(id)
      $("#modal-difficulty #q_id").val(id);

  });
</script>

<script type="text/javascript">
  $(document).on("click",".properexam",function(){
      var id = $(this).data('id');
      // alert(id)
      $("#modal-accesscode #q_id").val(id);

  });
</script>

<script type="text/javascript">
  $(document).on("click",".removeQuestion",function(){
     
     if (confirm("Do you want to delete this question?")) {
      return true;
     }else{
      return false;
     };

  });
</script>


