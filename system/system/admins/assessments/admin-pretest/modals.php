<?php 
$repeat = 1;
do {

$lettersArr = array("A", "B", "C", "D", "E","F", "G", "H", "I", "J","K", "L", "M", "N", "O","P", "Q", "R", "S", "T","U", "V", "W", "X", "Y","Z", "1", "2", "3", "4","5", "6", "7", "8", "9");
$tempArr = array();
$accesscode = "";
for($i = 0; $i < 6; $i++){
  $randNum = (rand(0,33));
  $tempArr[$i]=$lettersArr[$randNum];
  $accesscode = $accesscode.$tempArr[$i];
  }

$stmt = $conn->prepare("SELECT * FROM pre_exam where access_code = '$accesscode' ");
$stmt->execute();

if($stmt->rowCount() == 0){
$repeat = 0;
}

}while($repeat>0);
?>
        <div class="modal fade" id="modal-addTest">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST">
              <div class="modal-header">
              </div>
              <div class="modal-body">

<div class="col-md-6">

              <div class="form-group">
                  
                <!-- /.input group -->
              <div class="form-group">
                <label>Choose Dificulty</label>
                <select class="form-control select2" name="difficulty_id" style="width: 100%;">

                  <option value="EASY">EASY</option>
                  <option value="MODERATE">MODERATE</option>
                  <option value="DIFFICULT">DIFFICULT</option>

                </select>
              </div>
              </div>


</div>
<div class="col-md-6">

              <div class="form-group">
                <label>Passing Rate</label>
                <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                    <select name="passing_rate" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 75; $i >= 1; $i--){
                      ?>
                    <option value="<?php echo $i?>"><?php echo $i?> %</option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                  
                <!-- /.input group -->
              </div>
</div>  

<div class="col-md-12">



<div class="form-group">
                <label>PROGRAM/COURSE</label>
                  
                           <select name="test_desc" style="width: 100%;" class="form-control select2"  tabindex="1" >
                            <option value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>
                            <option value="ECE">ECE</option>
                            
               </select>

          
              </div>

<div class="form-group">
                <label>SUBJECT</label>
                  
                           <select name="category_exam" style="width: 100%;" class="form-control select2"  tabindex="1" >
<option value="Mathematics, Surveying and Tratest_descon Engineering">Mathematics, Surveying and Transportation Engineering</option>
                              <option value="Sturctural Design">Sturctural Design</option>
                        <option value="Geotech">Geotech</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="General Engineering and Applied Science">General Engineering and Applied Science</option>
                        <option value="Electronics Engineering">Electronics Engineering</option>
                        <option value="Electronics System and Technologies">Electronics System and Technologies</option>
                                    
                             </select>
              </div>
</div>


<div class="col-md-6">
              <div class="form-group">
                    <label>Total Questions</label>
                    <select name="total_questions" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 100; $i >= 1; $i--){
                      ?>
                    <option><?php echo $i?></option>
                    <?php
                    }
                    ?>
                    </select>
              </div>
</div>



<div class="col-md-6">

              <div class="form-group">
                <label>Time Limit</label>
                <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                    <select name="time_limit" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 10; $i <= 600; $i=$i+10){
                      ?>
                    <option value="<?php echo $i?>"><?php echo $i?> minutes</option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                  
                <!-- /.input group -->
              </div>
</div>


   

              </div>
            
              <div class="modal-footer"><div class="col-md-12">
                <input type="submit" name="btnAddTest" value="Save changes" class="btn btn-info"></div>
              </div>
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




<!-- Multiple Choice -->

        <div class="modal fade" id="modal-question">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
              <div class="modal-body">

      



                  <label>Question</label>
                  <textarea name="description" row="10" class="form-control" style="width: 100%;" placeholder="Enter question" required></textarea>
              </div>


              <div class="form-group">
                <label>Option A</label>
                  <input type="text" name="option_a" class="form-control" style="width: 100%;" placeholder="Enter option a" required>
              </div>

              <div class="form-group">
                <label>Option B</label>
                  <input type="text" name="option_b" class="form-control" style="width: 100%;" placeholder="Enter option b" required>
              </div>

              <div class="form-group">
                <label>Option C</label>
                  <input type="text" name="option_c" class="form-control" style="width: 100%;" placeholder="Enter option c" required>
              </div>

              <div class="form-group">
                <label>Option D</label>
                  <input type="text" name="option_d" class="form-control" style="width: 100%;" placeholder="Enter option d" required>
              </div>

              <div class="form-group">
                <label>Correct Answer</label>
                    <select name="answer" style="width: 100%;" class="form-control select2" >
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                    </select>
                    </div>
                  
                <!-- /.input group -->
              </div>

              <div class="modal-footer"><div class="col-md-12">
                <input type="submit" name="btnAddQuestion" value="Save" class="btn btn-info"></div>
              </div>

              <div class="footer"></div>
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

