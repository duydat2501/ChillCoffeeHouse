<?php
require "component/public/bradcaump.php";

// $idPackage = $_GET['id'];
// $idUser = $_SESSION['idUser'];
// $sql = "SELECT * FROM informationorder WHERE idPackage = '$idPackage'"; //lấy chi tiết sp đơn hàng
// $result = $conn->query($sql);
// $total = 0;
// $order = getOrderById($idPackage)->fetch_assoc(); // lấy thông tin đơn hàng 


$id = $_GET['id'];
$result = getInformationOrder($id);
$order = getOrderById($id)->fetch_assoc();

?>

<table class="table table-bordered" style="width:80%;margin:5px auto">
    <tr class="table-info">
        <!-- <th>ID Sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Giảm Giá</th> -->


        <th>Mã sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Giảm giá</th>
        <th>Số lượng</th>
    </tr>



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
                <td><img style="width:100px;height:140px" src="public/<?php echo $order['img'] ?>" alt=""></td>
                <td>
                <a href="?page=product&id=<?php echo $order['p_id']; ?>">
                    <?php echo $order['p_title'] ?>
                </td>
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

    <!--  -->
    <tr>
        <td colspan="6" style="overflow:hidden">
            <a style="float:left" href="javascript:history.back()">Trở lại</a>
            <!-- <a style="float:right">Tổng cộng:<?php echo number_format($order['total'] - $order['total_discounting']) ?>VND</a> -->
        </td>
    </tr>

    
</table>