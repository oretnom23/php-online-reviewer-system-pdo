<?php 
include("../../../../../connections/db-connect.php"); 


$user_id = $_SESSION['user_id'];

$exam_id = $_REQUEST['exam_id'];
if($exam_id == ""){
 $stmt = $conn->prepare("SELECT * FROM  studentresult_exams as SRE, examproper as E, users as U WHERE SRE.test_id = E.test_id and E.user_id = '$user_id' and U.user_id = SRE.student_id ");
 $stmt->execute(); }
else{
   $stmt = $conn->prepare("SELECT * FROM  studentresult_exams as SRE, examproper as E, users as U WHERE SRE.test_id = E.test_id and E.user_id = '$user_id' and U.user_id = SRE.student_id and SRE.test_id = '$exam_id' ");
 $stmt->execute();
}


?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../dist/jquery.table2excel.min.js"></script>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Results

      </h1>
     </section>

  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
<a href="export/examples/demo.html"> <button type="button" class="btn btn-info pull-right">EXPORT TO EXCEL</button></a>
            </div>
            <div class="box-body table-responsive no-padding">

              <table class="table2excel" data-tableName="Test Table 1">
              
                <td>Fellowship Baptist College</td>
               <tr>
               <td>Students Result</td>

               

                 <tr>

                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Program/Course</th>
                  <th>Score</th>
                  <th>Remarks</th>
                  <th>Date Taken</th>
       
                </tr>
    <?php
    while($row = $stmt->fetch()){
    ?>
                <tr>
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['mname']; ?></td>
                  <td><?php echo $row['lname']; ?> </td>
                  <td><?php echo $row['test_desc']; ?></td>
                  <td><?php echo $row['score']; ?></td>
                  <td><?php echo $row['remarks']; ?> </td>
                  <td><?php echo $row['date_taken']; ?> </td>
                 
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
  window.location.href="../../index.php";
</script>  -->


