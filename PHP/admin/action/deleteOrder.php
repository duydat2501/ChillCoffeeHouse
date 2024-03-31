<?php
require "../../database.php";
$id = $_POST['order_id'];
$sql = "DELETE FROM orders WHERE id = '$id'";
if ($conn->query($sql))
    echo "1";
else
    echo "$sql";
