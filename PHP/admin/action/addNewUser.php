<?php
require "../../database.php";
require "../../code.php";

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$admin = $_POST['admin'];

// echo $title . $summary . $price . $casebook . $qty . $img;
if (isset($_FILES['img'])) {
    $img = $_FILES['img'];
    if ($img['error'] == 0) {
        // Kiểm tra xem địa chỉ email, username đã tồn tại hay chưa
        $checkEmailQuery = "SELECT COUNT(*) AS total FROM users WHERE email = '$email'";
        $checUsernameQuery = "SELECT COUNT(*) AS check_username FROM users where username = '$username'";

        $result = $conn->query($checkEmailQuery);
        $row = $result->fetch_assoc();
        $total = $row['total'];

        $result_username = $conn->query($checUsernameQuery);
        $row_username = $result_username->fetch_assoc();
        $checkUsername = $row_username['check_username'];

        if ($total > 0) {
            // Địa chỉ email đã tồn tại
            echo "2";
        }
        elseif($checkUsername > 0){
            echo "3";
        }
        else {
            // Địa chỉ email chưa tồn tại
            move_uploaded_file($img['tmp_name'], '../../public/img/user/' . $img['name']);
            $imgSrc = 'img/user/' . $img['name'];
            $sql = "INSERT INTO users (img,username,password,firstname,lastname,email,dob,sex,address, phone_number, admin) 
            VALUES ('$imgSrc','$username','$password','$firstname','$lastname','$email','$dob','$sex','$address','$phone_number','$admin')";
            $conn->query($sql);
            echo "1";
        }

        // move_uploaded_file($img['tmp_name'], '../../public/img/user/' . $img['name']);
        // $imgSrc = 'img/user/' . $img['name'];
        // // $sql = "INSERT INTO users (img,username,password,firstname,lastname,email,dob,sex,address, phone_number, admin) 
        // // VALUES ('$imgSrc','$username','$password','$firstname','$lastname','$email','$dob,','$sex','$address','$phone_number,'$admin')";

        // $sql = "INSERT INTO users (img,username,password,firstname,lastname,email,dob,sex,address, phone_number, admin) 
        // VALUES ('$imgSrc','$username','$password','$firstname','$lastname','$email','$dob','$sex','$address','$phone_number','$admin')";

        // $conn->query($sql);
        // echo "1";
    } else {
        echo var_dump($img);
    }
}

//header('location:' . $_SERVER['HTTP_REFERER']);
