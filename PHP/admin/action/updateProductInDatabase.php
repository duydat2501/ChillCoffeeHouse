<?php 

require "../../database.php";
require "../../code.php";
$title = $_POST['title'];
$summary = $_POST['summary'];
$price = $_POST['price'];
$casebook = $_POST['casebook'];
$qty = $_POST['qty'];
$id = $_POST['id'];

// echo $title . $summary . $price . $casebook . $qty . $img;


if(isset($_FILES['img'])){
    $img = $_FILES['img'];
    // echo var_dump($img);
    if($img['error']==0){
        move_uploaded_file($img['tmp_name'],'../../public/img/product/'.$img['name']);
        $imgSrc = 'img/product/' . $img['name'];
        $sql = "UPDATE products SET img ='$imgSrc',title = '$title',summary='$summary',price='$price',casebook='$casebook',amount='$qty' WHERE id ='$id' ";
        $conn->query($sql);
        echo "1";
    }else{
        echo "0"; // lỗi không ảnh
    }
}else{
    $sql = "UPDATE products SET title = '$title',summary='$summary',price='$price',casebook='$casebook',amount='$qty' WHERE id ='$id'";
    $conn->query($sql);
    echo "1";// lỗi không ảnh
}
 