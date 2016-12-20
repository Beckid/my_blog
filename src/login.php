<!DOCTYPE html>
<html>
<head>
	<title>Login - My Blog System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="source/css/bootstrap.min.css">
</head>
<body>
	<h1>Login</h1>
	<p>If you are a writer, please key in your username and password below to login</p>
	<form action="login.php" method="post">
		<p>Username: <input type="text" name="username" id="username" accesskey="u" tabindex="1"></p>
		<p>Password: <input type="password" name="password" id="password" accesskey="p" tabindex="2"></p>
		<p><input type="submit" value="Login" name="submit" id="submit" accesskey="s" tabindex="3"></p>
	</form>

	<?php
	$message = "";
	// Connect to the server and choose the database
	$db = mysqli_connect("127.0.0.1", "root", "86395676", "blog");

	if($db) {
		$uname = $_POST['username'];
		$pword = $_POST['password'];
		$query = 'SELECT * FROM Users WHERE Username="' . $uname . '" AND Password="' . $pword . '"';
		$result = mysqli_query($db, $query);

		if(mysqli_num_rows($result) > 0) {
			$message = "Login successful!";
		} else {
			$message = "Invalid username or password.<br>";
		}
	} else {
		$message = "Cannot connect to the database.<br>";
	}

	mysqli_close($db);
	echo $message;
	?>
</body>
</html>