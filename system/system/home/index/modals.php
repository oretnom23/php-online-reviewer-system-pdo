<?php 
include("../../sql_functions.php");

?>

<!-- CREATE COURSE -->

        <div class="modal fade" id="modal-joincourse">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST">
              <div class="modal-header">
              </div>
              <div class="modal-body">

              <div class="box-body">


<div class="col-md-12">
              <div class="form-group">
                  <label>Access Code</label>
                  <input type="text" name="accesscode" class="form-control" placeholder="Input access code" required>
                  <div id="container"></div>
              </div>
</div>


              </div>
              <!-- /.box-body -->


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" name ="btnJoinCourse" value="Add Course" class="btn btn-primary">
              </div>
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<!-- /CREATE COURSE -->




