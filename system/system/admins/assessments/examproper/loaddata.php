<?php 
  include("../../../connections/db-connect.php");
  $id = $_SESSION['user_id']; 

   $test_subject = $_POST['subject'];
   $test_desc = $_POST['course'];

  $sql ="SELECT * FROM `questions` WHERE `user_id`='$id'  AND `subject` = '$test_subject' AND `Course` = '$test_desc'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();  
?>

 <table id="example1" class="table table-hover">
              
                <thead> 
                  <th></th>
             <!--      <th>Course</th>
                  <th>Subject</th> -->
                  <th>Questions</th>
                  <th>Option A</th>
                  <th>Option B</th>
                  <th>Option C</th>
                  <th>Option D</th>
                  <th>Correct Answer</th>
                  <th>Image</th>
                  <th>Difficulty</th>
                  <!-- <th>Manage</th> -->
                  
                </thead>

    <?php
    while($row = $stmt->fetch()){

      if ($row['difficulty_id']==1) {
        $difficulty  = "EASY";
        # code...
      }elseif ($row['difficulty_id']==2) {
        $difficulty  = "MODERATE";
        # code...
      }elseif ($row['difficulty_id']==3) {
        $difficulty  = "DIFFICULT";
        # code...
      }
    ?>
                <tr> 
                  <td><input class="checkbox" type="checkbox" id="q_id<?php echo $row['q_id'];?>" name="q_id[]" value="<?php echo $row['q_id']; ?>" data-id="<?php echo $row['q_id']; ?>"></td> 
                 <!--  <td><?php echo $row['Course']; ?></td>
                  <td><?php echo $row['subject']; ?></td> -->
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
                  <td><?php echo $difficulty; ?></td>
                 <!--  <td><a href="#" data-id="<?php echo $row['q_id']; ?>" class="pretest" id="pretest" data-toggle="modal" data-target="#modal-difficulty" ><i class="fa fa-send"> TEST YOURSELF</i></a>
                  | <a  href="#" data-id="<?php echo $row['q_id']; ?>" class="properexam" id="properexam" data-toggle="modal" data-target="#modal-accesscode" ><i class="fa fa-send"> PREBOARD</i></a></td> -->
                </tr>
    <?php
    }
    ?>
              </table>


<script src="../../../../bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  // $(".checkbox").on("click" ,function(){
    
  // })

  $(document).ready(function(){

    var $checkboxes = $('#example1 td input[type="checkbox"]');
        
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        var total_question = $("#total_questions").val();
       
        // alert(countCheckedCheckboxes);
        // alert(total_question);
        
        if (countCheckedCheckboxes>total_question) {
           if($(this). prop("checked") == true){
              alert("Questions already rich the limit of the test." );
             $(this).prop('checked', false);
            }
        }
     
        
         
    });

});

  function validate_question(){
      var $checkboxes = $('#example1 td input[type="checkbox"]');
         
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        var total_question = $("#total_questions").val();
       
        // alert(countCheckedCheckboxes);
        // alert(total_question);
        
        if (countCheckedCheckboxes < total_question) { 
             alert("The selected questions is less than the total questions in the test." ); 
             return false;
         } 

         return true;
    } 
</script>