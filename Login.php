<?php
include "Connect/Connect.php";

if (isset($_POST['user']) && isset($_POST['pass'])) {
	if (checkLogin($_POST['user'], $_POST['pass'])) {
		$c_user = $_POST['user'];
		$c_pass = $_POST['pass'];
		setcookie("user", $c_user, time() + 86400); // 86400 = 1 day
		setcookie("pass", $c_pass, time() + 86400); // 86400 = 1 day
		header("location:index.php");
	}
}
?>

<!DOCTYPE html>
<html>

<!-- Head -->

<head>

	<title>Đăng Nhập</title>

	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="keywords"
		content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- Style -->
	<link rel="stylesheet" href="css/login.css" type="text/css" media="all">

	<!-- Fonts -->
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>Đăng Nhập</h1>

	<div class="w3layoutscontaineragileits">
		<h2>Đăng Nhập Tài Khoản</h2>
		<form action="login.php" method="post">
			<input type="text" Name="user" placeholder="TÀI KHOẢN" required="">
			<input type="password" Name="pass" placeholder="MẬT KHẨU" required="">
			<ul class="agileinfotickwthree">
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Nhớ mật khẩu</label>
					<a href="#">Quên mật khẩu</a>
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="Đăng nhập">
				<!-- <p> To register new account <span>→</span> <a class="w3_play_icon1" href="#small-dialog1"> Click Here</a></p>
				<div class="clear"></div> -->
			</div>
		</form>
	</div>

	<div class="w3footeragile">
		<p> &copy; 2017 Existing Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com"
				target="_blank">W3layouts</a></p>
	</div>


	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<!-- pop-up-box-js-file -->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		$(document).ready(function () {
			$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>

</body>
<!-- //Body -->

</html>