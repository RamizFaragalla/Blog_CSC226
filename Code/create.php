<?php
	session_start();
	if (!isset($_SESSION["userID"])) {
  		header("Location: index.php");
  		exit();
	}
	//include "includes/dbconnect.inc.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create a Blog</title>
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

				else if($_GET["error"] == "fileError") {
					echo '<p class="error">';
					echo 'Error uploading file';
					echo '</p>';
				}
			}
		?>

		
		<form action="includes/processCreate.inc.php" method="post" enctype="multipart/form-data">

			<p align = "left">
				<label>Blog Title: <input type="text" name="title" size="20" maxlength="40" placeholder="Title"
					value="<?php 
					if(isset($_GET['title']))
						echo $_GET['title']; 

					else echo "";
					?>">
				</label>
			</p>

			<p align = "left">
				<label >Content: <textarea name="content" rows="15" placeholder="Content"><?php
					if(isset($_SESSION['content']))
						echo $_SESSION['content'];

					else echo "";
					?></textarea>
				</label>
			</p>

			<p align="left">
				<input type="file" name="file"> 
			</p>
	
			<p align="center">
				<input type="submit" name="create" value="Create">
				<input type="submit" name="cancel" value="Cancel">
			</p>

		</form>
	</body>	
</html>

