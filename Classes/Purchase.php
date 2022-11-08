<?php 
class Purchase
{
	private $con ="";
	function __construct()
    {

        $this->con = new mysqli("localhost","root","","pos_batch05");

    }
    function findProduct($barcode){
      
        $sql =  $this->con->query("SELECT * FROM tbl_product WHERE
         barcode ='$barcode'");
        $result = $sql->fetch_assoc();
        return $result;
    }

     public function addItem ($pdate, $cName, $invoice, 
     $product_id, $barcode ,$price, $qnt , $total, $br_id,){

       $sql =  $this->con->query ("INSERT INTO tbl_purchase_details (pdate, cName ,invoice, br_id, product_id,
       barcode, price, qnt, total)VALUES('$pdate', '$cName' ,'$invoice','$br_id',
       '$product_id' , '$barcode' ,'$price','$qnt' , '$total')");
       if($sql){
        echo "Ok";
       }

     }


}