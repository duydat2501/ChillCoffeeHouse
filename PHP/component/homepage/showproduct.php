<?php
$i = 0;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section__title text-center">
                <h2 class="title__be--2">SẢN PHẨM <span class="color--theme">NỔI BẬT</span></h2>
                <!--                 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p> -->
            </div>
        </div>
    </div>
    <div class="row mt--50">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="product__nav nav justify-content-center" role="tablist">
                <!-- DỰA VÀO ID  ĐỂ MÀ THÊM CÁI SLIDE  -->
                <?php
                $result = getCasebook();
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <a class="nav-item nav-link <?php if ($i == 0) echo "active"; ?>" data-toggle="tab" href="#<?php echo $row['casebook'] ?>" role="tab"><?php echo $row['name'] ?></a>
                    <?php
                    $i = 1;
                } ?>
            </div>
        </div>
    </div>
    <div class="tab__container mt--60">
        <!-- Start Single Tab Content -->
        <?php
        $result = getCasebook();
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="row single__tab tab-pane fade show <?php if ($i == 1) echo "active"; ?>" id="<?php echo $row['casebook'] ?>" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    <?php
                    $result2 = getFourBooksCasebook($row['casebook']);
                    while ($row2 = $result2->fetch_assoc()) {
                        ?>
                        <div class="single__product">
                            <!-- Start Single Product -->
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="product product__style--3">
                                    <div class="product__thumb">
                                        <a class="first__img" href="?page=product&id=<?php echo $row2['id'] ?>"><img src="public/<?php echo $row2['img'] ?>" alt="product image"></a>
                                        <a class="second__img animation1" href="?page=product&id=<?php echo $row2['id'] ?>"><img src="public/<?php echo $row2['img'] ?>" alt="product image"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">HOT</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center">
                                        <h4><a href="?page=product&id=<?php echo $row2['id'] ?>"><?php echo $row2['title'] ?></a></h4>
                                        <ul class="prize d-flex">
                                            <li><?php echo number_format($row2['price']) ?> VNĐ</li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">

                                                    <li><a class="wishlist" onclick="add_to_cart(<?php echo $row2['id'] ?>)"><i class="bi bi-shopping-cart-full"></i></a></li>

                                                    <!-- <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i = 2;
                    }
                    ?>
                </div>
            </div>
        <?php
    }
    ?>

        <!-- End Single Tab Content -->
    </div>
</div>