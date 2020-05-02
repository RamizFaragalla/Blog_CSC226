<html>
<!-- username, email, num posts, log out -->

	<?php
		// if(!isset($_SERVER['HTTP_REFERER'])){
	 //    	// redirect them to your desired location
	 //    	header('location: ../index.php');
	 //    	exit();
		// }
		if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { 
			die(header("Location: logout.inc.php")); 
		}
		
		include "includes/dbconnect.inc.php";
		$id = $_SESSION["userID"];

		$query = "SELECT NAME, EMAIL ";
		$query .= "FROM user ";
		$query .= "WHERE USER_ID = ?";

		$stmt = $conn->prepare($query);
		//binding parameter
		$stmt->bind_param("i", $id);

		//execute query
		$stmt->execute();
		// only one result
		$result = $stmt->get_result()->fetch_assoc();

		// get num of posts
		$query = "SELECT COUNT(TITLE) from post WHERE ";
		$query .= "USER_ID = ?";

		$stmt = $conn->prepare($query);
		//binding parameter
		$stmt->bind_param("i", $id);

		//execute query
		$stmt->execute();

		$row = $stmt->get_result()->fetch_all(MYSQLI_NUM); //fetch records in indexed array
		/*var_dump($row);
		echo "<br>";*/
		$records = $row[0][0];

		echo $result["NAME"] . ", " . $result["EMAIL"];
	?>

	<a href="mainPage.php" style="float: right;"> <button>Home</button> </a>
	<a href="myBlogs.php" style="float: right;"> <button>MyBlogs</button> </a>
	<a href="create.php" style="float: right;"> <button>Create a blog</button> </a>
	<br>

	<?php
		echo "Number of blogs: " . $records;
	?>
	<br>
	<a href="includes/logout.inc.php" style="float: right;"> <button>Log Out</button> </a>

	<br><br>
</html>