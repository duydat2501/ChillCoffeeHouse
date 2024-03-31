<!-- cái modal để chỉnh sửa sản phẩm -->
<?php
require "../../database.php";
require "../../code.php";


// echo $_GET['id'];
$id = $_GET['id'];
$result = getInformationOrder($id);
$order = getOrderById($id)->fetch_assoc();
$oderStatus = getStatusOrder($id);

?>
<input type="text" hidden name="id" value="<?php echo $id ?>">

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

        <tr>
            <td colspan="9">
                <?php
                if ($oderStatus == 0) {
                ?>
                    <form>
                        <select class="order_details">
                            <option value="">----Chọn hình thức đơn hàng----</option>
                            <option id="<?php echo $id; ?>" value="0" selected>Chưa xử lý</option>
                            <option id="<?php echo $id; ?>" value="1">Đã xử lý</option>
                        </select>
                    </form>
                <?php
                } elseif ($oderStatus == 1) {
                ?>
                    <form>
                        <select class="order_details">
                            <option value="">----Chọn hình thức đơn hàng----</option>
                            <option id="<?php echo $id; ?>" value="0">Chưa xử lý</option>
                            <option id="<?php echo $id; ?>" value="1" selected>Đã xử lý</option>
                        </select>
                    </form>
                <?php
                }
                ?>
            </td>
        </tr>
    </tbody>
</table>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
    <!-- onclick="updateOrderInDatabase()" -->
    <!-- <button  type="button" class="btn btn-primary" id="btnChinhSua">Chỉnh sửa</button> -->
</div>

<script>
    $(document).ready(function() {
        $('.order_details').change(function() {
            var order_id = $(this).children(":selected").attr("id");
            var order_status = $(this).val();
            var total = $('.total').val();
            var total_discounting = $('.total_discounting').val();
            
            var _token = $('input[name="_token"]').val();
            var qty = [];
            $("input[name='product_sales_quantity']").each(function() {
                qty.push($(this).val());
            });

            var order_product_id = [];
            $("input[name='order_product_id']").each(function() {
                order_product_id.push($(this).val());
            });

            // alert(total_discounting);
            // alert(order_status);
            // alert(order_product_id);
            // alert(qty);

            number = 0;
            j = 0;
            for (i = 0; i < order_product_id.length; i++) {
                //so luong khach dat
                number++;
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                //so luong ton kho
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

                // alert(order_qty);
                // alert(order_qty_storage);
                // console.log(order_qty);
                // console.log(order_qty_storage);

                if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                    j = j + 1;
                    if (j == 1) {
                        // alert('Sản phẩm thứ ' + number + ' - Số lượng trong kho không đủ!');
                        let message = `Sản phẩm thứ ${number} - Số lượng trong kho không đủ!`;
                        callSnackbar(message, 1);
                        // callSnackbar("Sản phẩm thứ ' + number + ' - Số lượng trong kho không đủ!'", 1);
                        $('.color_qty_' + order_product_id[i]).css('background', '#000');
                    }
                }
            }
            if (j == 0) {
                $.ajax({
                    url: "action/update_order_quantity.php",
                    type: 'POST',
                    data: {
                        _token: _token,
                        order_status: order_status,
                        order_id: order_id,
                        qty: qty,
                        total: total,
                        total_discounting: total_discounting,
                        order_product_id: order_product_id,
                    },
                    success: function(data) {
                        console.log(data);
                        // alert(qty);
                        // alert('Thay đổi tình trạng đơn hàng thành công!');
                        callSnackbar("Thay đổi tình trạng đơn hàng thành công!", 1);

                        setTimeout(function() {
                            location.reload();
                        }, 1000);

                        // if (data === "Success") 
                        //     alert('Thay đổi tình trạng đơn hàng thành công!');
                        //     location.reload();
                        // } else {
                        //     alert('Có lỗi xảy ra khi xử lý đơn hàng.');
                        // }
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        $('.update_quantity_order').click(function() {
            event.preventDefault();
            var order_product_id = $(this).data('product_id');
            var order_qty = $('.order_qty_' + order_product_id).val();
            var order_code = $('.order_code_input').val();
            var _token = $('input[name="_token"]').val();
            // alert(order_product_id);
            // alert(order_qty);
            // alert(order_code);
            $.ajax({
                // url: "{{url('/update-qty')}}",
                url: "action/update_qty.php",
                type: 'POST',
                data: {
                    _token: _token,
                    order_product_id: order_product_id,
                    order_qty: order_qty,
                    order_code: order_code,
                },
                success: function(data) {
                    // alert('Cập nhật thành công!');
                    callSnackbar("Cập nhật thành công!", 1);
                    // location.reload();
                }
            });
        });
    });
</script>