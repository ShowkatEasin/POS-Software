<?php 
include 'connection.php';
 class Dashboard{
 	private $con = "";
	function __construct()
	{
		$obj = new Connection;
		$this->con = $obj->connect();
	}
	function totalBranch(){
		$sql = $this->con->query("SELECT count(id) as totalBranch FROM tbl_branch");
		return $sql;
	}
	function totalStock(){
		$br_id = $_SESSION['id']; 
		$sql = $this->con->query("SELECT sum(qnt) as totalStock FROM tbl_stock WHERE br_id ='$br_id' ");
		return $sql;
	}
	function totalSales(){
		$br_id = $_SESSION['id']; 
		$sql = $this->con->query("SELECT sum(total_quantity) as totalSales FROM tbl_sales_summery WHERE br_id ='$br_id' ");
		return $sql;
	}
	function totalPurchase(){
		$br_id = $_SESSION['id']; 
		$sql = $this->con->query("SELECT sum(total_quantity) as totalPurchase FROM tbl_purchase_summery WHERE br_id ='$br_id'");
		return $sql;
	}
 }