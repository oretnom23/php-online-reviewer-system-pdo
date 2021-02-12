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

$stmt = $conn->prepare("SELECT * FROM examproper where access_code = '$accesscode' ");
$stmt->execute();

if($stmt->rowCount() == 0){
$repeat = 0;
}

}while($repeat>0);
?>
<form action="btn_functions.php?action=addtest" method="POST" onsubmit="return validate_question()">
        <div class="modal modal-danger fade" id="modal-addTest">
          <div class="modal-dialog" style="width: 70%">
            <div class="modal-content">
              <div class="modal-header">
              </div>
              <div class="modal-body">

                <div class="row">
                  <div class="col-md-6">
                      <div class="col-md-6"> 
                          <div class="form-group">
                            <label>Access Code</label>
                            <input type="text" name="access_code" class="form-control" style="width: 100%;" value="<?php echo $accesscode; ?>" > 
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label>Passing Rate</label>
                            <div class="input-group date">
                              <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                <select name="passing_rate" style="width: 100%;" class="form-control select2" >
                                <?php
                                for($i = 100; $i >= 1; $i--){
                                ?>
                                <option value="<?php echo $i?>"><?php echo $i?> %</option>
                                <?php
                                }
                                ?>
                                </select>
                            </div> 
                          </div>
                        </div>  

                        <div class="col-md-12"> 
                          <div class="form-group">
                            <label>PROGRAM/COURSE</label> 
                            <select id="test_desc" name="test_desc" style="width: 100%;" class="form-control"  tabindex="1" >
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

                          <div class="form-group">
                            <label>SUBJECT</label> 
                            <select id="category_exam" name="category_exam" style="width: 100%;" class="form-control"  tabindex="1" >
                              <option value="Mathematics, Surveying and Transportation Engineering">Mathematics, Surveying and Transportation Engineering</option>
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
                            <select id="total_questions" name="total_questions" style="width: 100%;" class="form-control select2" >
                              <?php
                              for($i = 1; $i <= 200; $i++){
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
                                for($i = 60; $i <= 600; $i=$i+10){
                                ?>
                                <option value="<?php echo $i?>"><?php echo $i?> minutes</option>
                                <?php
                                }
                                ?>
                              </select>
                            </div> 
                          </div>
                        </div>
                    
                  </div>
                  <div class="col-md-6">
                      <div style="font-size: 25px">Select Question</div>
                        <div id="loaddata" style="overflow: auto;height: 300px">
                       
                       </div>
                      </div> 
                  </div>

                
                  
                </div> 
            
              <div class="modal-footer"><div class="col-md-12">
                <a href="#" class="btn btn-default"  data-dismiss="modal" aria-hidden="true">Close</a>
                <input type="submit" name="btnAddTest" value="Save changes" class="btn btn-info"></div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
 </form>


 
        <!-- /.modal -->

<script src="../../../../bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

  // difficulty_id
  // test_desc
  // test_subject


 
  $('select').on('change', function() {
    var name = this.name; 
    var test_desc;
    var test_subject;

    // alert(  name);



      if (name=="test_desc") { 
          test_subject = $("#category_exam").val();
          test_desc =  this.value;

       }else if (name=="category_exam") { 
          test_subject =  this.value;
          test_desc = $("#test_desc").val();

       }
      

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


  });
 </script>