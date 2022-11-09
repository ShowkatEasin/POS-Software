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
