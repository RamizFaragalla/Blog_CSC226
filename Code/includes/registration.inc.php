<?php
	$accounts=array(
		"Adam" => '1233',
		"John" => '5555',
		"JoeDoe" => "Hi123"
	);

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

	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);

	// one of the fields is empty, or both
	if(empty($username) || empty($password)) {
		header("Location: ../register.php?error=emptyfields&username=".$username);
		exit();
	}

	else if(array_key_exists($username, $accounts)){	
			header("Location: ../register.php?error=usernameExists&username=".$username);
			exit();
	} 

	else{
		// header("Location: ../index.php?error=wrongusername");
		// exit();
		echo $username .", account created successfully";
	}
	
?>