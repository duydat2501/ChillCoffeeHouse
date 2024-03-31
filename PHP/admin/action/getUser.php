<!-- khi mà chuyển trang bình thường trong admin thì sẽ load cái này về -->
<?php
require "../../database.php";
require "../../code.php";
$num = $_POST['num'];
?>
<?php
$result = getAllUser($num);

?>

<tbody id="table_customer">
    <?php
    $result = getAllUser(0);
    while ($row = $result->fetch_assoc()) {
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
    <?php
    }
    ?>
</tbody>
</table>