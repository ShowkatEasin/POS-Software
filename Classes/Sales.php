<?php
	include 'connection.php';
	class Sales
	{
		private $con = "";
		function __construct()
		{
			$obj = new Connection;
			$this->con = $obj->connect();
		}

		function SalesSummeryShow(){
			$br_id = $_SESSION['id'];
			$sql = $this->con->query("SELECT * FROM tbl_sales_summery WHERE br_id = '$br_id'");
			return $sql;
		}

		function SalesSummery($invoice){
			$br_id = $_SESSION['id'];
			$sql = $this->con->query("SELECT * FROM tbl_sales_summery WHERE invoice='$invoice' AND br_id = '$br_id'");
			return $sql;
		}
		function SalesSummeryReport(){
			$br_id = $_SESSION['id'];
			$sql = $this->con->query("SELECT * FROM tbl_sales_summery WHERE br_id = '$br_id'");
			return $sql;
		}
		function SalesSummeryReportDate($sdate){
			$br_id = $_SESSION['id'];
			$sdate = date_create($sdate);
			$sdate = date_format($sdate,"d/m/Y");
			$sql = $this->con->query("SELECT * FROM tbl_sales_summery WHERE  sdate = '$sdate' ");
			return $sql;
		}

		function SalesDetails($invoice){
			$br_id = $_SESSION['id'];
			$sql = $this->con->query("SELECT * FROM tbl_sales_details WHERE invoice='$invoice' AND br_id = '$br_id'");
			return $sql;
		}
	}