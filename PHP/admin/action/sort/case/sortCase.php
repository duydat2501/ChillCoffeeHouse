<?php
require "../../../../database.php";
require "../../../../code.php";


$option  = $_GET['option'];
$sort = $_GET['sort'];
if ($sort == 0)
    $sql = "SELECT * FROM cases ORDER BY $option ASC";
else $sql = "SELECT * FROM cases ORDER BY $option DESC";
?>
<?php
$result = $conn->query($sql);
$i = 0;
while ($row = $result->fetch_assoc()) {
    $amount = getAmountByCasebook($row['casebook'])->num_rows;
    ?>
    <tr id="tr<?php echo $i ?>">
        <td><?php echo $row['casebook'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $amount ?></td>
        <td>
            <div class="table-data-feature">
                <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="zmdi zmdi-delete"></i>
                </button>
                <button onclick="getUpdateCasebook('<?php echo $row['casebook'] ?>',<?php echo $i++ ?>)" style="margin-left:4px;" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#updateCasebook">
                    <i class="zmdi zmdi-edit"></i>
                </button>
            </div>
        </td>
    </tr>
<?php
}
?>