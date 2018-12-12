<?php
    include ("layout_head.php");
    include("config/database.php");
	include 'navigation.php';

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
			$statusMsgType = 'alert alert-danger';
            $statusMsg = 'The username or password are incorrect!'; 
		}
	}
	?>


<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Login
	</h2>
</section>


<!-- Content page -->

<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: 100px auto;">
	<form action="login.php" method="POST">
		<h3 class="mtext-105 cl2 txt-center p-b-30 cl11">
			Login Panel
		</h3>
		<?php 
			echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; 
		?>
		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="userName" placeholder="User Name">
		</div>

		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password">
		</div>

		<input type="submit" name="login" value="Login" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
	</form>
	<div class="cl2 p-b-30 cl11">
		<a href="forgotPassword.php" style="text-decoration: none;">Forgot password ?</a>
	</div>
</div>

<?php
	include "layout_foot.php";

?>