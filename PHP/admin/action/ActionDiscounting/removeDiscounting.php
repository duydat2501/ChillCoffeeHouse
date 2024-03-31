<?php
require "../../../database.php";
require "../../../code.php";

$arr = $_GET['arr'];
$idDiscounting = $_GET['idDiscounting'];

$sql = "delete from products_discounting where idDiscounting='$idDiscounting' AND idProduct in (";
for ($i = 0; $i < count($arr); $i++) {
    $sql .= $arr[$i];
    if ($i != count($arr) - 1)
        $sql .= " , ";
}
$sql .= ")";

// echo $sql;
if ($conn->query($sql))
    echo "1";
else echo "0";
