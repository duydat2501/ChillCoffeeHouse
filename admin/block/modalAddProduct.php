<div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Thêm sản phẩm</h5>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddNewProduct" action="action/addNewProduct.php" method="post" class="" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="img" class=" form-control-label">Hình ảnh</label>
                        <input type="file" name="img" id="file" />
                    </div>
                    <div class="form-group">
                        <label for="title" class=" form-control-label">Tên</label>
                        <input type="text" name="title" id="title" placeholder="Mời nhập tên" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title" class=" form-control-label">tóm tắt</label>
                        <input type="text" name="summary" id="summary" placeholder="Mời nhập tóm tắt" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price" class=" form-control-label">Giá sản phẩm</label>
                        <input type="number" name="price" id="price" placeholder="Mời nhập Giá" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price" class=" form-control-label">Số lượng sản phẩm</label>
                        <input type="number" name="qty" id="qty" placeholder="Mời nhập số lượng" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price" class=" form-control-label">Danh mục</label>
                        <select name="casebook" id="select" class="form-control">
                            <?php 
                            $danhmuc = getCasebook();
                            $i = 0;
                            while ($row = $danhmuc->fetch_assoc()) {
                                ?>
                            <option <?php if ($i == 0) {
                                        echo "selected";
                                        $i++;
                                    } ?> value="<?php echo $row['casebook'] ?>"><?php echo $row['name'] ?></option>
                            <?php 
                        } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btnThem" onclick="addNewProduct()">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 