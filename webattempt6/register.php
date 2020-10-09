<?php
	$con = mysqli_connect('127.0.0.1','testuser','12345','testdb');
	if(!$con)
	{
		echo 'Not connected to server';
	}
	if(!mysqli_select_db($con, 'testdb'))
	{
		echo 'Database not selected';
	}
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql = "INSERT INTO accounts (username,password) VALUES ('$username','$password')";
	if(!mysqli_query($con,$sql))
	{
		echo 'Registration failed.';
	}
	else
	{
		echo 'Registration successful.';
	}
	header("refresh:2; url=index.html");
?>
