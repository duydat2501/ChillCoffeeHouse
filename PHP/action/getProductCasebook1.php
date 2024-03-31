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
<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="product__thumb">
        <a class="first__img" href="?page=product&id=<?php echo $row['id'] ?>"><img src="public/<?php echo $row['img'] ?>" alt="product image"></a>
        <a class="second__img animation1" href="?page=product&id=<?php echo $row['id'] ?>"><img src="public/<?php echo $row['img'] ?>" alt="product image"></a>
        <div class="hot__box">
            <span class="hot-label">BEST SALER</span>
        </div>
    </div>
    <div class="product__content content--center content--center">
        <h4><a href="?page=product&id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h4>
        <ul class="prize d-flex">
            <li><?php echo number_format($row['price']) ?> VNĐ</li>
        </ul>
        <div class="action">
            <div class="actions_inner">
                <ul class="add_to_links">
                    <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                    <li><a class="wishlist" style="cursor:pointer" onclick="add_to_cart(<?php echo $row['id'] ?>)"><i class="bi bi-shopping-cart-full"></i></a></li>
                    <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                    <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="product__hover--content">
            <ul class="rating d-flex">
                <li class="on"><i class="fa fa-star-o"></i></li>
                <li class="on"><i class="fa fa-star-o"></i></li>
                <li class="on"><i class="fa fa-star-o"></i></li>
                <li><i class="fa fa-star-o"></i></li>
                <li><i class="fa fa-star-o"></i></li>
            </ul>
        </div>
    </div>
</div>
<!-- End Single Product -->
<?php 
}
?> 