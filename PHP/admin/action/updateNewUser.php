<!-- lúc mà thêm sản phẩm mới vào nó sẽ trả về sản phẩm vừa được tạo vào màn hình -->
<?php
require "../../database.php";
require "../../code.php";

$sql = 'SELECT MAX(id) FROM users';
$result = $conn->query($sql);
$id = $result->fetch_assoc();
$row = getProductById($id['MAX(id)'])->fetch_assoc();
?>


        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo md5($row['password']) ?></td>
            <td>
                <?php
                if ($row['admin'] == 1) echo '<span class="role admin">admin</span>';
                else
                    echo '<span class="role member">member</span>';
                ?>
            </td>
            <td>
                <div class="table-data-feature">
                    <button onclick="moreUser(<?php echo $row['id'] ?>)" type="button" class="btn btn-secondary m-1" data-toggle="modal" data-target="#moreUser"><i class="zmdi zmdi-more"></i></button>
                </div>
            </td>
        </tr>


