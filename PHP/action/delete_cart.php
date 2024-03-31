<?php 
session_start();
$idProduct = $_POST['id'];
unset($_SESSION['cart'][$idProduct]);
echo $idProduct;
 