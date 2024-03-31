<?php 
require "../../database.php";
$id = $_POST['id'];
$sql = "DELETE FROM products WHERE id = '$id'";
$conn->query($sql);
echo "1";
 