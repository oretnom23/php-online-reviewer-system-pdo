<?php 


include("../../../../../connections/db-connect.php"); 

$user_id = $_SESSION['user_id'];

$exam_id = $_REQUEST['exam_id'];
if($exam_id == ""){
 $stmt = $conn->prepare("SELECT * FROM  studentresult_exams as SRE, examproper as E, users as U WHERE SRE.test_id = E.test_id and E.user_id = '$user_id' and U.user_id = SRE.student_id ORDER BY percentage DESC ");
 $stmt->execute(); }
else{
   $stmt = $conn->prepare("SELECT * FROM  studentresult_exams as SRE, examproper as E, users as U WHERE SRE.test_id = E.test_id and E.user_id = '$user_id' and U.user_id = SRE.student_id and SRE.test_id = '$exam_id' ORDER BY percentage DESC");
 $stmt->execute();
}


?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

  <section class="content">
    <!-- Main content -->


     <div class="box">
            <div class="box-header">
            </div>

            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
<br><br>
<center>Fellowship Bapist College <br>
College of Engineering and Computer Studies<br>
      RESULT</center>

 Teacher: 
             <i>   <?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ?> </h4>


                <tr>

                   <?php 
$c = 0;
$numbering = 1;

?>
</center>
     <th> Rank No.</th>

                  <th>Name</th>
                  <th>Program/Course</th>
                  <th>Score</th>
                  <th>Percentage</th>
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

      
<br>



    <script>
      $(function() {
        $(".table2excel").table2excel({
          exclude: ".noExl",
          name: "Excel Document Name",
          filename: "result.xls",
          fileext: ".xls",
          exclude_img: true,
          exclude_links: true,
          exclude_inputs: true
        });
      });
    </script>




  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script type="text/javascript">
 // window.location.href="../../index.php";
</script>  



<div class="row no-print">
<center><button type="button" class="btn btn-info pull-left" button onclick="myFunction()">Print Result</button>
<script>
function myFunction(){


  window.print();
  
}

  </script>

