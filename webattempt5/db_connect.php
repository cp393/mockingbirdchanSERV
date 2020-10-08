<?php
define("HOST", "127.0.0.1");
define("USER", "testuser");
define("PASSWORD", "12345");
define("DATABASE", "testdb");
$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
if(!$conn)
{
	echo 'Connection error: ' . mysqli_connect_error();
}
?>
