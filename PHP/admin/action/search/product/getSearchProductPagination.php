<?php 
require "../../../../database.php";
require "../../../../code.php";

$value = $_GET['value'];
$result = getProductBySearchNoNumpage($value);
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
            <button class="page-link" type="button" onclick="getSearhProductByNumpage(<?php echo $pos ?>,<?php echo $i ?>,'<?php echo $value ?>')"><?php echo $i ?></button>
        </li>
        <?php 
    } ?>
    </ul>
</nav> 