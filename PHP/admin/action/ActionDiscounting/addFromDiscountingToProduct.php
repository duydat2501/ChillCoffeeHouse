<?php
require "../../../database.php";
require "../../../code.php";
$s = "";
$idDiscounting = $_GET['idDiscounting'];
$arr = $_GET['arr'];
for ($i = 0; $i < count($arr); $i++) {
    $product = getProductById($arr[$i])->fetch_assoc();
    $s .=  '<tr id="tr' . $product['id'] . '">'
        . '<td>' . $product['id'] . '</td>'
        . '<td>' . $product['title'] . '</td>'
        . '<td>' . $product['price'] . '</td>'
        . '<td>' . $product['amount'] . '</td>'
        . '<td><input value="' . $product['id'] . '" class="checkbox" type="checkbox"></td>'
        . '</tr>';
}

echo $s;
