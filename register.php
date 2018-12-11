<?php
	include "layout_head.php";
	include "navigation.php";
	include_once "config/database.php";

	$flag = true;
	if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["password"])){
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$userName = $_POST["userName"];
		$password = $_POST["password"];
		$email = $_POST["email"];

		if (strlen($firstName) < 2 || strlen($firstName) > 30) {
			$statusMsgType = 'alert alert-danger';
            $statusMsg = 'Length of first name must from 2 to 30 charater!'; 
			$flag = false;
		}
		if (strlen($lastName) < 2 || strlen($lastName) > 30) {	
			$statusMsgType = 'alert alert-danger';
            $statusMsg = 'Length of last name must from 2 to 30 charater!'; 
			$flag = false;
		}
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$statusMsgType = 'alert alert-danger';
            $statusMsg = 'Email format invalid!'; 
			$flag = false;
		}
		if (strlen($userName) < 2 || strlen($userName) > 30) {
			$statusMsgType = 'alert alert-danger';
            $statusMsg = 'Length username must from 2 to 30 charater!!'; 				
			$flag = false;
		}
		if (strlen($password) < 2 || strlen($password) > 30) {	
			$statusMsgType = 'alert alert-danger';
            $statusMsg = 'Length password must from 2 to 30 charater!!'; 				
			$flag = false;
		}
		if ($_POST["password"] != $_POST["passwordRepeat"]) {
			$statusMsgType = 'alert alert-danger';
            $statusMsg = 'Confirm password must match with the password.';
			$flag = false;
		}

		if ($flag) {
			//get database connection
			$database = new Database();
			$conn = $database->getConnection();
			$query  =  "INSERT INTO users (firstName, lastName, email, userName, password, type)  VALUES  (?,?,?,?,?,?) ";
			$password = MD5($password);
			$array = array( $firstName, $lastName, $email, $userName, $password, 1);
			
			$stmt = $conn->prepare($query);
			
			$stmt->execute($array);
			if ($stmt){
				$errorCode = $stmt->errorCode();
				if ($errorCode != 00000) {
					$statusMsgType = 'alert alert-danger';
					$statusMsg = '[Database] Something went wrong.';
				}
				else{
					$statusMsgType = 'alert alert-success';
					$statusMsg = 'Congratulation. Register successful. Click <a href="login.php">here</a> to login';
				}
			}
			else{
				$statusMsgType = 'alert alert-danger';
				$statusMsg = '[Database] Something went wrong.';
			}
		}
	}
?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Register
		</h2>
	</section>	


	<!-- Content page -->
	
	<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: 0 auto;">
		<form action="register.php" method="post">
		<h3 class="mtext-105 cl2 txt-center p-b-30 cl11">
			Register Panel
		</h3>
		<?php 
			echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; 
		?>
		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="firstName" placeholder="First Name" onchange="checkLength(firstName, firstNameError)">
		</div>
		<p id="firstNameError" class="error"></p>

		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="lastName" placeholder="Last Name" onchange="checkLength(lastName, lastNameError)">			
		</div>
		<p id="lastNameError" class="error"></p>

		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email" onchange="checkEmail(email, emailError)">			
		</div>
		<p id="emailError" class="error"></p>

		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="userName" placeholder="User Name" onchange="checkLength(userName, userNameError)">			
		</div>
		<p id="userNameError" class="error"></p>

		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password" onchange="checkLength(password, passwordError)">		
		</div>
		<p id="passwordError" class="error"></p>

		<div class="bor8 m-b-20 how-pos4-parent">
			<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="passwordRepeat" placeholder="Repeat Password" onchange="checkRepeat(password, passwordRepeat, passwordRepeatError)">			
		</div>
		<p id="passwordRepeatError" class="error"></p>

		<input onclick="checkError()" type="submit" name="submit" value="register" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">

		</form>
	</div>

<?php include "layout_foot.php"; ?>