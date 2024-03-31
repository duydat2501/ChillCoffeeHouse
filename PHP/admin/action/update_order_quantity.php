<?php
$con = mysqli_connect("localhost", "root", "", "quancafe");
if (!$con) {
    echo 'Connection Failed';
    exit();
}
?>

<?php
// require_once 'inc/header.php'; 

// if (!isset($_SESSION['ADMIN'])) {
//     header("location: index.php");
// }

// if ($_SESSION['ADMIN_ROLE'] != 1) {
//     header("location: dashboard.php");
// }

// require_once 'inc/nav.php';
?>

<?php

$order_id = $_POST['order_id'];
$order_status = $_POST['order_status'];

$total = $_POST['total'];
$total_discounting = $_POST['total_discounting'];



$sqlUpdateOrder = "UPDATE `orders` SET delivery = '$order_status' WHERE id = '$order_id'";
mysqli_query($con, $sqlUpdateOrder);

if ($order_status == 1) {
    $total_order      = 0;
    $quantity         = 0;
    $sales            = 0;
    $profit           = 0;
    $total = $total - $total_discounting;
    foreach ($_POST['order_product_id'] as $key => $product_id) {
        $sqlSelectProduct = "SELECT * FROM products WHERE id = '$product_id'";
        $resultSelectProduct = mysqli_query($con, $sqlSelectProduct);
        $product = mysqli_fetch_assoc($resultSelectProduct);

        $product_quantity = $product['amount'];
        $product_sold = $product['qty'];

        

        foreach ($_POST['qty'] as $key2 => $qty) {
            if ($key == $key2) {
                $pro_remain = $product_quantity - $qty;
                $sqlUpdateProduct = "UPDATE products SET amount = '$pro_remain' WHERE id = '$product_id'";
                // $sqlUpdateProductInOrder = "UPDATE informationorder SET qty = '$qty' WHERE idPackage = '$order_id'";
                mysqli_query($con, $sqlUpdateProduct);
                // mysqli_query($con, $sqlUpdateProductInOrder);
                $sqlUpdateOrder = "UPDATE `orders` SET total = '$total', total_discounting = '$total_discounting' WHERE id = '$order_id'";
                mysqli_query($con, $sqlUpdateOrder);
            }
        }
    }

    echo "Success";
} elseif ($order_status != 1 && $order_status != 3) {

    foreach ($_POST['order_product_id'] as $key => $product_id) {
        $sqlSelectProduct = "SELECT * FROM products WHERE id = '$product_id'";
        $resultSelectProduct = mysqli_query($con, $sqlSelectProduct);
        $product = mysqli_fetch_assoc($resultSelectProduct);

        $product_quantity = $product['amount'];
        $product_sold = $product['qty'];

        foreach ($_POST['qty'] as $key2 => $qty) {
            if ($key == $key2) {
                $pro_remain = $product_quantity + $qty;
                $sqlUpdateProduct = "UPDATE products SET amount = '$pro_remain' WHERE id = '$product_id'";
                // $sqlUpdateProductInOrder = "UPDATE informationorder SET qty = '$qty' WHERE idPackage = '$order_id'";
                mysqli_query($con, $sqlUpdateProduct);
                $sqlUpdateOrder = "UPDATE `orders` SET total = '$total', total_discounting = '0' WHERE id = '$order_id'";
                mysqli_query($con, $sqlUpdateOrder);
                // mysqli_query($con, $sqlUpdateProductInOrder);
            }
        }
    }
    echo "Success";
}
?>
