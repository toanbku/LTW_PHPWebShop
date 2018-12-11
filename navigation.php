<?php
//connect to database

include_once 'config/database.php';

// include objects
include_once "objects/product.php";
include_once "objects/product_image.php";
include_once "objects/cart_item.php";

//get database connection
$database1 = new Database();
$db1 = $database1->getConnection();

// initialize objects
$product = new Product($db1);
$product_image1 = new ProductImage($db1);


?>


<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
                
                <!-- record -->
                <?php             
                if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
					// get the product ids
					$ids = array();
					foreach($_SESSION['cart'] as $id=>$value){
						array_push($ids, $id);
					}
				
					$stmt = $product->readByIds($ids);
				
					$total1 = 0;
					$item_count=0;
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row);
					$quantity=$_SESSION['cart'][$id]['quantity'];
					$product_image1->product_id = $id;
					$sub_total=$price*$quantity;
                        echo '<ul class="header-cart-wrapitem w-full">';
                        echo '<li class="header-cart-item flex-w flex-t m-b-12">';
						echo '<div class="header-cart-item-img">';
						$product_image1->product_id = $id;
						$stmt_product_image=$product_image1->readFirst();
						while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
							echo '<img src="images/'.$row_product_image['name'].'" alt="IMG">';
						}

                        echo '</div>';
                        echo '';
                        echo '<div class="header-cart-item-txt p-t-8">';
                        echo '<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">';
                        echo $name;
                        echo '</a>';
                        echo '';
                        echo '<span class="header-cart-item-info">';
                        echo  $quantity.' x '.$price;
                        echo '</span>';
                        echo '</div>';
                        echo '</li>';
						echo '</ul>';
						$total1 += $quantity * $price;
					}
				?>
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: <?=$total1?>
					</div>
					<div class="header-cart-buttons w-full">
						<a href="shopping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
				<?php
				}
				else {
					echo "<div class='col-md-12";
						echo "<div class='alert alert-danger'>No products found. </div>";
					echo "</div>";
					
				}
                ?> 
				
			</div>
		</div>
	</div>