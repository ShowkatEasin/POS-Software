<?php 
class Purchase
{
	private $con ="";
	function __construct()
    {

        $this->con = new mysqli("localhost","root","","pos_batch05");

    }
    function findProduct($barcode){
      
        $sql =  $this->con->query("SELECT * FROM tbl_product WHERE barcode ='$barcode'");
        $result = $sql->fetch_assoc();
        return $result;
    }
		
	}