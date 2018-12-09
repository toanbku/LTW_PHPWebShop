<!DOCTYPE html>
<html>

<head>
	<title>Register Page</title>
</head>

<body>
	<?php
	$flag = true;
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$userName = $_POST["userName"];
	$password = $_POST["password"];
	$email = $_POST["email"];

	if (strlen($firstName) < 2 || strlen($firstName) > 30) {
		echo nl2br("Error: Length firstName must from 2 to 30 charater!");
		$flag = false;
	}
	if (strlen($lastName) < 2 || strlen($lastName) > 30) {	
		echo nl2br("Error: Length lastName must from 2 to 30 charater!");
		$flag = false;
	}
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		echo nl2br("Error: Email format invalid");
		$flag = false;
	}
	if (strlen($userName) < 2 || strlen($userName) > 30) {	
		echo nl2br("Error: Length password must from 2 to 30 charater!");
		$flag = false;
	}
	if (strlen($password) < 2 || strlen($password) > 30) {	
		$flag = false;
	}
	if ($_POST["password"] != $_POST["passwordRepeat"]) {
		echo nl2br("Error: Enter password not same");
		$flag = false;
	}

	if ($flag) {

		include("config/database.php");

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
			if  ($errorCode != 00000)
				echo "Có lỗi xảy ra ".$errorCode;
			else{
				echo "Reg thành công";
				
			}
		}
		else{
			echo "reg failed";
		}
		
	    // if ($conn->query($str) === TRUE) {
	    // 	if (isset($_SERVER["HTTP_REFERER"])) {
        //    		header("Location: " . $_SERVER["HTTP_REFERER"]);
        //     }
		// } else {
		//     echo "Error: ";
		// }
	}
    ?>

</body>

</html>