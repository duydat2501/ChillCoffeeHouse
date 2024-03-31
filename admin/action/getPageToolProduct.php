<?php 
require "../../database.php";
require "../../code.php";
$casebook = $_GET['casebook'];
$sort = $_GET['sort'];
$tmp_casebook = "";
$tmp_sort = "";

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
$result = $conn->query($sql);
?>
<nav aria-label="...">
    <ul class="pagination pagination-sm">
        <?php 
        // $result = getAllProductNoNumpage();
        $numpage = ceil($result->num_rows / 7);
        for ($i = 1; $i <= $numpage; $i++) {
            $pos = ($i - 1) * 7;
            ?>
        <li class="page-item <?php if ($i == 1) echo "active" ?>">
            <button class="page-link" type="button" onclick="getToolProductByNumpage(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button>
        </li>
        <?php 
    } ?>
    </ul>
</nav> 