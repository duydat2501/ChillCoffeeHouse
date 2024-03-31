<!-- lúc mà thêm sản phẩm mới vào nó sẽ trả về sản phẩm vừa được tạo vào màn hình -->
<?php
require "../../database.php";
require "../../code.php";

$sql = 'SELECT MAX(id) FROM cases';
$result = $conn->query($sql);
$id = $result->fetch_assoc();
$row = getProductById($id['MAX(id)'])->fetch_assoc();

?>
<tr id="tr<?php echo $i ?>">
    <td><?php echo $row['casebook'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo getAmountByCasebook($row['casebook'])->num_rows;
        ?> Sản Phẩm</td>
    <td>
        <div class="table-data-feature">

            <button onclick="getUpdateCasebook('<?php echo $row['casebook'] ?>',<?php echo $i++ ?>)" style="margin-left:4px;" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#updateCasebook">
                <i class="zmdi zmdi-edit"></i>
            </button>
        </div>
    </td>
</tr>