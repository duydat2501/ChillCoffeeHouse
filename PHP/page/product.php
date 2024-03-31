<?php require "component/public/bradcaump.php" ?>
<?php
$idProduct = $_GET['id'];
$result = getProductById($idProduct);
$info = $result->fetch_assoc();
$casebook = $info['casebook'];
// echo "<pre>";
// print_r($info);
?>
<!-- Start main Content -->
<div class="maincontent bg--white pt--80 pb--55">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                <div class="shop__sidebar">
                    <aside class="wedget__categories poroduct--cat">
                        <h3 class="wedget__title">Danh mục sản phẩm</h3>
                        <ul>
                            <?php
                            $result = getCasebook();
                            while ($row = $result->fetch_assoc()) {
                                $total = getAmountByCasebook($row["casebook"])->num_rows
                                ?>
                                <li><a href="?page=casebook&casebook=<?php echo $row['casebook'] ?>&numpage=0"><?php echo $row['name'] ?> <span>(<?php echo $total ?>)</span></a></li>
                            <?php
                        } ?>
                        </ul>
                    </aside>
                    <aside class="wedget__categories poroduct--tag">
                        <h3 class="wedget__title">Tags sản phẩm</h3>
                        <ul>
                            <?php
                            $result = getCasebook();
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <li style="display:block"><a style="display:block;text-align:center;font-size:15px" href="?page=casebook&casebook=<?php echo $row['casebook'] ?>&numpage=0"><?php echo $row['name'] ?> <span>(<?php echo getAmountByCasebook($row['casebook'])->num_rows ?>)</span></a></li>
                            <?php
                        } ?>
                        </ul>
                    </aside>
                    <aside class="wedget__categories sidebar--banner">
                        <img src="images/others/banner_left.jpg" alt="banner images">
                        <div class="text">
                            <h2>new products</h2>
                            <h6>save up to <br> <strong>40%</strong>off</h6>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="wn__single__product">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="wn__fotorama__wrapper">
                                <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                    <a href="#"><img src="public/<?php echo $info['img'] ?>" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product__info__main">
                                <h1><?php echo $info['title'] ?></h1>
                                <div class="product-reviews-summary d-flex">

                                </div>
                                <div class="price-box">
                                    <span><?php echo number_format($info['price']) ?> VNĐ</span>
                                </div>
                                <div class="product__overview">
                                    <p>Một thức uống ngon giúp bạn xua tan mệt mỏi</p>
                                </div>
                                <div class="box-tocart d-flex">
                                    <span>Số lượng</span>
                                    <input id="quantity" class="input-text qty" name="qty" min="1" value="1" title="Số lượng" type="number">
                                    <div class="addtocart__actions">
                                        <button onclick="addProductToCart(<?php echo $info['id'] ?>)" class="btn btn-primary" type="submit" title="Add to Cart">Thêm vào giỏ</button>
                                    </div>
                                </div>
                                <div class="product_meta">
                                    <span class="posted_in">Danh mục:
                                        <a href="?page=casebook&casebook=<?php echo $info['casebook'] ?>&numpage=0"> <?php echo $info['casebook'] ?></a>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__info__detailed">
                    <div class="pro_details_nav nav justify-content-start" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Mô tả</a>
                    </div>
                    <div class="tab__container">
                        <!-- Start Single Tab Content -->
                        <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                            <div class="description__attribute">
                                <p>cafe giúp tỉnh táo mỗi buổi sáng</p>
                            </div>
                        </div>
                        <!-- End Single Tab Content -->
                        <!-- Start Single Tab Content -->
                        <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                            <div class="review__attribute">
                                <h1 style="font-family: sans-serif;">Đánh giá đọc giả</h1>
                                <h2 style="font-family: sans-serif;">Vy dễ thương</h2>
                                <div class="review__ratings__type d-flex">
                                    <div class="review-ratings">
                                        <div class="rating-summary d-flex">
                                            <span>Chất lượng</span>
                                            <ul class="rating d-flex">
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>

                                        <div class="rating-summary d-flex">
                                            <span>Giá</span>
                                            <ul class="rating d-flex">
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="rating-summary d-flex">
                                            <span>Nội dung</span>
                                            <ul class="rating d-flex">
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <br><br><br>
                                        <p>Được viết 07/05/2021</p>
                                    </div>
                                </div>
                            </div>
                            <div class="review-fieldset">
                                <h2 style="padding: 10px;">Đánh giá của bạn:</h2>
                                <div class="review-field-ratings">
                                    <div class="product-review-table">
                                        <div class="review-field-rating d-flex">
                                            <span style="font-family: sans-serif;">Chất lượng</span>
                                            <ul class="rating d-flex">
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="review-field-rating d-flex">
                                            <span style="font-family: sans-serif;">Giá</span>
                                            <ul class="rating d-flex">
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="review-field-rating d-flex">
                                            <span style="font-family: sans-serif;">Nội dung</span>
                                            <ul class="rating d-flex">
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="review_form_field">
                                    <div class="input__box">
                                        <span>Tên</span>
                                        <input id="nickname_field" type="text" name="nickname">
                                    </div>
                                    <div class="input__box">
                                        <span>Nội dung chính</span>
                                        <input id="summery_field" type="text" name="summery">
                                    </div>
                                    <div class="input__box">
                                        <span>Chi tiết</span>
                                        <textarea name="review"></textarea>
                                    </div>
                                    <div class="review-form-actions">
                                        <button>Đăng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab Content -->
                    </div>
                </div>
                <div class="wn__related__product pt--80 pb--50">
                    <div class="section__title text-center">
                        <h2 class="title__be--2" style="font-family: sans-serif !important;">SẢN PHẨM VỪA XEM</h2>
                    </div>
                    <div class="row mt--60">
                        <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                            <!-- Start Single Product -->
                            <?php
                            $result = getFourBooksCasebook($casebook);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="product__thumb">
                                        <a class="first__img" href="?page=product&id=<?php echo $row['id'] ?>"><img src="public/<?php echo $row['img'] ?>" alt="product image"></a>
                                        <a class="second__img animation1" href="?page=product&id=<?php echo $row['id'] ?>"><img src="public/<?php echo $row['img'] ?>" alt="product image"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">Bán chạy</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center">
                                        <h4><a href="?page=product&id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h4>
                                        <ul class="prize d-flex">
                                            <li><?php echo number_format($row['price']) ?> VNĐ</li>
                                        </ul>
                                  
                                    </div>
                                </div>
                                <!-- Start Single Product -->
                            <?php
                        } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End main Content -->