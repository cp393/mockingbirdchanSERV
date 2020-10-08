<?php
require('db_connect.php');
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_String($conn, $_POST['password']);
if(!isset($_POST))
{
	$msg = "Message is not post, not accepted";
	echo json_encode($msg);
	exit(0);
}
if((empty($username))||(empty($password)){
	$msg = "Please enter both a username and a password.";
}
$request = $_POST;
$response = "Please use the POST request type.";
switch ($request["type"])
{
	case "register":
		$sql = mysql_query("SELECT FROM accounts (username, password) WHERE username=$username");
		if(mysql_num_rows($sql)>=1)
		{
			echo "Username already exists.";
		}
		else
		{
			$sql1= "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";
			if(mysqli_query($conn, $query2))
			{
				echo "Sign up successful.";
			}
			else
			{
				echo "Sign up unsuccessful.";
			}
		}


}
mysqli_close($conn);
