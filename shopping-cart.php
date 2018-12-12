<?php
	include 'layout_head.php';
	include 'config/database.php';
	//connect to database	
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

	if (isset($_POST['id']) && isset($_POST['quantity'])){
		$_SESSION['cart'][$_POST['id']]['quantity'] = $_POST['quantity'];
		echo '<script type="text/javascript">window.location = "shopping-cart.php"</script>';
	}



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

	

	include "navigation.php";
?>


<!-- Shoping Cart -->
<!-- <form class="bg0 p-t-75 p-b-85" action="shopping-cart.php" method="POST"> -->
<div class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-auto col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<?php	
					$total=0;		
					if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
						// get the product ids
						$ids = array();
						foreach($_SESSION['cart'] as $id=>$value){
							array_push($ids, $id);
						}
						$stmtsp = $product->readByIds($ids);

						$item_count=0;
										
				?>
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
								<th class="column-5">Action</th>
							</tr>

							<?php	
								while ($row = $stmtsp->fetch(PDO::FETCH_ASSOC)){
									extract($row);
									$quantity = $_SESSION['cart'][$id]['quantity'];
									
									$product_image->product_id = $id;
									$sub_total=$price*$quantity;

									echo '<form action="shopping-cart.php" method="POST">';
									echo '<tr class="table_row">';
									echo '<td class="column-1">';
									echo '<div class="how-itemcart1">';
									$stmt_product_image=$product_image->readFirst();
									while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
										echo '<img src="images/'.$row_product_image['name'].'" alt="IMG">';
									}
									echo '</div>';
									echo '</td>';
									echo '<td class="column-2">'.$name.'</td>';
									echo '<td class="column-3">$ '.$price.'</td>';
									echo '<td class="column-4">';
									echo '<div class="wrap-num-product flex-w m-l-auto m-r-0">';
									echo '<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m product1down">';
									echo '<i class="fs-16 zmdi zmdi-minus"></i>';
									echo '</div>';
									echo '';
									echo '<input class="mtext-104 cl3 txt-center num-product" type="number" name="'."quantity".'"value="'.$quantity.'">';
									echo '';
									echo '<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m product1up">';
									echo '<i class="fs-16 zmdi zmdi-plus"></i>';
									echo '<input hidden class="mtext-104 cl3 txt-center num-product" type="number" name="'."id".'"value="'.$id.'">';
									echo '</div>';
									echo '</div>';
									echo '</td>';
									echo '<td class="column-5" id="total1">$ '.$sub_total.'</td>';
									echo '<td>';
									echo '<div class="flex-c-m stext-60 cl0 size-60 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">';
									echo '<a href="remove_from_cart.php?id='.$id.'">Delete Cart</a>';
									echo '</div>';
									echo '<button type="submit" class="flex-c-m stext-60 cl0 size-65 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">';
									echo 'Update Cart';
									echo '</button>';
									echo '</td>';
									echo '</form>';
									echo '</tr>';
									$total += $sub_total;
								}
								$_SESSION['total_cost'] = $total;
							?>
						</table>
					</div>
					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

							<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Apply coupon
							</div>
						</div>
					</div>
					<?php
						}
						else{
							echo "<div class='alert alert-danger'>";
								echo "No products found in your cart!";
							echo "</div>";
						}
						?>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?php echo $total; ?>
							</span>
						</div>
					</div>

					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Shipping:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">
								There are no shipping methods available. Please double check your address, or contact us if you need any help.
							</p>

							<div class="p-t-15">
								<span class="stext-112 cl8">
									Calculate Shipping
								</span>

								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
									<select class="js-select2" name="time">
										<option>Select a country...</option>
										<option>Vietnam</option>
										<option>Thailand</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>

								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
								</div>

								<div class="bor8 bg0 m-b-22">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
								</div>

								<div class="flex-w">
									<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
										Update Totals
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								<?php 
									echo $total; 
								?>
							</span>
						</div>
					</div>

					<a href="place_order.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Proceed to Checkout
					</a>

				</div>
			</div>
		</div>
	</div>
<!-- </form> -->
</div>

<?php include 'layout_foot.php'; ?>