<?php
    include ("layout_head.php");
    include("config/database.php");

    //get database connection
    $database = new Database();
    $conn = $database->getConnection();
	if (isset($_POST["userName"]) && isset($_POST["password"])){
		$userName = $_POST["userName"];
		$password = $_POST["password"];
		
		$query  =  "SELECT id, firstName, lastName  FROM users WHERE userName = ? AND  password = ? ";
		$password = MD5($password);
		$array = array($userName, $password);
		
		$stmt = $conn->prepare($query);
		
		$stmt->execute($array);
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row != NULL){
			$_SESSION["userName"] = $userName;
			$_SESSION["id"] = $row["id"];
			echo '<script>window.location = "index.php"</script>';
		}
		else{
			echo "<script>alert('Ten dang nhap hoac mat khau khong dung')</script>";
		}
	}
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
			<ul class="header-cart-wrapitem w-full">
				<li class="header-cart-item flex-w flex-t m-b-12">
					<div class="header-cart-item-img">
						<img src="images/item-cart-01.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt p-t-8">
						<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							White Shirt Pleat
						</a>

						<span class="header-cart-item-info">
							1 x $19.00
						</span>
					</div>
				</li>

				<li class="header-cart-item flex-w flex-t m-b-12">
					<div class="header-cart-item-img">
						<img src="images/item-cart-02.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt p-t-8">
						<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							Converse All Star
						</a>

						<span class="header-cart-item-info">
							1 x $39.00
						</span>
					</div>
				</li>

				<li class="header-cart-item flex-w flex-t m-b-12">
					<div class="header-cart-item-img">
						<img src="images/item-cart-03.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt p-t-8">
						<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							Nixon Porter Leather
						</a>

						<span class="header-cart-item-info">
							1 x $17.00
						</span>
					</div>
				</li>
			</ul>

			<div class="w-full">
				<div class="header-cart-total w-full p-tb-40">
					Total: $75.00
				</div>

				<div class="header-cart-buttons flex-w w-full">
					<a href="shopping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						View Cart
					</a>

					<a href="shopping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Login
	</h2>
</section>


<!-- Content page -->

<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: 0 auto;">
	<form action="login.php" method="POST">
		<h3 class="mtext-105 cl2 txt-center p-b-30 cl11">
			Login Panel
		</h3>

		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="userName" placeholder="userName">
		</div>

		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password">

		</div>

		<a href="register.php" style="text-decoration: none; margin-left: 30%;">Register</a> |
		<a href="forgetPassword.php" style="text-decoration: none;">Forget password</a>

		<input type="submit" name="login" value="Login" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
	</form>
</div>

<?php
	include "layout_foot.php";

?>