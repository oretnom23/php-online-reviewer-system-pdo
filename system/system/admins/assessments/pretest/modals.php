 

  <form action="btn_functions.php?action=addtest" method="POST" onsubmit="return validate_question()"> 
  <!-- <form action="btn_functions.php?action=addtest" method="POST" >  -->
    <input type="hidden" name="test_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
  <div class="modal modal-default fade" id="modal-addTest">
    <div class="modal-dialog" style="width: 70%">
      <div class="modal-content">
        <div class="modal-header">
           
          <div style="font-size: 20px">Add Examination</div>
        </div>
          <div class="modal-body" >
            <div class="row">
              <div class="col-md-6">
              <div class="col-md-6">           
              <div class="form-group">
                <label>Choose Dificulty</label>
                <select class="form-control  difficulty_id" id="difficulty_id" name="difficulty_id" style="width: 100%;"> 
                  <option value="1">EASY</option>
                  <option value="2">MODERATE</option>
                  <option value="3">DIFFICULT</option> 
                </select>
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
                          echo ' <option value="'.$i.'">'.$i.'%</option>'; 
                        }
                      ?>
                  </select>
                </div> 
              </div>
              </div>  

              <div class="col-md-12"> 
              <div class="form-group">
                  <label>PROGRAM/COURSE</label> 
                  <select id="test_desc" name="test_desc" style="width: 100%;" class="form-control "  tabindex="1" >
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

                  <select id="test_subject" name="test_subject" style="width: 100%;" class="form-control "  tabindex="1" >
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
                        echo ' <option>'.$i.'</option>';
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
                        for($i = 5; $i <= 100; $i=$i+5){
                          echo '<option value="'.$i.'">'.$i.' minutes</option>'; 
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
            <div class="modal-footer">
            <div class="col-md-12">
                <a href="#" class="btn btn-default"  data-dismiss="modal" aria-hidden="true">Close</a>
                <input type="submit" name="btnAddTest" value="Save changes" class="btn btn-primary">
              </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</form>
 

<script src="../../../../bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

  // difficulty_id
  // test_desc
  // test_subject


 
  $('select').on('change', function() {
    var name = this.name;
    var difficulty_id;
    var test_desc;
    var test_subject;

       // alert(  name);



       if (name=="difficulty_id") {
          difficulty_id = this.value;
          test_subject = $("#test_subject").val();
          test_desc = $("#test_desc").val();
       }else if (name=="test_desc") {
          difficulty_id =$("#difficulty_id").val();
          test_subject = $("#test_subject").val();
          test_desc =  this.value;

       }else if (name=="test_subject") {
          difficulty_id =$("#difficulty_id").val();
          test_subject =  this.value;
          test_desc = $("#test_desc").val();

       }else{
        return false;
       }
      

      $.ajax({    //create an ajax request to load_page.php
      type:"POST",
      url: "loaddata.php",             
      dataType: "text",   //expect html to be returned  
      data:{difficulty_id:difficulty_id,course:test_desc,subject:test_subject},               
      success: function(data){     
      $("#loaddata").hide();    
      $("#loaddata").fadeIn();             
      $("#loaddata").html(data); 
        // alert(data);

      }

      });


  });


  $(".checkbox").on("click" ,function(){
    alert("asdas")

      // var difficulty_id;
      // var test_desc;
      // var test_subject;


      // difficulty_id =$("#difficulty_id").val();
      // test_subject =  $("#test_subject").val();
      // test_desc = $("#test_desc").val();

 

      // $.ajax({    //create an ajax request to load_page.php
      // type:"POST",
      // url: "loaddata.php",             
      // dataType: "text",   //expect html to be returned  
      // data:{difficulty_id:difficulty_id,course:test_desc,subject:test_subject},               
      // success: function(data){     
      // $("#loaddata").hide();    
      // $("#loaddata").fadeIn();             
      // $("#loaddata").html(data); 
      //   // alert(data);

      // }

      // });

  })

 $('#test_desc').trigger('change')

    
</script>