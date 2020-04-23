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
	echo "<br><br>";

	$query1 = "SELECT u.NAME, p.TITLE, p.CONTENT, p.DATE ";
	$query1 .= "FROM user u ";
	$query1 .= "JOIN post p ";
	$query1 .= "ON u.USER_ID = p.USER_ID ";
	//$query1 .= "ORDER BY DATE DESC ";
	//$query1 .= "LIMIT ?, ?";

	//echo $query1;
	$stmt = $conn->prepare($query1);
	//$stmt->bind_param("ii", $start, $pagerows);

	//execute query
	$stmt->execute();
	//get result
	// object oriented: $stmt is an instance of an object that tries to use functions in parent object
	$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	var_dump($result);
?>
