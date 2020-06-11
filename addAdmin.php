<?php require_once('./PHP/initialize.php'); ?>
<?php if (!isset($_SESSION['set'])) {
	header("Location:login.php");
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Add Admin</title>
	<style>
		.text-head {}
	</style>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Web application integrated to the AVI system which is developed for automatic vehicle number plate recognition" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script src="js/jquery-1.8.3.min.js"></script>
	<!---- start-smoth-scrolling---->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1200);
			});
		});
	</script>
	<!---End-smoth-scrolling---->
</head>

<body>
	<div class="header" style="background-color: #DEDAC8;">
		<div class="container">
			<div class="header-top">
				<div class="logo">
					<a href="homePage.php">
						<img alt="W3Schools" src="images/logo.png" width="100px" height="100px" style="margin-top:0px">
					</a>
					<!-- <a style="color: #0b0b0b" href="index.html">A V I</a> -->
				</div>
				<div class="top-menu">
					<span class="menu"><img src="images/nav.png" alt="" /> </span>
					<ul>
						<li><a href="homePage.php">home</a></li>
						<li><a href="viewBlockedVehicles.php">Blacklisted Vehicles</a></li>
						<li><a href="viewAdminList.php">View Admin List</a></li>
						<li><a href="viewGeneralUserList.php">View General Users</a></li>
						<li><a href="LogOut.php">Logout</a></li>
					</ul>
				</div>
				<!--script-nav-->
				<script>
					$("span.menu").click(function() {
						$(".top-menu ul").slideToggle("slow", function() {});
					});
				</script>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- Slider-starts-Here -->
		<script src="js/responsiveslides.min.js"></script>
		<script>
			$(function() {
				$("#slider").responsiveSlides({
					auto: true,
					nav: false,
					speed: 500,
					namespace: "callbacks",
					pager: true,
				});
			});
		</script>
		<div class="banner">
			<div class="bnr2">
			</div>
		</div>
	</div>
	<div class="content row " style="background-color: #DEDAC8;">
		<div class="mail col-xs-6" style="background-color: #DEDAC8;">
			<div class="container text-head">
				<h3 style="font-family: sans-serif; text-align:left; padding-left:30px; padding-bottom:20px; color:#114720; margin-left:1.7em">Add a New Admin</h3>
			</div>
			<div class="col-md-6 contact-form">
				<form action="./PHP/manager.php" method="post">
					<input type="text" name="fullName" placeholder="Full Name" required=""><br>
					<input type="text" name="regNo" placeholder="Registration No" required=""><br>

					<div class="styled-select">
						<label style="align-content: left; font-size:20px; color : #114720">Select Branch</label>
						<br>
						<select name="branch" id="categorylist" required style="margin-bottom: 13px; border-color : #114720">
							<option name='matara' value="1">Matara</option>
							<option name='galle' value="2">Galle</option>
							<option name='hambantota' value="3">Hambantota</option>
							<option name='moratuwa' value="4">Moratuwa</option>
						</select><br>
					</div>
					<input type="text" name="username" placeholder="Username" required=""><br>
					<input type="text" name="password" placeholder="Password" required=""><br>
					<input type="submit" name='add_admin' value="Add"><br>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col-xs-6" style="background-color: #DEDAC8; margin-top: 20px">
			<img src="images/addadmin.png" alt="" width="500px" height="350px">
		</div>
	</div>
	<!-- //container -->
	<!-- //mail -->
	<!--footer-->
	<div class="footer-section">
		<div class="container">
			<div class="footer-top">
				<p>Copyright &copy; 2015 <span>Car Racing.</span> All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
					$().UItoTop({
						easingType: 'easeOutQuart'
					});
				});
			</script>
			<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		</div>
	</div>
</body>

</html>