<?php
session_start();

// Connect to the server and choose the database
$db = mysqli_connect("127.0.0.1", "root", "86395676", "blog");

if($db) {
	// Retrieve information from the form
	$title = $_POST['title'];
	$content = $_POST['content'];
	$author = $_SESSION['username'];
	echo $author;
	
	// Prepare statement for submitting the data
	$stmt = mysqli_prepare($db, 'INSERT INTO Articles (Title, Author, Content) VALUES (?, ?, ?)');
	
	if(mysqli_stmt_bind_param($stmt, 'sss', $title, $author, $content)) {
		echo "<script>alert('Binding is successful');</script>";
	} else {
		echo "<script>alert('Binding is not successful');</script>";
	}

	echo $title . "<br>";
	echo $author . "<br>";
	echo $content . "<br>";
	
	/*if(mysqli_stmt_execute($stmt)) {
		echo "<script>alert('Succeed! You have created a new article.'); location = '../view/panel.php';</script>";
	} else {
		echo "<script>alert('Something is wrong! Try again!'); location = '../view/new_article.php';</script>";
	}*/
} else {
	echo "<script>alert('Cannot connect to the databse! The system is currrently unavailable.'); location = '../index.php';</script>";
}

mysqli_close($db);
?>