<!-- cái này là chức năng sắp xếp -->
<?php
require "../../database.php";
require "../../code.php";
$casebook = $_GET['casebook'];
$sort = $_GET['sort'];
$tmp_casebook = "";
$tmp_sort = "";
$numpage = $_GET['numpage'];

if ($casebook == -1) $tmp_casebook = "";
else {
    $tmp_casebook = $casebook;
}

if ($sort == -1) $tmp_sort = "";
elseif ($sort == 0) $tmp_sort = "ORDER BY price DESC";
elseif ($sort == 1) $tmp_sort = "ORDER BY price ASC";
elseif ($sort == 2) $tmp_sort = "ORDER BY amount DESC";
elseif ($sort == 3) $tmp_sort = "ORDER BY amount ASC";


$sql = "SELECT * FROM products";

if ($tmp_casebook != "")
    $sql .= " WHERE casebook='$tmp_casebook'";
if ($sort != "")
    $sql .= " $tmp_sort";
$sql .= " LIMIT $numpage,7";
// echo $sql;
$result = $conn->query($sql);
?>
<?php
// $result = getAllProduct(0);
while ($row = $result->fetch_assoc()) {
?>
    <tr id="tr<?php echo $row['id'] ?>">
        <td><?php echo $row['id'] ?></td>
        <td><img src="../public/<?php echo $row['img'] ?>" alt=""></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['summary'] ?></td>
        <td><?php echo $row['casebook'] ?></td>
        <td><?php echo number_format($row['price']) ?>VND</td>
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

                <?php
                if (checkProductIsDiscounting($row['id'])) {
                ?>
                    <button class="btn btn-success mb-1" style="margin:2px;font-weight:600" type="button">
                        %
                    </button>
                <?php
                } else {
                ?>
                    <button class="btn btn-secondary mb-1" style="margin:2px;font-weight:600" type="button">
                        %
                    </button>
                <?php } ?>
            </div>
        </td>
        </t r>
    <?php
}
    ?>