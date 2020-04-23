<?php
	$accounts=array(
		"adam@gmail.com" => '1233',
		"adf" => '5555',
		"JoeDoe" => "Hi123"
	);

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
		if(array_key_exists($email, $accounts)){
			if($password == $accounts[$email]){
				//setcookie('username', $username, time()+3600, '/');
				//header("Location: ../welcome.php");
				//exit();
				echo "HI ".$email;
			} 

			else{
				header("Location: ../index.php?error=wrongpwd&email=".$email);
				exit();
			}
		} 

		else{
			header("Location: ../index.php?error=wrongemail");
			exit();
		}
	}
	
?>