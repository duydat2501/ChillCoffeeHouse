<?php
require "component/public/bradcaumpaccount.php";
?>
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div style="width:80%;margin:auto">
                <div class="my__account__wrapper">
                    <h3 class="account__title">Đăng nhập 123</h3>
                    <div id="alert"></div>
                    <form id="form_login" name="form_login">
                        <div class="account__form">
                            <div class="input__box">
                                <label>Tài khoản<span>*</span></label>
                                <input type="text" name="username" value="">
                            </div>
                            <div class="input__box">
                                <label>Mật khẩu<span>*</span></label>
                                <input type="text" name="password" value="">
                            </div>
                            <div class="form__btn">
                                <button type="button" onclick="checklogin()">Đăng nhập</button>
                                <label class="label-for-checkbox">
                                    <input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
                                    <span>Lưu tài khoản</span>
                                </label>
                            </div>
                            <a class="forget_pass" href="?page=newaccount">Đăng kí tài khoản</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>