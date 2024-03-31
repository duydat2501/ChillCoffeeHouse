<?php if (isset($_SESSION['username'])) {
?>
    <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
        <div class="searchbar__content setting__block">
            <div class="content-inner">
                <div class="switcher-currency">
                    <div class="row">
                        <div class="col-5">
                            <div class="wn__team text-center">

                                <div class="content">
                                    <h4><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?></h4>
                                    <p style="font-family: sans-serif">Chức vụ:
                                        <?php
                                        if ($_SESSION['admin'])  echo "<a href='admin'><span style='color:#ce7852'>Admin</span></a>";
                                        else                     echo "<span style='color:#ce7852'>Người dùng</span>";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <strong class="label switcher-label" style="text-align: center;">
                                <span><a href="?page=user" style="color: #343a40;">Thông tin tài khoản</a></span>
                            </strong>
                            <div class="switcher-options" style="text-align: center;">
                                <div class="switcher-currency-trigger" style="overflow:hidden">
                                    <div class="setting__menu">
                                        <span><a href="#" style="text-decoration: none;">Tài khoản: <?php echo $_SESSION['username'] ?></a></span>
                                        <span><a href="#" style="text-decoration: none;">Mật khẩu: <?php echo "***" ?></a></span>
                                        <span><a href="#" style="text-decoration: none;">Email: <?php echo $_SESSION['email'] ?></a></span>
                                        <span><a href="#" style="text-decoration: none;">Điện thoại: <?php echo $_SESSION['phone_number'] ?></a></span>
                                        <span><a onclick="sign_out()" style="color: #cb7a59 ">Đăng xuất</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php
} else {
?>
    <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
        <div class="searchbar__content setting__block">
            <div class="content-inner">
                <div class="row">
                    <div style="width:80%;margin:auto">
                        <div class="my__account__wrapper">
                            <h3 class="account__title">Đăng nhập</h3>
                            <form id="form_login">
                                <div id="alert"></div>
                                <div class="account__form">
                                    <div class="input__box">
                                        <label>Tài khoản<span>*</span></label>
                                        <input type="text" name="username">
                                    </div>
                                    <div class="input__box">
                                        <label>Mật khẩu<span>*</span></label>
                                        <input type="password" name="password">
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
                    <!-- <div class="col-lg-6 col-12">
                                                                                                <div class="my__account__wrapper">
                                                                                                    <h3 class="account__title">Register</h3>
                                                                                                    <form action="#">
                                                                                                        <div class="account__form">
                                                                                                            <div class="input__box">
                                                                                                                <label>Email address <span>*</span></label>
                                                                                                                <input type="email">
                                                                                                            </div>
                                                                                                            <div class="input__box">
                                                                                                                <label>Password<span>*</span></label>
                                                                                                                <input type="password">
                                                                                                            </div>
                                                                                                            <div class="form__btn">
                                                                                                                <button>Register</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div> -->
                </div>
            </div>
        </div>
    </li>

<?php
} ?>