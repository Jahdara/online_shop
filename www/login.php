<?php
	#title
    $page_title = "Login";

	#include header
	include 'includes/header.php';

 	#include db 
	include 'includes/db.php';

	if(array_key_exists('submit', $_POST)){
		#cache error
		$errors = [];

	if(empty($_POST['email'])){
		$errors[] = "Please enter your Email Adrress";

	}
	
	if(empty($_POST['passowrd'])){
		$errors[] = "Please enter your Password";
	}

		if(empty($errors)){
			//do database stuff

			#eliminate unwanted spaces from values in the $_POST array
			$clean = array_map('trim', $_POST);

			#hash the password
			$hash - password_hash($clean['password'],PASSWORD_BCRYPT);

			#insert data
			$stmt = $con->prepare("SELECT *FROM admin(email, hash)VALUES(:e, :h)");

			#bind params
			$data =[
				':e' => $clean['email'],
				':h' => $hash
			];
		

		}

	}

?>

<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="login.php" method ="POST">
			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="submit" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>
<?php

		#include footer
		include 'includes/footer.php';

	?>