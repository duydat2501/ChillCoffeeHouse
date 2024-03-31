<?php
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
require "../database.php";

$result = $conn->query($sql);
session_start();
if ($result->num_rows == 1) {
    echo "1";
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['admin']  = $row['admin'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['dob'] = $row['dob'];
    $_SESSION['sex'] = $row['sex'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['idUser'] = $row['id'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['phone_number'] = $row['phone_number'];

} else {
    echo "0";
}
