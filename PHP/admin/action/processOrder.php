<?php
$id = $_GET['id'];
require "../../database.php";

$sql_select = "SELECT informationorder.qty AS qty, products.amount AS amount
               FROM informationorder 
               INNER JOIN products ON informationorder.idProduct = products.id 
               WHERE informationorder.idPackage = '$id'";
$result_select = $conn->query($sql_select);

if ($result_select->num_rows > 0) {
    // Lấy giá trị qty và amount từ kết quả truy vấn
    $row = $result_select->fetch_assoc();
    $qty = $row['qty'];
    $amount = $row['amount'];
} else {
    echo "Không có thông tin nào được tìm thấy.";
}

if ($qty < $amount) {
    $sql = "UPDATE orders 
        SET delivery = '1' 
        WHERE id = '$id'";
    $conn->query($sql);
    echo 1;
} else {
    echo 0;
}
