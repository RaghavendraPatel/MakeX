<?php
$dbserver = "localhost";
$username = "root";
$password = "";
$dbname = "makex";
$conn = mysqli_connect($dbserver,$username,$password,$dbname);
if (!$conn) {
	die("Failed to connect to database");
}
?>
