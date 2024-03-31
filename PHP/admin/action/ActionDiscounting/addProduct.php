<?php
require "../../../database.php";
require "../../../code.php";
// echo "<pre>";
// print_r($_GET['arr']);
$s = "";
$arr = $_GET['arr'];
$idDiscounting = $_GET['idDiscounting'];
$sql = "INSERT INTO products_discounting (idProduct,idDiscounting) VALUES ";
$discounting = getDiscountingById($_GET['idDiscounting'])->fetch_assoc();
for ($i = 0; $i < count($arr); $i++) {
    $sql .= " ($arr[$i] , $idDiscounting) ";
    $product = getProductById($arr[$i])->fetch_assoc();
    if ($i != count($arr) - 1)
        $sql .= ", ";
    $s = $s
        . '<tr id="tr' . $product['id'] . '">'
        . '<td>' . $product['id'] . '</td>'
        . '<td><img style="margin:auto;display:block" src="../public/' . $product['img'] . ' ?>" alt=""></td>'
        . '<td>' . $product['title'] . '</td>'
        . '<td>' . $product['price'] . 'VND</td>'
        . '<td>' . $product['price'] * (100 - $discounting['percent']) / 100 . 'VND</td>'
        . '<td><input type="checkbox" value="' . $product['id'] . '" class="checkbox"></td>'
        . '</tr>';
}
echo $s;
$conn->query($sql);
// echo $sql;
