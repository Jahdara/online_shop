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
		$errors['email'] = "Please enter your Email Adrress";

	}
	
	if(empty($_POST['passowrd'])){
		$errors['password'] = "Please enter your Password"
	}

		if(empty($errors)){

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