<?php 
	include "Purchase.php";
	$action = $_POST['action'];
	$action();
	
	function findProduct(){
		$purchase = new Purchase;
		$barcode = $_POST['barcode'];
		$sql = $purchase->findProduct($barcode);
		echo json_encode($sql);
	}
	function calQnt(){
		$purchase = new Purchase;
		$invoice = $_POST['invoice'];
		$sql = $purchase->calQnt($invoice);
		
		$totalQnt = 0;
		while ($data = $sql->fetch_assoc()) {
			$totalQnt = $totalQnt + $data["qnt"];
		}
		echo $totalQnt;
	}
	function salesTotalQnt(){
		$purchase = new Purchase;
		$invoice = $_POST['invoice'];
		$sql = $purchase->salesTotalQnt($invoice);
		
		$totalQnt = 0;
		while ($data = $sql->fetch_assoc()) {
			$totalQnt = $totalQnt + $data["quantity"];
		}
		echo $totalQnt;
	}
	function salesTotalAmnt(){
		$purchase = new Purchase;
		$invoice = $_POST['invoice'];
		$sql = $purchase->salesTotalQnt($invoice);
		
		$totalamnt = 0;
		while ($data = $sql->fetch_assoc()) {
			$totalamnt += $data["total_amount"];
		}
		echo $totalamnt;
	}
	function calPrice(){
		$purchase = new Purchase;
		$invoice = $_POST['invoice'];
		$sql = $purchase->calQnt($invoice);
		
		$totalQnt = 0;
		while ($data = $sql->fetch_assoc()) {
			$totalQnt = $totalQnt + $data["total"];
		}
		echo $totalQnt;
	}
	function showItem(){
		$purchase = new Purchase;
		$invoice = $_POST['invoice'];
		$sql = $purchase->showItem($invoice);
		$tdata = "";
		while($data = $sql->fetch_assoc()){
			$tdata .= '<tr>
				<td>'.$data["pdate"].'</td>
				<td>'.$data["barcode"].'</td>
				<td>'.$data["price"].'</td>
				<td>'.$data["qnt"].'</td>
				<td>'.$data["total"].'</td>
				<td> <button value="'.$data["id"].'" class="removeItem btn btn-sm btn-danger">X</button> </td>
			</tr>';
		}
		echo $tdata;
	}
	function addItem(){
		$pdate = $_POST['pdate'];
		$cName =$_POST['cName'];
		$invoice =$_POST['invoice'];
		$product_id =$_POST['product_id'];
		$barcode =$_POST['barcode'];
		$price =$_POST['price'];
		$qnt =$_POST['qnt'];
		$total =$_POST['total'];
		session_start();
		$br_id = $_SESSION["id"];

		$purchase = new Purchase;
		$sql = $purchase->addItem($pdate, $cName, $invoice, $product_id, $barcode, $price, $qnt, $total,$br_id);
		echo $sql;
	}
	function findStock(){
		$product_id = $_POST['product_id'];
		$purchase = new Purchase;
		$sql = $purchase->findStock($product_id);
		echo json_encode($sql);
	}
	function purchaseSummery(){
		$pdate = $_POST['pdate'];
		$cName =$_POST['cName'];
		$invoice =$_POST['invoice'];
		$total_quantity = $_POST['total_quantity'];
		$total_price = $_POST['total_price'];
		$dis = $_POST['dis'];
		$dis_amount = $_POST['dis_amount'];
		$grand_total = $_POST['grand_total'];
		$pay = $_POST['pay'];
		$due = $_POST['due'];
		session_start();
		$br_id = $_SESSION["id"];
		
		$purchase = new Purchase;
		$sql = $purchase->purchaseSummery($pdate,$cName,$invoice,$total_quantity,$total_price,$dis,$dis_amount,$grand_total,$pay,$due,$br_id);
		echo "ok";
		
	}

	function removeItem(){
		$id = $_POST["id"];
		$purchase = new Purchase;
		$sql = $purchase->removeItem($id);
		echo $sql;
	}

	function invoicege(){
		$purchase = new Purchase;
		$sql = $purchase->invoicege();
		if($sql == "Empty"){
			echo "Empty";
		}
		else{
			echo json_encode($sql);
		}

	}

	function SaddItem(){
		session_start();
		$d= $_POST['d'];
	    $invoice=$_POST['invoice'];
	    $product_id=$_POST['product_id'];
	    $sale_price=$_POST['sale_price'];
	    $quantity=$_POST['quantity'];
	    $total_amount=$_POST['total_amount'];
	    $br_id=$_SESSION['id'];
	    $purchase = new Purchase;
		$sql = $purchase->SaddItem($d,$invoice,$product_id,$sale_price, $quantity,$total_amount,$br_id);
		echo $sql;

	}
 function updateStock(){
 	$id = $_POST['id'];
 	$qnt = $_POST['qnt'];
 	$purchase = new Purchase;
	$sql = $purchase->updateStockabc($id,$qnt);
	echo $sql;
 }
 function salesShowItem(){
 	$purchase = new Purchase;
 	$invoice = $_POST['invoice'];
	$sql = $purchase->salesShowItem($invoice);
	$tdata ="";
	while($data= $sql->fetch_assoc()){
		$tdata .='<tr>
		   <td>'.$data["sdate"].'</td>
		   <td>'.$data["invoice"].'</td>
		   <td>'.$data["sale_price"].'</td>
		   <td>'.$data["quantity"].'</td>
		   <td>'.$data["total_amount"].'</td>
		   <td><button value="'.$data["id"].'" class="salesRemoveItem btn btn-sm btn-danger">x</button></td>

		</tr>';
	}
	echo $tdata;
 }
 function insertSalesSummery(){
 	$sdate = $_POST['sdate'];
	$invoice = $_POST['invoice'];
	$total_quantity = $_POST['total_quantity'];
	$total_price = $_POST['total_price'];
	$dis = $_POST['dis'];
	$dis_amount = $_POST['dis_amount'];
	$grand_total = $_POST['grand_total'];
	$pay = $_POST['pay'];
	$due = $_POST['due'];
	session_start();
	$br_id = $_SESSION['id'];
	$purchase = new Purchase;
	$sql = $purchase->insertSalesSummery($sdate,$invoice,$total_quantity,$total_price
    	,$dis,$dis_amount,$grand_total,$pay,$due,$br_id);
	if ($sql) {
		echo ("OK");
	}
	else{
		echo "Wrong";
	}

 }
 function salesRemoveItem(){
 	$id = $_POST['id'];
 	$purchase = new Purchase;
	$sql = $purchase->salesRemoveItem($id);
	if ($sql) {
		echo "remove";
	}
 }