<?php 

include("../../header.php"); 


$user_id = $_SESSION['user_id'];
//$test_desc = $_SESSION['test_desc'];


//  $stmt = $conn->prepare("SELECT * FROM  studentresult_exams as SRE, examproper as E, users as U WHERE SRE.test_id = E.test_id and E.user_id = '$user_id' and U.user_id = SRE.student_id ORDER BY percentage DESC");
 

  $stmt2 = $conn->prepare("SELECT * FROM  examproper WHERE test_desc = 'ECE' ");
 $stmt2->execute(); 
$stmt = $conn->prepare("SELECT * FROM  studentresult_exams as SRE, examproper as E, users as U WHERE SRE.test_id = E.test_id and E.user_id = '$user_id' and U.user_id = SRE.student_id ORDER BY percentage DESC");

 $stmt->execute(); 

?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         RESULTS
        <i><small>This is where the results of examination</small></i>
<br><br>



 <button type="button" class="btn btn-default"><a href="index.php" >OVERALL RESULT</a></li></button>
<button type="button" class="btn btn-default"><a href="index_civil.php" >CIVIL ENGINEERING RESULT</a></li></button>
<button type="button" class="btn btn-default"><a href="index_ce.php" >ELECTRONICS ENGINEERING RESULT</a></li></button>
<!-- <div class="btn-group">
                <button type="button" class="btn btn-default">RESULT</button>
    
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php" >OVERALL RESULT</a></li>
                    <li><a href="index_ce.php"">CIVIL ENGIENEERING</a></li>
                    <li><a href="index_teacher.php"">ECE</a></li>
                    <li class="divider"></li>
                  </ul>
                </div>
                <div class="btn-group"> -->

      </h1>
     
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->




          <div class="box">
            <div class="box-header">
            </div>

            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">

<center>Fellowship Bapist College <br>
College of Engineering and Computer Studies<br>
 OVERALL RESULT </center>

 Teacher: 
             <i>   <?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ?> </h4>


                <tr>

                   <?php 
$c = 0;
$numbering = 1;

?>
     <th> Rank No.</th>

                  <th>Name</th>
                  <th>Program/Course</th>
                  <th>Score</th>
                   
                  <th>Percentage</th>
                    <th>Total Questions</th>

                    <th>Required Perecentage</th>

                  <th>Remarks</th>
                  <th>Date Taken</th>
                <!--  <th>Manage</th> -->
                </tr>
    <?php
    while($row = $stmt->fetch()){
    ?>
                <tr>

                    <td><?php echo $numbering;?>   </td>
                 
                  <td><?php echo $row['fname']; ?> &nbsp;
                  <?php echo $row['mname']; ?>  &nbsp;
                  <?php echo $row['lname']; ?> </td>
                  <td><?php echo $row['test_desc']; ?></td>
                  
                  <td><?php echo $row['score']; ?></td>
                    
                  <td><?php echo $row['percentage']."%"; ?> </td>
                     <td><?php echo $row['total_questions'] ; ?></td>
                       <td><?php echo $row['passing_rate'] ."%"; ?></td>
                  <td><?php echo $row['remarks']; ?> </td>
                  <td><?php echo $row['date_taken']; ?> </td>
                <!--  <td><a href="studentresult-view.php?student_id=<?php echo $row['student_id'];?>&test_id=<?php echo $row['test_id'];?>">View</a></td> -->
                

</tr>

<?php 
$numbering++;?>
 
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




    <div class="row no-print">
  <center><button type="button" class="btn btn-info pull-center" button onclick="myFunction()">Print Result</button>
  <script>
  function myFunction(){


    window.print();
    
  }

  </script>

<br>
<br>  <div class="row no-print">
 <a href="export/demo/final.php"> <button type="button" class="btn btn-info pull-center">EXPORT TO EXCEL</button></a> 
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




Prepared by:

 <i>   <?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ?> </h4>

 <div class="row no-print">      
 <?php include("../../footer.php"); ?>


