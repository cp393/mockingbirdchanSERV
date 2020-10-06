<?php
$conn = new mysqli('25.95.56.188', 'testuser', '12345', 'testMockingbird');
$username = $_POST['username'];
$password = $_POST['password'];
$sql ="INSERT INTO 'data' ('id', 'username', 'password') VALUES (NULL, '$username', '$password')";
if ($conn->query($sql)===TRUE){
	echo "Data succesfully inserted.";
}
else
{
	echo "Failed.";
}

?>
