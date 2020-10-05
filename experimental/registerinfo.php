<html>
<body>
Your account has been registered with the username <?php echo $_POST["newusername"]; ?><br>
and the password <?php echo $_POST["newpassword"]; ?><br>
<a href="index.html">Back to login</a>
</body>
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = "Login";
$request['username'] = echo $_POST["newusername"];
$request['password'] = echo $_POST["newpassword"];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
</html>
