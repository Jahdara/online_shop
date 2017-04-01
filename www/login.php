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
		

		
	

	if(empty($_POST['email'])){
		$errors['email'] = "Please enter your Email Adrress";

	}
	
	if(empty($_POST['passowrd'])){
		$errors['Password']="Please enter your Password";
	}

		if(empty($errors)){
			echo "i got here"; 
			exit();

			$clean = array_map('trim', $_POST);

			#login admin
			doAdminLogin($con, $clean);
		}

			//do database stuff

/*	#eliminate unwanted spaces from values in the $_POST array
			
			#hash the password
			$hash - password_hash($clean['password'],PASSWORD_BCRYPT);
			
			$stmt->fetch()
			//if(password_verify('password', $hash))
			if(password_verify('$clean['password']', $hash)){
				echo 'Password is valid';

			}
			
			}else{
				echo 'Invalid password';
			}	*/

			#insert data
	//$stmt = $con->prepare("SELECT *FROM admin(email, hash)VALUES(:e, :h)");

			#bind params
	
/*	$data =[
				':e' => $clean['email'],
				':h' => $hash
			];
		
			if($stmt->rowCount($con)==1){
				
				while($admin_detail = mysqli_fetch_array($con)){

					//we establish section in admin

				
				header("Location:admin_home.php"); //WE LOG THE USER IN
				
				}
				}else{					//IF RECORD IS NOT =1
				
			$login_error="Invalid Username and/or Password";
			header("Location:admin_login.php?login_error=$login_error")	;
			}

				$stmt->execute($data);
			}  */

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