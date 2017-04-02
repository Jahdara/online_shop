<?php

	session_start();

	#title
    $page_title = "Login";

	#include header
	include 'includes/header.php';

 	#include db 
	include 'includes/db.php';

	include 'includes/function.php';
	

   $errors = [];
  
	if(array_key_exists('submit', $_POST)){
		#cache error
	 /*print_r($_POST);
	 exit();*/


	if(empty($_POST['email'])){
		$errors['email'] = "Please enter your Email Adrress";

	}
	
	if(empty($_POST['password'])){
		$errors['password']="Please enter your Password";
	}

		if(empty($errors)){
		

			$clean = array_map('trim', $_POST);

			#login admin
			doAdminLogin($con, $clean);
		}
	
	}

?>

<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="login.php" method ="POST">
			<div><?php
				if(isset($errors['email'])) { echo '<span class="err">'. $errors['email']. '</span>';}
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
			<?php
				if(isset($errors['password'])) { echo '<span class="err">'. $errors['password']. '</span>';}
				?>
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