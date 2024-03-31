<?php 
$id = $_GET['id'];
require "../../database.php";
$sql = "UPDATE orders SET delivery='1' WHERE id = '$id' ";
$conn->query($sql);

