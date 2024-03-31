<?php
session_start();
?>

<form class="form" action="##" method="post" id="registrationForm">
	<div class="row">
		<div class="col-5">
			<div class="form-group">
				<div class="col-md-12">
					<label for="first_name">
						<h4 style="font-family: sans-serif">Họ</h4>
					</label>
					<input type="text" class="form-control" name="lastname" value="<?php echo $_SESSION['lastname'] ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label for="last_name">
						<h4 style="font-family: sans-serif">Tên</h4>
					</label>
					<input type="text" class="form-control" name="firstname" value="<?php echo $_SESSION['firstname'] ?>">
				</div>
			</div>
			<div class="form-group">

				<div class="col-md-12">
					<label for="dob">
						<h4 style="font-family: sans-serif">Ngày sinh</h4>
					</label>
					<input type="date" class="form-control" name="date" value="<?php echo $_SESSION['dob'] ?>">
				</div>
			</div>


			<div class="form-group">

				<div class="col-md-12">
					<label for="password">
						<h4 style="font-family: sans-serif">Mật khẩu</h4>
					</label>
					<input type="password" class="form-control" name="password" value="<?php echo $_SESSION['password'] ?>">
				</div>
			</div>
			<div class="form-group">

				<div class="col-md-12">
					<label for="password2">
						<h4 style="font-family: sans-serif">Xác nhận mật khẩu</h4>
					</label>
					<input type="password" class="form-control" name="password2" placeholder="Nhập lại mật khẩu để xác nhận">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Lưu</button>
				</div>
			</div>
		</div>
		<div class="col-5">
			<div class="form-group">
				<div class="col-md-12">
					<label for="username">
						<h4 style="font-family: sans-serif">Tài khoản</h4>
					</label>
					<input type="text" name="username" class="form-control" placeholder="<?php echo $_SESSION['username'] ?>" disabled="true">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label for="email">
						<h4 style="font-family: sans-serif">Email</h4>
					</label>
					<input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email'] ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label for="last_name">
						<h4 style="font-family: sans-serif">Số điện thoại</h4>
					</label>
					<input type="text" class="form-control" name="phone" value="<?php echo 'điện thoại ở đây' ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label for="last_name">
						<h4 style="font-family: sans-serif">Địa chỉ</h4>
					</label>
					<input type="text" class="form-control" name="address" value="<?php echo 'địa chỉ ở đây' ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label for="sex">
						<h4 style="font-family: sans-serif">Giới tính</h4>
					</label>
					<br>
					<input <?php if ($_SESSION['sex']) echo "checked" ?> type="radio" name="gender" value="0">Nam&nbsp&nbsp
					<input <?php if (!$_SESSION['sex']) echo "checked" ?> type="radio" name="gender" value="1">Nữ
					<br>
				</div>
			</div>

		</div>
	</div>
</form>