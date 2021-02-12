<?php 
include("../../header.php"); 

 $user_id = $_REQUEST['student_id'];
 $test_id = $_REQUEST['test_id'];


$stmt1 =  $conn->prepare("SELECT * FROM examproper where test_id = '$test_id' ");
  $stmt1->execute();
while($row1 = $stmt1->fetch()){ 
 $_SESSION['total_questions']=$row1['total_questions'];
 $_SESSION['passing_rate']=$row1['passing_rate'];


}

$total_questions =$_SESSION['total_questions'];
$passing_rate =$_SESSION['passing_rate'];

$stmt =  $conn->prepare("SELECT * FROM studentdata_exams as ST, questions as Q where ST.test_id = '$test_id' and ST.student_id = '$user_id' and Q.q_id = ST.q_id");
  $stmt->execute();


?>








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

            </div>



<table>
  <tr>
    <th>Questions</th>
    <th>Answers</th>
    <th>Remarks</th>
  </tr>
<?php 
$mc_score = 0;
while($row = $stmt->fetch()){ 
?>
  <tr>
    <td><?php echo $row['question_desc'];?></td>
    <td><?php echo $row['answer'];?></td>
    <?php if($row['status']=='1'){
  $mc_score++; ?>
  <td><img  src="../../../img/check.jpg" width="50px" alt="Photo"> </td>
    <?php } 
    else{ ?>
  <td><img  src="../../../img/wrong.jpg" width="50px" alt="Photo"> </td>
     <?php  }?>
  </tr>
<?php
}
?>




  <th><?php echo "Score:"; ?></td>
  <th><?php echo $mc_score; ?></td>
  <?php $remark = $total_questions*$passing_rate/100?>
  <td> 

  <?php if($mc_score >= $remark){
    echo $remarks = "PASS";
    } 
    else{
      echo $remarks = "FAILED";
    }

    ?></td>
 </table>

</div>



</form>
        
  </div>
  



</body>
</html>


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


