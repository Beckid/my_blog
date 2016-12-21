<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Control Panel</title>
	<?php
		if(isset($_SESSION['username'])) {
			;
		} else {
			echo "<script>alert('Please login.'); location = 'login.html'</script>";
		}
	?>
</head>
<body>
	<button onclick="<?php session_destroy(); ?>location = '../index.php'">Logout</button>
	<p>
		Welcome <?php echo $_SESSION['username'];$_SESSION['username'] = $_SESSION['username']; ?>,<br>
		This is your Control Panel.
	</p>
	<p>You can do the following things here:</p>
	<ul>
		<li><a href="new_article.php">Write a new article</a></li>
		<li><a href="modify.html">Modify an old article written by you</a></li>
		<li><a href="delete.html">Delete an old article written by you</a></li>
	</ul>
	<p>Back to <a href="../index.php">Homepage</a></p>
</body>
</html>