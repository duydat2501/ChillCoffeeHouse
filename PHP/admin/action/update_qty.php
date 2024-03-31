<?php
$con = mysqli_connect("localhost", "root", "", "quancafe");
if (!$con) {
    echo 'Connection Failed';
    exit();
}
?>

<?php
// if (!isset($_SESSION['ADMIN'])) {
//     header("location: index.php");
// }

// if ($_SESSION['ADMIN_ROLE'] != 1) {
//     header("location: dashboard.php");
// }

?>

<?php


$order_id = $_POST['order_code'];
$order_qty = $_POST['order_qty'];

$product_id = $_POST['order_product_id'];

$total = $_POST['total'];

$sqlUpdateInfoOrder = "UPDATE `informationorder` SET qty = '$order_qty' WHERE idPackage = '$order_id' and idProduct = '$product_id'";
mysqli_query($con, $sqlUpdateInfoOrder);



// $order_details = ModelsOrderDetails::where('product_id', $data['order_product_id'])
//     ->where('order_code', $data['order_code'])->first();
// $order_details->product_sales_quantity = $data['order_qty'];
// $order_details->save();

?>
