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
    <div class="content-header">
      <div class="container">
        <div class="row mb-0">
          <div class="col-sm-0">
            <h1 class="m-0">Branch Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

  
    <section class="content">
      <div class="container-fluid">
        <div class="row">

        <?php 
          include "Classes/Branch.php";
          $branch = new Branch;
          $id =$_GET['id'];
          if(isset($_POST["update"])){
            $branch->update($_POST,$id);
          }
          $obj = $branch->findBranch($id);
          $data = $obj->fetch_assoc();

          

      ?>
          <div class="col-md-6 offset-md-3">

         <!-- Branch Edit -->

          <h4 class="login-box-msg">Edit your Branch</h4>

      <form  method="post">

      <div class="col-md-12">
        <div class="input-group mb-3">
          <input type="text" name="bName" class="form-control" placeholder="Branch Name" 
          value ="<?php echo $data["bName"]?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="mName" class="form-control"
           placeholder="Manager Name"  value ="<?php echo $data["mName"]?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" name="phone" class="form-control" placeholder="Phone Number"value ="<?php echo $data["phone"]?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" placeholder="Email Address"value ="<?php echo $data["email"]?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

       
        <div class="col-4">
            <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
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
