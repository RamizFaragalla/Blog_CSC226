<?php

	include "dbconnect.inc.php";
	session_start();

	// illegal access for security
	if(!isset($_POST["create"]) {
		header("Location: ../logout.inc.php");
		exit();
	}

	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	$title = test_input($_POST["title"]);
	$content = test_input($_POST["content"]);

	// one of the fields is empty, or both
	if(isset($_POST["create"]) && (empty($title) || empty($content))) {
		//echo $title;
		header("Location: ../edit_delete.php?error=emptyfields&title=".$title);
		$_SESSION["content"] = $content;
		exit();
	}

	// if create is pressed, create every attribute
	else if(isset($_POST["create"])) {
		$query = "create post SET TITLE = ?, CONTENT = ?, DATE = NOW()";
		$query .= " WHERE POST_ID = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssi", $title, $content, $_SESSION["postID"]);
		$stmt->execute();
		header("Location: ../myBlogs.php");
		exit();
	}



	else if(isset($_POST["cancel"])) {
		header("Location: ../myBlogs.php");
		exit();
	}
	
?>
