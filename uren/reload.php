<?php
session_start();
require_once "./db/conn.php";

$quantity= $_POST['quantity_value'];
$quantityfun=$crudObj->getCart2($_SESSION['userID'],$_GET['productId']);

if ($_SESSION['islogin'] == 'yes') {
    if ($quantityfun->num_rows > 0) {
        while($quantities = $quantityfun->fetch_assoc()) {
        $quantityNew= $quantity+ $quantities['quantity_cart'];
    
        $crudObj->updateProductQuantity($_SESSION['userID'],$_GET['productId'],$quantityNew);
        }
    }
    else{
        $crudObj->addToCart($_GET['productId'],$_SESSION['userID'],$quantity);
    }
}else if ($_SESSION['islogin'] == 'no') {


}
// header ('location:single-product-tab-style-left.php');

?>