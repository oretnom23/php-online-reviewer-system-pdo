<?php 
$course_id = $_SESSION['course_id'];

?>

        <div class="modal fade" id="modal-addquiz">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
              </div>
              <div class="modal-body">
<div class="col-md-4">           
              <div class="form-group">
                <label>Choose Topic</label>
                <select class="form-control select2" name="topic_id" style="width: 100%;">
<?php 

  $stmt = $conn->prepare("SELECT * FROM  lessons_topics 
  where  course_id = '$course_id' ");
   $stmt->execute();
    while($row = $stmt->fetch()){
?>
                  <option value="<?php echo $row['topic_id'];?>"><?php echo $row['topic_desc'] ?></option>
<?php 
  }
?>
                </select>
              </div>
</div>

<div class="col-md-4">
              <div class="form-group">
                <label>Description</label>
                  <input type="text" name="description" class="form-control" style="width: 100%;" placeholder="Enter description" required>
              </div>
</div>

<div class="col-md-4">
              <div class="form-group">
                <label>Date</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="quiz_date" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                  <label>Instruction for Multiple Choice</label>
                  <textarea name="instruct_mc" row="10" class="form-control" style="width: 100%;" placeholder="Enter instruction" required></textarea>
              </div>
</div>


<div class="col-md-12">
              <div class="form-group">
                  <label>Instruction for Identification</label>
                  <textarea name="instruct_id" row="10" class="form-control" style="width: 100%;" placeholder="Enter instruction" required></textarea>
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                  <label>Instruction for Essay</label>
                  <textarea name="instruct_es" row="10" class="form-control" style="width: 100%;" placeholder="Enter instruction" required></textarea>
              </div>
</div>

<div class="col-md-4">
              <div class="form-group">
                    <label>Total Multiple Choices</label>
                    <select name="total_mc" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 1; $i <= 100; $i++){
                      ?>
                    <option><?php echo $i?></option>
                    <?php
                    }
                    ?>
                    </select>
              </div>
</div>

<div class="col-md-4">
              <div class="form-group">
                    <label>Number of Identifications</label>
                    <select name="total_id" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 1; $i <= 100; $i++){
                      ?>
                    <option><?php echo $i?></option>
                    <?php
                    }
                    ?>
                    </select>
              </div>
</div>

<div class="col-md-4">
              <div class="form-group">
                    <label>Number of Essay</label>
                    <select name="total_es" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 1; $i <= 100; $i++){
                      ?>
                    <option><?php echo $i?></option>
                    <?php
                    }
                    ?>
                    </select>
              </div>
</div>






<div class="col-md-4">
<div class="bootstrap-timepicker">
              <div class="form-group">
                <label>Time Start</label>
                <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                 <input type="text" name="time_start" class="form-control timepicker"></div>
                  
                <!-- /.input group -->
              </div>
</div>
</div>

<div class="col-md-4">
<div class="bootstrap-timepicker">
              <div class="form-group">
                <label>Time End</label>
                <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                 <input type="text" name="time_end" class="form-control timepicker"></div>
                  
                <!-- /.input group -->
              </div>
</div>
</div>

<div class="col-md-4">

              <div class="form-group">
                <label>Time Limit</label>
                <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                    <select name="time_limit" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 5; $i <= 100; $i=$i+5){
                      ?>
                    <option><?php echo $i?> minutes</option>
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
                <input type="submit" name="btnAddQuiz" value="Save changes" class="btn btn-info"></div>
              </div>
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




<!-- Multiple Choice -->

        <div class="modal fade" id="modal-addmc">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
              </div>
              <div class="modal-body">


              <div class="form-group">
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
                <input type="submit" name="btnAddMc" value="Save" class="btn btn-info"></div>
              </div>

              <div class="footer"></div>
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




<!-- Identifications -->


        <div class="modal fade" id="modal-addid">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header"></div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Question</label>
                  <textarea name="description" row="10" class="form-control" style="width: 100%;" placeholder="Enter question" required></textarea>
              </div>
              <div class="form-group">
                <label>Correct Answer</label>
                  <input type="text" name="answer" class="form-control" style="width: 100%;" placeholder="Enter answer" required>
              </div>

              <div class="modal-footer"><div class="col-md-12">
                <input type="submit" name="btnAddId" value="Save" class="btn btn-info"></div>
              </div>

              <div class="footer"></div>
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>





<!-- Essays -->


        <div class="modal fade" id="modal-addes">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header"></div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Question</label>
                  <textarea name="description" row="10" class="form-control" style="width: 100%;" placeholder="Enter question" required></textarea>
              </div>

              <div class="form-group">
                <label>Points</label>
                    <select name="points" style="width: 100%;" class="form-control select2" >
                    <?php
                    for($i = 1; $i <= 100; $i++){
                      ?>
                    <option><?php echo $i?></option>
                    <?php
                    }
                    ?>
                    </select>
              </div>
                  
                <!-- /.input group -->
              </div>

              <div class="modal-footer"><div class="col-md-12">
                <input type="submit" name="btnAddEs" value="Save" class="btn btn-info"></div>
              </div>

              <div class="footer"></div>
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>