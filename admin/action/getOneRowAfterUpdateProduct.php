<?php 
require "../../database.php";
require "../../code.php";
$result = getProductById($_GET['id']);
$row = $result->fetch_assoc();
?>
<td><?php echo $row['id'] ?></td>
<td><img src="../public/<?php echo $row['img'] ?>" alt=""></td>
<td><?php echo $row['title'] ?></td>
<td><?php echo $row['summary'] ?></td>
<td><?php echo $row['casebook'] ?></td>
<td><?php echo $row['price'] ?></td>
<td><?php echo $row['amount'] ?></td>
<td>
    <div class="table-data-feature">
        <button onclick="updateProduct(<?php echo $row['id'] ?>)" style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#updateProduct">
            <i class="zmdi zmdi-edit"></i>
        </button>
        <button style="margin:2px;" class="btn btn-secondary  mb-1" data-toggle="tooltip" data-placement="top" onclick="deleteProduct(<?php echo $row['id'] ?>)" title="Delete">
            <i class="zmdi zmdi-delete"></i>
        </button>
        <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#moreProduct" onclick="moreProduct(<?php echo $row['id'] ?>)">
            <i class="zmdi zmdi-more"></i>
        </button>
    </div>
</td> 