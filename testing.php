<?php 
	include "Code/includes/dbconnect.inc.php";

	$query = "SELECT EMAIL, PASSWORD FROM user ";
	$query .= "WHERE EMAIL = ?";
	//prepare query
	$stmt = $conn->prepare($query);
	//bind param
	$x = "john.doe@gmail.com";
	$stmt->bind_param("s", $x);
	//execute
	$stmt->execute();
	//get result
	$result = $stmt->get_result();

	//get 1 and only row
	$account = $result->fetch_assoc();
	var_dump($account);
	echo "<br><br>";

	$query = "SELECT COUNT(USER_ID) FROM user ";

	//prepare query
	$stmt = $conn->prepare($query);

	//execute
	$stmt->execute();
	//get result
	$row = $stmt->get_result()->fetch_all(MYSQLI_NUM);
	$id = $row[0][0];
	//new ID

	echo $id;
?>
