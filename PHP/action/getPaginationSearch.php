<?php 
require "../code.php";
require "../database.php";

$title = $_POST['title'];
$pricefrom = $_POST['pricefrom'];
$priceto = $_POST['priceto'];
$numpage = $_POST['numpage'];
$filter = array(
    'title' => isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : false,
    'pricefrom' => isset($_POST['pricefrom']) ? mysqli_real_escape_string($conn, $_POST['pricefrom']) : false,
    'priceto' => isset($_POST['priceto']) ? mysqli_real_escape_string($conn, $_POST['priceto']) : false,
);

$where = array();



if ($filter['title']) {
    $where[] = "title LIKE '%{$filter['title']}%'";
}

if ($filter['pricefrom']) {
    $where[] = "price >= '{$filter['pricefrom']}'";
}

if ($filter['priceto']) {
    $where[] = "price <= '{$filter['priceto']}'";
}

$sql = "SELECT * FROM products";

if ($where) {
    $sql .= " WHERE " . implode(" AND ", $where);
}
$result = $conn->query($sql);
$num = ceil($result->num_rows / max_page);
for ($i = 1; $i <= $num; $i++) {
    $pos = ($i - 1) * max_page;
    ?>
<li id="li<?php echo $pos ?>" <?php if ($pos == $numpage) echo "class='active'" ?>><a style="cursor:pointer" onclick="getSearch(<?php echo $pos ?>)"><?php echo $i ?></a></li>
<?php 
}  ?> 