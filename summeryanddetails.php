  <?php 
    include "includes/header.php";
    include "includes/loader.php";
    include "includes/navbar.php";
    include "includes/mainslider.php";
    ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sales History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales History</li>
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

            <h5>Details</h5>
            <table class="table">
            	<thead>
            		<tr>
            			<th>#sl</th>
            			<th>Date</th>
            			<th>Invoice</th>
            			<th>Product ID</th>
            			<th>Sale Price</th>
            			<th>Quantity</th>
            			<th>Sub Total</th>
            		</tr>
            	</thead>
            	<tbody>
            		<?php 

            			include 'Classes/Sales.php';
            			$obj = new Sales;
            			$invoice = $_GET['invoice'];
            			$sql = $obj->SalesDetails($invoice);
            			$sl = 1;
            			while ($data = $sql->fetch_assoc()) { ?>
            				<tr>
            					<td><?php echo $sl ?></td>
            					<td><?php echo $data["sdate"] ?></td>
            					<td><?php echo $data["invoice"] ?></td>
            					<td><?php echo $data["product_id"] ?></td>
            					<td><?php echo $data["sale_price"] ?></td>
            					<td><?php echo $data["quantity"] ?></td>
            					<td><?php echo $data["total_amount"] ?></td>
            				</tr>
            		<?php $sl++; }

            		?>
            	</tbody>
            </table>
            <h5>Summery</h5>
            <table class="table">
            	<thead>
            		<tr>
            			<th>#sl</th>
            			<th>Date</th>
            			<th>Invoice</th>
            			<th>Total Quantity</th>
            			<th>Total Price</th>
            			<th>Dis</th>
            			<th>Dis Amount</th>
            			<th>Grand Total</th>
            			<th>Pay</th>
            			<th>Due</th>
            		</tr>
            	</thead>
            	<tbody>
            		<?php 

            			$sql = $obj->SalesSummery($invoice);
            			$sl = 1;
            			while ($data = $sql->fetch_assoc()) { ?>
            				<tr>
            					<td><?php echo $sl ?></td>
            					<td><?php echo $data["sdate"] ?></td>
            					<td><?php echo $data["invoice"] ?></td>
            					<td><?php echo $data["total_quantity"] ?></td>
            					<td><?php echo $data["total_price"] ?></td>
            					<td><?php echo $data["dis"] ?></td>
            					<td><?php echo $data["dis_amount"] ?></td>
            					<td><?php echo $data["grand_total"] ?></td>
            					<td><?php echo $data["pay"] ?></td>
            					<td><?php echo $data["due"] ?></td>
            				</tr>
            			<?php $sl++; }
            		?>
            	</tbody>			
            </table>

          </div>
        </div>
        <!-- /.row -->
        <button class="btn btn-info"><i class="fa fa-print"></i></button>
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
