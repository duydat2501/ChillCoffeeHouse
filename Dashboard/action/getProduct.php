<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$num = $_POST['num'];
?>
<?php 
$result = getAllProduct($num);
while ($row = $result->fetch_assoc()) {
    ?>
<tr>
    <td><?php echo $row['id'] ?></td>
    <td><img src="../PHP/public/<?php echo $row['img'] ?>" alt=""></td>
    <td><?php echo $row['title'] ?></td>
    <td><?php echo $row['summary'] ?></td>
    <td><?php echo $row['casebook'] ?></td>
    <td><?php echo $row['price'] ?></td>
    <td>
        <div class="table-data-feature">
            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                <i class="zmdi zmdi-edit"></i>
            </button>
            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                <i class="zmdi zmdi-delete"></i>
            </button>
            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                <i class="zmdi zmdi-more"></i>
            </button>
        </div>
    </td>
</tr>
<?php 
}
?> 