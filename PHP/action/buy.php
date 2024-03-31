<?php
$giamgia = 20000;
require "../database.php";
require "../code.php";
session_start();
// print_r($_POST['checkout']);

// tạo 1 
$total = 0;
$total_discounting = 0;
$temp = 0;
$discounting_today = getDiscountingToday()->fetch_assoc();
foreach ($_SESSION['cart'] as $value) {
    $total += $value['price'] * $value['qty'];
    $percent = 0;
    if (checkProductIsDiscounting($value['id'])) $percent = $discounting_today['percent']; // kiểm tra sản phẩm có giảm giá hay không
    $total_discounting +=  $value['price'] * $value['qty'] * $percent / 100;
}

if (isset($_SESSION['idUser'])) {
    $sql = "INSERT INTO orders (idUser,delivery,total,total_discounting) VALUES ('{$_SESSION['idUser']}','0','$total','$total_discounting')";
    $conn->query($sql);
    // echo "$sql";
    $last_id = $conn->insert_id;
    foreach ($_SESSION['cart'] as $value) {
        //     print_r($value['qty']);
        // if ($value['discounting'])
        //     $temp = $giamgia;
        // else $temp = 0;
        if (!checkProductIsDiscounting($value['id']))
            $sql = "INSERT INTO informationorder(idPackage, idProduct, qty,price) VALUES 
             ('$last_id','{$value['id']}','{$value['qty']}','{$value['price']}')";
        else
            $sql = "INSERT INTO informationorder_discounting(idOrder,idDiscounting,idProduct,price,qty) VALUES ('$last_id','{$discounting_today['id']}','{$value['id']}',{$value['price']},'{$value['qty']}')";
        // echo $sql;
        $conn->query($sql);
        unset($_SESSION['cart'][$value['id']]);
        //     //echo $key . " " . $value['qty'] . "<br>"; 
        //     // echo "<pre>";
        //     // print_r($value);
    }
    echo "1";
} else {
    echo "0";
}
