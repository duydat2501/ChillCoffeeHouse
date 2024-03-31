<?php
define('max_page', 12);
// lấy sản phẩm mới nhất
function getNewestProduct()
{
    global $conn;
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 0,8";
    return $conn->query($sql);
}

function getCasebook()
{
    global $conn;
    $sql = "SELECT * FROM cases";
    return $conn->query($sql);
}

function getProductCountByCasebook($casebook) {
    global $conn;
    $casebook = $conn->real_escape_string($casebook); // Đảm bảo an toàn khi sử dụng biến $casebook
    $sql = "SELECT COUNT(*) AS count FROM products WHERE casebook='$casebook'";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error: " . $conn->error;
        return 0; // Trả về 0 nếu có lỗi
    }
    $row = $result->fetch_assoc();
    return $row['count'];
}


function getInfoCasebook($casebook)
{
    global $conn;
    $sql = "SELECT * FROM cases WHERE casebook='$casebook'";
    return $conn->query($sql);
}

function updateCasebook($casebook, $name, $old_casebook)
{
    global $conn;
    $sql = "UPDATE cases SET casebook='$casebook',name='$name' WHERE casebook='$old_casebook'";

    return $conn->query($sql);
}
function getFourBooksCasebook($casebook)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE casebook ='$casebook' LIMIT 0,8";
    return $conn->query($sql);
}

function getBooksCasebook($casebook)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE casebook ='$casebook'";
    return $conn->query($sql);
}

function getBestSellerBook()
{
    global $conn;
    $sql = "SELECT * FROM products ORDER BY count_buying DESC LIMIT 0,8";
    return $conn->query($sql);
}
function getBooksByCasebook($casebook, $numpage)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE casebook='$casebook' LIMIT $numpage,12";
    return $conn->query($sql);
}
function getAmountByCasebook($casebook)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE casebook='$casebook'";
    return $conn->query($sql);
}
function getProductById($id)
{
    global $conn;
    $sql = "SELECT * FROM products 
    WHERE products.id='$id'";
    return $conn->query($sql);
}


function getOrderByIdUser($idUser)
{
    global $conn;
    $sql = "SELECT * FROM orders WHERE idUser='$idUser'";
    return $conn->query($sql);
}

function getAllProduct($numpage)
{
    global $conn;
    $sql = "SELECT * FROM products LIMIT $numpage,7";
    return $conn->query($sql);
}


function getAllProductNoNumpage()
{
    global $conn;
    $sql = "SELECT * FROM products";
    return $conn->query($sql);
}

function getAllCategoryNoNumpage()
{
    global $conn;
    $sql = "SELECT * FROM cases";
    return $conn->query($sql);
}

function getAllUser($numpage)
{
    global $conn;
    $sql = "SELECT * FROM users LIMIT $numpage,7";
    return $conn->query($sql);
}
function getAllUserNoNumpage()
{
    global $conn;
    $sql = "SELECT * FROM users";
    return $conn->query($sql);
}
function getOrder($numpage)
{
    global $conn;
    $sql = "SELECT * FROM orders LIMIT $numpage,7";
    return $conn->query($sql);
}
function getOrderById($id)
{
    global $conn;
    $sql = "SELECT products.*, informationorder.*, orders.*, products_discounting.*, discounting.*, products.id AS p_id, orders.id AS order_id, products.title AS p_title FROM orders 
    JOIN informationorder ON orders.id = informationorder.idPackage
    JOIN products ON informationorder.idProduct = products.id
    -- JOIN products_discounting ON products.id = products_discounting.idProduct 
    -- JOIN discounting ON products_discounting.idDiscounting  = discounting.id 
    LEFT JOIN products_discounting ON products.id = products_discounting.idProduct 
    LEFT JOIN discounting ON products_discounting.idDiscounting = discounting.id 
    WHERE orders.id = '$id'";
    return $conn->query($sql);
}


