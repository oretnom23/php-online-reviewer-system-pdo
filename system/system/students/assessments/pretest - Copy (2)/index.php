<?php 
include("../../header.php");

  $stmt =  $conn->prepare("SELECT * FROM tests as T, users as U where T.user_id = U.user_id");
  $stmt->execute();
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Pre Test Examination
  
  
        <i><small></small></i>
      </h1>
     <ol class="breadcrumb">
         <li><a href="#">You are here></li>
         <li><a href="#">Student></li>
               <li><a href="#">Pre test</li>
      </h1>
    </section>


  <section class="content">
    <!-- Main content -->

            <div class="box-header">
            
            </div>

      <div class="row">

        <div class="col-md-12">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              
              <i><?php 
              if($row['difficulty_id']==1){ echo "EASY";}
              elseif($row['difficulty_id']==2){ echo "MODERATE";}
              elseif($row['difficulty_id']==3){ echo "DIFFICULT";}
              ?>
              </i>
              <h2> <?php echo $row['test_desc']?> </h2>
                 <?php echo $row['test_subject']?> 
       
              by: <?php echo $row['fname']." ".$row['lname']?>
            </div>
            <div class="icon">
              <i class="fa fa-laptop"></i>
            </div></a>
           <a href ="take/index.php?id=<?php echo $row['test_id']?>" class="small-box-footer"><i>TAKE</i></a>
          </div>
        </div>
      


<!-- /body -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../../footer.php"); ?>