<?php
	class Purchase
	{
		private $con="";
		function __construct()
		{
			$this->con= new mysqli("localhost","root","","pos_batch05");
		}
		function findProduct($barcode){
			$sql = $this->con->query("SELECT * FROM tbl_product WHERE barcode='$barcode'");
			$result = $sql->fetch_assoc();
			return $result;
		}
		function showItem($invoice){
			 $sql = $this->con->query("SELECT * FROM tbl_purchase_details WHERE invoice='$invoice'");
			
			return $sql;
		}
		function calQnt($invoice){
			 $sql = $this->con->query("SELECT * FROM tbl_purchase_details WHERE invoice='$invoice'");
			return $sql;
		}
		function removeItem($id){
			 $sql = $this->con->query("DELETE FROM tbl_purchase_details WHERE id='$id'");
			 return $sql;
		}
		function addItem($pdate, $cName, $invoice, $product_id, $barcode, $price, $qnt, $total,$br_id){

			$sql = $this->con->query("INSERT INTO tbl_purchase_details(pdate, cName, invoice, br_id, product_id, barcode, price, qnt, total)VALUES('$pdate', '$cName', '$invoice','$br_id', '$product_id', '$barcode', '$price', '$qnt', '$total')");
			$sql = $this->stockupdateInsert($product_id, $br_id, $qnt);
			if($sql){
				return "200";
			}
			else{
				return "400";
			}
		}

		function purchaseSummery($pdate,$cName,$invoice,$total_quantity,$total_price,$dis,$dis_amount,$grand_total,$pay,$due,$br_id){

			$sql = $this->con->query("INSERT INTO tbl_purchase_summery(pdate,company,invoice,total_quantity,total_price,dis,dis_amount,grand_total,pay,due,br_id)VALUES('$pdate','$cName','$invoice','$total_quantity','$total_price','$dis','$dis_amount','$grand_total','$pay','$due','$br_id')");
		}

		function stockupdateInsert($product_id, $br_id, $qnt){
			
			$sql = $this->con->query("SELECT * FROM tbl_stock WHERE product_id = '$product_id'");
			if($sql->num_rows > 0){
				$data = $sql->fetch_assoc();
				$pasStock = $data["qnt"];
				$totaStock = $pasStock + $qnt;
				$sql= $this->con->query("UPDATE tbl_stock SET qnt = '$totaStock ' WHERE product_id = '$product_id'");
				return $sql;
			}
			else{
				$sql = $this->con->query("INSERT INTO tbl_stock(product_id,br_id,qnt)VALUES('$product_id','$br_id','$qnt')");
				return $sql;
			}
		}
		function findStock($product_id)
		{
			$sql = $this->con->query("SELECT *FROM tbl_stock WHERE product_id = '$product_id'");
			$result = $sql->fetch_assoc();
			return $result;
		}
		function purchaseSummeryShow()
		{
			$sql = $this->con->query("SELECT *FROM tbl_purchase_summery");
			return $sql;
		}







	}