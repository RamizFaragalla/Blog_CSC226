<?php
	session_start();
	if (!isset($_SESSION["userID"])) {
  		header("Location: index.php");
  		exit();
	}

	include "includes/dbconnect.inc.php";

	// add a search bar
	//add a session before logging in or registering
?>
<html>
	<head>
		<title>My Blogs</title>
	</head>
		<?php
			include "includes/header.php";
		?>
		<p>My Blogs</p><br>
	<style>

	* {
			font-family: consolas;
			font-size: 15px;
	}
	</style>
	<body>
		<?php
			$pagerows = 5; //display 2 records/page
			if ((isset($_GET['page'])  && is_numeric($_GET['page']))){
				$current_page = htmlspecialchars($_GET['page']); //$page = 2 => the second customer page
			} else{
				$current_page = 1;
			}

			//$page = 1 => $start = (1-1) * 2 = 0 => LIMIT $start, $pagerows => LIMIT 0, 2
			$start = ($current_page-1) * $pagerows;

			// select ? from ? limit ?, 3

			//calculate the number of pages
			$count_query = "SELECT COUNT(TITLE) FROM post"; // 10
			$stmt = $conn->prepare($count_query);
			//execute query
			$stmt->execute();
			//count how many records in total
			$row = $stmt->get_result()->fetch_all(MYSQLI_NUM); //fetch records in indexed array
			/*var_dump($row);
			echo "<br>";*/
			$records = $row[0][0];
			//echo $records;
			
			//calculate the total number of pages
			if ($records > $pagerows){
				//ceil => round the number up to the nearest integer
				$total_pages = ceil($records/$pagerows);
				//echo $pages;
			} else{
				$total_pages = 1;
			}
			//finished check number of pages

			//full $query1 = "SELECT CUSTOMER_NAME FROM CUSTOMER LIMIT ?, ?";
			$query1 = "SELECT u.NAME, p.TITLE, p.CONTENT, p.DATE, p.POST_ID ";
			$query1 .= "FROM user u ";
			$query1 .= "JOIN post p ";
			$query1 .= "ON u.USER_ID = p.USER_ID ";
			$query1 .= "WHERE u.USER_ID = ?";
			$query1 .= " ORDER BY DATE DESC ";
			$query1 .= " LIMIT ?, ?";

			//echo $query1;
			$stmt = $conn->prepare($query1);

			// current user
			$id = $_SESSION["userID"];
			//binding parameter
			$stmt->bind_param("iii", $id, $start, $pagerows);

			//execute query
			$stmt->execute();
			//get result
			// object oriented: $stmt is an instance of an object that tries to use functions in parent object
			$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

			if($result){
				//var_dump($result);
		?>

		<?php
			foreach($result as $post){
				//echo $post["POST_ID"];
				$link = "edit_delete.php?postID=".$post["POST_ID"];
				echo $post['TITLE'].' <a href='.$link.'><button>Edit/Delete</button></a><br>';
				echo "By ".$post['NAME']." on ";
				echo $post['DATE'];
				echo "<br><br>";
				echo $post['CONTENT'];
				echo "<br><br><hr><br>";
			}
		?>
		
		<?php
			} else{
				echo "<p>You haven't writen any blogs yet! </p>";
				exit();
			}

			$stmt->close();
			if( $current_page > 1){
					echo '<a href="myBlogs.php?page='.($current_page-1).'"><button>Previous</button></a>';
			}
			if($current_page < $total_pages){
				//<a href="pagination2.php?page=2"> Next </a>
				echo '<a href="myBlogs.php?page='.($current_page+1).'"> <button>Next</button> </a>';
			}
		?>
	</body>
</html>