<?php

session_start();
?>

<html>
	<head>
	</head>
	<script>
	</script>

	<h1>PokeQuiz Home Screen</h1>
	<h2>Welcome to Pokequiz!<br>

		<body></body>
		<body>
			
		<?php
				echo "Session invoked. You are logged in as user ";
echo $_SESSION["username"];
echo ".";
			?>
			<div id="textResponse">
				</div>

		</body>
</html>