function getOrderNoNumpage()
{
    global $conn;
    $sql = "SELECT * FROM orders";
    return $conn->query($sql);
}
function getUserByIdUser($id)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE id='$id'";
    return $conn->query($sql);
}
function getInformationOrder($idPackage)
{
    global $conn;
    $sql = "SELECT products.*, informationorder.*, products.id AS p_id FROM informationorder
    JOIN products ON informationorder.idProduct = products.id
    WHERE idPackage = '$idPackage'";
    return $conn->query($sql);
}
function getProductBySearch($value, $numpage)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE title LIKE '%$value%' OR casebook LIKE '%$value%' LIMIT $numpage,7";
    return $conn->query($sql);
}
// function sortProduct($option,$numpage,$sort){
//     global $conn;
//     $sql = "SELECT * FROM products ORDER BY $option "
function getProductBySearchNoNumpage($value)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE title LIKE '%$value%' OR casebook LIKE '%$value%'";
    return $conn->query($sql);
}
function updateDiscoutingProduct($id, $discounting)
{
    global $conn;
    $sql = "UPDATE products SET discounting='$discounting' WHERE id ='$id'";
    return $conn->query($sql);
}
function getDiscounting()
{
    global $conn;
    $sql = "SELECT * FROM discounting";
    return $conn->query($sql);
}
function getInformationProductDiscountingById($id) // lấy hết tất cả sản phẩm theo giảm giá
{
    global $conn;
    $sql = "SELECT * FROM products_discounting WHERE idDiscounting='$id'";
    return $conn->query($sql);
}
function getDiscountingById($id) //lấy thông tin giảm giá theo id
{
    global $conn;
    $sql = "SELECT * FROM   discounting WHERE id='$id'";
    return $conn->query($sql);
}
function getProductsWithoutDiscounting($idDiscounting) //lấy sản phẩm không có giảm giá
{
    global $conn;
    $sql = "SELECT * FROM products WHERE not EXISTS (SELECT * FROM products_discounting WHERE products_discounting.idProduct=products.id AND products_discounting.idDiscounting='$idDiscounting')";
    return $conn->query($sql);
}

function getDiscountingToday() //lấy giảm giá ngày hôm nay
{
    global $conn;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = new DateTime();
    //echo date_format($date, "Y-m-d");
    $date_format = date_format($date, "Y-m-d");
    $sql = "SELECT * FROM discounting WHERE time_start <= '$date_format' AND '$date_format' <= time_end ";
    return $conn->query($sql);
}
function getProductByIdDiscounting($id) //cùng line147
{
    global $conn;
    $sql = "SELECT * FROM products_discounting WHERE idDiscounting = '$id' ";
    return $conn->query($sql);
}


// function checkProductIsDiscounting($idProduct)
// {
//     // global $conn;
//     // date_default_timezone_set('Asia/Ho_Chi_Minh');
//     // $date = new DateTime();
//     // //echo date_format($date, "Y-m-d");
//     // $date_format = date_format($date, "Y-m-d");
//     // $sql = "SELECT * FROM discounting WHERE time_start <= '$date_format' AND '$date_format' <= time_end ";
//     // $result = $conn->query($sql);
//     // print_r($result->fetch_assoc());
//     // $bool = null;
//     // if ($result->num_rows != 0) {
//     //     $discounting = $result->fetch_assoc();
//     //     $sql = "select * from products_discounting where idProduct='$idProduct' AND idDiscounting ='{$discounting['id']}'";
//     //     $bool = $conn->query($sql);
//     //     //echo $sql;
//     // } else {
//     //     $bool = null;
//     // }
//     // return $bool->num_rows;
//     // //echo $bool->num_rows;

//     global $conn;
//     date_default_timezone_set('Asia/Ho_Chi_Minh');
//     $date = new DateTime();
//     $date_format = date_format($date, "Y-m-d");

//     $sql = "SELECT pd.*, d.* 
//         FROM products_discounting pd
//         INNER JOIN discounting d ON pd.idDiscounting = d.id
//         WHERE d.time_start <= '$date_format' 
//         AND '$date_format' <= d.time_end
//         AND pd.idProduct = :idProduct";

//     // Sử dụng prepared statement để tránh tấn công SQL injection
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

function checkProductIsDiscounting($idProduct)
{
    global $conn;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d');

    $sql = "SELECT pd.*, d.*, d.percent AS discount_percent
    FROM products_discounting pd
    INNER JOIN discounting d ON pd.idDiscounting = d.id
    WHERE d.time_start <= '$date' 
    AND '$date' <= d.time_end
    AND pd.idProduct = $idProduct";

    $result = $conn->query($sql);

    // Kiểm tra nếu có lỗi trong truy vấn
    if (!$result) {
        die("Error: " . $conn->error);
    }

    // Lấy kết quả
    $row = $result->fetch_assoc();

    // Trả về giá trị discount_percent nếu có
    if ($row) {
        return $row['discount_percent'];
    } else {
        return null; // Hoặc giá trị mặc định nếu không có giảm giá
    }
}



function getdiscountingInformationOrder($idOrder)
{
    global $conn;
    $sql = "SELECT * FROM informationorder_discounting WHERE idOrder='$idOrder'";
    return $conn->query($sql);
}


function getStatusOrder($idOrder)
{
    global $conn;
    $sql = "SELECT delivery FROM orders WHERE id='$idOrder'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['delivery'];
    } else {
        return false;
    }
}



function getImageUser($id)
{
    global $conn;
    $sql = "SELECT img FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['img'];
    } else {
        return false;
    }
}
