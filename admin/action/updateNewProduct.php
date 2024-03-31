<?php 
require "../../database.php";
require "../../code.php";
$sql = 'SELECT MAX(id) FROM products';
$result = $conn->query($sql);
$id = $result->fetch_assoc();
$row = getProductById($id['MAX(id)'])->fetch_assoc();
?>
<tr id="tr<?php echo $row['id'] ?>">
    <td><?php echo $row['id'] ?></td>
    <td><img src="../public/<?php echo $row['img'] ?>" alt=""></td>
    <td><?php echo $row['title'] ?></td>
    <td><?php echo $row['summary'] ?></td>
    <td><?php echo $row['casebook'] ?></td>
    <td><?php echo $row['price'] ?></td>
    <td>
        <div class="table-data-feature">
            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                <i class="zmdi zmdi-edit"></i>
            </button>
            <button class="item" data-toggle="tooltip" onclick="deleteProduct(<?php echo $row['id'] ?>)" data-placement="top" title="Delete">
                <i class="zmdi zmdi-delete"></i>
            </button>
            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                <i class="zmdi zmdi-more"></i>
            </button>
        </div>
    </td>
</tr> 