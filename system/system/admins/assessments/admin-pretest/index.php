<?php 
include("../../header.php"); 
include("modals.php"); 
$user_id = $_SESSION['user_id'];


 $stmt = $conn->prepare("SELECT * FROM  pre_exam WHERE user_id = '$user_id' ");
 $stmt->execute();  


?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       TEST YOURSELF
      </h1>
    
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-addTest">ADD PRE TEST EXAM</button></a>
            </div>
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
              
                <tr>
                  
                  <th>Course</th>
                   <th>Subject</th>
                  <th>Total Questions</th>
                  <th>Time Limit</th>
                  <th>Difficulty</th>
 
                  <th>Manage</th>
                   <th>Function</th>
                </tr>

    <?php
    while($row = $stmt->fetch()){
    ?>
                <tr>
                  <td><a href="questions-view.php?id=<?php echo $row['test_id']; ?>"><?php echo $row['test_desc']; ?></a></td>
                
                  <td><?php echo $row['category_exam']; ?></td> 
                  <td><?php echo $row['total_questions']; ?></td>
                  <td><?php echo $row['time_limit']." minutes"; ?></td>
                  <td><?php echo $row['difficulty_id']; ?></td>      
     
                  
                  <td><a href = "exam-update.php?test_id=<?php echo $row['test_id']; ?>" >  <i class="fa fa-edit"> Edit</i></a> 
 
                     <td><a href="questions-view.php?id=<?php echo $row['test_id']; ?>">Add question </a></td>
                
                  <!--<i class="fa fa-times"> Remove</i></a></td> -->
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


