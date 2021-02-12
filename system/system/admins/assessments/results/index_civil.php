<?php 

include("../../header.php"); 


$user_id = $_SESSION['user_id'];

 $stmt = $conn->prepare("SELECT * FROM  examproper WHERE user_id = '$user_id' and test_desc = 'ECE'");
 $stmt->execute();

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
CIVIL ENGINEERING RESULT </center>

 Teacher: 
             <i>   <?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ?> </h4>


              </table>
            </div>
            <!-- /.box-body -->
             <div class="box-footer">
           
            </div>
          </div>
          <!-- /.box -->
<?php 


 $stmt = $conn->prepare("SELECT * FROM  examproper WHERE user_id = '$user_id' and test_desc = 'CIVIL ENGINEERING'");
 $stmt->execute();
   while($row = $stmt->fetch()){
?>
  <div class="row no-print">      
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              
       
              <h2><i><?php echo $row['test_desc']; ?></i>
<br><?php echo $row['date_time']; ?> </h2>
<br><?php echo $row['category_exam']; ?>  <br>  
<i>   <?php echo  "exam created by: ". $_SESSION['firstname']." ". $_SESSION['lastname'] ?></i> </h4>
   
            </div>
            <div class="icon">
              <i class="fa fa-laptop"></i>
            </div></a>
             <a href ="export/demo/index.php?exam_id= <?php echo $row['test_id']; ?>" class="small-box-footer"><i>VIEW RESULT</i></a>
          </div>
        </div>




   <?php
    }
    ?>






  </script>

  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<div class="row no-print">      
 <?php


  include("../../footer.php"); ?>


