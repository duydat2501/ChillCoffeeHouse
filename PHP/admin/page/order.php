<div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md">
            <select class="js-select2" name="property">
                <option selected="selected">All Properties</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="rs-select2--light rs-select2--sm">
            <select class="js-select2" name="time">
                <option selected="selected">Today</option>
                <option value="">3 Days</option>
                <option value="">1 Week</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <button class="au-btn-filter">
            <i class="zmdi zmdi-filter-list"></i>filters</button>
    </div>

</div>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên tài khoản</th>
                <th>Ngày đặt</th>
                <th>Tình trạng</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_order">
            
            <?php
            $result = getOrder(0);
            while ($row = $result->fetch_assoc()) {
                $user = getUserByIdUser($row['idUser'])->fetch_assoc();
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $user['username']  ?></td>
                    <td><?php echo $row['datetime'] ?></td>
                    <?php if ($row['delivery'] == 1) echo '<td disabled class="process"><span class="badge badge-danger p-2">Đã xử lý</span>';
                    else echo '<td id="tdcheck' . $row['id'] . '" class="denied"><button onclick="processOrder(' . $row['id'] . ')" type="button" class="btn btn-info">Xử lý</button></td>'; ?>

                    <td>
                        <div class="table-data-feature">

                            <button onclick="updateOrder(<?php echo $row['id'] ?>)" style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#updateOrder">
                                <i class="zmdi zmdi-edit"></i>
                            </button>

                            <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1 delete_order" data-toggle="modal" data-target="#deleteOrder" value="<?php echo $row['id'] ?>">
                                <i class="zmdi zmdi-delete"></i>
                            </button>

                            <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#moreOrder" onclick="moreOrder(<?php echo $row['id'] ?>,<?php echo $row['idUser'] ?>)">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="card">
        <div id="pagination_order">
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <?php
                    $result = getOrderNoNumpage();
                    $numpage = ceil($result->num_rows / 7); // nếu mà numpage = 1 thì không cồn hiển thị lên
                    if ($numpage != 1)
                        for ($i = 1; $i <= $numpage; $i++) {
                            $pos = ($i - 1) * 7;
                    ?>
                        <li class="page-item <?php if ($i == 1) echo "active" ?>"><button class="page-link" type="button" onclick="getOrder(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button></li>
                    <?php
                        } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.delete_order').click(function() {
            event.preventDefault();
            var confirmResult = confirm('Bạn có chắc muốn xóa đơn hàng này không?');
            if (!confirmResult) {
                return false;
            }
            var order_id = $(this).val();
            // alert(order_id);
            $.ajax({
                url: "action/deleteOrder.php",
                type: 'POST',
                data: {
                    order_id: order_id,
                },
                success: function(data) {
                    alert('Xóa đơn hàng thành công!');
                    callSnackbar("Xóa thành công", 1);
                    // Reload trang sau 3 giây
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            });
        });
    });
</script>