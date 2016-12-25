<?php

//Include the config file
require_once '../config/config.php';

// Check whether the user has logged in and prompt the login-in process
function logged_in() {
	return isset($_SESSION['authorized']) && $_SESSION['authorized'] == true;
}

function require_login() {
	if(logged_in()) {
		return true;
	} else {
		return false;
		header('location: ../view/login.php');
	}
}

// Check whether valid combination of username and password has been received
function login_check($uname, $pword) {
	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);
	$db = mysqli_connect(DB_SERVER, DB_UNAME, DB_PWORD, DB_NAME) or die('Cannot connect to the database.');

	$query = 'SELECT * FROM Users WHERE Username="' . $uname . '" AND Password="' . $pword . '"';
	$result = mysqli_query($db, $query) or die('Query is not successful.');

	if (mysqli_num_rows($result) > 0) {
		$_SESSION['username'] = $uname;
		$_SESSION['authorized'] = true;
		return true;
	} else {
		return false;
	}

	mysqli_close($db);
}

function validate_login($uname, $pword) {
	if(login_check($uname, $pword)) {
		$sid = session_id();
		header('location: panel.php' . '?s=' . session_id());
	} else {
		$_SESSION['error'] = 'Cannot log in. Sorry.';
		header('location: login.php');
	}
}
?>