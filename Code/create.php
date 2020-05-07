<!--   <?php
	include "dbconnect.inc.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create blog</title>
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
			if(isset($_POST["sendPhoto"])){
					var_dump($_FILES["photo"]);
					//check if the file is uploaded with sucess
					echo $_FILES["photo"]["name"][0];
					if( isset( $_FILES["photo"]["type"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
						$target_dir = "photos/"; //define folder to save the uploaded file
						//expect string "photos/minion.jpg"
						$target_file = $target_dir.basename($_FILES["photo"]["name"]);

						echo "<br><br>".$target_file."<br>";

						//getting extension of the uploaded file
						$file_type = pathinfo($target_file,PATHINFO_EXTENSION);

						echo "Extension: $file_type<br>";
						$accepted = array("jpg", "JPG", "png", "gif");
						if( !in_array($file_type, $accepted)){
							echo "JPG only";
						}
						//move the uploaded file from temporary folder to project folder
						else if(!move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file))
						{
							echo "There was a problem uploading that photo".$_FILES["photo"]["error"];
						} else{
							echo "Thank you ".$_POST['visitorName']."<br>";
						}
					} else {
						//checking errors
						switch( $_FILES["photo"]["error"] ) {
			 				case UPLOAD_ERR_INI_SIZE: //max size set up in php.ini
								$message = "The photo is larger than the server allows.";
			 					break;
			 				case UPLOAD_ERR_FORM_SIZE: //max size set up in html form
			 					$message = "The photo is larger than the script allows.";
			 					break;
			 				case UPLOAD_ERR_NO_FILE:
			 					$message = "No file was uploaded. Make sure you choose a file to upload.";
			 					break;
			 				default:
			 					$message = "Please contact your server administrator for help.";
						} echo "Sorry, there was a problem uploading the image".$message;
					}
				}
		?>
		
		<form action="createblog.php" method="post">
			<p align = "left">
				<label>Blog Title: <input type="text" name="title" size="20" maxlength="40" placeholder="Title"
					value=" //The php code belongs at the bottom of the the form. 
					<?php 
					
					if(isset($_GET["postID"])) 
						echo $result["TITLE"];
					else if(isset($_GET['title']))
						echo $_GET['title']; 
					else echo "";
					?>">
				</label>
			</p>

			<p align = "left">
				<label >Content: <textarea name="content" rows="15" placeholder="Content">
					<?php
					
					if(isset($_GET["postID"])) 
						echo $result["CONTENT"];
					else if(isset($_SESSION['content']))
						echo $_SESSION['content'];
			
					else echo "";
					?>
					</textarea>
				</label>
			</p>

			<p align = "left">
		 			<label for="photo">Your photo</label>
		 			<input type="file" name="photo[]" id="photo" value="" />
		 			<div style="clear: both;" align="left">
 			<input type="submit" name="sendPhoto" value="Send Photo" />
	
			<p align="center">
				<input type="submit" name="create" value="Create">
			</p>
		</form>
	</body>	
</html>


 -->
