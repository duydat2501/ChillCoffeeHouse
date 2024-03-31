<?php
require "../../../database.php";
require "../../../code.php";
$result = getInfoCasebook($_GET['casebook'])->fetch_assoc();
?>
<input type="text" hidden name="old_casebook" id="old_casebook" value="<?php echo $_GET['casebook'] ?>" />
<div class="form-group">
    <label for="casebook">Mã danh mục</label>
    <input name="casebook" value="<?php echo $result['casebook']; ?>" type="text" class="form-control" id="casebook" placeholder="Điền mã danh mục">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Tên danh mục</label>
    <input name="name" value="<?php echo $result['name'] ?>" type="text" class="form-control" id="name" placeholder="Điền tên danh mục ">
</div>
<div class="form-group">
    <input type="button" class="btn btn-primary" value="Cập nhật" onclick="updateCasebook(<?php echo $_GET['pos'] ?>)">
</div>