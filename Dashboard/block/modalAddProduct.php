<div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Thêm sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="">
                    <div class="form-group">
                        <label for="title" class=" form-control-label">Tên</label>
                        <input type="text" id="title" placeholder="tên" class="form-control">
                        <!-- <span class="help-block">Mời nhập Tựa đề</span> -->
                    </div>
                    <div class="form-group">
                        <label for="title" class=" form-control-label">Tóm tắt</label>
                        <input type="text" id="summary" placeholder="tóm tắt" class="form-control">
                        <!-- <span class="help-block">Mời nhập Tác giả</span> -->
                    </div>
                    <div class="form-group">
                        <label for="price" class=" form-control-label">Giá sản phẩm</label>
                        <input type="number" id="price" placeholder="Mời nhập Giá" class="form-control">
                        <!-- <span class="help-block">Mời nhập Tác giả</span> -->
                    </div>
                    <div class="form-group">
                        <label for="price" class=" form-control-label">Số lượng sản phẩm</label>
                        <input type="number" id="price" placeholder="Mời nhập số lượng" class="form-control">
                        <!-- <span class="help-block">Mời nhập Tác giả</span> -->
                    </div>
                    <div class="form-group">
                        <label for="price" class=" form-control-label">Danh mục</label>
                        <select name="select" id="select" class="form-control">
                            <?php 
                            $danhmuc = getCasebook();
                            while ($row = $danhmuc->fetch_assoc()) {
                                ?>
                            <option value="<?php echo $row['casebook'] ?>"><?php echo $row['name'] ?></option>
                            <?php 
                        } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div> 