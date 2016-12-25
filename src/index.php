<?php
	require_once './config/config.php';
	require_once './model/post.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog system</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
</head>
<body>
	<h1>My Blog System</h1>
	<p>If you are a writer, please click <a href="view/login.php">here</a> to login.</p>
	<?php print_all(); ?>
</body>
</html>