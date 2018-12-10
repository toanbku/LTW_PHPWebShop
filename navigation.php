<?php
//connect to database

include_once 'config/database.php';

// // //include objects
include_once "objects/product.php";
include_once "objects/product_image.php";
include_once "objects/cart_item.php";

// echo $_SESSION["id"].$_SESSION["userName"];
//get database connection
$database1 = new Database();
$db1 = $database1->getConnection();

// initialize objects
$product1 = new Product($db1);
$product_image1 = new ProductImage($db1);
$cart_item1 = new CartItem($db1);

if (isset($_SESSION["id"]))
	$cart_item1->user_id = $_SESSION["id"];
else
$cart_item1->user_id = 0;

$cart_count=$cart_item1->count();


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
                if ($cart_count > 0){
					$cart_item1->user_id = $_SESSION["id"];
					// $cart_item->user_id = 5;
                    $stmt1 = $cart_item1->read();
                    $total1 = 0;
                    $item_count1=0;
                
                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
						extract($row1);
                        echo '<ul class="header-cart-wrapitem w-full">';
                        echo '<li class="header-cart-item flex-w flex-t m-b-12">';
						echo '<div class="header-cart-item-img">';
						$product_image1->product_id = $id;
						$stmt_product_image=$product_image1->readFirst();
						while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
							echo '<img src="images/'.$row_product_image['name'].'" alt="IMG">';
							
							// echo '<img src="images/item-cart-01.jpg" alt="IMG">';
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