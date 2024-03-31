    <!-- link css datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <div class="modal fade" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Thêm tài khoản</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formAddNewUser" action="action/addNewUser.php" method="post" class="" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="img" class=" form-control-label">Hình ảnh</label>
                            <input type="file" name="img" id="file" />
                        </div>
                        <div class="form-group">
                            <label for="username" class=" form-control-label">Tên tài khoản</label>
                            <input type="text" name="username" id="username" placeholder="Mời nhập tài khoản" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class=" form-control-label">Mật khẩu</label>
                            <input type="password" name="password" id="password" placeholder="Mời nhập mật khẩu" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="firstname" class=" form-control-label">Họ</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Mời nhập họ" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="lastname" class=" form-control-label">Tên</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Mời nhập tên" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email" class=" form-control-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Mời nhập email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="dob" class="form-control-label">Ngày sinh</label>
                            <input type="text" name="dob" id="dob" placeholder="Mời nhập ngày sinh" class="form-control">
                        </div>

                        <script>
                            $(function() {
                                $("#dob").datepicker();
                            });
                        </script>

                        <div class="form-group">
                            <label for="sex" class=" form-control-label">Giới tính</label>
                            <select name="sex" id="sex" class="form-control">
                                <option value="1">Nam</option>
                                <option value="0" selected>Nữ</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="address" class=" form-control-label">Địa chỉ</label>
                            <input type="text" name="address" id="address" placeholder="Mời nhập địa chỉ" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class=" form-control-label">Số điện thoại</label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Mời nhập địa chỉ" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="price" class=" form-control-label">Loại tài khoản</label>
                            <select name="admin" id="select" class="form-control">
                                <option value="1">Admin</option>
                                <option value="0" selected>User</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="btnThem" onclick="addNewUser()">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- link css datepicker -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>