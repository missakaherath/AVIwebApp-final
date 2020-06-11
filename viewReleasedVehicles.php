<!--
Au
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php require_once('./PHP/initialize.php'); ?>
<?php if (!isset($_SESSION['set'])) {
	header("Location:login.php");
}
?>
<!DOCTYPE HTML>
 
<html>

<head>
	<title>Released Vehicles List</title>

	<style>
		body {
			font-family: 'Open Sans', sans-serif;
		}

		table {
			border-collapse: collapse;
			width: 95%;
			color: #588c7e;
			font-family: monospace;
			font-size: 15px;
			text-align: left;
			margin: 2.5% 0 0 2.5%;
		}

		th {
			background-color: #3d3d29;
			color: white;
			padding: 1%;
		}

		tr {
			background-color: #f2f2f2;
		}

		td {
			height: 30px;
		}

		.container-table {
			font-family: sans-serif;
			border-collapse: collapse;
			margin: 25px 25px;
			font-size: 0.9em;
			min-width: 400px;
			border-radius: 5px 5px 5px 5px;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
			padding: 10px 10px 10px 10px;
		}

		.container-table th {
			padding: 10px;
			/* text-align: center; */
			background-color: #114720;
			color: #ffffff;
			text-align: left;
			font-weight: bold;
		}

		.container-table th,
		.container-table td {
			padding: 12px 15px;
			text-align: left;
		}

		.container-table tr {
			/* border-bottom: 1px solid #dddddd; */
		}

		.container-table tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}

		.container-table tr:last-of-type {
			border-bottom: 2px solid #114720;
		}

		.container-table tr {
			font-weight: bold;
			color: #114720;
		}

		.search-div {
			padding: 30px 0 0 25px;
			font-family: 'Open Sans', sans-serif;
		}

		.searchButton {
			border-radius: 0 5px 5px 0;
			color: #fff;
			background: #114720;
			width: 70px;
			height: 40px;
			text-align: center;
			font-size: 13px;
			border: 5px solid #00B4CC;
			border-color: #114720;
			cursor: pointer;
		}

		.searchTerm {
			border: 3px solid #114720;
			border-radius: 5px 0 0 5px;
			outline: none;
			color: #9DBFAF;
			/* border-right: none; */
			padding: 7px;
		}

		.searchTerm:focus {
			color: #00B4CC;
		}
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
	<div style="background-color: #DEDAC8" class="header">
		<div class="container">
			<div class="header-top">
				<div class="logo">
					<a href="homePage.php">
						<img alt="AVI" src="images/logo.png" width="100px" height="100px" style="margin-top:-20px">
					</a>
					<!-- <a style="color: #0b0b0b" href="index.html">A V I</a> -->
				</div>
				<div class="top-menu">
					<span class="menu"><img src="images/nav.png" alt="" /> </span>
					<ul>
						<li><a href="homePage.php">Home</a></li>
						<li><a href="viewBlockedVehicles.php">Blacklisted Vehicles</a></li>
						<li><a href="viewReleasedVehicles.php" class="active">Released Vehicles</a></li>
						<li><a href="viewAdminList.php">Admin List</a></li>
						<li><a href="viewGeneralUserList.php">General Users</a></li>
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

			<div class="search-div">
				<form action="./PHP/manager.php" method="POST">
					<input class="searchTerm" type="text" name="search" placeholder="Enter Number" required="">
					<button class="searchButton" type="submit" name="submit-released-search">Search</button>
				</form>
			</div>

			<div>
				<table class="container-table">
					<tr>
						<th>Vehicle Number</th>
						<th>Released Date</th>
						<th>Released Time</th>
					</tr>

					<?php
					if ($_SESSION['set'] = true AND $_SESSION['releasedList']) {
						$releasedList = $_SESSION['releasedList'];
						foreach ($releasedList as $releasedVehicle) {
							$vehicleNumber = $releasedVehicle['vehicle_number'];

							$releasedDate = $releasedVehicle['releasedDatetime'];
							$datetime = new DateTime($releasedDate);
							$date = $datetime->format('Y-m-d');

							$releasedTime = $releasedVehicle['releasedDatetime'];
							$time = $datetime->format('H:i');

							$blacklistedID = $releasedVehicle['bID'];

							echo "<tr  style='border: 1px #3d3d29; color: #114720; font-weight: bold;'>
    		<form class=\"box\" action=\"./PHP/manager.php\" method=\"post\">
    			<input type='hidden' name='number' value=" . $vehicleNumber . ">
    			<input type='hidden' name='branch' value=" . $date . ">
    			<input type='hidden' name='date' value=" . $time . ">
    			<td padding:0.5%;'>" . $vehicleNumber . "</td>
    			<td padding:0.5%;'>" . $date . "</td>
    			<td padding:0.5%;'>" . $time . "</td>
    			</form>
    		</tr>";
						}
						echo "</table>";
					} else {
						echo "<p>There are no released vehicles in the list... </p>";
					}
					?>
				</table>
			</div>
			<!--footer-->
			<div class="footer-section" style="margin-top: 100px">
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

									$().UItoTop({ easingType: 'easeOutQuart' });

								});
							</script>
							<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
						</div>
					</div>

</body>

</html>