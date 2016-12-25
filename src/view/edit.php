<?php
// Since the session variables are often lost when redirecting to this page, we change the default setting:
// ../php.ini Line 1569 session.use_trans_sid=1
session_start();

// Include the required functions
require_once './common/header.php';
require_once '../model/user.php';
require_once '../config/config.php';
require_once '../model/post.php';

// Check whether the user has logged in
require_login();

// Handle the form received by post.php
if($_POST) {
	edit_article($_POST['id'], $_POST['title'], $_POST['writer'], $_POST['content']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Article</title>
</head>
<body>

<p>Welcome <?php echo $_GET['username']; ?>,</p>
<h1>Edit an Existing Article</h1>

<form action="edit.php" method="post">
	<h3>Title</h3>
	<p><textarea name="title" rows="1" cols="80" placeholder="Type title" maxlength="50" autofocus required accesskey="t" tabindex="1">
		<?php echo get_title($_GET['id']); ?>
	</textarea></p>
	<h3>Content</h3>
	<p><textarea name="content" rows="20" cols="80" placeholder="Content" maxlength="10000" accesskey="c" tabindex="2">
		<?php echo get_content($_GET['id']); ?>
	</textarea></p>
	<p><input type="submit" name="submit" value="Edit" accesskey="s" tabindex="3"></p>
	<input type="hidden" name="writer" value="<?php echo $_GET['username']; ?>">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
</form>

</body>
</html>

<?php
require_once './common/footer.php';
?>