<?php require_once('./PHP/initialize.php'); ?>
<?php if (!isset($_SESSION['set'])) {
	header("Location:login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>UPDATE ADMIN</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Web application integrated to the AVI system which is developed for automatic vehicle number plate recognition" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.8.3.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
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
					<img alt="AVI" src="images/logo.png" width="100px" height="100px" style="margin-top:-20px">
				</a>
					<!-- <a style="color: #0b0b0b" href="index.html">A V I</a> -->
				</div>
				<div class="top-menu">
					<span class="menu"><img src="images/nav.png" alt=""/> </span>
						<ul>
							<li><a href="homePage.php">Home</a></li>
							<li><a href="viewBlockedVehicles.php">Blacklisted Vehicles</a></li>
                            <li><a href="viewReleasedVehicles.php">Released Vehicles</a></li>
                            <!-- <li><a href="viewAdminList.php" class="active">View Admin List</a></li> -->
                            <li><a href="viewGeneralUserList.php">View General Users</a></li>
                            <li><a href="LogOut.php">Logout</a></li>
                        </ul>
				</div>
				<!--script-nav-->
						 <script>
						 $("span.menu").click(function(){
						 $(".top-menu ul").slideToggle("slow" , function(){
						 });
						 });
						 </script>
					<div class="clearfix"></div>
				</div>
				</div>
					 <!-- Slider-starts-Here -->
	 <script src="js/responsiveslides.min.js"></script>
	 <script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto:true,
			nav: false,
			speed: 500,
			namespace: "callbacks",
			pager:true,
		  });
		});

	   </script>
	<div class="banner">
		<div class="bnr2">
	   </div>
</div>
	 </div>
	 <div class="content">
	<div class="mail">
		<div class="container">
			<h3 style="font-family: sans-serif; color : #005b48; margin-bottom : 20px; margin-left : -625px;">Update Admin Details</h3>
		</div>
		<?php
		    require_once('./PHP/initialize.php');
		    $adminList=$_SESSION['current_admin_to_change'];
            foreach ($adminList as $admin){
                $fullName=$admin['name'];
                $regNo=$admin['regNo'];
				$id=$admin['adminID'];
				$branchID=$admin['branchID'];
                $branch=$admin['branchName'];
                $username=$admin['username'];
            }
		?>
			<div class="col-md-6 contact-form">
				<form action="./PHP/manager.php" method="post">
					<input type="text" name="fullName" value=<?php echo $fullName; ?> required="">
					<input type="text" name="regNo" value=<?php echo $regNo; ?> required="">
                    <input type="text" name="id" value=<?php echo $id; ?> hidden>
                    <!-- <input type="text" name="branchID" value=<?php echo $branchID; ?> hidden> -->
					<!-- <input type="text" name="branch" value=<?php echo $branch; ?> required=""> -->
					
					<div class="styled-select">
						<label style="align-content: left; font-size:20px; color : #114720">Select Branch</label>

						<select name="branchID" id="categorylist" required style="margin-left: 20px; border-color : #114720" >
							<option name='matara' value="1">Matara</option>
							<option name='galle'value="2">Galle</option>
							<option name='hambantota'value="3">Hambantota</option>
							<option name='moratuwa'value="4">Moratuwa</option>
						</select><br>
					</div>

                    <input type="text" name="username" value=<?php echo $username; ?> required=""><br>
					<input type="submit" name='update_admin' value="SEND">
				</form>
			</div>
			<div class="clearfix"> </div>
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
					    $().UItoTop({ easingType: 'easeOutQuart' });
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				</div>
			</div>
</body>
</html>