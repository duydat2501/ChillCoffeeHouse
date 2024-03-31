<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-6 col-lg-2">
            <div class="logo">
                <a href="?page=homepage">
                    <img src="images/logo/logo1.jpg" alt="logo images" style="max-width: 80%;">
                </a>
            </div>
        </div>
        <div class="col-lg-8 d-none d-lg-block">
            <nav class="mainmenu__nav">
                <ul class="meninmenu d-flex justify-content-start" style="font-family:sans-serif">
                    <li class="drop with--one--item"><a href="?page=homepage">Trang chủ</a></li>

                    <li class="drop"><a href="?page=casebook&casebook=sachtv&numpage=0">Coffee</a>
                        <div class="megamenu mega03" style="width:auto">
                            <ul class="item item03">
                                <li class="title">Danh<span style="color:#fff">&nbsp</span>mục</li>
                                <?php
                                $result = getCasebook();
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <li><a href="?page=casebook&casebook=<?php echo $row['casebook'] ?>&numpage=0"><?php echo $row['name'] ?> </a></li>
                                <?php
                            } ?>
                            </ul>
                        </div>
                    </li>
                    <li><a href="?page=contact">Liên hệ</a></li>
                    <li><a href="?page=order">Đơn hàng</a></li>
                    <?php if (!isset($_SESSION['username'])) { ?>
                        <!-- <li><a href="?page=account">Tài khoản</a></li> -->
                    <?php
                } else echo "<b><a style='color:red' href='?page=user'>Hello " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "</a></b>";
                ?>
                </ul>
            </nav>
        </div>
        <div class="col-md-6 col-sm-6 col-6 col-lg-2">
            <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                <li class="wishlist"><a href="#"></a></li>
                <li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun" id="qty"><?php if (isset($_SESSION['cart'])) echo count($_SESSION['cart']);
                                                                                                            else echo "0" ?></span></a>
                    <!-- Start Shopping Cart -->
                    <div class="block-minicart minicart__active">
                        <div class="minicart-content-wrapper" id="cart_content">
                            <!-- <div class="micart__close">
                                <span>Đóng</span>
                            </div> -->
                            <div class="items-total d-flex justify-content-between">
                                <span style=" font-family: sans-serif !important;"><?php if (isset($_SESSION['cart'])) echo count($_SESSION['cart']) ?> Sản phẩm</span>
                                <span style=" font-family: sans-serif !important;">Tổng cộng</span>
                            </div>
                            <div class="total_amount text-right">
                                <span><?php  ?></span>
                            </div>
                            <div class="mini_action checkout">
                                <a class="checkout__btn" href="?page=checkout">Chuyển tới giỏ hàng</a>
                            </div>
                            <div class="single__items">
                                <div class="miniproduct" style="height:300px">
                                    <?php
                                    if (isset($_SESSION['cart']))
                                        foreach ($_SESSION['cart'] as $product) {
                                            ?>
                                        <div class="item01 d-flex mt--20">
                                            <div class="thumb">
                                                <a href="?page=product&id=<?php echo $product['id'] ?>"><img src="public/<?php echo $product['img'] ?>" alt="product images"></a>
                                            </div>
                                            <div class="content">
                                                <h6><a href="?page=product&id=<?php echo $product['id'] ?>"><?php echo $product['title'] ?></a></h6>
                                                <span class="prize"><?php echo number_format($product['price']) ?> VNĐ</span>
                                                <div class="product_prize d-flex justify-content-between">
                                                    <span class="qun">Số lượng: <?php echo $product['qty'] ?></span>
                                                    <ul class="d-flex justify-content-end">
                                                        <!-- <li><a href="#"><i class="zmdi zmdi-settings"></i></a></li> -->
                                                        <li><a onclick="delete_cart(<?php echo $product['id'] ?>)"><i class="zmdi zmdi-delete"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                } else {
                                echo "Không có sản phẩm trong giỏ hàng";
                            }
                            ?>
                                </div>
                            
                    </div>
                    <!-- End Shopping Cart -->
                </li>
                <!-- <li><a href="?page=account"><i style="font-size:1.2em;font-weight:300px" class="far fa-user"></i></a></li> -->
                <?php require "block/infouser.php"; ?>
            </ul>
        </div>
    </div>
    <!-- Start Mobile Menu -->
    <div class="row d-none">
        <div class="col-lg-12 d-none">
            <nav class="mobilemenu__nav">
                <ul class="meninmenu">
                    <li><a href="?page=homepage">Trang chủ</a></li>
                    <li><a href="?page=casebook&casebook=sachtv&numpage=0">Sản Phẩm</a>
                        <ul>
                            <?php
                            $result = getCasebook();
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <li><a href="?page=casebook&casebook=<?php echo $row['casebook'] ?>&numpage=0"><?php echo $row['name'] ?> </a></li>
                            <?php
                        } ?>
                        </ul>
                    </li>

                    <li><a href="?page=contact">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Mobile Menu -->
    <div class="mobile-menu d-block d-lg-none">
        </div>
        <!-- Mobile Menu -->
    </div>