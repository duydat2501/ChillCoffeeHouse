<?php
require "../code.php";
require "../database.php";
session_start();
$id = $_GET['id'];
$quantity = $_GET['quantity'];

$newProduct = getProductById($id)->fetch_assoc();

if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
    $newProduct['qty'] = $quantity;
    $_SESSION['cart'][$id] = $newProduct;
} else {
    if (array_key_exists($id, $_SESSION['cart'])) {
        $_SESSION['cart'][$id]['qty'] += $quantity;
    } else {
        $newProduct['qty'] = $quantity;
        $_SESSION['cart'][$id] = $newProduct;
    }
}
echo "<pre>";
print_r($newProduct);
print_r($_SESSION['cart']);
// session_destroy();
