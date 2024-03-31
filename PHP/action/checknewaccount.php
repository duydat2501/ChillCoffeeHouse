<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone_number = $_POST['phone_number'];
$gender = $_POST['gender'];
$date = $_POST['date'];
$address = $_POST['address'];

require "../database.php";
$sql = "SELECT * FROM users WHERE username = '$username'";

$result = $conn->query($sql);


if ($result->num_rows == 0) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO users (username,password,firstname,lastname,email,dob,sex,admin,phone_number,address) VALUES ('$username','$password','$firstname','$lastname','$email','$date','$gender','0','{$phone_number}','{$address}')";
        $conn->query($sql);
        // echo $sql;
    } else {
        echo "email"; //tìm thấy email
    }
} else {
    echo "username"; // tìm tấy username
}
