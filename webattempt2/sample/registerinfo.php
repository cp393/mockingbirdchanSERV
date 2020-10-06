<html>
<body>
Your account will be registered with the username <?php echo $_POST["newusername"]; ?><br>
and the password <?php echo $_POST["newpassword"]; ?><br>
<a href="index.html">Back to login</a>
<p id="demo">Click the button to register.</p>
<button type="button" onclick="registerUser()">Register account</button>
<script>
function registerUser(username, password)
{
	var request = new XMLHttpRequest();
	request.open("POST","logininfo.php",true)

}
</script>
</body>
</html>

