<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create a New Article</title>
	<?php
		if(isset($_SESSION['username'])) {
			;
		} else {
			echo "<script>alert('Please login.'); location = 'login.html</script>";
		}
	?>
</head>
<body>
<button onclick="<?php session_destroy(); ?>location = '../index.php'">Logout</button>
<p>Welcome <?php echo $_SESSION['username']; ?>,</p>
<h1>Create a New Article</h1>
<form action="../model/new_article.php" method="post">
	<h3>Title</h3>
	<p><textarea name="title" rows="1" cols="80" placeholder="Type title" maxlength="50" autofocus required accesskey="t" tabindex="1"></textarea></p>
	<h3>Content</h3>
	<p><textarea name="content" rows="20" cols="80" placeholder="Content" maxlength="10000" accesskey="c" tabindex="2"></textarea></p>
	<p><input type="submit" name="submit" value="Submit" accesskey="s" tabindex="3"></p>
</form>
</body>
</html>