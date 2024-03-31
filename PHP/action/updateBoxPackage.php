<?php
require "../database.php";
require "../code.php";
$total = 0;
$discounting = 0;
$discounting_today = getDiscountingToday()->fetch_assoc();
$percent = 0;
if ($discounting_today) {
    $percent = $discounting_today['percent'];
} else $percent = 0;
session_start();
foreach ($_SESSION['cart'] as $product) {
    $total += $product['price'] * $product['qty'];
    $discounting += checkProductIsDiscounting($product['id']) ? (100 - $percent) / 100 * $product['price'] * $product['qty'] : 0;
}
?>
<h3 class="onder__title">Đơn hàng của bạn</h3>
<ul class="order__total">
    <li>Tổng cộng: </li>
    <li><?php echo number_format($total) ?>VND</li>
</ul>
<ul class="order__total">
    <li>Giảm giá: </li>
    <li><?php echo number_format($discounting) ?>VND</li>
</ul>
<ul class="total__amount">
    <li>Tạm tính: <span><?php echo number_format($total - $discounting) ?>VND</span></li>
</ul>
<button style="display:block;margin:auto" class="btn btn-success" onclick="buy()">Thanh toán</button>