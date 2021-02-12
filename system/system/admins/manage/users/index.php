<?php 
include("../../header.php"); 
include("modals.php"); 

$user_id = $_SESSION['user_id'];

 $stmt = $conn->prepare("SELECT * FROM  users");
 $stmt->execute(); 



?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modify All Users Accounts <br>






 

     
                  <button type="button" class="btn btn-default"><a href="index.php" >All Users Account</a></li></button>
       <button type="button" class="btn btn-default"><a href="index_student.php" >Student's Account </a></li></button>
      <button type="button" class="btn btn-default"><a href="index_teacher.php" >Teacher's Account</a></li></button>
      <button type="button" class="btn btn-default"><a href="index_admin.php" >Admin Account</a></li></button>
    
                 <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php" >All Users</a></li>
                    <li><a href="index_student.php"">Student</a></li>
                    <li><a href="index_teacher.php"">Teacher</a></li>
                      <li><a href="index_admin.php"">Admin</a></li>
                    <li class="divider"></li> -->
              
   
    
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->

   

          <div class="box">
            <div class="box-header">
                
            </div>
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">

              
                <tr>
                  

<?php 
$c = 0;
$numbering = 1;

?>
     <th>No.</th>
                  <th> User Type</th>
                  <th>Name</th>
                                    
                  <th>Username</th>
            
                   
              
                  <th>Manage</th>
                </tr>
    <?php
    while($row = $stmt->fetch()){
    ?>
                <tr>
                 <td><?php echo $numbering;?> </td>
                  <td><?php echo $row['user_type']; ?> </td>
                  
                  <td><?php echo $row['fname']; ?> &nbsp;
                  <?php echo $row['mname']; ?>  &nbsp;
                  <?php echo $row['lname']; ?> </td>
               
                  <td><?php echo $row['username']; ?> </td>
           
              
                  <td><a href = "user-update.php?user_id=<?php echo $row['user_id']; ?>" ><i class="fa fa-edit"> Edit</i></a> 
                  
                    <a href = "user-delete.php?id=<?php echo $row['user_id']; ?>" ><i class="fa fa-times"> Remove</i></a></t>
                </tr>

                <?php 
$numbering++;?>

    <?php
    }
    ?>


              </table>
            </div>
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


