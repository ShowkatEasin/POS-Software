<?php
include "includes/header.php";

?>

  <!-- Preloader -->
  <?php
  include "includes/loader.php";
?>
  <!-- Navbar -->
 
  <?php
  include "includes/navbar.php";
  ?>
 <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include "includes/mainslider.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
    include "includes/headercontent.php";
?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Branch Manager User List</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-2">
                <table class="table">
                  <thead>
                    <tr>
                      <th>SL No.</th>
                      <th>Branch Name</th>
                      <th>Manager Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    include "Classes/Branch.php";
                    $branch = new Branch;
                    if(isset($_GET['active'])){
                      $id= $_GET['active'];
                      $branch->active($id);
                    }

                    if(isset($_GET['inactive'])){
                      $id= $_GET['inactive'];
                      $branch->inactive($id);
                    }

                    $obj = $branch->allBranches();
                    if($obj->num_rows > 0){
                      while($row = $obj->fetch_assoc()) { $sl=1;
                      if($row["status"]==1){
                        $status = '<a href="usercontrol.php?active='.$row["id"].'" 
                        name="active" class="btn btn-success btn-sm">
                        <i class="fas fa-eye"></i>
                        </a>';
                        
                      } else{
                        $status = '<a href="usercontrol.php?inactive='.$row["id"].'" name="inactive" 
                        class="btn btn-danger btn-sm"><i class="fas fa-eye-slash"></i></a>';
                      } ?>

                      <tbody>
                        <tr>
                          <td><?php echo $sl ?></td>
                          <td><?php echo $row["bName"];?></td>
                          <td><?php echo $row["mName"];?></td>
                          <td><?php echo $row["email"];?></td>
                          <td><?php echo $row["phone"];?></td>
                          <td><?php echo $status ?></td>
                          <td><a href="#"><i class="fa fa-edit btn btn-info btn-sm"></i></a></td>
                          <td><a href="#"><i class="fa fa-edit btn btn-danger btn-sm"></i></a></td>
                         
                        </tr>
                      </tbody>

                     <?php  $sl++; }

          
                    }
                    else{ ?>

                       <tbody>
                        <tr>
                          <td colspan="8" class="text-center"> Data Not Found</td>
                        </tr>
                       </tbody>

                   <?php 
                   
                  }

                
                    ?>

                
                  </tbody>
                </table>
              </div>
          </div>
              <!-- /.card-body -->
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php
  include "includes/footer.php";
  ?>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->

<?php
  include "includes/scripts.php";
  ?>


</body>
</html>
