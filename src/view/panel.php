<script type="text/javascript">
// This function prompts a confirm window when the mode is "delete".
function del() {
	var form = document.forms['select'];
	var mode = form.elements['mode'].value;

	if(mode == 'delete') {
		return confirm("Are you sure delete the selected articles?");
	} else {
		return true;
	}
}
</script>
<?php
//session_id($_GET['s']);
session_start();

// Include the required files
require_once './common/header.php';
require_once '../model/user.php';
require_once '../model/post.php';
require_once '../config/config.php';

require_login();

$uname = $_SESSION['username'];

if($_POST) {
	if($_POST['mode'] == "edit") {
		header("location:edit.php?id=" . $_POST['article'] . "&username=" . $_POST['writer']);
	} else if($_POST['mode'] == "delete") {
		delete_article($_POST['article']);
	} else {
		;
	}
}

echo "Welcome to " . $uname . "," . '<br>';
echo "This is your control panel." . '<br>';
echo "You can do the following things here:";
?>

<ul>
	<li><a href="new.php?username=<?php echo $uname; ?>">Write a new article</a></li>
	<li>Edit / Delete an article listed below</li>
	<form action="panel.php" method="post" name="select">
		<p>
			I would like to <input type="radio" name="mode" value="edit" checked>edit <input type="radio" name="mode" value="delete">delete <select name="article">
				<option selected value="0">Selected one...</option>
				<?php catalogue(); ?>
			</select>
		</p>
		<p><input type="submit" name="submit" value="Submit" onclick="return del();"></p>
		<input type="hidden" name="writer" value="<?php echo $uname; ?>">
	</form>
</ul>

<?php require_once './common/footer.php'; ?>