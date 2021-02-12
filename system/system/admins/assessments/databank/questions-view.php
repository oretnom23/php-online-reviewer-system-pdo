<?php 
include("../../header.php"); 
include("modals.php"); 
$id = $_SESSION['user_id'];
//$id =  $_SESSION['difficulty_id'] = $_REQUEST['id'];

 $stmt = $conn->prepare("SELECT * FROM  questions WHERE user_id = '$id' ");
 $stmt->execute();  

?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       PRE TEST QUESTIONAIRE
        <i><small></small></i>

      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Assessments</a></li>
        <li class="active">Pre Test</a></li>
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-question">Add Questions</button></a>
            </div>
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
              
                <tr>
                  <th>Questions</th>
                  <th>Option A</th>
                  <th>Option B</th>
                  <th>Option C</th>
                  <th>Option D</th>
                  <th>Correct Answer</th>
                  <th>Manage</th>
                  
                </tr>

    <?php
    while($row = $stmt->fetch()){
    ?>
                <tr>
                  <td><?php echo $row['question_desc']; ?></td>
                  <td><?php echo $row['option_a']; ?></td>
                  <td><?php echo $row['option_b']; ?></td>
                  <td><?php echo $row['option_c']; ?></td>
                  <td><?php echo $row['option_d']; ?></td>
                  <td><?php echo $row['correct_answer']; ?></td>
                  <td><a href = "question-update.php?question_id=<?php echo $row['q_id']; ?>" ><i class="fa fa-edit"> Edit</i></a> | <a href = "question-delete.php?question_id=<?php echo $row['q_id']; ?>" ><i class="fa fa-times"> Remove</i></a></td>
                </tr>
    <?php
    }
    ?>
              </table>
            </div>
            <!-- /.box-body -->
                  <div class="box-footer"> </div>
          </div>
          <!-- /.box -->

      








  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../footer.php"); ?>


