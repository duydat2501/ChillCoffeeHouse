<?php
require "../../database.php";
$id = $_POST['id'];
$sql = "DELETE FROM products WHERE id = '$id'";
if ($conn->query($sql))
    echo "1";
else
    echo "$sql";
