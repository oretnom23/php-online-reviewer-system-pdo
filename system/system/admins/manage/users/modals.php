
<!-- student -->
        <div class="modal fade" id="modal-adduser3">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST">
              <div class="modal-header">
              </div>
              <div class="modal-body">

<div class="col-md-12">
              <div class="form-group">
                <label>Choose Usertype</label>
                <select class="form-control select2" name="usertype_id" style="width: 100%;">
                  <option value="3">Student</option>
            
                </select>
              </div>
</div>
<div class="col-md-12">
              <div class="form-group">
                <label>Firstname</label>
                  <input type="text" name="firstname" class="form-control" style="width: 100%;" placeholder="Enter firstname" required>
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Middlename</label>
                  <input type="text" name="middlename" class="form-control" style="width: 100%;" placeholder="Enter middlename">
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Lastname</label>
                  <input type="text" name="lastname" class="form-control" style="width: 100%;" placeholder="Enter lastname" required>
              </div>
</div>
</div>

<!-- ADD -->
<div class="col-md-12">


<label>PROGRAM/COURSE (*for student only) </label>
                  
                           <select name="course" style="width: 100%;" class="form-control select2"  tabindex="1" >
                            <option value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>
                            <option value="ECE">ECE</option>
                            
               </select>
</div>


<div class="col-md-12">
<label>SEMESTER</label>
                  
                           <select name="year" style="width: 100%;" class="form-control select2"  tabindex="1" >
                            <option value="1ST SEMESTER">1ST SEMESTER</option>
                           <option value="2ND SEMESTER">2ND SEMESTER</option>
                                
               </select>
</div>







<div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                  <input type="text" name="username" class="form-control" style="width: 100%;" placeholder="Enter username" required>
              </div>
</div>

<div class="col-md-6">
              <div class="form-group">
                <label>Password</label>
                  <input type="text" name="password" class="form-control" style="width: 100%;" placeholder="Enter password" required>
              </div>
</div>
 <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" name="btnAddUser" value="Save user" class="btn btn-success pull-right">
              </div>
              </div>


              <!--end-->
             
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->






<!-- admin -->


        <div class="modal fade" id="modal-adduser">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST">
              <div class="modal-header">
              </div>
              <div class="modal-body">

<div class="col-md-12">
              <div class="form-group">
                <label>Choose Usertype</label>
                <select class="form-control select2" name="usertype_id" style="width: 100%;">
               
                  <option value="1">Admin</option>
                </select>
              </div>
</div>
<div class="col-md-12">
              <div class="form-group">
                <label>Firstname</label>
                  <input type="text" name="firstname" class="form-control" style="width: 100%;" placeholder="Enter firstname" required>
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Middlename</label>
                  <input type="text" name="middlename" class="form-control" style="width: 100%;" placeholder="Enter middlename">
              </div>
</div>

<div class="col-md-12">
              <div class="form-group">
                <label>Lastname</label>
                  <input type="text" name="lastname" class="form-control" style="width: 100%;" placeholder="Enter lastname" required>
              </div>
</div>
</div>

<!-- ADD -->
<div class="col-md-12">


</div>







<div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                  <input type="text" name="username" class="form-control" style="width: 100%;" placeholder="Enter username" required>
              </div>
</div>

<div class="col-md-6">
              <div class="form-group">
                <label>Password</label>
                  <input type="text" name="password" class="form-control" style="width: 100%;" placeholder="Enter password" required>
              </div>
</div>
 <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" name="btnAddUser" value="Save user" class="btn btn-success pull-right">
              </div>
              </div>




              <!--end-->


             
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->







<!-- new -->








<!-- new -->




<!-- teacher -->

  <form action="btn_functions.php" method="POST">
        <div class="modal fade" id="modal-adduser2">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Choose Usertype</label>
                        <select class="form-control select2" name="usertype_id" style="width: 100%;">
                       
                          <option value="2">Teacher</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Firstname</label>
                          <input type="text" name="firstname" class="form-control" style="width: 100%;" placeholder="Enter firstname" required>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Middlename</label>
                          <input type="text" name="middlename" class="form-control" style="width: 100%;" placeholder="Enter middlename">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Lastname</label>
                          <input type="text" name="lastname" class="form-control" style="width: 100%;" placeholder="Enter lastname" required>
                      </div>
                    </div>  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Username</label>
                          <input type="text" name="username" class="form-control" style="width: 100%;" placeholder="Enter username" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password</label>
                          <input type="text" name="password" class="form-control" style="width: 100%;" placeholder="Enter password" required>
                      </div>
                    </div>
                    <div class="col-md-12"> 
                      <label>COURSE</label> 
                      <select name="course" style="width: 100%;" class="form-control select2"  tabindex="1" >
                        <option value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>
                        <option value="ECE">ECE</option> 
                      </select>
                    </div>
                  
                </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" name="btnAddUser" value="Save user" class="btn btn-success pull-right">
                  </div>
              </div>  

             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</form>