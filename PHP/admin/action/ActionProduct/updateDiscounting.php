<?php
require "../../../database.php";
require "../../../code.php";

$discounting = $_GET['discounting'];
$id = $_GET['id'];

if (updateDiscoutingProduct($id, $discounting)) {
    echo "1";
} else {
    echo "0";
}
