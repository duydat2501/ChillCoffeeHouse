<?php 
require "component/public/bradcaumporder.php";
if (!isset($_SESSION['idUser'])) {
    echo '<div class="alert alert-success" style="text-align:center;margin-top:5px" role="alert">
Chưa có đơn hàng nào trong giỏ hàng!
</div>';
} else {
    if (isset($_SESSION['idUser'])) {
        $result = getOrderByIdUser($_SESSION['idUser']);
    }
    ?>
<table class="table table-bordered table-hover" style="margin-top:5px;width:80%;margin:5px auto">
    <tr class="table-info">
        <td>Mã đơn hàng</td>
        <td>Tài khoản</td>
        <td>Ngày đặt</td>
        <td>Vận chuyển</td>
        <td>Thông tin</td>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='color:blue'>" . $row['id'] . "</td>";
        echo "<td>" . $row['idUser'] . "</td>";
        echo "<td>" . $row['datetime'] . "</td>";
        echo "<td>";
        echo $row['delivery'] == 0 ? "Chưa giao" : "Đã giao";
        echo "</td>";
        echo "<td><a href='?page=informationorder&id=" . $row['id'] . "'>Chi tiết</a></td>";
        echo "</tr>";
    }
} ?>
</table> 