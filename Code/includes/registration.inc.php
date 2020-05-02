<?php
	
	include "dbconnect.inc.php";


	if(!isset($_POST["registerForm"])) {
		header("Location: ../register.php");
		exit();
	}

	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	$name = test_input($_POST["name"]);
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);

	//get users with same email
	$query = "SELECT EMAIL FROM user ";
	$query .= "WHERE EMAIL = ?";
	//prepare query
	$stmt = $conn->prepare($query);
	//bind param
	$stmt->bind_param("s", $email);
	//execute
	$stmt->execute();
	//get result
	$result = $stmt->get_result();

	// one of the fields is empty, or both
	if(empty($name) || empty($email) || empty($password)) {
		header("Location: ../register.php?error=emptyfields&name=".$name."&email=".$email);
		exit();
	}

	// check if name only contains letters and whitespace
    else if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    	header("Location: ../register.php?error=invalidName&name=".$name."&email=".$email);
		exit();
    }
    //if email already exists
	else if($result->num_rows == 1){	
			header("Location: ../register.php?error=emailExists&name=".$name."&email=".$email);
			exit();
	} 

	//add user to database
	else {
		// //get USER_ID;
		// $query = "SELECT COUNT(USER_ID) FROM user ";

		// //prepare query
		// $stmt = $conn->prepare($query);

		// //execute
		// $stmt->execute();
		// //get result
		// $row = $stmt->get_result()->fetch_all(MYSQLI_NUM);
		// $id = $row[0][0];

		// $id += 100;

		$query = "INSERT INTO user(NAME, EMAIL, PASSWORD) VALUES";
		//USER_ID, NAME, EMAIL, PASSWORD
		$query .= "(?, ?, ?)";

		// hash the password
		$hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

		//prepare query
		$stmt = $conn->prepare($query);
		//bind param
		$stmt->bind_param("sss", $name, $email, $hashed_pwd);
		//execute
		$stmt->execute();
		
		// get userID
		$query = "SELECT USER_ID FROM user ";
		$query .= "WHERE EMAIL = ?";
		$stmt = $conn->prepare($query);

		//binding parameter
		$stmt->bind_param("s", $email);

		//execute query
		$stmt->execute();
		//get result
		// object oriented: $stmt is an instance of an object that tries to use functions in parent object
		$result = $stmt->get_result()->fetch_assoc();

		session_start();
		$_SESSION['userID'] = $result["USER_ID"];

		header("Location: ../mainPage.php");
		exit();
	}
	
?>