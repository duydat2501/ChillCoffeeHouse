<?php
require "component/public/bradcaumpaccount.php";
?>
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div id="jump"></div>
            <div style="width:80%;margin:auto">
                <div class="my__account__wrapper">
                    <h3 class="account__title">Đăng kí</h3>
                    <form id="form" name="form">

                        <div id="alert"></div>
                        <div class="account__form">
                            <div class="input__box">
                                <label>Họ:<span>*</span></label>
                                <input type="text" name="lastname">
                            </div>
                            <div class="input__box">
                                <label>Tên:<span>*</span></label>
                                <input type="text" name="firstname">
                            </div>
                            <div class="input__box">
                                <label>Email<span>*</span></label>
                                <input type="text" name="email">
                            </div>
                            <div class="input__box">
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="phone_number">
                            </div>
                            <div class="input__box">
                                <label>Địa chỉ<span>*</span></label>
                                <input type="text" name="address">
                            </div>
                            <div class="input__box">
                                <label>Tài khoản:<span>*</span></label>
                                <input type="text" name="username">
                            </div>
                            <div class="input__box">
                                <label>Mật khẩu:<span>*</span></label>
                                <input type="password" name="password">
                            </div>
                            <div class="input__box">
                                <label>Nhập lại mật khẩu:<span>*</span></label>
                                <input type="password" name="pre_password">
                            </div>
                            <div style>
                                <label>Giới tính:<span></span></label>
                                <input checked type="radio" name="gender" value="1">Nam
                                <input type="radio" name="gender" value="0">Nữ
                            </div>
                            <div>
                                <label>Ngày sinh<span>*</span></label>
                                <input type="date" name="date">
                            </div>
                            <div style="overflow:hidden">
                                <button class="btn btn-primary" style="float:right" type="button" onclick="checknewaccount()">Đăng kí</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>