<?php

require "../../database.php";
require "../../code.php";



$qty = $_POST['qty'];
// $summary = $_POST['summary'];
// $price = $_POST['price'];
// $casebook = $_POST['casebook'];
// $qty = $_POST['qty'];
$id = $_POST['id'];

// echo $title . $summary . $price . $casebook . $qty . $img;

$sql = "UPDATE informationorder SET qty ='$qty' WHERE idPackage  ='$id'";
$conn->query($sql);
