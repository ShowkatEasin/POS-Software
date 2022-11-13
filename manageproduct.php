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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
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
          <div class="col-md-12">

            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage All User Information</h3>
                <a class="btn btn-sm btn-info ml-2" href="addproduct.php"><i class="fas fa-plus"></i></a>
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
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>SL No.</th>
                      <th>Product Name</th>
                      <th>Des</th>
                      <th>Barcode</th>
                      <th>CostPrice</th>
                      <th>SalePrice</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                          include "Classes/Product.php";
                          $product = new Product;
                          
                          if (isset($_GET['id'])) {
                             $product->delete($_GET['id']);
                          }
                          $products = $product->allProduct();
                          if($products->num_rows > 0){$sl=1;
                              while ($data = $products->fetch_assoc()) {  ?>

                                <tr>
                                  <td><?php echo $sl; ?></td>
                                  <td><?php echo $data["name"]; ?></td>
                                  <td><?php echo $data["des"]; ?></td>
                                  <td><?php echo $data["barcode"]; ?></td>
                                  <td><?php echo $data["costPrice"]; ?></td>
                                  <td><?php echo $data["salePrice"]; ?></td>
                                  <td><a href="productedit.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                                    <button data-toggle="modal" data-target="#delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>

                                  </td>
                                </tr>
                                  <!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this Product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="manageproduct.php?id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
                            <?php $sl++;  }
                          }
                          else{
                            echo '<tr><td colspan="9" class="text-center">Data Not Found</td></tr>';
                          }
                      ?>

                  </tbody>
                </table>

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
<?php 
      include "includes/scripts.php";
    ?>
<!-- REQUIRED SCRIPTS -->

</body>
</html>
