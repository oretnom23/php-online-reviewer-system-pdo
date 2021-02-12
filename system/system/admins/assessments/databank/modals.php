<style type="text/css">
  /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
#loading {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}
 
</style>
<!-- Multiple Choice -->

        <div class="modal fade" id="modal-question">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php?action=add" method="POST" enctype="multipart/form-data" onsubmit="return loading()" >
              <div class="modal-header">
              </div>
              <div class="modal-body">

              <div class="form-group">
                <label>Choose Dificulty</label>
                <select class="form-control select2" name="difficulty_id" style="width: 100%;">

                  <option value="1">EASY</option>
                  <option value="2">MODERATE</option>
                  <option value="3">DIFFICULT</option>

                </select>
              </div>

              <div class="form-group">
                  <label>PROGRAM/COURSE</label> 
                  <select name="test_desc" style="width: 100%;" class="form-control select2"  tabindex="1" >
                    <?php 
                    if ($_SESSION['course']=="CIVIL ENGINEERING") {
                      # code...
                        echo '<option value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>';
                    }elseif ($_SESSION['course']=="ECE") {
                      # code...
                        echo '<option value="ECE">ECE</option>';
                    }else{
                      echo '<option value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>
                             <option value="ECE">ECE</option>';
                    }
                    ?> 
                  </select>  
              </div>
              </div>

              <div class="col-md-12">
              <div class="form-group">
                <label>SUBJECT</label>

                  <select name="test_subject" style="width: 100%;" class="form-control select2"  tabindex="1" >
                  <option value="Mathematics, Surveying and Transportation Engineering">Mathematics, Surveying and Transportation Engineering</option>
                  <option value="Sturctural Design">Sturctural Design</option>
                  <option value="Geotech">Geotech</option>
                  <option value="Mathematics">Mathematics</option>
                  <option value="General Engineering and Applied Science">General Engineering and Applied Science</option>
                  <option value="Electronics Engineering">Electronics Engineering</option>
                  <option value="Electronics System and Technologies">Electronics System and Technologies</option> 
                </select>  
                </div> 

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

                <div class="form-group"> 
                  <label>Attachment Image:</label> 
                  <input type="file" name="personImage" value="" id="personImage"/> 
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

<!-- for difficulty -->
        <div class="modal fade" id="modal-difficulty">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php?action=pretest" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
              </div>
              <div class="modal-body"> 
              <input type="hidden" name="q_id" id="q_id">
              <div class="form-group">
                <label>TEST YOURSELF EXAMINATION</label>
                    <select name="test_id" style="width: 100%;" class="form-control select2" >
                      <?php
                      $user_id = $_SESSION['user_id'];
                      $stmt = $conn->prepare("SELECT * FROM  tests WHERE user_id = '$user_id'  ");
                      $stmt->execute();   

                    
                         while($row = $stmt->fetch()){
                            if($row['difficulty_id']==1){
                              $difficulty = "EASY";
                              } 
                            elseif($row['difficulty_id']==2){
                              $difficulty = "MODERATE";
                              } 
                            elseif($row['difficulty_id']==3){
                              $difficulty = "DIFFICULT";
                              } 

                            echo '<option value='.$row['test_id'].'>Difficulty :'.$difficulty.' | Time Limit :'.$row['time_limit'].'mins | No. of Question : '.$row['total_questions'].'</option>';
                         }
                       ?>
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

        <!-- access code -->

          <div class="modal fade" id="modal-accesscode">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php?action=properexam" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
              </div>
              <div class="modal-body">
                <div id="loading"></div>

                 <input type="hidden" name="q_id" id="q_id">
              <div class="form-group">
                <label>ACCESS CODE</label>
                    <select name="access_code" style="width: 100%;" class="form-control select2" >
                      <?php
                      $user_id = $_SESSION['user_id'];
                       $stmt = $conn->prepare("SELECT * FROM  examproper WHERE user_id = '$user_id' ");
                       $stmt->execute();  

                         while($row = $stmt->fetch()){
                            echo '<option>'.$row['access_code'].'</option>';
                         }
                       ?>
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

    <script src="../../../../../bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
      function loading(){
          $body = $("#loading");
          $body.addClass("loading"); 
          // return false;
      }
 
    </script>