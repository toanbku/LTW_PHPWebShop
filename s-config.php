<?php
$dbhost = 'localhost';
$dbuserName = 'hiennv';
$dbpassword = 'nguyenhien0212';
$dbName = 'assignment2';

$conn = new mysqli($dbhost, $dbuserName, $dbpassword, $dbName);

if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
?>