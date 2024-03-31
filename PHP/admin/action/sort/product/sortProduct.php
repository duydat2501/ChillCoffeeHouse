<?php
require "../../../../database.php";
require "../../../../code.php";

?>
<?php
// if ($_GET['option'] == 0)
//     $result = sortIdProductASC($_GET['numpage']);
// else $result = sortIdProductDESC($_GET['numpage']);
$option = $_GET['option'];
$numpage = $_GET['numpage'];
$sort = $_GET['sort'];
$query = "";

if (isset($_GET['value'])) {
    $value = $_GET['value'];
    $query = "(SELECT * FROM products WHERE title LIKE '%$value%' OR summary LIKE '%$value%' OR casebook LIKE '%$value%')";
} else {
    $query = "products";
}

if ($sort == 0)
    $sql = "SELECT * FROM $query as abc ORDER BY $option ASC LIMIT $numpage,7";
else $sql = "SELECT * FROM $query as abc ORDER BY $option DESC LIMIT $numpage,7";
echo $option;
echo $sql;
$result = $conn->query($sql);
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
                </button><br>
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
    </tr>
<?php
}
?>