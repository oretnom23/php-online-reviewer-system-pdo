<?php 
include("../../header.php"); 
include("modals.php"); 
$user_id = $_SESSION['user_id'];


 $stmt = $conn->prepare("SELECT * FROM  examproper WHERE user_id = '$user_id' ");
 $stmt->execute();  


?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       PREBOARD EXAMINATION
        <i><small>This is where to add PREBOARD examination</small></i>
      </h1>
    
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
                <button type="button" id="add_examproper_modal" class="btn btn-info" data-toggle="modal" data-target="#modal-addTest">Add Examination</button></a>
            </div>
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
              
                <tr>
                  
                  <th>Course</th>
                   <th>Subject</th>
                  <th>Total Questions</th>
                  <th>Passing Rate</th>
                  <th>Time Limit</th>
                  <th>Access Code</th>
       <!--<th> Date and Time</th>-->
 
                  <th>Manage</th>
                </tr>

    <?php
    while($row = $stmt->fetch()){
    ?>
                <tr>
                  <td><?php echo $row['test_desc']; ?></a></td>
                
                  <td><?php echo $row['category_exam']; ?></td> 
                  <td><?php echo $row['total_questions']; ?></td>
                  <td><?php echo $row['passing_rate']."%"; ?></td> 
                  <td><?php echo $row['time_limit']." minutes"; ?></td>
                  <td><?php echo $row['access_code']; ?></td>      
        <!--<td><?php echo $row['date_time']; ?></td>      -->


            
              <td> <a href="questions-view.php?id=<?php echo $row['access_code']; ?>" ><i class="fa fa-info"> View Question</i></a>|<a href = "exam-update.php?test_id=<?php echo $row['test_id']; ?>" ><i class="fa fa-edit"> Edit</i></a> |
               <a class="removeTest"  href = "exam-delete.php?test_id=<?php echo $row['test_id']; ?>" ><i class="fa fa-times"> Remove</i></a></td>
               
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


<script type="text/javascript">
  $(document).on("click",".removeTest",function(){
     
     if (confirm("Do you want to delete this test?")) {
      return true;
     }else{
      return false;
     };

  });

  $("#add_examproper_modal").on("click" ,function(){
 
 
      var test_desc;
      var test_subject;

 
      test_subject =  $("#category_exam").val();
      test_desc = $("#test_desc").val();

 

      $.ajax({    //create an ajax request to load_page.php
      type:"POST",
      url: "loaddata.php",             
      dataType: "text",   //expect html to be returned  
      data:{course:test_desc,subject:test_subject},               
      success: function(data){     
        $("#loaddata").hide();    
        $("#loaddata").fadeIn();             
        $("#loaddata").html(data); 
        // alert(data);

      }

      });

  })
</script>