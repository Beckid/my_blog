<?php
session_start();

// Connect to the server and choose the database
$db = mysqli_connect("127.0.0.1", "root", "86395676", "blog");

if($db) {
	// Retrieve information from the form
	$uname = htmlspecialchars($_POST['username']);
	$pword = htmlspecialchars($_POST['password']);
	$query = 'SELECT * FROM Users WHERE Username="' . $uname . '" AND Password="' . $pword . '"';
	$result = mysqli_query($db, $query);

	if(mysqli_num_rows($result) > 0) {
		$_SESSION['username'] = $uname;
		echo "<script>alert('Login successful!'); </script>";
		header("location: ../view/panel.php");
	} else {
		//session_destroy();
		echo "<script>alert('Invalid username or password! Try again!'); location = '../view/login.html';</script>";
	}
} else {
	echo "<script>alert('Cannot connect to the databse! The system is currrently unavailable.'); location = '../index.php';</script>";
}

mysqli_close($db);
?>