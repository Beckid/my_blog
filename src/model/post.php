<?php
// Create a new article
function new_article($title, $writer, $content) {
	$db = mysqli_connect(DB_SERVER, DB_UNAME, DB_PWORD, DB_NAME) or die('Cannot connect to the database.');
	$query = 'INSERT INTO Articles (Title, Author, Content) VALUES ("' . $title . '", "' . $writer . '", "' . $content . '")';
	if(mysqli_query($db, $query)) {
		;
	} else {
		die('Cannot create a new article.');
	}

	// Create a static url page for this newly_created page
	// Order by PostTime in decrement order, so that:
	// in case two articles have the same author, title and content, we always refer to the latest one
	$query = 'SELECT * FROM Articles WHERE Title = "' . $title . '" AND Author = "' . $writer . '" AND Content = "' . $content . '" ORDER BY PostTime DESC';
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	publish_article($row['Id'], $row['PostTime'], $row['Author'], $row['Title'], $row['Content']);

	mysqli_close($db);
}



// Update one existing article
function edit_article($id, $title, $writer, $content) {
	$db = mysqli_connect(DB_SERVER, DB_UNAME, DB_PWORD, DB_NAME) or die('Cannot connect to the database.');
	$query = 'UPDATE Articles SET AUTHOR = "' . $writer . '" WHERE Id = ' . $id;
	mysqli_query($db, $query);

	$query = 'UPDATE Articles SET Title = "' . $title . '" WHERE Id = ' . $id ;
	mysqli_query($db, $query);

	$query = 'UPDATE Articles SET Content = "' . $content . '" WHERE Id = ' . $id;
	mysqli_query($db, $query);

	$query = 'SELECT PostTime FROM Articles WHERE Id = ' . $id;
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$time = $row['PostTime'];

	mysqli_close($db);
	publish_article($id, $time, $writer, $title, $content);
}

function get_title($id) {
	$db = mysqli_connect(DB_SERVER, DB_UNAME, DB_PWORD, DB_NAME) or die('Cannot connect to the database.');
	$query = "SELECT Title FROM Articles WHERE Id = " . $id;
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	mysqli_close($db);

	return $row['Title'];
}

function get_content($id) {
	$db = mysqli_connect(DB_SERVER, DB_UNAME, DB_PWORD, DB_NAME) or die('Cannot connect to the database.');
	$query = "SELECT Content FROM Articles WHERE Id = " . $id;
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	mysqli_close($db);

	return $row['Content'];
}



// Publish an article to the homeapge and a static url
// Notice: This function should be called when both creating new articles and editing existing article
function publish_article($id, $time, $author, $title, $content) {
	$file_name = "../source/" . $id . ".php";
	$title = $title;

	$body1 = "<h1>" . $title . "</h1>";
	$body2 = "<h5>Writen by " . $author . "</h5>";
	$body3 = "<h6>Last updated at " . $time . "</h6>";
	$body4 = "<p>" . $content . "</p>";
	$body = $body1 . "\n" . $body2 . "\n" . $body3 . "\n" . $body4;

	create_page($title, $body, $file_name);
}

// This function creates an PHP file for the article and after that, redirects to that page
function create_page($title, $body, $file_name) {
	ob_start();

	echo "<!DOCTYPE html>\n<html>\n<head>\n<title>";
	echo $title;
	echo "</title>\n</head>\n<body>\n";
	echo $body;
	echo "\n</body>\n</html>";
	echo "<?php\nrequire_once '../view/common/footer.php';\n?>";

	$buffer = ob_get_contents();
	$file = fopen($file_name, "w");
	fwrite($file, $buffer);

	ob_end_clean();

	header('location:' . $file_name);
}



// Delete one existing article
function delete_article($id) {
	$db = mysqli_connect(DB_SERVER, DB_UNAME, DB_PWORD, DB_NAME) or die('Cannot connect to the database.');
	$query = 'DELETE FROM Articles WHERE Id = ' . $id;
	mysqli_query($db, $query);
	mysqli_close($db);
	unpublish($id);
}

function unpublish($id) {
	$file_name = '../source/' . $id . '.php';
	return unlink($file_name);
}



// Obtain information about all existing articles
/*
WARNING: Function mysqli_fetch_all only works with MySQLnd driver.

About the return value of this function:
This function returns a two-dimensional array whose num_rows = no. of existing articles.
In each row, it is represented as follows:
rows[n][0] => id, rows[n][1] => title, rows[n][2] => author, rows[n][3] => content, rows[n][4] => post_time 
*/
function get_all() {
	$db = mysqli_connect(DB_SERVER, DB_UNAME, DB_PWORD, DB_NAME) or die('Cannot connect to the database.');
	$query = 'SELECT * FROM Articles ORDER BY PostTime DESC';
	$result = mysqli_query($db, $query);
	$rows = mysqli_fetch_all($result);

	return $rows;
}

// This function prints all the articles
// This function should only be used by index.php
function print_all() {
	$info = get_all();
	foreach ($info as $article) {
		if(strlen($article[3]) > 100) {
			$describe = substr($article[3], 0, 250) . "......";
		} else {
			$describe = $article[3];
		}

		echo "<h2>$article[1]</h2>";
		echo "<h5>Writen by $article[2] at $article[4]</h5>";
		echo "<p>$describe</p>";
		echo "<a href='./source/$article[0].php'>Read more</a>";
	}
}

// This function displays a catalogue of all existing articles
// It is used by panel.php so that user can select an article to edit or delete
function catalogue() {
	$info = get_all();

	foreach ($info as $article) {
		echo "<option value='$article[0]'>$article[1]</option>";
	}
}
?>