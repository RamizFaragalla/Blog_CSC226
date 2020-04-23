<!DOCTYPE html>
<html>
	<head>
		<style>
			.error{
				color: red;
			}

			button{
				width: 100px;
			}

			* {
      			font-family: consolas;
      			font-size: 30px;
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

				} else if($_GET['error'] == 'wrongusername'){
					echo '<p class="error">';
					echo 'Username cannot be found';
					echo '</p>';
				} else{
					echo '<p class="error">';
					echo 'Wrong password';
					echo '</p>';
				}
			} 
		?>

		
		<form action="includes/login.inc.php" method="post">
			
			<legend>Please enter your username and password:<br><br></legend>

			<!-- username field -->
			<p align = "center">
				<label>UserName: <input type="text" name="username" size="20" maxlength="40" placeholder="Username"
					value=<?php echo isset($_GET['username']) ? $_GET['username'] : ' '?>>
				</label>
			</p>

			<!-- password field -->
			<p align = "center">
				<label>Password: <input type="password" name="password" size="20" maxlength="60" placeholder="Password"> 
				</label>
			</p>

			<br>

			<!-- submit button -->
			<p align="center">
				<input type="submit" name="submit" value="Login">

				<!-- register button -->
				<input type="submit" name="register" value="Register">
			</p>

		</form>
	</body>	
</html>

