<?php
require "../../../database.php";
require "../../../code.php";

$result = getInformationProductDiscountingById($_GET['id']); // id cua thang discouting
$discounting = getDiscountingById($_GET['id'])->fetch_assoc();
$discounting_today = getDiscountingToday()->fetch_assoc();
?>
<div>
    <?php if ($discounting_today['id'] != $discounting['id']) echo "<h2 class='h2' style='font-style:italic;font-family:sans-serif'>Không thể chỉnh do hết hạn</h2>" ?>
    <p class="h4">Phần trăm giảm giá: <?php echo $discounting['percent'] ?>%</p>
    <p>Ngày bắt đầu: <?php echo date_format(date_create($discounting['time_start']), "d-m-Y") ?></p>
    <p>Ngày bắt đầu: <?php echo date_format(date_create($discounting['time_end']), "d-m-Y") ?></p>
</div>
<div class="row">
    <div class="col-12" style="overflow:hidden">
        <button <?php if ($discounting_today['id'] != $discounting['id']) echo "disabled" ?> type="button" onclick="isChecked(<?php echo $_GET['id'] ?>)" class="btn btn-primary p-2" style="float:right;margin-bottom:5px">Thêm</button>
        <button <?php if ($discounting_today['id'] != $discounting['id']) echo "disabled" ?> type="button" onclick="removeDiscounting(<?php echo $_GET['id'] ?>)" class="btn btn-danger p-2" style="float:left">Xóa</button>
    </div>
</div>
<div class="row">
    <div class="col-6" style="height:500px;overflow-y:scroll">
        <table class="table table-bordered">
            <thead>
                <td>Mã sản phẩm</td>
                <td>Ảnh</td>
                <td>Tên sản phẩm</td>
                <td>Giá sản phẩm</td>
                <td>Giá sau khi giảm</td>
                <td></td>
            </thead>
            <tbody id="table_product_discounting">
                <?php
                while ($row = $result->fetch_assoc()) {
                    $product = getProductById($row['idProduct'])->fetch_assoc();
                    ?>
                    <tr id="tr<?php echo $product['id'] ?>">
                        <td><?php echo $product['id'] ?></td>
                        <td><img style="margin:auto;display:block" src="../public/<?php echo $product['img'] ?>" alt=""></td>
                        <td><?php echo $product['title'] ?></td>
                        <td><?php echo number_format($product['price']) ?>VND</td>
                        <td><?php echo number_format($product['price'] * (100 - $discounting['percent']) / 100) ?>VND</td>
                        <td><input type="checkbox" value="<?php echo $product['id'] ?>" class="checkbox"></td>
                    </tr>
                <?php } ?>
            <tbody>
        </table>
    </div>
    <div class="col-6" style="height:500px;overflow-y:scroll">
        <table class="table table-bordered">
            <thead>
                <td>Mã</td>
                <td>Tên</td>
                <td>Giá</td>
                <td>Số lượng</td>
                <td></td>
            </thead>
            <tbody id="table_product">
                <?php
                //$discounting_now = getDiscountingToday()->fetch_assoc(); // tìm khuyến mãi cho ngày hôm nay
                $result = getProductsWithoutDiscounting($_GET["id"]); // tìm những sản phẩm không có discounting;
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr id="tr<?php echo $row['id'] ?>">
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["price"] ?></td>
                        <td><?php echo $row["amount"] ?></td>
                        <td><input value="<?php echo $row["id"] ?>" class="checkbox" type="checkbox"></td>
                    </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>