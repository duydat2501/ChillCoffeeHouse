<?php
$discounting = 0;
$total = 0;
$discounting_today = getDiscountingToday()->fetch_assoc();
require "component/public/bradcaump.php";
?>
<!-- cart-main-area start -->
<div class="wishlist-area section-padding--lg bg__white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 md-mt-40 sm-mt-40">
                <div class="wishlist-content">
                    <form action="#" id="form_buy">
                        <div class="wishlist-table wnro__table table-responsive">
                            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
                            ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-remove"></th>
                                            <th class="product-thumbnail"></th>
                                            <th class="product-name"><span class="nobr">Tên sản phẩm</span></th>
                                            <th class="product-price"><span class="nobr"> Giá </span></th>
                                            <th class="product-price"><span class="nobr"> Số lượng </span></th>
                                            <th class="product-price"><span class="nobr"> Tổng </span></th>
                                            <th class="product-stock-stauts"><span class="nobr"> Giảm giá </span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // var_dump($_SESSION['cart']);

                                        foreach ($_SESSION['cart'] as $product) {
                                            $total += $product['price'] * $product['qty'];
                                            
                                            if (checkProductIsDiscounting($product['id'])) {
                                                $discount_percent = checkProductIsDiscounting($product['id']); 
                                                $temp = $product['price'] * $discount_percent / 100; 
                                                $discounting += $temp;
                                            }
                                        ?>

                                            <tr id="tr<?php echo $product['id'] ?>">
                                                <input type="text" hidden value=<?php echo $product['price'] ?> id="price<?php echo $product['id'] ?>">
                                                <input hidden type="text" name="checkout[<?php echo $product['id'] ?>][qty]" value="<?php echo $product['qty'] ?>" />
                                                <td class="product-remove"><a style="cursor:pointer" onclick="delete_cart(<?php echo $product['id'] ?>)">×</a></td>
                                                <td class="product-thumbnail"><a href="#"><img style="width:100px !important;height:120px !important;max-width:100px !important  " src="public/<?php echo $product['img'] ?>" alt=""></a></td>
                                                <td class="product-name"><a href="#"><?php echo $product['title'] ?></a></td>
                                                <td class="product-name"><span class="amount"><?php echo number_format($product['price']) ?></span></td>
                                                <td class="product-name"><input class="form-control" style="width:80px" onclick="update_cart(<?php echo $product['id'] ?>,this)" onchange="update_cart(<?php echo $product['id'] ?>,this)" min=1 type="number" value="<?php echo $product['qty'] ?>" /></td>
                                                <td class="product-name"><a href="#" id="total<?php echo $product['id'] ?>"><?php echo number_format($product['qty'] * $product['price']) ?>VND</a></td>

                                                <td class="product-stock-status"><span class="wishlist-in-stock">
                                                        <?php if (checkProductIsDiscounting($product['id'])) echo checkProductIsDiscounting($product['id']);
                                                        else echo 0.0 ?>%</span></td>
                                                <!-- <td class="product-add-to-cart"><a href="#"> Add to Cart</a></td> -->
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                            } else echo '<div class="alert alert-success" role="alert" style="text-align:center;font-size:1.2em">
                        Chưa có sản phẩm trong giỏ hàng
                      </div>' ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
                <div class="wn__order__box" id="box_package" style="overflow:hidden">
                    <h3 class="onder__title">Đơn hàng của bạn</h3>
                    <ul class="order__total">
                        <li>Tổng cộng:</li>
                        <li><?php echo number_format($total) ?>VND</li>
                    </ul>
                    <ul class="order__total">
                        <li>Giảm giá: </li>
                        <li><?php echo number_format($discounting) ?>VND</li>
                    </ul>
                    <ul class="total__amount">
                        <li>Tạm tính: <span><?php echo number_format($total - $discounting) ?>VND</span></li>
                    </ul>
                    <button type="button" style="display:block;margin:auto" class="btn btn-success" onclick="buy()">Thanh toán</button>
                </div>
                <div id="accordion" class="checkout_accordion mt--30" role="tablist">
                    <div class="payment">
                        <div class="che__header" role="tab" id="headingOne">
                            <a class="checkout__title" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span>Direct Bank Transfer</span>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="payment-body">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</div>
                        </div>
                    </div>
                    <div class="payment">
                        <div class="che__header" role="tab" id="headingTwo">
                            <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span>Cheque Payment</span>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="payment-body">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</div>
                        </div>
                    </div>
                    <div class="payment">
                        <div class="che__header" role="tab" id="headingThree">
                            <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span>Cash on Delivery</span>
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="payment-body">Pay with cash upon delivery.</div>
                        </div>
                    </div>
                    <div class="payment">
                        <div class="che__header" role="tab" id="headingFour">
                            <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <span>PayPal <img src="images/icons/payment.png" alt="payment images"> </span>
                            </a>
                        </div>
                        <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="payment-body">Pay with cash upon delivery.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->

<?php
// session_destroy();
// echo "<pre>";
// print_r($_SESSION['cart']);
?>