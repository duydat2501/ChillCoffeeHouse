<?php
session_start();
?>
<div class="tab-content profile-tab" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-6">
                <label style="font-family: sans-serif">Tài khoản</label>
            </div>
            <div class="col-md-6">
                <p style="font-family: sans-serif;color:#ce7852"><?php echo $_SESSION['username']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label style="font-family: sans-serif">Tên</label>
            </div>
            <div class="col-md-6">
                <p style="font-family: sans-serif;color:#ce7852"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Ngày sinh</label>
            </div>
            <div class="col-md-6">
                <p style="font-family: sans-serif;color:#ce7852"><?php echo $_SESSION['dob'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Giới tính</label>
            </div>
            <div class="col-md-6">
                <p style="font-family: sans-serif;color:#ce7852"><?php if ($_SESSION['sex']) echo "Nam";
                                                                    else echo "Nữ" ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label style="font-family: sans-serif">Email</label>
            </div>
            <div class="col-md-6">
                <p style="font-family: sans-serif;color:#ce7852"><?php echo $_SESSION['email']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label style="font-family: sans-serif">Điện thoại</label>
            </div>
            <div class="col-md-6">
                <p style="font-family: sans-serif;color:#ce7852">123 456 7890</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label style="font-family: sans-serif">Địa chỉ</label>
            </div>
            <div class="col-md-6">
                <p style="font-family: sans-serif;color:#ce7852"><?php echo $_SESSION['address'] ?></p>
            </div>
        </div>
    </div>