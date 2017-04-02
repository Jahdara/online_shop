<?php
	#title
    $page_title = "Register";

    #load db connection
    include 'includes/db.php';

    #include functions
    include 'includes/function.php';

	#include header
 	include 'includes/header.php';

 	$errors = [];
 	if(array_key_exists('register',$_POST )){
 		#cache errors
 		
 		#validate first name
 		if(empty($_POST['fname'])) {
 			$errors['fname'] = "please enter a first name";

 		}
 		if(empty($_POST['lname'])) {
 			$errors['lname'] = "please enter a last name";

 		}
 		if(doesEmailExist($con, $_POST['email'])) {
 			$errors['email'] = "please enter a Email";

 		}
 		if(empty($_POST['password'])) {
 			$errors['password'] = "please enter Password";

 		}

 		if($_POST['password'] != $_POST['pword']){
 			$errors['pword'] = "Password does not match";
 			#$errors['pword'] = "password do not match";
 		}

 		

 		if(empty($errors)){
 		//do database stuff

 			#eliminate unwanted spaces from values in the $_POST array
 			$clean = array_map('trim', $_POST);

 			#register admin
 			doAdminRegister($con, $clean);
<<<<<<< HEAD
=======

 			displayErrors($con, $clean);
>>>>>>> another
 		}

 	}

?>
<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
				<?php
					//if(isset($errors['fname'])) { echo '<span class="err">'. $errors['fname']. '</span>';}
				$display = displayErrors($errors,'fname');
				echo $display;
				?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
			<?php
			//if(isset($errors['lname'])) { echo '<span class="err">'. $errors['lname']. '</span>';}
			$show = displayErrors($errors, 'lname');
			echo $show;
			?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
			<?php
				//if(isset($errors['email'])) { echo '<span class="err">'. $errors['email']. '</span>';}
			 	$manup = displayErrors($errors, 'email');
			 	echo $manup;
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
			<?php
				//if(isset($errors['password'])) { echo '<span class="err">'. $errors['password']. '</span>';}
				$biggie = displayErrors($errors, 'password');
				echo $biggie;
				?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
			<?php
				//if(isset($errors['pword'])) { echo '<span class="err">'. $errors['pword']. '</span>';}
				$bum = displayErrors($errors, 'pword');
				echo $bum;
				?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

	<?php

		#include footer
		include 'includes/footer.php';

	?>