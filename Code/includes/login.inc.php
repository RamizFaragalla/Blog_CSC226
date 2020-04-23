<?php
	$accounts=array(
		"Adam" => '1233',
		"John" => '5555',
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

	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);

	// one of the fields is empty, or both
	if(empty($username) || empty($password)) {
		header("Location: ../index.php?error=emptyfields&username=".$username);
		exit();
	}

	else {
		if(array_key_exists($username, $accounts)){
			if($password == $accounts[$username]){
				//setcookie('username', $username, time()+3600, '/');
				//header("Location: ../welcome.php");
				//exit();
				echo "HI ".$username;
			} 

			else{
				header("Location: ../index.php?error=wrongpwd&username=".$username);
				exit();
			}
		} 

		else{
			header("Location: ../index.php?error=wrongusername");
			exit();
		}
	}
	
?>