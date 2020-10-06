<?php
define('DB_SERVER', '25.95.56.188');
define('DB_USERNAME', 'testuser');
define('DB_PASSWORD', '12345');
define('DB_NAME', 'testMockingbird');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link == false)
{
	die("ERROR: Could not connect." . mysqli_connect_error());
}
?>
