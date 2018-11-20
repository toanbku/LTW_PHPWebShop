

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <?php


	$flag = true;
	$n_firstName = strlen($_POST["firstName"]);
	$n_lastName = strlen($_POST["lastName"]);
	$n_userName = strlen($_POST["userName"]);
	$n_password = strlen($_POST["password"]);

	if ($n_firstName < 2 || $n_firstName > 30) {
		echo "Error: Length firstName must from 2 to 30 charater!";
		$flag = false;
	}
	if ($n_lastName < 2 || $n_lastName > 30) {	
		echo "Error: Length lastName must from 2 to 30 charater!";
		$flag = false;
	}
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		echo "Error: Email format invalid";
		$flag = false;
	}
	if ($n_userName < 2 || $n_userName > 30) {	
		echo "Error: Length password must from 2 to 30 charater!";
		$flag = false;
	}
	if ($n_password < 2 || $n_password > 30) {	
		$flag = false;
	}
	if ($_POST["password"] != $_POST["passwordRepeat"]) {
		echo "Error: Enter password not same";
		$flag = false;
	}

	if ($flag) {

		include("s-config.php");

	    // $str = "INSERT INTO employees" . 
	    //        "(firstName, lastName, email, userName, password)" . 
	    //        "VALUES" . 
	    //        "(as1, as, a.a@gmail.com, asd, asd);";

	    $str = "INSERT INTO employees" . 
	           "(firstName, lastName, email, userName, password)" . 
	           "VALUES" . "(\"" . $_POST["firstName"] . "\", \"" . $_POST["lastName"] . "\", \"" . $_POST["email"] . "\", \"" . $_POST["userName"] . "\", \"" . $_POST["password"] . "\");";
	    
	    echo "ok1";

	    if ($conn->query($str) === TRUE) {
	    	if (isset($_SERVER["HTTP_REFERER"])) {
           		header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
		} else {
		    echo "Error: " . $conn->error;
		}
	    mysql_close($conn);
	}
    ?>

</body>
</html>