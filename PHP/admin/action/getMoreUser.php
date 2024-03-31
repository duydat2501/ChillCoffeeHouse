<?php
require "../../database.php";
require "../../code.php";
$id = $_GET['id'];
$result = getUserByIdUser($id);
$row = $result->fetch_assoc();
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Chú thích</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Mã</th>
            <td><?php echo $row['id'] ?></td>
        </tr>
        <tr>
            <th scope="row">Họ và tên</th>
            <td><?php echo $row['firstname'] . " " . $row['lastname'] ?></td>
        </tr>
        <tr>
            <th scope="row">Ngày sinh</th>
            <td><?php echo $row['dob'] ?></td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td><?php echo $row['email'] ?></td>
        </tr>
        <tr>
            <th scope="row">Giới tính</th>
            <td><?php if ($row['sex'] == 0) echo "Nam";
                else echo "Nữ" ?></td>
        </tr>
        <tr>
            <th scope="row">Quyền admin</th>
            <td><?php if ($row['admin'] == 1) echo "Admin";
                else echo "Khách hàng" ?></td>
        </tr>
    </tbody>
</table>