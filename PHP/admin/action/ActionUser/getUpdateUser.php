<?php
require "../../../database.php";
require "../../../code.php";
$id = $_GET['id'];
$result = getUserByIdUser($id);
$row = $result->fetch_assoc();
?>
<table class="table table-bordered">
    <tr>
        <td>Mã khách hàng</td>
        <td><input type="text" value="<?php echo $row['id'] ?>" name="id"></td>
    </tr>
    <tr>
        <td>Họ khách hàng</td>
        <td><input type="text" value="<?php echo $row['lastname'] ?>" name="firsname"></td>
    </tr>
    <tr>
        <td>Tên khách hàng</td>
        <td><input type="text" value="<?php echo $row['firstname'] ?>" name="lastname"> </td>
    </tr>
    <tr>
        <td>Ngày sinh</td>
        <td><input type="date" value="<?php echo $row['dob'] ?>" name="dob"></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" value="<?php echo $row['address'] ?>" name="address"></td>
    </tr>
    <tr>
        <td>Số điện thoại</td>
        <td><input type="text" value="<?php echo $row['phone_number'] ?>" name="phone_number"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input style="width:100%" type="email" value="<?php echo $row['email'] ?>" name="email"></td>
    </tr>
    <tr>
        <td>Giới tính</td>
        <td>
            <input type="radio" name="gender" value="0" <?php if ($row['sex'] == 0) echo "checked" ?>>Nam
            <input type="radio" name="gender" <?php if ($row['sex'] == 1) echo "checked" ?>>Nữ
        </td>
    </tr>
    <tr>
        <td>Role</td>
        <td><?php if ($row['admin']) echo '<button type="button" class="btn" style="background-color:#fa4251;color:white">Admin</button>';
            else echo '<button type="button" class="btn" style="background-color:#57b846;color:white">Member</button>' ?></td>
    </tr>
</table>