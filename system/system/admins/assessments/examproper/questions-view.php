<?php 
include("../../header.php"); 
include("modals.php"); 
$user_id = $_SESSION['user_id'];
$id =  $_GET['id'];

 // $stmt = $conn->prepare("SELECT * FROM  exam_questions WHERE user_id = '$user_id' and test_id = '$id' ");
 $stmt = $conn->prepare("SELECT *,q.q_id as 'qid' FROM  questions q, tblexamquestion e
  WHERE q.`q_id`=e.`q_id` AND user_id = '$user_id' and access_code = '$id'");
 $stmt->execute();  

?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PROPER EXAM QUESTIONAIRE
  

      </h1>
     
    </section>

  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
          
                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-question">Add Questions</button></a> -->
               <a href = "index.php" ?> << BACK TO PROPER EXAM </button></a>
 
            </div>
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
   
    <?php 
$c = 0;
$numbering = 1;

?>
     <th> No.</th>
         
                
                  <th>Questions</th>
                  <th>Option A</th>
                  <th>Option B</th>
                  <th>Option C</th>
                  <th>Option D</th>
                  <th>Correct Answer</th>
                  <th>Image</th>
                  <th>Manage</th>
                </tr>

    <?php
    while($row = $stmt->fetch()){
    ?>
                
                       <td><?php echo $numbering;?>   </td>
                 
                  <td><?php echo $row['question_desc']; ?></td>
                  <td><?php echo $row['option_a']; ?></td>
                  <td><?php echo $row['option_b']; ?></td>
                  <td><?php echo $row['option_c']; ?></td>
                  <td><?php echo $row['option_d']; ?></td>
                  <td><?php echo $row['correct_answer']; ?></td>
                   <?php  if($row['attachment_file']=="files/") { ?>
                   <td id="stretch">None</td>
                  <?php }else{ ?>
                  <td id="stretch"><img src="<?php echo $row['attachment_file']; ?>"/> </td>
                 <?php } ?>
                  <td><a class="removeQuestion" href = "btn_functions.php?action=remove&id=<?php echo $row['q_id']; ?>&code=<?php echo $row['access_code']; ?>" ><i class="fa fa-times"> Remove </i></a> 
       

               
                      </tr>

  <?php 
$numbering++;?>
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
  $(document).on("click",".removeQuestion",function(){
     
     if (confirm("Do you want to delete this test?")) {
      return true;
     }else{
      return false;
     };

  });
</script>