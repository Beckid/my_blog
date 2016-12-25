<?php
session_start();

// Include the required files
require_once '../model/user.php';

// If already logged in, the user will be redirected to the control panel
if(logged_in()) {
	header('location: panel.php');
}

if($_POST) {
	validate_login($_POST['username'], $_POST['password']);
}
?>
<form action="login.php" method="post" style="text-align: center">
	<p>
		<label for="username">Username: </label>
		<input type="text" placeholder="Type username" name="username" id="username" accesskey="u" tabindex="1">
	</p>
	<p>
		<label for="password">Password: </label>
		<input type="password" placeholder="Type password" name="password" id="password" accesskey="p" tabindex="2">
	</p>
	<p>
		<input type="submit" value="Login" name="submit" accesskey="s" tabindex="3">
	</p>
</form>