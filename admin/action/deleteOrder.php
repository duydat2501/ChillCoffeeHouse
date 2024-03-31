<?php 
require "../../database.php";
$id = $_POST['id'];
$sql = "DELETE FROM orders WHERE id = '$id'";
$conn->query($sql);
echo "1";
 