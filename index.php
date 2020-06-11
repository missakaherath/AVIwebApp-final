<!DOCTYPE HTML>
<html>

<head>
	<title>AVI registration home</title>
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
	<style>
		.full-row {
			/* height: 800px; */
		}

		.home-divs {
			/* height: 800px; */
			/* background-color: red; */
		}

		.home1 {
			height: 500px;
			background-color: #114720;
			position: relative;
		}

		.home2 {
			height: 500px;
			background-color: white;
		}

		.home1 h3 {
			font-family: Helvetica;
			position: absolute;
			left: 0;
			top: 20%;
			width: 100%;
			text-align: left;
			font-size: 30px;
			color: white;
			padding-left: 80px;
			padding-right: 80px;
			font-size: 30px;
			font-weight: bold;
			/* letter-spacing: 1px; */
		}

		.home1 p {
			font-family: sans-serif;
			position: absolute;
			left: 0;
			top: 40%;
			width: 100%;
			text-align: left;
			font-size: 18px;
			color: white;
			padding-left: 80px;
			padding-right: 80px;
			line-height: 30px;
			font-weight: normal;
			/* padding: 10px 10px 10px 10px; */
			/* align : center; */
		}

		.home1 input {
			position: absolute;
			left: 0;
			top: 80%;
			width: 30%;
			text-align: center;
		}

		.home2 input {
			margin: 0;
			position: absolute;
			top: 85%;
			left: 50%;
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}

		.loginButton {
			color: #fff;
			background: #114720;
			text-align: center;
			border: 5px solid #00B4CC;
			border-color: #114720;
			border-radius: 5px 5px 5px 5px;
		}

		.home2 img {
			margin: 0;
			position: absolute;
			top: 12%;
			left: 27%;
			height: 300px;
			width: 300px
		}
		}
	</style>
	<!---End-smoth-scrolling---->
</head>

<body>
	<div class="header">
		<div class="container">
			<div class="header-top">
				<div class="logo">
					<a href="index.php">
					<img alt="AVI" src="images/logo.png" width="100px" height="100px" style="margin-top:-30px">
					</a>
					<!-- <a style="color: #0b0b0b" href="index.php">A V I</a> -->
				</div>
				<!-- <div style="margin-left:40px" class="top-menu">
					<span class="menu"><img src="images/nav.png" alt="" /> </span>
					<ul> -->
						<!-- <li><a href="index.html" class="active">home</a></li> -->
						<!-- <li><a href="about.php">about</a></li>
					</ul>
				</div> -->
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
		<!-- <div class="slider">
		  <div class="callbacks_container">
			  <ul class="rslides" id="slider">

					<div class="slid banner1">
						  <div class="caption">
								<h3 style="color: #0b0b0b">AVI USER REGISTRATION SYSTEM</h3>
								<p style="color: #0b0b0b">This application is used to register admins and users to the AVI system</p>
							  <input onclick="window.location='login.php'"; type="submit" style="padding-left: 30px; padding-right: 30px" value="LOGIN">
						  </div>
					</div>
				
				
					 <div class="slid banner2">	
						  <div class="caption">
							  <h3 style="color: #0b0b0b">AVI USER REGISTRATION SYSTEM</h3>
								<p style="color: #0b0b0b">This application is used to register admins and users to the AVI system</p>
							  <input onclick="window.location='login.php'"; type="submit" style="padding-left: 30px; padding-right: 30px" value="LOGIN">
						  </div>
					 </div>
				
				
					<div class="slid banner3">	
						<div class="caption">
							<h3 style="color: #0b0b0b">AVI USER REGISTRATION SYSTEM</h3>
							<p style="color: #0b0b0b">This application is used to register admins and users to the AVI system</p>
							<input onclick="window.location='login.php'"; type="submit" style="padding-left: 30px; padding-right: 30px" value="LOGIN">
						</div>
					</div>
				
			  </ul>
		 </div>
	 </div> -->
		<div class="row home-divs">
			<div style="margin-top:100px;" class="row full-row">
				<div class="col-xs-6 home1">

					<h3>AVI USER REGISTRATION SYSTEM</h3>
					<p>AVI is a system that is developed to detect the license number of a vehicle by using an image of the vehicle and block them if the driver break any rule. This web application is used to register admins and users to the AVI system and to check and edit the details of blocked vehicles.</p>
					<!-- <input onclick="window.location='login.php'"; type="submit" style="padding-left: 30px; padding-right: 30px" value="LOGIN"> -->

				</div>
				<div class="col-xs-6 home2">
					<img src="images/logo.png" alt="A V I">
					<input class="loginButton" onclick="window.location='login.php'" ; type="submit" style="padding-left: 30px; padding-right: 30px" value="LOGIN">
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="row full-row">
			<div class="col-xs-6 home2">
				<img style="margin-top : 10px; height:350px; width:475px; margin-left:-70px;" src="images/mobileapp.png" alt="A V I">
				<!-- <input class="loginButton" onclick="window.location='login.php'"; type="submit" style="padding-left: 30px; padding-right: 30px" value="LOGIN"> -->
			</div>
			<div class="col-xs-6 home1">
				<h3>AVI Mobile App</h3>
				<p>AVI Mobile app has embedded with the web application and it is the application which the general users interact with the system.</p>
				<!-- <input onclick="window.location='login.php'"; type="submit" style="padding-left: 30px; padding-right: 30px" value="LOGIN"> -->
			</div>
		</div>
	</div>
	<!--footer-->
	<div class="footer-section">
		<div class="container">
			<div class="footer-top">
				<p>Copyright &copy; 2015 <span>A V I</span> All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
					/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/

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