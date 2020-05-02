<?php
	// if(!isset($_SERVER['HTTP_REFERER'])){
 //    	// redirect them to your desired location
 //    	header('location: ../index.php');
 //    	exit();
	// }

	// else {
		session_start();
		session_destroy();
		header("Location: ../index.php");
		exit();
	//}
?>