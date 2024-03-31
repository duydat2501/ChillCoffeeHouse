<?php
require "../../database.php";
require "../../code.php";

$id = $_GET['id'];
$result = getInformationOrder($id);
$order = getOrderById($id)->fetch_assoc();
$order = getOrderById($id)->fetch_assoc();

?>


<p>Ngày đặt: <?php echo $order['datetime'] ?></p>
<p>Xử lý: <?php if ($order['delivery']) echo "Đã xử lý";
            else echo "Chưa xử lý" ?></p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Giảm giá</th>
            <th scope="col">Số lượng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_price = 0;
        $total_discounting = 0;
        $discounting = 0
        // while ($row = $result->fetch_assoc()) {
        //     // $product = getProductById($row['idProduct'])->fetch_assoc();
        //     //var_dump($product); 
        //     $order = getOrderById($row['id'])->fetch_assoc();
        // 
        ?>
        <?php
        $orderResult = getOrderById($id);
        while ($order = $orderResult->fetch_assoc()) {
        ?>

            <tr class="color_qty_<?php echo $order['p_id']; ?>">
                <td><?php echo $order['p_id'] ?></td>
                <td><img style="width:100px;height:160px" src="../public/<?php echo $order['img'] ?>" alt=""></td>
                <td><?php echo $order['p_title'] ?></td>
                <td><?php echo number_format($order['price']) ?>VND</td>

                <?php
                if ($order['percent'] == null) {
                ?>
                    <td>0%</td>
                <?php
                } else {
                ?>
                    <td><?php echo $order['percent'] ?>%</td>
                <?php
                }
                ?>

                <!-- giam % -->
                <input type="hidden" name="percentDiscounting" value="<?php echo ($order['price'] * ($order['percent']) / 100) ?>">
                <input type="hidden" name="moneyAfterDiscount" value="<?php echo $order['price'] - ($order['price'] * ($order['percent']) / 100) ?>">

                <?php
                $discounting = (($order['price'] * $order['qty']) * ($order['percent']) / 100);
                ?>
                <td>
                    <?php if ($order['delivery'] != 1) : ?>
                        <input min="1" style="width: 35px;" type="number" value="<?php echo $order['qty'] ?>" name="product_sales_quantity" class="input_qty order_qty_<?php echo $order['p_id']; ?>">
                        <!-- <button class="btn btn-primary" data-product_id="<?php echo $order['p_id']; ?>" class="update_quantity_order" name="update_quantity_order" value="">Cập nhật</button> -->
                        <input type="button" data-product_id="<?php echo $order['p_id']; ?>" class="update_quantity_order" name="update_quantity_order" value="Cập nhật">
                    <?php endif; ?>
                    <?php if ($order['delivery'] == 1) : ?>
                        <input min="1" style="width: 35px;" type="number" readonly value="<?php echo $order['qty'] ?>" name="product_sales_quantity" class="input_qty order_qty_<?php echo $order['p_id']; ?>">
                    <?php endif; ?>
                </td>
                <input type="hidden" name="order_qty_storage" class="order_qty_storage_<?php echo $order['p_id']; ?>" value="<?php echo $order['amount']; ?>">
                <input type="hidden" value="<?php echo $order['amount'] ?>" name="product_quantity">
                <input type="hidden" name="order_code" class="order_code_input" value="<?php echo $id ?>">
                <input type="hidden" name="order_product_id" class="order_product_id" value="<?php echo $order['p_id']; ?>">

            </tr>
            <?php
            $total_price += $order['qty'] * $order['price'];
            $total_discounting += $discounting;
            ?>
        <?php
        } ?>
        <tr>
            <input type="hidden" name="total_discounting" class="total_discounting" value="<?php echo $total_discounting; ?>" id="">
            <input type="hidden" name="total" class="total" value="<?php echo $total_price;  ?>" id="">
            <td colspan="6">Tổng tiền: <?php echo number_format($total_price);  ?>VND<br>Tổng tiển giảm giá: <?php echo number_format($total_discounting);  ?>VND<br>Thành tiền: <?php echo number_format($total_price - $total_discounting) ?>VND</td>
        </tr>

    </tbody>
</table>