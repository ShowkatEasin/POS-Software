<?php
include 'connection.php';
	class Purchase
	{
		private $con = "";
		function __construct()
		{
			$obj = new Connection;
			$this->con = $obj->connect();
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
		function salesTotalQnt($invoice){
			 $sql = $this->con->query("SELECT * FROM tbl_sales_details WHERE invoice='$invoice'");
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

		function invoicege(){
			$sql = $this->con->query("SELECT max(invoice) as invoice FROM tbl_sales_details");

			if ($sql->num_rows > 0) {
				$sql = $sql->fetch_assoc();
				return $sql;
			}
			else{
				return "Empty";
			}
		}

		function SaddItem($sdate,$invoice,$product_id,$sale_price, $quantity,$total_amount,$br_id){

			$sql = $this->con->query("INSERT INTO tbl_sales_details(sdate,invoice,product_id,sale_price, quantity,total_amount,br_id)VALUES('$sdate','$invoice','$product_id','$sale_price', '$quantity','$total_amount','$br_id')");
			return $sql;
		}

		function updateStockabc($id,$qnt){

			$find = $this->con->query("SELECT * FROM tbl_stock WHERE product_id = '$id'");
			
			if ($find->num_rows > 0) {
				$data = $find->fetch_assoc();
				$pastQnt = $data["qnt"];
				$total = $pastQnt - $qnt;
				$sql = $this->con->query("UPDATE tbl_stock SET qnt = '$total' WHERE product_id = '$id'");
				return $sql;
			}
		}
		function salesShowItem($invoice){
			$sql = $this->con->query("SELECT * FROM tbl_sales_details WHERE invoice = '$invoice'");
			return $sql;
		}

		function insertSalesSummery($sdate,$invoice,$total_quantity,$total_price
    	,$dis,$dis_amount,$grand_total,$pay,$due,$br_id){

			$sql=$this->con->query("INSERT INTO tbl_sales_summery(sdate,invoice,total_quantity,total_price
    	,dis,dis_amount,grand_total,pay,due,br_id)VALUES('$sdate','$invoice','$total_quantity','$total_price'
    	,'$dis','$dis_amount','$grand_total','$pay','$due','$br_id')");
			return $sql;
    	}
    	function salesRemoveItem($id){
    		$qntFind = $this->con->query("SELECT * FROM tbl_sales_details WHERE id ='$id' ");

    		if ($qntFind->num_rows > 0) {

    			$qntData = $qntFind->fetch_assoc();
    			$preQnt = $qntData["quantity"];
    			$pid=$qntData["product_id"];

    			$find = $this->con->query("SELECT * FROM tbl_stock WHERE product_id ='$pid' ");

    			if($find->num_rows > 0){

    				$data = $find->fetch_assoc();
    				$pastqnt = $data["qnt"];
    				$updateQnt = $pastqnt + $preQnt;

    				$sql = $this->con->query("UPDATE tbl_stock SET qnt='$updateQnt' WHERE product_id = '$pid'");

    				$delete = $this->con->query("DELETE FROM tbl_sales_details WHERE id = '$id'");
    				return $delete;
    			
    			}

    		}
	}
}