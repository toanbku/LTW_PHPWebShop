<?php
	$dbhost = 'localhost';
	$dbuserName = 'root';
	$dbpassword = '';
	$dbName = 'assignment2';

	$conn = new mysqli($dbhost, $dbuserName, $dbpassword, $dbName);

	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
?>