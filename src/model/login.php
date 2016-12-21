<?php
session_start();

// Connect to the server and choose the database
$db = mysqli_connect("127.0.0.1", "root", "86395676", "blog");

if($db) {
	// Retrieve information from the form
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$query = 'SELECT * FROM Users WHERE Username="' . $uname . '" AND Password="' . $pword . '"';
	$result = mysqli_query($db, $query);

	if(mysqli_num_rows($result) > 0) {
		$_SESSION['username'] = $uname;
		echo "<script>alert('Login successful!'); location = '../view/panel.php';</script>";
	} else {
		session_destroy();
		echo "<script>alert('Invalid username or password! Try again!'); location = '../view/login.html';</script>";
	}
} else {
	echo "<script>alert('Invalid username or password!'); location = '../index.php';</script>";
}

mysqli_close($db);
?>