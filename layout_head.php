<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- 	<title>HomePage | BK Shop</title> -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $50. <a href="#">Click here</a>
					</div>

					<div class="right-top-bar flex-w h-full">
						<?php if (isset($_SESSION["userName"])){
							echo '<a href="profile.php" class="flex-c-m trans-04 p-lr-25">';
							echo $_SESSION["userName"];
							echo '</a>';

							echo '<a href="logout.php" class="flex-c-m trans-04 p-lr-25">';
							echo 'Logout';
							echo '</a>';
						} else {
						?>
						<a href="register.php" class="flex-c-m trans-04 p-lr-25">
							Register
						</a>
						<a href="login.php" class="flex-c-m trans-04 p-lr-25">
							Login
						</a>
						<?php
							}
						?>
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/HCMUT_official_logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php"  id="homee">Home</a>
							</li>

							<li>
								<a href="products.php" id="shopp">Shop</a>
							</li>

							<li>
								<a href="shopping-cart.php" id="cartt">Cart</a>
							</li>

							<li>
								<a href="blog.php" id="blogg">Blog</a>
							</li>

							<li>
								<a href="about.php" id="aboutt">About</a>
							</li>

							<li>
								<a href="contact.php" id="contactt">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						<?php 
							if (isset($_SESSION['cart']))
								$number = count($_SESSION['cart']);
							else 
								$number = 0;
							?>
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?=$number?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						 <!-- data-notify="4" -->
						<a href="history.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
                            <i class="zmdi zmdi-time-restore"></i>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/HCMUT_official_logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?=$number?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="history.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
					<i class="zmdi zmdi-time-restore"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $50. <a href="#">Click here</a>
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<?php if (isset($_SESSION["userName"])){
							echo '<a href="profile.php" class="flex-c-m trans-04 p-lr-25">';
							echo $_SESSION["userName"];
							echo '</a>';

							echo '<a href="logout.php" class="flex-c-m trans-04 p-lr-25">';
							echo 'Logout';
							echo '</a>';
						} else {
						?>
						<a href="register.php" class="flex-c-m trans-04 p-lr-25">
							Register
						</a>
						<a href="login.php" class="flex-c-m trans-04 p-lr-25">
							Login
						</a>
						<?php
							}
						?>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php" id="homee">Home</a>
				</li>

				<li>
					<a href="products.php" id="shopp">Shop</a>
				</li>

				<li>
					<a href="shopping-cart.php" id="cartt">Cart</a>
				</li>

				<li>
					<a href="blog.html" id="blogg">Blog</a>
				</li>

				<li>
					<a href="about.html" id="aboutt">About</a>
				</li>

				<li>
					<a href="contact.html" id="contactt">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

