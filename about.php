<style>
#aboutt {
    color: #717fe0;
}
</style>
<?php
	include 'layout_head.php';
	include 'config/database.php';

	//connect to database
	//include objects
	include_once "objects/product.php";
	include_once "objects/product_image.php";
	include_once "objects/cart_item.php";

	//get database connection
	$database = new Database();
	$db = $database->getConnection();

	//initialize objects
	$product = new Product($db);
	$product_image = new ProductImage($db);
	$cart_item = new CartItem($db);

	if (!isset( $_SESSION["id"])){

	}
	else{
	$cart_item->user_id = $_SESSION["id"];
	$cart_count=$cart_item->count();


	//content will be here
	$action = isset($_GET['action']) ? $_GET['action'] : "";
	echo "<div class='col-md-12'>";
		if($action=='removed'){
			echo "<div class='alert alert-info'>";
				echo "Product was removed from your cart!";
			echo "</div>";
		}
	
		else if($action=='quantity_updated'){
			echo "<div class='alert alert-info'>";
				echo "Product quantity was updated!";
			echo "</div>";
		}
	
		else if($action=='exists'){
			echo "<div class='alert alert-info'>";
				echo "Product already exists in your cart!";
			echo "</div>";
		}
	
		else if($action=='cart_emptied'){
			echo "<div class='alert alert-info'>";
				echo "Cart was emptied.";
			echo "</div>";
		}
	
		else if($action=='updated'){
			echo "<div class='alert alert-info'>";
				echo "Quantity was updated.";
			echo "</div>";
		}
	
		else if($action=='unable_to_update'){
			echo "<div class='alert alert-danger'>";
				echo "Unable to update quantity.";
			echo "</div>";
		}
	echo "</div>";

	if ($cart_count > 0){
		$cart_item->user_id = $_SESSION["id"];
		$stmt = $cart_item->read();
		$total=0;
		$item_count=0;
	}

	include "navigation.php";
}
?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			About
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16 cl11">
							Our Story
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Aenean convallis, nulla sit amet malesuada ultricies, lacus lectus posuere libero, ac porta urna purus nec libero. Ut vulputate nibh non malesuada ultrices. 
						</p>

						<p class="stext-113 cl6 p-b-26">
							Nullam lobortis lobortis ipsum vitae bibendum. Duis tempor est turpis, non consequat eros facilisis id. Mauris ut viverra ligula, eget faucibus felis. Phasellus molestie lectus placerat sapien sollicitudin commodo. Suspendisse tincidunt nibh nibh, non mattis nunc fermentum a. Donec enim libero, vulputate non turpis consequat, ornare ultrices tortor. Nam vehicula lectus lorem, posuere venenatis justo aliquam eget. Aliquam at nisi vulputate, aliquam justo in, condimentum leo. Aenean tempus magna a dictum luctus. Donec sed mattis nunc. Donec at diam eu ante dictum viverra. Vestibulum eu hendrerit mi.
						</p>

						<p class="stext-113 cl6 p-b-26">
							Any questions? Please email us at email address: <a href="#">support@hcmut.edu.vn</a>
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/about-01.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16 cl11">
							Our Mission
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Quisque sagittis odio ac ex fermentum, malesuada imperdiet est porta. Nam tempus odio et risus vestibulum placerat. Nulla lobortis, felis lobortis convallis porta, erat diam pretium neque, vel porta leo mi posuere est. Nunc in elit vel sapien dignissim lobortis. Vivamus ornare tortor vel malesuada ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae leo sodales, facilisis neque in, laoreet metus. Donec nunc justo, molestie at bibendum sed, condimentum sit amet elit. Aliquam vel egestas velit. 
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								Aliquam cursus turpis nunc, non blandit urna aliquet ut. Maecenas ligula ligula, laoreet nec leo non, sodales finibus nunc. Maecenas ac consectetur magna, sed iaculis massa. Pellentesque nunc augue, vulputate a dictum eget, facilisis quis eros. Sed volutpat leo mi, in condimentum sapien tristique nec. Donec nec tellus nisi.
							</p>

							<span class="stext-111 cl8">
								- Lorem Ipsum's
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/about-02.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
		

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">
							How Can We Help?
						</h4>
	
						<ul>
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Delivery
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Gift Cards
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Size Guides
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Women's Plus Size Guide
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Store Locator
								</a>
							</li>
						</ul>
					</div>
	
					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">
							Help
						</h4>
	
						<ul>
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Track Order
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Returns 
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Shipping
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									FAQs
								</a>
							</li>
						</ul>
					</div>
	
					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">
							Contact
						</h4>
	
						<p class="stext-107 cl7 size-201">
							Any questions? Let us know in Laboratory 602 at 6th floor, BachKhoa University or email us: support@hcmut.edu.vn
						</p>
	
						<div class="p-t-27">
							<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
								<i class="fa fa-facebook"></i>
							</a>
	
							<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
								<i class="fa fa-instagram"></i>
							</a>
	
							<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
								<i class="fa fa-pinterest-p"></i>
							</a>
						</div>
					</div>
	
					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">
							Newsletter
						</h4>
	
						<form>
							<div class="wrap-input1 w-full p-b-4">
								<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="example@example.com">
								<div class="focus-input1 trans-04"></div>
							</div>
	
							<div class="p-t-18">
								<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Subscribe
								</button>
							</div>
						</form>
					</div>
				</div>
	
				<div class="p-t-40">
					<div class="flex-c-m flex-w p-b-18">
						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
						</a>
	
						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
						</a>
	
						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
						</a>
	
						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
						</a>
	
						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
						</a>
					</div>
	
					<p class="stext-107 cl6 txt-center">
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Template</a>
	
					</p>
				</div>
			</div>
		</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
</body>
</html>