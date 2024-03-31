<style>
    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: 100%;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .profile-edit-btn:hover {
        color: #ce7852;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
        border-bottom: 2px solid #ce7852;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }

    #home-tab:hover {
        color: #ce7852;
    }
</style>

<style media="screen">
    .preview {
        display: block;
        width: 150px;
        height: 150px;
        border: 1px solid black;
        margin-top: 10px;
    }

    .changeImage {
        display: none;
        text-align: center;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .closeIcon {
        position: absolute;
        top: 0px;
        right: 0px;
        cursor: pointer;
        font-size: 28px;
        color: #888;
    }
</style>

<?php
require "component/public/bradcaumpuser.php";
?>
<div class="container emp-profile">
    <form method="post" enctype="multipart/form-data" action="">
        <div class="overlay">
            <div class="changeImage">
                <span class="closeIcon" onclick="closeChangeImage()">
                    <i class="fas fa-times"></i></span>
                <input type="file" name="fileImg" id="fileImg" />
                <button type="button" onclick="submitData();">Submit</button>
                <div class="preview">
                    <img src="" id="img" alt="Preview" width="100%" height="100%">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">

                    <?php
                    $img_user = getImageUser($_SESSION['idUser']);
                    if ($img_user != null) {
                    ?>
                        <img src="page/uploads/<?php echo $img_user; ?>" alt="" style="width: 100%; height: 100%;" />
                    <?php
                    } else {
                    ?>
                        <img src="https://inkythuatso.com/uploads/thumbnails/800/2023/03/9-anh-dai-dien-trang-inkythuatso-03-15-27-03.jpg" alt="" />
                    <?php
                    }
                    ?>
                    <div onclick="showChangeImage()" class="file btn btn-lg btn-primary" style="font-family: sans-serif;font-weight: 600">
                        Đổi ảnh

                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="profile-head">
                    <div class="row">
                        <h5 class='col-md-9' style="font-family: sans-serif">
                            <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?>
                        </h5>
                        <div class="col-md-3">
                            <input type="button" class="profile-edit-btn" name="btnAddMore" value="Chỉnh sửa" onclick="editprofile()" ; />
                        </div>
                    </div>
                    <h6 style="font-family: sans-serif;color:#ce7852">
                        <?php
                        if ($_SESSION['admin'])  echo "Chức vụ: Admin";
                        else                     echo "Chức vụ: Người dùng";
                        ?>
                    </h6>
                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a style="cursor:pointer" onclick="profileuser();" class="nav-link" id="home-tab">Thông tin</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item text-muted" style="font-family: sans-serif" style="font-family: sans-serif;font-weight: 600">Hoạt động <i class="fas fa-flag"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong style="font-family: sans-serif;font-weight: 600">Đơn hàng <i class="fas fa-dolly-flatbed"></i></strong></span><?php echo getOrderByIdUser($_SESSION['idUser'])->num_rows; ?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong style="font-family: sans-serif;font-weight: 600">Yêu thích <i class="fas fa-heart"></i></strong></span> 13</li>
                </ul>
            </div>
            <div class="col-md-8" id='something'>

                <!-- <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p style="font-family: sans-serif;color:#ce7852">Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p style="font-family: sans-serif;color:#ce7852">10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p style="font-family: sans-serif;color:#ce7852">230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p style="font-family: sans-serif;color:#ce7852">Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p style="font-family: sans-serif;color:#ce7852">6 months</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br />
                                <p style="font-family: sans-serif;color:#ce7852">Your detail description</p>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
</div>
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    fileImg.onchange = evt => {
        const [file] = fileImg.files;
        if (file) {
            img.src = URL.createObjectURL(file);
        }
    }

    function submitData() {
        $(document).ready(function() {
            var formData = new FormData();
            var files = $('#fileImg')[0].files;
            formData.append('fileImg', files[0]);

            $.ajax({
                url: 'page/function.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response == "Success") {
                        // alert("Successfully Added");
                        callSnackbar("Cập nhật hình ảnh thành công!", 1);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);

                    } else if (response == "Invalid") {
                        callSnackbar("File hình ảnh không hợp lệ!", 2);
                        // alert("Invalid Extension!");
                    } else {
                        // alert("Please Fill Out The Form");
                        callSnackbar("Vui lòng chọn hình ảnh!", 2);
                    }
                }

            })
        })
    }

    function showChangeImage() {
        // var changeImageDiv = document.querySelector('.changeImage');
        // changeImageDiv.style.display = 'block';

        var overlay = document.querySelector('.overlay');
        var changeImageDiv = document.querySelector('.changeImage');
        overlay.style.display = 'block';
        changeImageDiv.style.display = 'block';
    }

    function closeChangeImage() {
        var overlay = document.querySelector('.overlay');
        var changeImage = document.querySelector('.changeImage');
        overlay.style.display = 'none';
        changeImage.style.display = 'none';
    }
</script>