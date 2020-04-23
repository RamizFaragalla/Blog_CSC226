<?php
	$accounts=array(
		"adam@gmail.com" => '1233',
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

	$name = test_input($_POST["name"]);
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);

	// one of the fields is empty, or both
	if(empty($name) || empty($email) || empty($password)) {
		header("Location: ../register.php?error=emptyfields&name=".$name."&email=".$email);
		exit();
	}

	else if(array_key_exists($email, $accounts)){	
			header("Location: ../register.php?error=emailExists&name=".$name."&email=".$email);
			exit();
	} 

	else{
		// header("Location: ../index.php?error=wrongusername");
		// exit();
		echo $name .", account created successfully";
	}
	
?>