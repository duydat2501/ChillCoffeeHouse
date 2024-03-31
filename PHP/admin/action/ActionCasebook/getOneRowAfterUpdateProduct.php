<?php
require "../../../database.php";
require "../../../code.php";
$result = getInfoCasebook($_GET['casebook']);
$row = $result->fetch_assoc();
?>
<td><?php echo $row['casebook'] ?></td>
<td><?php echo $row['name'] ?></td>
<td><?php echo getAmountByCasebook($row['casebook'])->num_rows;
    ?>Sản Phẩm</td>
<td>
    <div class="table-data-feature">
        <button class="btn btn-secondary m-1" data-toggle="tooltip" data-placement="top" title="Delete">
            <i class="zmdi zmdi-delete"></i>
        </button>
        <button onclick="getUpdateCasebook('<?php echo $row['casebook'] ?>',<?php echo $_GET['pos'] ?>)" style="margin:2px;" type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#updateCasebook">
            <i class="zmdi zmdi-edit"></i>
        </button>
    </div>
</td>