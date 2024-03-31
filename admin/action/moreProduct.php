<?php 
require "../../database.php";
require "../../code.php";
$id = $_POST['id'];
$result = getProductById($id);
$row = $result->fetch_assoc();
?>
<img style="margin:auto;display:block;width:200px;height:250px" src="../public/<?php echo $row['img'] ?>" alt="">
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Mục</th>
            <th scope="col">Thông tin</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Tựa đề</th>
            <td><?php echo $row['title'] ?></td>
        </tr>
        <tr>
            <th scope="row">Tác giả</th>
            <td><?php echo $row['summary'] ?></td>
        </tr>
        <tr>
            <th scope="row">Danh mục</th>
            <td><?php echo $row['casebook'] ?></td>
        </tr>
        <tr>
            <th scope="row">Giá</th>
            <td><?php echo number_format($row['price']) ?>VND</td>
        </tr>
        <tr>
            <th scope="row">Số lượng</th>
            <td><?php echo $row['amount'] ?> Quyển</td>
        </tr>
        <tr>
            <th scope="row">Lượt yêu thích</th>
            <td><?php echo $row['love'] ?></td>
        </tr>
        <tr>
            <th scope="row">Số lượng bán</th>
            <td><?php echo $row['count_buying'] ?></td>
        </tr>
        <tr>
            <th scope="row">Giảm giá</th>
            <td><?php if ($row['discounting'] == 1) echo '<span class="role user">Đang giảm giá</span>';
                else echo '<span class="role admin">Không có giảm giá</span>' ?></td>
        </tr>
    </tbody>
</table> 