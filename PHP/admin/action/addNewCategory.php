<?php
require "../../database.php";
require "../../code.php";


$casebook  = $_POST['id'];
$name = $_POST['name'];
// $price = $_POST['price'];
// $casebook = $_POST['casebook'];
// $qty = $_POST['qty'];

// echo $title . $summary . $price . $casebook . $qty . $img;

// $sql = "INSERT INTO cases(casebook,name) VALUES ('$casebook','$name')";
// $conn->query($sql);
// echo "1";


// Kiểm tra xem có dữ liệu được gửi từ POST không
if(isset($_POST['id']) && isset($_POST['name'])) {
    // Lấy giá trị từ POST
    $casebook = $_POST['id'];
    $name = $_POST['name'];

    // Kiểm tra nếu $casebook và $name không rỗng
    if(!empty($casebook) && !empty($name)) {
        // Thực hiện truy vấn SQL
        $sql = "INSERT INTO cases (casebook, name) VALUES ('$casebook', '$name')";
        if($conn->query($sql)) {
            echo "1"; // Trả về 1 nếu truy vấn thành công
        } else {
            echo "0";
        }
    } else {
        echo "0";
    }
} else {
    echo "0";
}



//header('location:' . $_SERVER['HTTP_REFERER']);
