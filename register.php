<?php
require_once "util/dbConnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="templace/bstory/login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="templace/bstory/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-43">
						Đăng ký
					</span>
					<?php
					$mess = "";
					if (isset($_POST['submit'])) {
						$error = array();
						if ($_POST['username']) {
							$username = $_POST['username'];
							$password = md5($_POST['password']);
							$fullname = $_POST['fullname'];
						} else {
							$error['username'] = 'Chưa nhập tên tài khoản';
							$error['password'] = 'Chưa nhập mật khẩu';
							$error['fullname'] = 'Chưa nhập tên dầy đủ';
						}

						$query = "SELECT * FROM users WHERE username='$username'";
						$result = $mysqli->query($query);
						$count = mysqli_num_rows($result);

						if ($count != 0) {
							$mess = "Tài khoản đã tồn tại, vui lòng chọn tài khoản khác!";
						} else {
							if (empty($error)) {
								$query = "INSERT INTO users (username,password,fullname) VALUE('{$username}','{$password}','{$fullname}')";
								$result = $mysqli->query($query);
								if ($result) {
									HEADER("Location: login.php?msg=Đăng ký thành công!");
									$mess = "Đăng ký tài khoản thành công!";
								} else {
									$mess = "Lỗi, không thể đăng ký tài khoản";
								}
							}
						}
					}

					?>

					<h6><span style="color:red;"><?php echo $mess; ?></span></h6>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Full name is required">
						<input class="input100" type="fullname" name="fullname">
						<span class="focus-input100"></span>
						<span class="label-input100">Full name</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<!-- <label class="label-checkbox100" for="ckb1">
								Remember me
							</label> -->
						</div>

						<div>
							<a href="login.php" class="txt1">
								Đăng nhập?
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn ">
							Đăng ký
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<!-- <span class="txt2">
							or sign up using
						</span> -->
					</div>

					<!-- <div class="login100-form-social flex-c-m">
                            <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                                <i class="fa fa-facebook-f" aria-hidden="true"></i>
                            </a>

                            <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div> -->
				</form>

				<div class="login100-more" style="background-image: url('templace/bstory/login/images/bg-02.jpg');">
				</div>
			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="templace/bstory/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="templace/bstory/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="templace/bstory/login/vendor/bootstrap/js/popper.js"></script>
	<script src="templace/bstory/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="templace/bstory/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="templace/bstory/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="templace/bstory/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="templace/bstory/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="templace/bstory/login/js/main.js"></script>

</body>

</html>