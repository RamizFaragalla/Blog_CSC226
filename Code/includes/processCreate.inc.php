<?php

	include "dbconnect.inc.php";
	session_start();

	// illegal access for security
	if(!isset($_POST["create"]) && !isset($_POST["cancel"])) {
		header("Location: ../logout.inc.php");
		exit();
	}

	else if(isset($_POST["cancel"])) {
		header("Location: ../myBlogs.php");
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

	$noContent = empty($content) && $_FILES["file"]["error"] == UPLOAD_ERR_NO_FILE;

	// one of the fields is empty, or both
	if(isset($_POST["create"]) && (empty($title) || $noContent)) {
		//echo $title;
		header("Location: ../create.php?error=emptyfields&title=".$title);
		$_SESSION["content"] = $content;
		exit();
	}
	
	if(empty($content)) {		
		$target_file = $target_dir.basename($_FILES["file"]["name"]);
		$file_type = pathinfo($target_file,PATHINFO_EXTENSION);

		if($file_type != "txt") {
			header("Location: ../create.php?error=fileError&title=".$title);
			exit();
		}
		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
		$content = file_get_contents($target_file);
		unlink($target_file);	// ***elete the file once it's copied into $content variable
	}

	// if update is pressed, update every attribute
	if(isset($_POST["create"])) {
		// if(isset($_FILES["file"])) {
		// 	$file = $_FILES["file"];

		// 	// file properties
		// 	$file_name = $file['name'];
		// 	$file_tmp = $file['tmp_name'];
		// 	$file_sizes = $file['size'];
		// 	$file_error = $file['error'];

		// 	// file extension
		// 	$file_ext = explode('.', $file_name);
		// 	$file_ext = strtolower(end($file_ext));

		// 	$allowed = 'txt';

		// 	if($file_ext == $allowed) {
		// 		if($file_error == 0) {
		// 			if($file_size <= 2097152) 
		// 		}
		// 	}
		// }

		$query = "INSERT INTO post(TITLE, CONTENT, USER_ID, DATE) VALUES";
		//USER_ID, NAME, EMAIL, PASSWORD
		$query .= "(?, ?, ?, NOW())";

		//prepare query
		$stmt = $conn->prepare($query);
		//bind param
		$stmt->bind_param("ssi", $title, $content, $_SESSION["userID"]);
		//execute
		$stmt->execute();
		header("Location: ../myBlogs.php");
		exit();
	}
	
?>