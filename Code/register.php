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

				} 

				else if($_GET['error'] == 'emailExists'){
					echo '<p class="error">';
					echo 'Email already exists';
					echo '</p>';
				}
			} 
		?>

		
		<form action="includes/registration.inc.php" method="post">
			
			<legend>Please fill this form:<br><br></legend>

			<!-- name field -->
			<p align = "center">
				<label>Full Name: <input type="text" name="name" size="20" maxlength="40" placeholder="Full Name"
					value=<?php echo isset($_GET['name']) ? $_GET['name'] : ' '?>>
				</label>
			</p>

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

			<!-- register button -->
			<p align="center">
				<input type="submit" name="registerForm" value="Register">
			</p>

		</form>
	</body>	
</html>

