<?php
require_once "config.php";
$username = "";
$password = "";
$usernameerror = "";
$passworderror = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty(trim($_POST["username"]))){
		$usernameerror = "Please enter a username.";
	}
	else
	{
		$sql = "SELECT id FROM users WHERE username = ?";
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "s", $param_username);
			$param_username = trim($_POST["username"]);
			if(mysqli_stmt_execute($stmt))
			{
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt)==1)
				{
					$usernameerror = "Username already taken.";
				}
				else
				{
					$username = trim($_POST["username"]);
				}
			}
			else
			{
				echo "Something went wrong. Probably with sql";
			}
			mysqli_stmt_close($stmt);
		}
	}
	if(empty(trim($_POST["password"])))
	{
		$passworderror = "Please enter a password.";
	}
	else
	{
		$password = trim($_POST["password"]);
	}
	if(empty($usernameerror) && empty($passworderror)){
		$sql = "INSERT INTO users (username, password) VALUES (?,?)";
		if($stmt=mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
			$param_username = $username;
			$param_password = $password;
			if(mysqli_stmt_execute($stmt))
			{
				header("location: login.php");
			}
			else
			{
				echo "Something went wrong.";
			}
			mysqli_stmt_close($stmt);
		}
	}
	mysqli_close($link);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Register with PokeQuiz</title>
</head>
<body>
<div class="wrapper">
<h2>Sign up</h2>
<p>Enter your desired username and password.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div class="form-group <?php echo (!empty($usernameerror)) ? 'has_error' : ''; ?>">
		<label>Username</label>
		<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
		<span class="help-block"><?php echo $usernameerror; ?></span>
	</div>
	<div class="form-group <?php echo (!empty($passworderror)) ? 'has-error' : ''; ?>">
		<label>Password</label>
		<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
		<span class="help-block"><?php echo $passworderror; ?></span>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Submit">
	</div>
	<p>Back to front page. <a href="login.php">Front page</a>.</p>
</form>
</div>
</body>
</html>
