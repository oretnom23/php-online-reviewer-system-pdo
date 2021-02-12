<?php 
include("../../header.php"); 

$user_id = $_SESSION['user_id'];

 $stmt = $conn->prepare("SELECT * FROM studentresult_exams as SRE, examproper as E , `users` as u WHERE SRE.test_id=E.test_id AND u.`user_id`=student_id AND `course`=`test_desc` AND u.user_id='$user_id'");
 $stmt->execute(); 



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

    </section>


  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
               
            </div>
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
              
                <tr>
                  <th>Course/Program</th>
                  <th>Score</th>
                  <th>Percentage</th>

                  <th>Remarks</th>
                  <th>Date Taken</th>
                  <th>Manage</th>
                </tr>
    <?php
    while($row = $stmt->fetch()){
    ?>
                <tr>
                  <td><?php echo $row['test_desc']; ?></td>
                  <td><?php echo $row['score']; ?></td>
                  <td><?php echo $row['percentage']; ?> % </td>
                  
                  <td><?php echo $row['remarks']; ?> </td>
                  <td><?php echo $row['date_taken']; ?> </td>
                  <td><a href="studentresult-view.php?test_id=<?php echo $row['test_id'];?>&percentage=<?php echo $row['percentage'] ?>">View</a></td>
                </tr>
    <?php
    }
    ?>
              </table>
            </div>
            <!-- /.box-body -->
             <div class="box-footer">
           
            </div>
          </div>
          <!-- /.box -->

      








  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../../footer.php"); ?>


