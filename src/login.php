<?php
// Connect to the server and choose the database
$db = mysqli_connect("127.0.0.1", "root", "86395676", "blog");

if($db) {
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$query = 'SELECT * FROM Users WHERE Username="' . $uname . '" AND Password="' . $pword . '"';
	$result = mysqli_query($db, $query);

	if(mysqli_num_rows($result) > 0) {
		echo "<script>alert('Login successful!'); location = 'first.php';</script>";
	} else {
		echo "<script>alert('Invalid username or password!'); location = 'login.html';</script>";
	}
} else {
	echo "<script>alert('Invalid username or password!'); location = 'index.php';</script>";
}

mysqli_close($db);
?>