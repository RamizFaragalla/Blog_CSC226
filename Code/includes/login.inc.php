<?php

	include "dbconnect.inc.php";

	// $accounts=array(
	// 	"adam@gmail.com" => '1233',
	// 	"adf" => '5555',
	// 	"JoeDoe" => "Hi123"
	// );

	if(isset($_POST["register"])) {
		header("Location: ../register.php");
		exit();
	}

	else if(!isset($_POST["submit"])) {
		header("Location: ../index.php");
		exit();
	}

	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);

	// one of the fields is empty, or both
	if(empty($email) || empty($password)) {
		header("Location: ../index.php?error=emptyfields&email=".$email);
		exit();
	}

	else {
		$query = "SELECT EMAIL, PASSWORD, USER_ID FROM user ";
		$query .= "WHERE EMAIL = ?";
		//prepare query
		$stmt = $conn->prepare($query);
		//bind param
		$stmt->bind_param("s", $email);
		//execute
		$stmt->execute();
		//get result
		$result = $stmt->get_result();

		//if email exists
		if($result->num_rows == 1){
			//get 1 and only row
			$account = $result->fetch_assoc();
			//var_dump($account);
			if(password_verify($password, $account["PASSWORD"])){
				//setcookie('username', $username, time()+3600, '/');
				//header("Location: ../welcome.php");
				//exit();
				// start a session
				session_start();
				$_SESSION['userID'] = $account["USER_ID"];
				header("Location: ../mainPage.php");
				exit();
			} 

			//wrong password
			else{
				header("Location: ../index.php?error=wrongpwd&email=".$email);
				exit();
			}
		} 

		//wrong email
		else{
			header("Location: ../index.php?error=wrongemail&email=".$email);
			exit();
		}
	}
	
?>