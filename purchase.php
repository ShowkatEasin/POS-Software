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
                <div class="col-md-3">
                    <div class="from-group">
                        <input type="date" name="pdate" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <input type="text" name="cname" class="form-control" placeholder="Enter Company Name">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <input type="text" name="invoice" class="form-control" placeholder="Enter Invoice Number">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <input readonly type="text" name="stock" class="form-control" placeholder="Available Stock">
                    </div>
                </div>
                </div>
              <div class="row mt-3">
              <div class="col-md-3">
                    <div class="from-group">
                        <input type="text" id="barcode" class="form-control" placeholder="Enter Product Barcode">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <input readonly type="text" id="cost_price" class="form-control" placeholder="Product Cost Price">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <input readonly type="text" name="total" class="form-control" placeholder="Total">
                    </div>
                    <button class="btn btn-info mt-3">Add Items</button>
                </div>
              </div>
              <div class="row mt-3">
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Barcode</th>
                            <th>Price</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                </table>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <div class="from-group">
                        <input type="text" name="totalQnt" class="form-control" placeholder="Total Quantity">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <input readonly type="text" name="dis" class="form-control" placeholder="Total Amount">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <select name="dis" class="form-control">
                            <option value="10">10%</option>
                            <option value="10">15%</option>
                            <option value="10">20%</option>
                            <option value="10">25%</option>
                            <option value="10">30%</option>
                            <option value="10">35%</option>
                            <option value="10">40%</option>
                            <option value="10">45%</option>
                            <option value="10">50%</option>
                            <option value="10">55%</option>
                            <option value="10">60%</option>
                            <option value="10">65%</option>
                            <option value="10">70%</option>
                            <option value="10">75%</option>
                        </select>
                    </div>
                 </div>

                    <div class="col-md-3">
                    <div class="from-group">
                        <input type="text" name="disamount" class="form-control" placeholder="Dis. Amount">
                    </div>
                </div>
                </div>

                <div class="row mt-3">
                <div class="col-md-3">
                    <div class="from-group">
                        <input type="text" name="grandTotal" class="form-control" placeholder="Grand Total">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <input type="text" name="payment" class="form-control" placeholder="Payment">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="from-group">
                        <input type="text" name="due" class="form-control" placeholder="Due">
                    </div>
                </div>
               

                <div class="col-md-3">
                    <div class="from-group">
                        <button name="save" class="form-control">Save and Print</button>
                    </div>
                </div>
                </div>
                </div>
              </div> 
                </div>
              </div>
            </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
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