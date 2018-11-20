<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include("s-config.php");

	$userName = $_POST["userName"];
	$password = $_POST["password"];

    $sql = "SELECT id_employee FROM employees WHERE userName=\"" . $userName . "\" AND password=\"" . $password . "\";";

    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row["active"];

    $count = mysqli_num_rows($result);

    if($count == 1) {
        if (isset($_SERVER["HTTP_REFERER"])) {
           	header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }else {
         echo "Error: Your userName or Password is invalid";
     }

	?>

</body>
</html>