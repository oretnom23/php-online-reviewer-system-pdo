<?php 
include("../../header.php");

?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PROPER EXAMINATION
        <small>Please secure your access code!</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Fixed</li>
      </ol>
    </section>


  <section class="content">
    <!-- Main content -->

            <div class="box-header">
            
            </div>

      <div class="row">

        <div class="col-md-12">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
             
              <h3> TAKE TEST
              </h3>
             
            </div>
            <div class="icon"><a href ="" class="small-box-footer" class="btn btn-info" data-toggle="modal" data-target="#modal-taketest">
              <i class="fa fa-laptop"></i></a>
            </div></a>
           <a href ="" class="small-box-footer" class="btn btn-info" data-toggle="modal" data-target="#modal-taketest"><i>TAKE</i></a>
          </div>
        </div>
   


<!-- /body -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../../footer.php"); ?>



 <div class="modal fade" id="modal-taketest">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="btn_functions.php" method="POST">
              <div class="modal-header">
              </div>
              <div class="modal-body">

      
      


              <div class="form-group">
                <label>Access Code</label>
                  <input type="text" name="access_code" class="form-control" style="width: 100%;" placeholder="Enter access code" required>
              </div>

         <!--          <div class="form-group">
                <label>Date and Time</label>
                  <input type="datetime-local" name="date_time" class="form-control" style="width: 100%;" placeholder="Enter date of Exam" required>
              </div>
            -->

              <div class="modal-footer"><div class="col-md-12">
                <input type="submit" name="btnTakeTest" value="Save" class="btn btn-info"></div>
              </div>

              <div class="footer"></div>
            </div>
            <!-- /.modal-content -->
              </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



