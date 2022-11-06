<?php 

/**
 * 
 */
class Product
{
	private $con="";
	function __construct()
	{
	   $this->con=new mysqli("localhost","root","","pos_batch05");		
	}

    function addNewProduct($allData){
       
       $name = $allData["name"];
       $des = $allData["des"];
       $size = $allData["size"];
       $color  = $allData["color"];
       $barcode = $allData["barcode"];
       $costPrice = $allData["costPrice"];
       $salePrice = $allData["salePrice"];

       $sql=$this->con->query("INSERT INTO tbl_product(name,des,size,color,barcode,costPrice,salePrice)VALUES('$name','$des','$size','$color','$barcode','$costPrice','$salePrice')");

       if($sql){
          return '<div class="alert alert-success"><strong>Success:</strong>Product Successfully Added</div>';

       }


    }
     
    function allProduct(){
        $sql= $this->con->query("SELECT * FROM tbl_product");
        return $sql;
    } 

     function findProduct($id){
        $sql= $this->con->query("SELECT * FROM tbl_product WHERE id='$id'");
        return $sql;
    }
    function delete($id){
        $sql= $this->con->query("DELETE FROM tbl_product WHERE id='$id'");
        echo "<script>window.location.replace('manageproduct.php')</script>";
        
    }

     function updateProduct($allData,$id){
       $name = $allData["name"];
       $des = $allData["des"];
       $size = $allData["size"];
       $color  = $allData["color"];
       $barcode = $allData["barcode"];
       $costPrice = $allData["costPrice"];
       $salePrice = $allData["salePrice"];

        $sql= $this->con->query("UPDATE tbl_product SET name='$name',des='$des',size='$size',color='$color',barcode='$barcode',costPrice='$costPrice',salePrice='$salePrice' WHERE id='$id'");
         echo "<script>window.location.replace('manageproduct.php')</script>";
    }

}