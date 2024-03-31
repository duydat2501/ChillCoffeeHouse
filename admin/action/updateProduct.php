<?php 
require "../../database.php";
require "../../code.php";
// echo $_GET['id'];
$id = $_GET['id'];
$result = getProductById($id)->fetch_assoc();
?>
<input type="text" hidden name="id" value="<?php echo $id ?>">

<div class="form-group">
    <!-- <label for="img" class=" form-control-label">Hình ảnh</label> -->
    <!-- <input type="file" name="img" id="file" /> -->
    <img style="display:block;margin:auto" src="../public/<?php echo $result['img'] ?>" alt="">
</div>
<div class="form-group">
    <label for="img" class=" form-control-label">Hình ảnh</label>
    <input type="file" name="img" id="file" />
</div>
<div class="form-group">
    <label for="title" class=" form-control-label">Tựa đề</label>
    <input value="<?php echo $result['title'] ?>" type="text" name="title" id="title" placeholder="Mời Tựa đề" class="form-control">
</div>
<div class="form-group">
    <label for="title" class=" form-control-label">Tác giả</label>
    <input value="<?php echo $result['summary'] ?>" type="text" name="summary" id="summary" placeholder="Mời Tác giả" class="form-control">
</div>
<div class="form-group">
    <label for="price" class=" form-control-label">Giá sản phẩm</label>
    <input value="<?php echo $result['price'] ?>" type="number" name="price" id="price" placeholder="Mời nhập Giá" class="form-control">
</div>
<div class="form-group">
    <label for="price" class=" form-control-label">Số lượng sản phẩm</label>
    <input value="<?php echo $result['amount'] ?>" type="number" name="qty" id="qty" placeholder="Mời nhập số lượng" class="form-control">
</div>
<div class="form-group">
    <label for="price" class=" form-control-label">Danh mục</label>
    <select name="casebook" id="select" class="form-control">
        <?php 
        $danhmuc = getCasebook();
        while ($row = $danhmuc->fetch_assoc()) {
            ?>
        <option <?php if ($result['casebook'] == $row['casebook']) {
                    echo "selected";
                } ?> value="<?php echo $row['casebook'] ?>"><?php echo $row['name'] ?></option>
        <?php 
    } ?>
    </select>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
    <button type="button" class="btn btn-primary" id="btnChinhSua" onclick="updateProductInDatabase()">Chỉnh sửa</button>
</div> 