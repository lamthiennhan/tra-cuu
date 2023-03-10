<?php
include "Connect/Connect.php";

if (count($_COOKIE) <= 0) {
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        if (checkLogin($_POST['user'], $_POST['pass'])) {
            setcookie("user", $_POST['user'], time() + 86400);
            header("location:index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng Nhập</title>

	<link rel="stylesheet" href="css/loginn.css" type="text/css" media="all">

	<!-- Fonts -->
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

</head>

<body style="background-image: url('./images/br-main.jpg');">
	<div id="main" style="height: 100vh; display: flex; justify-content: center; flex-direction: column!important;">
		<h1 style="margin: 0 0 25px 0; font-weight: bold;">Đăng Nhập</h1>

		<div class="w3layoutscontaineragileits" style="margin-bottom: 50px;">
			<h2 style="font-weight: bold;">Đăng Nhập Tài Khoản</h2>
			<form action="login.php" method="post">
				<input type="text" Name="user" placeholder="TÀI KHOẢN" required="" style="border-color: white;">
				<input type="password" Name="pass" placeholder="MẬT KHẨU" required="" style="border-color: white;">
				<div class="aitssendbuttonw3ls">
					<input type="submit" value="Đăng nhập">
					<!-- <p> To register new account <span>→</span> <a class="w3_play_icon1" href="#small-dialog1"> Click Here</a></p>
				<div class="clear"></div> -->
				</div>
			</form>
		</div>
	</div>

	<script>
		$( document ).ready(function () {
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

</html>