<!DOCTYPE html>
<html>
	<head>
		<title>Blog Login</title>
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

				} else if($_GET['error'] == 'wrongemail'){
					echo '<p class="error">';
					echo 'Email cannot be found';
					echo '</p>';
				} else{
					echo '<p class="error">';
					echo 'Wrong password';
					echo '</p>';
				}
			} 
		?>

		
		<form action="includes/login.inc.php" method="post">
			
			<legend>Please enter your email and password:<br><br></legend>

			<!-- email field -->
			<p align = "center">
				<label>&nbsp;&nbsp;&nbsp;Email: <input type="email" name="email" size="20" maxlength="40" placeholder="Email"
					value=<?php echo isset($_GET['email']) ? $_GET['email'] : ' '?>>
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

