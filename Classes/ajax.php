<?php

include "Purchase.php";
$action =$_POST['action'];
$action();


function findProduct(){
    $purchase = new Purchase;
    $barcode = $_POST['barcode'];
    $sql =  $purchase->findProduct($barcode);
    echo json_encode($sql);

}


?>