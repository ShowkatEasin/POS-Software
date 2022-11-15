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
            <h1 class="m-0">Add Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Purchase</li>
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
          <div class="col-md-3">
          	<div class="from-group">
          		<input type="date" id="pdate" class="form-control">
          	</div>
          </div>
          <div class="col-md-3">
          	<div class="from-group">
          		<input type="text" id="cname" class="form-control" placeholder="Enter Company Name">
          	</div>
          </div>
          <div class="col-md-3">
          	<div class="from-group">
          		<input type="text" id="invoice" class="form-control" placeholder="Enter Invoice Number">
          	</div>
          </div>
          <div class="col-md-3">
          	<div class="from-group">
          		<input readonly type="text" id="stock" class="form-control" placeholder="Available Stock">
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
          		<input readonly type="hidden" id="product_id" class="form-control" placeholder="Product Cost Price">
          <div class="col-md-3">
          	<div class="from-group">
          		<input type="text" id="quantity" class="form-control" placeholder="Enter Quantity">
          	</div>
          </div>
          <div class="col-md-3">
          	<div class="from-group">
          		<input readonly type="text" id="total" class="form-control" placeholder="Total">
          	</div>
          	<button class="addItem btn btn-info mt-2">Add Item</button>
          </div>
        </div>
        <div class="row mt-2">
        	<table class="table" border="1">
        		<thead>
        			<tr>
        				<th>Date</th>
        				<th>Barcode</th>
        				<th>Price</th>
        				<th>Quantity</th>
                <th>Total</th>
        				<th>Remove</th>
        			</tr>
        		</thead>
            <tbody class="tdata">
               
            </tbody>
        	</table>
        </div>
        <div class="row">
        	<div class="col-md-3">
	          	<div class="from-group">
	          		<input type="text" id="totalQnt" class="form-control" placeholder="Total Quantity">
	          	</div>
        	</div>
        	<div class="col-md-3">
        		<div class="from-group">
	          		<input type="text" id="totalAmount" class="form-control" placeholder="Total Amount">
	          	</div>
        	</div>
        	<div class="col-md-3">
        		<div class="from-group">
	          		<select id="dis" class="form-control">
                  <option value="0">10%</option>
	          			<option value="10">10%</option>
	          			<option value="15">15%</option>
	          			<option value="20">20%</option>
	          			<option value="25">25%</option>
	          			<option value="30">30%</option>
	          			<option value="35">35%</option>
	          			<option value="40">40%</option>
	          			<option value="45">45%</option>
	          			<option value="50">50%</option>
	          			<option value="55">55%</option>
	          			<option value="60">60%</option>
	          			<option value="65">65%</option>
	          			<option value="70">70%</option>
	          			<option value="75">75%</option>
	          		</select>
	          	</div>
        	</div>
        	<div class="col-md-3">
        		<div class="from-group">
	          		<input type="text" id="disamount" class="form-control" placeholder="Dis. Amount">
	          	</div>
        	</div>
        	<div class="col-md-3 mt-2">
        		<div class="from-group">
	          		<input type="text" id="grandTotal" class="form-control" placeholder="Grand Total">
	          	</div>
        	</div>
        	<div class="col-md-3 mt-2">
        		<div class="from-group">
	          		<input type="text" id="pay" class="form-control" placeholder="Payment">
	          	</div>
        	</div>
        	<div class="col-md-3 mt-2">
        		<div class="from-group">
	          		<input type="text" id="due" class="form-control" placeholder="due">
	          	</div>
        	</div>
        	<div class="col-md-3 mt-2">
        		<div class="from-group">
	          		<button id="save" class="btn btn-success form-control">Save & Print</button>
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
