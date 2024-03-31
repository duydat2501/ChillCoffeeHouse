<!-- sau khi chỉnh sửa sẽ update lại cái row vừa dc update -->
<?php
require "../../database.php";
require "../../code.php";
$result = getOrderById($_GET['id']);
$row = $result->fetch_assoc();
?>
<td><?php echo $row['id'] ?></td>

<td><?php echo $row['qty'] ?></td>
<td>
    <div class="table-data-feature">
        <button onclick="updateOrder(<?php echo $row['id'] ?>)" style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#updateOrder">
            <i class="zmdi zmdi-edit"></i>
        </button>
        <button style="margin:2px;" class="btn btn-secondary  mb-1" data-toggle="tooltip" data-placement="top" onclick="deleteOrder(<?php echo $row['id'] ?>)" title="Delete">
            <i class="zmdi zmdi-delete"></i>
        </button>
        <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#moreOrder" onclick="moreOrder(<?php echo $row['id'] ?>)">
            <i class="zmdi zmdi-more"></i>
        </button>
    </div>
</td>