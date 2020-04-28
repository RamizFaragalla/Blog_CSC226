<?php
	include "dbconnect.inc.php";
	// $accounts=array(
	// 	"adam@gmail.com" => '1233',
	// 	"John" => '5555',
	// 	"JoeDoe" => "Hi123"
	// );

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
		//get USER_ID;
		$query = "SELECT COUNT(USER_ID) FROM user ";

		//prepare query
		$stmt = $conn->prepare($query);

		//execute
		$stmt->execute();
		//get result
		$row = $stmt->get_result()->fetch_all(MYSQLI_NUM);
		$id = $row[0][0];

		$id += 100;

		$query = "INSERT INTO user VALUES";
		//USER_ID, NAME, EsMAIL, PASSWORD
		$query .= "(?, ?, ?, ?)";
		//prepare query
		$stmt = $conn->prepare($query);
		//bind param
		$stmt->bind_param("ssss", $id, $name, $email, $password);
		//execute
		$stmt->execute();
		
		header("Location: ../mainPage.php");
		exit();
	}
	
?>