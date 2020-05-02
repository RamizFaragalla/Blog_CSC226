<?php
	if(!isset($_SERVER['HTTP_REFERER'])){
    	// redirect them to your desired location
    	header('location: includes/logout.inc.php');
    	exit();
	}
	include "includes/dbconnect.inc.php";
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit/Delete Blog</title>
		<style>
			.error{
				color: red;
			}

			button{
				width: 100px;
			}

			* {
      			font-family: consolas;
      			font-size: 15px;
    		}

    		textarea {
    			width: 100%;
				vertical-align: top;
			}

		</style>
	</head>

	<body>


		<?php
			if(isset($_GET['error'])){
				if($_GET['error'] == 'emptyfields'){
					echo '<p class="error">';
					echo 'Please fill in all fields';
					echo '</p>';

				}
			}

			if(isset($_GET["postID"])) {
				// query
				// need: title, content
				$query = "SELECT TITLE, CONTENT FROM post";
				$query .= " WHERE POST_ID = ?";
				$stmt = $conn->prepare($query);
				$stmt->bind_param("i", $_GET["postID"]);
				$stmt->execute();
				$result = $stmt->get_result()->fetch_assoc();

				$_SESSION["postID"] = $_GET["postID"];
			}
		?>

		
		<form action="includes/processEdit.inc.php" method="post">

			<p align = "left">
				<label>Blog Title: <input type="text" name="title" size="20" maxlength="40" placeholder="Title"
					value="<?php 
					
					if(isset($_GET["postID"])) 
						echo $result["TITLE"];

					else if(isset($_GET['title']))
						echo $_GET['title']; 

					else echo "";
					?>">
				</label>
			</p>

			<p align = "left">
				<label >Content: <textarea name="content" rows="15" placeholder="Content"><?php
					if(isset($_GET["postID"])) 
						echo $result["CONTENT"];

					else if(isset($_SESSION['content']))
						echo $_SESSION['content'];

					
					else echo "";
					?></textarea>
				</label>
			</p>
	
			<p align="center">
				<input type="submit" name="update" value="Update">

				<input type="submit" name="delete" value="Delete">

				<input type="submit" name="cancel" value="Cancel">
			</p>

		</form>
	</body>	
</html>

