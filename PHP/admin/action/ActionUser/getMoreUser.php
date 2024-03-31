<?php
require "../../../database.php";
require "../../../code.php";

$id = $_GET['id'];
$result = getUserByIdUser($id);
$row = $result->fetch_assoc();
?>
<form action="action/addNewProduct.php" method="post" class="" enctype='multipart/form-data'>
    <table class="table table-bordered">
        <tr>
            <td>Mã khách hàng</td>
            <td><?php echo $row['id'] ?></td>
        </tr>
        <tr>
            <td>Tên khách hàng</td>
            <td><?php echo $row['firstname'] . "  " . $row['lastname'] ?></td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td><?php echo $row['dob'] ?></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><?php echo $row['address'] ?></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><?php echo $row['phone_number'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $row['email'] ?></td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td><?php if (($row['sex'] == 1)) echo "Nam";
                else echo "Nữ"; ?></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><?php if ($row['admin']) echo '<button type="button" class="btn" style="background-color:#fa4251;color:white">Admin</button>';
                else echo '<button type="button" class="btn" style="background-color:#57b846;color:white">Member</button>' ?></td>
        </tr>
    </table>
</form>