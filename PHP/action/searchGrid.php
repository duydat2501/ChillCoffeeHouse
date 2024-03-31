<?php
require "../database.php";
require "../code.php";
$title = $_POST['title'];
$pricefrom = $_POST['pricefrom'];
$priceto = $_POST['priceto'];
$numpage = $_POST['numpage'];

$filter = array(
    'title' => isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : false,
    'pricefrom' => isset($_POST['pricefrom']) ? mysqli_real_escape_string($conn, $_POST['pricefrom']) : false,
    'priceto' => isset($_POST['priceto']) ? mysqli_real_escape_string($conn, $_POST['priceto']) : false,
);

$where = array();


if ($filter['title']) {
    $where[] = "title LIKE '%{$filter['title']}%'";
}

if ($filter['pricefrom']) {
    $where[] = "price >= '{$filter['pricefrom']}'";
}

if ($filter['priceto']) {
    $where[] = "price <= '{$filter['priceto']}'";
}

$sql = "SELECT * FROM products";

if ($where) {
    $sql .= " WHERE " . implode(" AND ", $where) . " LIMIT $numpage,12";
}
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    ?>
    <!-- Start Single Product -->
    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="product__thumb">
            <a class="first__img" href="?page=product&id=<?php echo $row['id'] ?>"><img src="public/<?php echo $row['img'] ?>" alt="product image"></a>
            <a class="second__img animation1" href="?page=product&id=<?php echo $row['id'] ?>"><img src="public/<?php echo $row['img'] ?>" alt="product image"></a>
            <?php if (checkProductIsDiscounting($row['id']) != null) { ?>
                <div class="hot__box">
                    Đang giảm giá <?php $discounting = getDiscountingToday()->fetch_assoc();
                                    echo $discounting['percent'] . "%" ?>
                </div>
            <?php } ?>
        </div>
        <div class="product__content content--center content--center">
            <h4><a href="?page=product&id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h4>
            <ul class="prize d-flex">
                <li><?php echo number_format($row['price']) ?> VNĐ</li>
            </ul>
            <div class="action">
                <div class="actions_inner">
                    <ul class="add_to_links">
                        <li><a style="cursor:pointer" class="wishlist" onclick="add_to_cart(<?php echo $row['id'] ?>)"><i class="bi bi-shopping-cart-full"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="product__hover--content">
            </div>
        </div>
    </div>
    <!-- End Single Product -->
<?php
} ?>