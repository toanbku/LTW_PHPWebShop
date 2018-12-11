<style>
#blogg {
    color: #717fe0;
}
</style>
<?php
	include_once 'layout_head.php';
	include_once 'config/database.php';

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
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:  linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.0)), url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Blog - Nunc sagittis ligula sit amet odio
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!-- item blog -->
						<div class="p-b-63">
							<a href="blog-detail.php" class="hov-img0 how-pos5-parent">
								<img src="images/blog-04.jpg" alt="IMG-BLOG">

								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										18
									</span>

									<span class="stext-109 cl3 txt-center">
										Oct 2018
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="blog-detail.php" class="ltext-108 cl2 hov-cl1 trans-04">
									Fusce sit amet sagittis lacus
									</a>
								</h4>

								<p class="stext-117 cl6">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac condimentum augue, eget imperdiet lectus. Nam ut mauris dolor. Proin ullamcorper in nunc eget sollicitudin.
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> toanbku  
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											Pellentesque, Habitant, Morbi
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											8 Comments
										</span>
									</span>

									<a href="blog-detail.php" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Continue Reading

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>

						<!-- item blog -->
						<div class="p-b-63">
							<a href="blog-detail.php" class="hov-img0 how-pos5-parent">
								<img src="images/blog-07.jpg" alt="IMG-BLOG">

								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										17
									</span>

									<span class="stext-109 cl3 txt-center">
										Oct 2018
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="blog-detail.php" class="ltext-108 cl2 hov-cl1 trans-04">
									Vivamus vel nulla at libero molestie accumsan
									</a>
								</h4>

								<p class="stext-117 cl6">
										Maecenas tortor libero, posuere vel imperdiet eget, consequat ac nunc. Nunc tincidunt lacus ut urna suscipit, in luctus erat vulputate. Nunc et nunc vel nisl condimentum vulputate.
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> Mod  
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											Pellentesque, Habitant, Morbi
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											5 Comments
										</span>
									</span>

									<a href="blog-detail.php" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Continue Reading

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>

						<!-- item blog -->
						<div class="p-b-63">
							<a href="blog-detail.php" class="hov-img0 how-pos5-parent">
								<img src="images/blog-05.jpg" alt="IMG-BLOG">

								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										16
									</span>

									<span class="stext-109 cl3 txt-center">
										Oct 2018
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="blog-detail.php" class="ltext-108 cl2 hov-cl1 trans-04">
										Pellentesque non odio vitae purus convallis auctor
									</a>
								</h4>

								<p class="stext-117 cl6">
										Duis vehicula turpis sit amet sapien lacinia, dapibus consectetur nisi consectetur. In et purus eget nibh tincidunt tincidunt. Integer tristique lorem id ipsum porta, vitae aliquam tellus consectetur
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> vuongprolegend98  
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											Pellentesque, Habitant, Morbi
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											2 Comments
										</span>
									</span>

									<a href="blog-detail.php" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Continue Reading

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>

						<!-- item blog -->
						<div class="p-b-63">
							<a href="blog-detail.php" class="hov-img0 how-pos5-parent">
								<img src="images/blog-06.jpg" alt="IMG-BLOG">

								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										13
									</span>

									<span class="stext-109 cl3 txt-center">
										Oct 2018
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="blog-detail.php" class="ltext-108 cl2 hov-cl1 trans-04">
										Donec sollicitudin metus ac quam vulputate vulputate
									</a>
								</h4>

								<p class="stext-117 cl6">
										Sed rutrum aliquet venenatis. Mauris semper leo nec dolor bibendum egestas in eu erat. Donec vitae diam est. Nulla sit amet fringilla lacus, ut tincidunt enim. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> Admin  
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											Pellentesque, Habitant, Morbi
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											10 Comments
										</span>
									</span>

									<a href="blog-detail.php" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Continue Reading

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>

						<!-- Pagination -->
						<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
							<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
								1
							</a>

							<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
								2
							</a>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

							<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>

						<div class="p-t-55">
							<h4 class="mtext-112 c0 p-b-33">
								Categories
							</h4>

							<ul>
								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Aliquam
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Interdum 
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Molestie 
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Magna
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Efficitur
									</a>
								</li>
							</ul>
						</div>

						<div class="p-t-65">
							<h4 class="mtext-112 c0 p-b-33">
								Featured Products
							</h4>

							<ul>
								<li class="flex-w flex-t p-b-30">
									<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img src="images/product-min-01.jpg" alt="PRODUCT">
									</a>

									<div class="size-215 flex-col-t p-t-8">
										<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
											Maecenas Hendrerit
										</a>

										<span class="stext-116 cl6 p-t-20">
											$19.00
										</span>
									</div>
								</li>

								<li class="flex-w flex-t p-b-30">
									<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img src="images/product-min-02.jpg" alt="PRODUCT">
									</a>

									<div class="size-215 flex-col-t p-t-8">
										<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
											Phasellus Justo
										</a>

										<span class="stext-116 cl6 p-t-20">
											$39.00
										</span>
									</div>
								</li>

								<li class="flex-w flex-t p-b-30">
									<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img src="images/product-min-03.jpg" alt="PRODUCT">
									</a>

									<div class="size-215 flex-col-t p-t-8">
										<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
											Quisque hendrerit
										</a>

										<span class="stext-116 cl6 p-t-20">
											$17.00
										</span>
									</div>
								</li>
							</ul>
						</div>

						<div class="p-t-55">
							<h4 class="mtext-112 c0 p-b-20">
								Archive
							</h4>

							<ul>
								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											October 2018
										</span>

										<span>
											[12]
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											September 2018
										</span>

										<span>
											[19]
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											August 2018
										</span>

										<span>
											[25]
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											July  2018
										</span>

										<span>
											[35]
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											June 2018
										</span>

										<span>
											[20]
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											May 2018
										</span>

										<span>
											[12]
										</span>
									</a>
								</li>

							</ul>
						</div>

						<div class="p-t-50">
							<h4 class="mtext-112 cl2 p-b-27">
								Tags
							</h4>
							<div class="flex-w m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Aliquam
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Interdum
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Molestie
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Magna
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Efficitur
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
		
<?php 
	include_once 'layout_foot.php';
?>