<?php 
require "../code.php";
require "../database.php";
$casebook = $_POST['casebook'];
$numpage = $_POST['numpage'];
?>
<?php 
$result = getBooksByCasebook($casebook, $numpage);
while ($row = $result->fetch_assoc()) {
    ?>
<!-- Start Single Product -->
<div class="list__view mt--40">
    <div class="thumb">
        <a class="first__img" href="?page=product&id=<?php echo $row['id'] ?>"><img src="public/<?php echo $row['img'] ?>" alt="product images"></a>
        <a class="second__img animation1" href="?page=product&id=<?php echo $row['id'] ?>"><img src="public/<?php echo $row['img'] ?>" alt="product images"></a>
    </div>
    <div class="content">
        <h2><a href="?page=product&id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
        <ul class="rating d-flex">
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li><i class="fa fa-star-o"></i></li>
            <li><i class="fa fa-star-o"></i></li>
        </ul>
        <ul class="prize__box">
            <li><?php echo number_format($row['price']) ?> VNĐ</li>

        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
        <ul class="cart__action d-flex">
            <li class="cart"><a style="cursor:pointer" onclick="add_to_cart(<?php echo $row['id'] ?>)">Add to cart</a></li>
            <li class="wishlist"><a href="cart.html"></a></li>
            <li class="compare"><a href="cart.html"></a></li>
        </ul>
    </div>
</div>
<!-- End Single Product -->
<?php 
} ?> 