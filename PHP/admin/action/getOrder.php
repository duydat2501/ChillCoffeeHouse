<?php
require "../../database.php";
require "../../code.php";
$numpage = $_GET['numpage'];
?>
<?php
$result = getOrder($numpage);
while ($row = $result->fetch_assoc()) {
    $user = getUserByIdUser($row['idUser'])->fetch_assoc();
?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $user['username']  ?></td>
        <td><?php echo $row['datetime'] ?></td>
        <?php if ($row['delivery'] == 1) echo '<td disabled class="process"><span class="badge badge-danger p-2">Đã xử lý</span></td>';
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