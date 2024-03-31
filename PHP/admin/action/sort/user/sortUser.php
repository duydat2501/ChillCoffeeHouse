<?php 
require "../../../../database.php";

$option = $_GET['option'];
$sort = $_GET['sort'];
if ($sort == 0)
    $sql = "SELECT * FROM users ORDER BY $option ASC";
else $sql = "SELECT * FROM users ORDER BY $option DESC";
$result = $conn->query($sql);
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
            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                <i class="zmdi zmdi-edit"></i>
            </button>
            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                <i class="zmdi zmdi-delete"></i>
            </button>
            <button onclick="moreUser(<?php echo $row['id'] ?>)" class="item" data-placement="top" title="More" data-toggle="modal" data-target="#moreUser">
                <i class="zmdi zmdi-more"></i>
            </button>
        </div>
    </td>
</tr>
<?php 
}
?> 