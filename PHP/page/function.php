<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "quancafe");
if (isset($_FILES["fileImg"]["name"])) {
    global $conn;

    $imageName = $_FILES["fileImg"]["name"];
    $tmpName = $_FILES["fileImg"]["tmp_name"];

    // image extension validation
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);

    $name = $imageExtension[0];
    $imageExtension = strtolower(end($imageExtension));

    if (!in_array($imageExtension, $validImageExtension)) {
        echo "Invalid";
        exit;
    } else {
        $newImageName = $name . "-" . uniqid();
        $newImageName .= '.' . $imageExtension;

        move_uploaded_file($tmpName, 'uploads/' . $newImageName);
        $query = "UPDATE users SET img = '$newImageName' WHERE id = '{$_SESSION['idUser']}'";
        mysqli_query($conn, $query);
        echo "Success";
        exit;
    }
}
