<div class="modal fade" id="addNewCategory" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Thêm danh mục</h5>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddNewCategory" action="action/addNewCategory.php" method="post" class="" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="id_dm" class="form-control-label">Mã danh mục</label>
                        <input type="text" name="id" id="id_dm" placeholder="Mời nhập mã danh mục" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title" class=" form-control-label">Tên danh mục</label>
                        <input type="text" name="name" id="title" placeholder="Mời nhập tên" class="form-control">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btnThem" onclick="addNewCategory()">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>