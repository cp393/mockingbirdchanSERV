<?php
	$con = mysqli_connect('127.0.0.1','testuser','12345','testdb');
	if(!$con)
	{
		echo 'Not connected to server.';
	}
	if(!mysqli_select_db($con, 'testdb'))
	{
		echo 'Database not selected.';
	}
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql= "select * from accounts where username = '$username' and password = '$password'";
	$result= mysqli_query($con,$sql);
	
	if(mysqli_num_rows($result)!=0)
	{
		echo "Login successful. Logged in as user $username.";
		header("refresh:2; url=home.html");
	}
?>
