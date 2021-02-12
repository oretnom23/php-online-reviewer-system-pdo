<?php 
include("../../header.php"); 
include("modals.php"); 
$user_id = $_SESSION['user_id'];


 $stmt = $conn->prepare("SELECT * FROM  tests WHERE user_id = '$user_id' ");
 $stmt->execute();  


?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          HOME
        <i><small>This is where to add pre test examination</small></i>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#">You are here></li>
         <li><a href="#">Admin></li>
               <li><a href="#">Home</li>


      </ol>
    </section>

  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-addTest">Add Test</button></a>
            </div>
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
              
                <tr>
                  
                  <th>Descriptions</th>
                  <th>Difficulty</th>
                  <th>Total Questions</th>
                  <th>Passing Rate</th>
                  <th>Time Limit</th>

                  <th>Manage</th>
                </tr>

    <?php
    while($row = $stmt->fetch()){
    ?>
                <tr>
                  <td><?php echo $row['test_desc']; ?></td>
                  
                  <td><?php 
                  if($row['difficulty_id']==1){
                    echo "EASY";
                    } 
                  elseif($row['difficulty_id']==2){
                    echo "MODERATE";
                    } 
                  elseif($row['difficulty_id']==3){
                    echo "DIFFICULT";
                    } 

                    ?></td>

                  <td><?php echo $row['total_questions']; ?></td>
                  <td><?php echo $row['passing_rate']."%"; ?></td>
                  <td><?php echo $row['time_limit']." minutes"; ?></td>
        
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


