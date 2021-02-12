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



    
      </ol>
    </section>

  <section class="content">


         <div class="box">
            <div class="box-header">

              <table class="table table-hover">
              
                <tr>
                  
                  <th>Course</th>
                   <th>Subject</th>
                  <th>Difficulty</th>
                  <th>Passing Rate</th>
                  <th>Total Questions Limit</th>
           
                  <th>Time Limit</th>
                  <th>Teacher</th>
 
                  <th>Manage</th>
                </tr>

 
   <?php
    while($row = $stmt->fetch()){
    ?>
                <tr>
                
                  <td><?php echo $row['test_desc']; ?></td> 
                  <td><?php echo $row['test_subject']; ?></td>
<td>                  <?php 
              if($row['difficulty_id']==1){ echo "EASY";}
              elseif($row['difficulty_id']==2){ echo "MODERATE";}
              elseif($row['difficulty_id']==3){ echo "DIFFICULT";}
              ?> 

                  <td><?php echo $row['passing_rate']."%"; ?></td>
                  <td><?php echo $row['total_questions']; ?></td>
                  <td><?php echo $row['time_limit']." minutes"; ?></td>
               
                  <td>   <?php echo $row['fname']." ".$row['lname']?>
           </td>      
     
           <td><a href ="take/index.php?id=<?php echo $row['test_id']?>">TAKE TEST</i></a>
               
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



            </div>
</body>

  </section>
    <!-- /.content -->
<?php include("../../footer.php"); ?>

  </div>
  <!-- /.content-wrapper -->





